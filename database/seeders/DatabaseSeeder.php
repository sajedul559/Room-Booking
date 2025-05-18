<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        $this->call([
            // RoleSeeder::class, // Seed roles first
            // UserSeeder::class, // Then seed users
            // SystemSettingSeeder::class,
            RolesAndPermissionsSeeder::class,
            // PropertySeeder::class,
            // VendorSeeder::class,
            // HouseChoreSeeder::class,
            // TodoSeeder::class,
            // ExpenseSeeder::class,
        ]);
    }
}
