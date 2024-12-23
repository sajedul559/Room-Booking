<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ExpenseSeeder extends Seeder
{
    public function run()
    {
        $expenses = [
            [
                'vendor_id' => 1,
                'date' => Carbon::now()->subDays(10)->toDateString(),
                'property_id' => 1, // Null if no property associated
                'expense_type' => 'Cleaning Cost',
                'amount' => 2500,
                'is_credit' => 0, // 0 for Debit, 1 for Credit
                'created_by' => 1,
                'last_updated_by' => 1,
                'created_at' => Carbon::now()->subDays(10),
                'updated_at' => Carbon::now()->subDays(10),
            ],
            [
                'vendor_id' => 2,
                'date' => Carbon::now()->subDays(5)->toDateString(),
                'property_id' => 2,
                'expense_type' => 'Electricity Bill',
                'amount' => 5000,
                'is_credit' => 1, // Credit
                'created_by' => 2,
                'last_updated_by' => 2,
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(5),
            ],
            [
                'vendor_id' => 1,
                'date' => Carbon::now()->toDateString(),
                'property_id' => null, // No property associated
                'expense_type' => 'Water Bill',
                'amount' => 1200,
                'is_credit' => 0, // Debit
                'created_by' => 3,
                'last_updated_by' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        // Insert data into the expenses table
        DB::table('expenses')->insert($expenses);
    }
}
