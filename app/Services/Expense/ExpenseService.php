<?php

namespace App\Services\Expense;

use App\Models\Expense;

class ExpenseService
{
    public function getAllExpenses()
    {
        return Expense::all();
    }

    public function createExpense(array $data)
    {
        $data['created_by'] = auth()->id();
        $data['last_updated_by'] = auth()->id();
        return Expense::create($data);
    }

    public function getExpenseById($id)
    {
        return Expense::findOrFail($id);
    }

    public function updateExpense($id, array $data)
    {
        $expense = Expense::findOrFail($id);
        $data['is_credit'] = isset($data['is_credit']) ? 1 : 0;

        $data['updated_by'] = auth()->id();
        $data['last_updated_by'] = auth()->id();
        $expense->update($data);
        return $expense;
    }

    public function deleteExpense($id)
    {
        $expense = Expense::findOrFail($id);
        $expense->delete();
    }
}