<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Disable foreign key checks

        DB::table('roles')->truncate();        
        $roles = [

            ['id' => 1, 'name' => 'Super Admin', 'slug' => 'super-admin', 'is_system' => 1, 'is_visible'=>0],
            ['id' => 2, 'name' => 'Admin', 'slug'       => 'admin', 'is_system'       => 1, 'is_visible'=>1],
            ['id' => 3, 'name' => 'Manager','slug'     => 'manager', 'is_system'     => 1, 'is_visible'=>1],
            ['id' => 4, 'name' => 'Doctor', 'slug'      => 'doctor', 'is_system'    => 1, 'is_visible'=>1],
            ['id' => 5, 'name' => 'nurse', 'slug'       => 'nurse', 'is_system'    => 1, 'is_visible'=>1],
            ['id' => 6, 'name' => 'Patient', 'slug'     => 'patient', 'is_system'    => 1, 'is_visible'=>0],
          
        ];
        
        DB::table('roles')->insert($roles);
        
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Re-enable foreign key checks
       
    }
}
