<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $role = Role::create(['name' => 'user']);
        $permission = Permission::create(['name' => 'read post']);
        $role->givePermissionTo($permission);
        $role = Role::create(['name' => 'admin']);
        $permission = Permission::create(['name' => 'crud post']);
        // $permission1 = Permission::create(['name' => 'delete post']);
        // $permission2 = Permission::create(['name' => 'create post']);
        $role->givePermissionTo($permission);
        // $role->givePermissionTo($permission1);
        // $role->givePermissionTo($permission2);

        $user = User::find(1);
        $user->assignRole('admin');
        $user = User::find(2);
        $user->assignRole('user');

        // //
        // $role = Role::create(['name' => 'user']);
        // $role2 = Role::create(['name' => 'admin']);
        // // $permission1 = Permission::create(['name' => 'create post']);
        // // $permission2 = Permission::create(['name' => 'read post']);
        // // $permission3 = Permission::create(['name' => 'edit post']);
        // // $permission4 = Permission::create(['name' => 'delete post']);
        // $permissions = Permission::all();

        // $role->givePermissionTo($permissions);
        // // $role2->givePermissionTo($permission2);


    }
}
