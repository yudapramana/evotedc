<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public $route_index = 'users';
    public $view_folder = 'backend.users';

    /**
     * show list data
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['list'] = User::orderBy('first_name', 'asc')->get();
        return view($this->view_folder . '.index', $data);
    }

    /**
     * show create page
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['roles'] = Role::orderBy('name', 'asc')->get();
        return view($this->view_folder . '.create', $data);
    }

    /**
     * show edit page
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['roles'] = Role::orderBy('name', 'asc')->get();
        $data['detail'] = User::findOrFail($id);
        return view($this->view_folder . '.edit', $data);
    }

    /**
     * show detail page
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view(Request $request, $id) {
        $data['current_menu'] = getCurrentMenu($this->route_index);
        $data['route_index'] = $this->route_index;
        $data['roles'] = Role::orderBy('name', 'asc')->get();
        $data['detail'] = User::findOrFail($id);
        return view($this->view_folder . '.view', $data);
    }

    /**
     * store data to database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'role_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'email|required',
                'username' => 'required',
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = [
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'username' => request('username'),
                'email' => request('email'),
                'phone' => request('phone'),
                'password' => Hash::make(request('password')),
                'address' => request('address'),
            ];
            $saveData = User::create($data);
            if(!$saveData->exists) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
            }
            if($request->hasFile('image')) {
                $destinationPath = 'users';
                $originalFile = $destinationPath . '/' . $saveData->id . '/original.jpg';
                $width = 200;
                $height = 200;
                $thumbnail = $destinationPath . '/' . $saveData->id . '/' . $width . 'x' . $height . '.jpg';
                $imageFile = request('image');
                $disk = Storage::disk('public');
                if (! $disk->exists($destinationPath)) {
                    $disk->makeDirectory($destinationPath, 0755, true);
                }
                $disk->put($originalFile , fopen($imageFile, 'r+'), 'public');
                $img = Image::make(fopen($imageFile, 'r+'));
                $img->fit($width, $height)->save($disk->path($thumbnail));

                $image = 'storage/' . $thumbnail;
                $saveData->update(['image' => $image]);
            }
            if($request->has('role_id'))
            {
                $saveData->syncRoles(request('role_id'));
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * update data on database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id) {
        try {
            $roles = [
                'role_id' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'email|required',
                'username' => 'required',
            ];
            if($request->has('password') && request('password') != null) {
                $roles['password'] = 'min:6|required_with:confirm_password|same:confirm_password';
            }
            $validator = Validator::make($request->all(), $roles);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $detail = User::findOrFail($id);
            $data = [
                'first_name' => request('first_name'),
                'last_name' => request('last_name'),
                'username' => request('username'),
                'email' => request('email'),
                'phone' => request('phone'),
                'address' => request('address'),
            ];
            if($request->has('password') && request('password') != null) {
                $data['password'] = Hash::make(request('password'));
            }
            if($request->hasFile('image')) {
                $destinationPath = 'users';
                $originalFile = $destinationPath . '/' . $detail->id . '/original.jpg';
                $width = 200;
                $height = 200;
                $thumbnail = $destinationPath . '/' . $detail->id . '/' . $width . 'x' . $height . '.jpg';
                $imageFile = request('image');
                $disk = Storage::disk('public');
                if (! $disk->exists($destinationPath)) {
                    $disk->makeDirectory($destinationPath, 0755, true);
                }
                $disk->put($originalFile , fopen($imageFile, 'r+'), 'public');
                $img = Image::make(fopen($imageFile, 'r+'));
                $img->fit($width, $height)->save($disk->path($thumbnail));

                $image = 'storage/' . $thumbnail;
                $data['image'] = $image . '?' . time();
            }
            if(!$detail->update($data)) {
                Alert::error('Error', 'Terjadi kesalahan saat menyimpan data, silahkan coba lagi!');
                return redirect()->back();
            }
            if($request->has('role_id'))
            {
                $detail->syncRoles(request('role_id'));
            }
            Alert::success('Sukses', 'Data telah tersimpan!');
            return redirect(route($this->route_index));
        } catch (\Exception $e) {
            Alert::error('Error', $e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * delete data from database
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request) {
        if(User::destroy(request('id'))) {
            foreach (request('id') as $item) {
                Storage::deleteDirectory('public/users/' .$item);
            }
            Alert::success('Success', 'Data telah terhapus data!');
        } else {
            Alert::error('Error', 'Maaf terjadi kesalahan saat menghapus data!');
        }
        return redirect()->back();
    }
}
