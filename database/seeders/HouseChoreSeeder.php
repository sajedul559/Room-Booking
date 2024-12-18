<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class HouseChoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('house_chores')->insert([
            [
                'vendor_id' => 1, // Assuming vendor with ID 1 exists
                'property_id' => 1, // Assuming property with ID 1 exists
                'date' => now(),
                'expected_date_to_complete' => now()->addDays(3),
                'name' => 'Clean the Living Room',
                'description' => 'Thorough cleaning of the living room including dusting and vacuuming.',
                'task_type' => 'cleaning',
                'comments' => 'Ensure the carpets are thoroughly cleaned.',
                'cleaner_booked' => true,
                'status' => 'pending',
                'created_by' => 1, // Assuming user with ID 1 created this task
                'last_updated_by' => 1, // Assuming user with ID 1 updated this task
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 2, // Assuming vendor with ID 2 exists
                'property_id' => 2, // Assuming property with ID 2 exists
                'date' => now(),
                'expected_date_to_complete' => now()->addDays(5),
                'name' => 'Repair the Kitchen Sink',
                'description' => 'Fix the leak in the kitchen sink.',
                'task_type' => 'repair',
                'comments' => 'Parts required: faucet replacement.',
                'cleaner_booked' => false,
                'status' => 'in-progress',
                'created_by' => 2, // Assuming user with ID 2 created this task
                'last_updated_by' => 3, // Assuming user with ID 3 updated this task
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'vendor_id' => 3, // Assuming vendor with ID 3 exists
                'property_id' => 3, // Assuming property with ID 3 exists
                'date' => now(),
                'expected_date_to_complete' => now()->addDays(7),
                'name' => 'Gardening Maintenance',
                'description' => 'Trim the hedges and mow the lawn.',
                'task_type' => 'maintenance',
                'comments' => 'Use eco-friendly tools for the job.',
                'cleaner_booked' => false,
                'status' => 'completed',
                'created_by' => 3, // Assuming user with ID 3 created this task
                'last_updated_by' => 3, // Assuming user with ID 3 updated this task
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}