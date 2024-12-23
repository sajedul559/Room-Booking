<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TodoSeeder extends Seeder
{
    public function run()
    {
        $todos = [
            [
                'vendor_id' => 1,
                'name' => 'Visit Property A',
                'description' => 'Visit the property for inspection and evaluation.',
                'status' => 'Pending', // Possible values: Pending, Done, Due
                'assigned_to' => 2, // User ID
                'created_by' => 1, // Admin ID
                'updated_by' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'vendor_id' => 2,
                'name' => 'Finalize Cleaning Contract',
                'description' => 'Meet with the vendor to finalize the cleaning contract.',
                'status' => 'Done',
                'assigned_to' => 3,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'vendor_id' => 1,
                'name' => 'Follow up on Electricity Bill Payment',
                'description' => 'Check if the electricity bill has been paid.',
                'status' => 'Due',
                'assigned_to' => 4,
                'created_by' => 2,
                'updated_by' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data into the todos table
        DB::table('todos')->insert($todos);
    }
}
