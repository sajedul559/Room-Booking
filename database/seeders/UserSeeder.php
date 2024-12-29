<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{

    public function run(): void
    {
        $users = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'phone' => '017765211123',
                'type'  => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Property User',
                'email' => 'property@gmail.com',
                'phone' => '017765211123',
                'type'  => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'phone' => '017765211123',
                'type'  => 'admin',
                'password' => Hash::make('12345678'),
            ],
            
            [
                'name' => 'House Chore User',
                'email' => 'housechore@gmail.com',
                'phone' => '017765211123',
                'type'  => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Todo User',
                'email' => 'todo@gmail.com',
                'phone' => '017765211123',
                'type'  => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Expense User',
                'email' => 'expense@gmail.com',
                'phone' => '017765211123',
                'type'  => 'admin',
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => 'Vendor User',
                'email' => 'vendor@gmail.com',
                'phone' => '017765211123',
                'type'  => 'vendor',
                'password' => Hash::make('12345678'),
            ],
        ];
    
        // Loop through each user and create them
        foreach ($users as $user) {
            User::create($user);
        }
  
    }
}
