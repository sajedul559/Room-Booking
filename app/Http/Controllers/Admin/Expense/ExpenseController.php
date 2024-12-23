<?php

namespace App\Http\Controllers\Admin\Expense;

use App\Models\Expense;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Services\Vendor\VendorService;
use App\Services\Expense\ExpenseService;
use App\Http\Requests\ExpenseFormRequest;
use App\Services\Property\PropertyService;

class ExpenseController extends Controller
{
    protected $expenseService;
    protected $vendorService;
    protected $propertyService;


    public function __construct(ExpenseService $expenseService, VendorService $vendorService, PropertyService $propertyService)
    {
        $this->expenseService = $expenseService;
        $this->vendorService = $vendorService;
        $this->propertyService = $propertyService;


    }


    public function index()
    {
        $expenses = $this->expenseService->getAllExpenses();
        return view('backend.expenses.list', compact('expenses'));
    }

    public function create()
    {
        $vendors = $this->vendorService->getAllVendors();
        $properties = $this->propertyService->getAllProperties();
        return view('backend.expenses.create',compact('vendors','properties'));
    }

    public function store(ExpenseFormRequest $request)
    {
        $this->expenseService->createExpense($request->payloadsData());
        return redirect()->route('expenses.index')->with('success', 'TODO created successfully.');
    }

    public function edit($id)
    {
        $expense = $this->expenseService->getExpenseById($id);
        $vendors = $this->vendorService->getAllVendors();
        $properties = $this->propertyService->getAllProperties();


        return view('backend.expenses.edit', compact('expense','vendors','properties'));
    }

    public function update(ExpenseFormRequest $request, $id)
    {
        $this->expenseService->updateExpense($id, $request->payloadsData());
        return redirect()->route('expenses.index')->with('success', 'TODO updated successfully.');
    }

    public function destroy($id)
    {
        $this->expenseService->deleteExpense($id);
        return redirect()->route('expenses.index')->with('success', 'TODO deleted successfully.');
    }
}