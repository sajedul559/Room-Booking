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
        // Apply permission checks globally for these actions
        $this->middleware('can:Create Expense')->only('create', 'store');
        $this->middleware('can:Edit Expense')->only('edit', 'update');
        $this->middleware('can:Delete Expense')->only('destroy');
        $this->middleware('can:Index Properties')->only('index');
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
    public function userExpenseDetails($userId)
    {
        $data = $this->expenseService->getUserExpenseDetails($userId);

        return view('backend.expenses.details', $data);
    }
    public function filter(Request $request)
    {
        $query = Expense::with(['vendor.user', 'property', 'createdBy']);

        if ($request->filled('year')) {
            $query->whereYear('date', $request->year);
        }

        if ($request->filled('month')) {
            $query->whereMonth('date', $request->month);
        }

        $expenses = $query->latest()->get();

        $html = view('backend.expenses.rows', compact('expenses'))->render();

        return response()->json(['html' => $html]);
    }

    public function destroy($id)
    {
        $this->expenseService->deleteExpense($id);
        return redirect()->route('expenses.index')->with('success', 'Todo deleted successfully.');
    }
}