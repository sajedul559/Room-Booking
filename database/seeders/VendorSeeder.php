<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vendors')->insert([
            [
                'user_id' => 1, // Assuming user with ID 1 exists
                'address' => '123 Main Street',
                'city' => 'New York',
                'state' => 'NY',
                'country' => 'USA',
                'postcode' => '10001',
                'phone' => '1234567890',
                'email' => 'vendorone@example.com',
                'status' => 'approved',
                'approved_by' => 1, // Assuming user with ID 1 approved
                'last_approved_by' => 2, // Assuming user with ID 2 last approved
                'approved_date' => now(),
                'last_update_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Assuming user with ID 2 exists
                'address' => '456 Broadway Ave',
                'city' => 'Los Angeles',
                'state' => 'CA',
                'country' => 'USA',
                'postcode' => '90001',
                'phone' => '9876543210',
                'email' => 'vendortwo@example.com',
                'status' => 'pending',
                'approved_by' => null,
                'last_approved_by' => null,
                'approved_date' => null,
                'last_update_date' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}