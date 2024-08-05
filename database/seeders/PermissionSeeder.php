<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data  = [
            ['role' => 'admin',
            'permission' => [
                'create user',
                'read user',
                'update user',
                'delete user',
                'create role',
                'read role',
                'update role',
                'delete role',
                'create permission',
                'read permission',
                'update permission',
                'delete permission',
                'create post',
                'read post',
                'update post',
                'delete post',
            ]],
            [
                'role' => 'author',
                'permission' => [
                    'create post',
                    'read post',
                    'update post',
                    'delete post',
                ]
            ]
            ];

        foreach ($data as $key => $value) {
            $role = Role::create(['name' => $value['role']]);
            $permissions = [];
            foreach ($value['permission'] as $permission) {
                $item = Permission::updateOrCreate([
                    'name' => $permission,
                    'guard_name' => 'web',
                ]);

                $permissions[] = $item->id;
            }
            $role->syncPermissions($permissions);
        }
    }
}
