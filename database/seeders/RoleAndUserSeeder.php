<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\User;

class RoleAndUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** create roles */
        $developer = Role::create(['name' => 'developer', 'delete_able' => false]);
        $admin = Role::create(['name' => 'admin', 'delete_able' => false]);

        /** create users */
        $userDeveloper = User::create([
            'first_name' => 'Developer',
            'last_name' => 'DukungCalonmu',
            'email' => 'dev@dukungcalonmu.com',
            'username'=> 'developer',
            'password' => Hash::make('2019GantiAtauTetap?')
        ]);
        $userDeveloper->syncRoles([$developer]);

        $userAdmin = User::create([
            'first_name' => 'Tim',
            'last_name' => 'Pemilihan',
            'email' => 'timpemilihan@dukungcalonmu.com',
            'username'=> 'timpemilihan',
            'password' => Hash::make('timpemilihandukungcalonmu')
        ]);
        $userAdmin->syncRoles([$admin]);
    }
}
