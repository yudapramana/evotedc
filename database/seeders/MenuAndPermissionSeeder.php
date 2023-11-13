<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Model\Menu;

class MenuAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $developer = Role::where('name', 'developer')->first();

        /** menu dashboard */
        $dashboard = Menu::create([
            'name' => [
                'in' => 'Beranda',
                'en' => 'Dashboard',
                'ar' => 'لوحة القيادة',
                'ko' => '계기반'
            ],
            'slug' => 'dashboard',
            'route_name' => 'backend',
            'prefix_permission' => 'backend',
            'menu_type' => 'menu',
            'parent_id' => 0,
        ]);

        /** create divider */
        $dividerUser = Menu::create([
            'name' => [
                'en' => 'Management\'s User',
                'ar' => 'مستخدم الإدارة',
                'in' => 'Manajemen User'
            ],
            'slug' => 'management-user',
            'route_name' => 'management.user',
            'prefix_permission' => 'backend-users',
            'menu_type' => 'divider',
            'parent_id' => 0,
        ]);

        /** create divider */
        $dividerKPU = Menu::create([
            'name' => [
                'en' => 'Management\'s KPU',
                'ar' => 'مستخدم الإدارة',
                'in' => 'Manajemen KPU'
            ],
            'slug' => 'management-kpu',
            'route_name' => 'management.kpu',
            'prefix_permission' => 'backend-kpu',
            'menu_type' => 'divider',
            'parent_id' => 0,
        ]);

        /** menu user */
        $user = Menu::create([
            'name' => [
                'en' => 'Users',
                'ar' => 'المستخدمون',
                'in' => 'Pengguna'
            ],
            'slug' => 'dashboard/users',
            'route_name' => 'users',
            'menu_type' => 'menu',
            'parent_id' => $dividerUser->id,
            'prefix_permission' => 'users',
            'icon' => 'flaticon-users'
        ]);
        /** implement spatie permission */
        $userReadPermission = Permission::create([
            'menu_id' => $user->id,
            'permission_label' => 'read',
            'name' => 'read-' . $user->prefix_permission,
        ]);
        $userCreatePermission = Permission::create([
            'menu_id' => $user->id,
            'permission_label' => 'create',
            'name' => 'create-' . $user->prefix_permission,
        ]);
        $userEditPermission = Permission::create([
            'menu_id' => $user->id,
            'permission_label' => 'edit',
            'name' => 'edit-' . $user->prefix_permission,
        ]);
        $userDeletePermission = Permission::create([
            'menu_id' => $user->id,
            'permission_label' => 'delete',
            'name' => 'delete-' . $user->prefix_permission,
        ]);

        /** menu roles */
        $role = Menu::create([
            'name' => [
                'en' => 'Roles',
                'ar' => 'الأدوار',
                'in' => 'Level'
            ],
            'slug' => 'dashboard/roles',
            'route_name' => 'roles',
            'menu_type' => 'menu',
            'parent_id' => $dividerUser->id,
            'prefix_permission' => 'roles',
            'icon' => 'flaticon-interface-1'
        ]);

        /** implement spatie permission */
        $rolesReadPermission = Permission::create([
            'menu_id' => $role->id,
            'permission_label' => 'read',
            'name' => 'read-' . $role->prefix_permission,
        ]);
        $rolesCreatePermission = Permission::create([
            'menu_id' => $role->id,
            'permission_label' => 'create',
            'name' => 'create-' . $role->prefix_permission,
        ]);
        $rolesEditPermission = Permission::create([
            'menu_id' => $role->id,
            'permission_label' => 'edit',
            'name' => 'edit-' . $role->prefix_permission,
        ]);
        $rolesDeletePermission = Permission::create([
            'menu_id' => $role->id,
            'permission_label' => 'delete',
            'name' => 'delete-' . $role->prefix_permission,
        ]);


        /** menu of menus */
        $menu = Menu::create([
            'name' => [
                'en' => 'Menu',
                'ar' => 'خاصية',
                'in' => 'Menu'
            ],
            'slug' => 'dashboard/menus',
            'route_name' => 'menus',
            'menu_type' => 'menu',
            'parent_id' => $dividerUser->id,
            'prefix_permission' => 'menus',
            'icon' => 'flaticon-list-2'
        ]);
        /** implement spatie permission */
        $menuReadPermission = Permission::create([
            'menu_id' => $menu->id,
            'permission_label' => 'read',
            'name' => 'read-' . $menu->prefix_permission,
        ]);
        $menuCreatePermission = Permission::create([
            'menu_id' => $menu->id,
            'permission_label' => 'create',
            'name' => 'create-' . $menu->prefix_permission,
        ]);
        $menuEditPermission = Permission::create([
            'menu_id' => $menu->id,
            'permission_label' => 'edit',
            'name' => 'edit-' . $menu->prefix_permission,
        ]);
        $menuDeletePermission = Permission::create([
            'menu_id' => $menu->id,
            'permission_label' => 'delete',
            'name' => 'delete-' . $menu->prefix_permission,
        ]);

        /** menu Tim KPU */
        $teams = Menu::create([
            'name' => [
                'en' => 'Team',
                'ar' => 'المستخدمون',
                'in' => 'Tim KPU'
            ],
            'slug' => 'dashboard/teams',
            'route_name' => 'teams',
            'menu_type' => 'menu',
            'parent_id' => $dividerKPU->id,
            'prefix_permission' => 'teams',
            'icon' => 'flaticon-users'
        ]);
        /** implement spatie permission */
        $teamsReadPermission = Permission::create([
            'menu_id' => $teams->id,
            'permission_label' => 'read',
            'name' => 'read-' . $teams->prefix_permission,
        ]);
        $teamsCreatePermission = Permission::create([
            'menu_id' => $teams->id,
            'permission_label' => 'create',
            'name' => 'create-' . $teams->prefix_permission,
        ]);
        $teamsEditPermission = Permission::create([
            'menu_id' => $teams->id,
            'permission_label' => 'edit',
            'name' => 'edit-' . $teams->prefix_permission,
        ]);
        $teamsDeletePermission = Permission::create([
            'menu_id' => $teams->id,
            'permission_label' => 'delete',
            'name' => 'delete-' . $teams->prefix_permission,
        ]);


        /** menu KPU */
        $members = Menu::create([
            'name' => [
                'en' => 'Member',
                'ar' => 'المستخدمون',
                'in' => 'Anggota'
            ],
            'slug' => 'dashboard/members',
            'route_name' => 'members',
            'menu_type' => 'menu',
            'parent_id' => $dividerKPU->id,
            'prefix_permission' => 'members',
            'icon' => 'flaticon-interface-10'
        ]);
        /** implement spatie permission */
        $membersReadPermission = Permission::create([
            'menu_id' => $members->id,
            'permission_label' => 'read',
            'name' => 'read-' . $members->prefix_permission,
        ]);
        $membersCreatePermission = Permission::create([
            'menu_id' => $members->id,
            'permission_label' => 'create',
            'name' => 'create-' . $members->prefix_permission,
        ]);
        $membersEditPermission = Permission::create([
            'menu_id' => $members->id,
            'permission_label' => 'edit',
            'name' => 'edit-' . $members->prefix_permission,
        ]);
        $membersDeletePermission = Permission::create([
            'menu_id' => $members->id,
            'permission_label' => 'delete',
            'name' => 'delete-' . $members->prefix_permission,
        ]);


        /** menu candidate */
        $candidate = Menu::create([
            'name' => [
                'en' => 'Candidate',
                'ar' => 'المستخدمون',
                'in' => 'Kandidat'
            ],
            'slug' => 'dashboard/candidates',
            'route_name' => 'candidates',
            'menu_type' => 'menu',
            'parent_id' => $dividerKPU->id,
            'prefix_permission' => 'candidates',
            'icon' => 'flaticon-profile-1'
        ]);
        /** implement spatie permission */
        $candidateReadPermission = Permission::create([
            'menu_id' => $candidate->id,
            'permission_label' => 'read',
            'name' => 'read-' . $candidate->prefix_permission,
        ]);
        $candidateCreatePermission = Permission::create([
            'menu_id' => $candidate->id,
            'permission_label' => 'create',
            'name' => 'create-' . $candidate->prefix_permission,
        ]);
        $candidateEditPermission = Permission::create([
            'menu_id' => $candidate->id,
            'permission_label' => 'edit',
            'name' => 'edit-' . $candidate->prefix_permission,
        ]);
        $candidateDeletePermission = Permission::create([
            'menu_id' => $candidate->id,
            'permission_label' => 'delete',
            'name' => 'delete-' . $candidate->prefix_permission,
        ]);

        $developer->syncPermissions([
            $userReadPermission,
            $userCreatePermission,
            $userEditPermission,
            $userDeletePermission,

            $rolesCreatePermission,
            $rolesReadPermission,
            $rolesEditPermission,
            $rolesDeletePermission,

            $menuReadPermission,
            $menuCreatePermission,
            $menuEditPermission,
            $menuDeletePermission,

            $membersReadPermission,
            $membersCreatePermission,
            $membersEditPermission,
            $membersDeletePermission,

            $teamsReadPermission,
            $teamsCreatePermission,
            $teamsEditPermission,
            $teamsDeletePermission,

            $candidateReadPermission,
            $candidateCreatePermission,
            $candidateEditPermission,
            $candidateDeletePermission,
        ]);

    }
}
