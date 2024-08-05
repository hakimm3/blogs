<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'name' => 'author',
                'username' => 'author',
                'password' => bcrypt('author'),
                'role' => 'author',
            ],
        ];

        foreach($user as $key => $value){
            $user = User::create([
                'name' => $value['name'],
                'username' => $value['username'],
                'password' => $value['password'],
            ]);

            $role = Role::where('name', $value['role'])->first();
            $user->assignRole($role);
        }
    }
}
