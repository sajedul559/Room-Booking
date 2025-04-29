@extends('layouts.layouts')

@section('content')
<div class="container">
    <h2 class="mb-4">Expense Details for {{ $user->name }}</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm">
                <h4>Total Earn</h4>
                <p class="text-success fw-bold">{{ number_format($totalCredit, 2) }} $</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm">
                <h4>Total Spend</h4>
                <p class="text-danger fw-bold">{{ number_format($totalDebit, 2) }} $</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-light p-3 shadow-sm">
                <h4>Profit</h4>
                <p class="fw-bold">{{ number_format($profit, 2) }} $</p>
            </div>
        </div>
    </div>

    <h4 class="mb-3">Expense Records</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Property</th>
                <th>User</th>
                <th>Date</th>
                <th>Type</th>
                <th>Credit?</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($expenses as $expense)
                <tr>
                    <td>{{ $expense->id }}</td>
                    <td>{{ $expense->property?->property_name ?? 'N/A' }}</td>
                    <td>{{ $expense->createdBy?->name ?? 'N/A' }}</td>
                    <td>{{ $expense->date }}</td>
                    <td>{{ $expense->expense_type }}</td>
                    <td>{{ $expense->is_credit ? 'Yes' : 'No' }}</td>
                    <td>{{ number_format($expense->amount, 2) }} $</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-danger">No expenses found.</td>
                </tr>
            @endforelse
        
        </tbody>
    </table>
</div>
@endsection
