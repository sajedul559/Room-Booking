@extends('layouts.layouts')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">{{ getTimeBasedGreeting() }}, {{ auth()->user()->name }}!</h4>
        </div>
    </div>
</div>
<div class="row">
  
  
    {{-- <div class="col-md-6 col-xl-3">
      <div class="card" id="tooltip-container1">
        <div class="card-body">
          <i
            class="fa fa-info-circle text-muted float-end"
            data-bs-container="#tooltip-container1"
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            title="More Info"
          ></i>
          <h4 class="mt-0 font-16">Total Users</h4>
          <h2 class="text-primary my-3 text-center">
            <span data-plugin="counterup">{{ $users->count() }}</span>
          </h2>
          
        </div>
      </div>
    </div> --}}
    <div class="col-md-6 col-xl-3">
      <div class="card" id="tooltip-container1">
        <div class="card-body">
          <i
            class="fa fa-info-circle text-muted float-end"
            data-bs-container="#tooltip-container1"
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            title="More Info"
          ></i>
          <h4 class="mt-0 font-16">Total Properties</h4>
          <h2 class="text-primary my-3 text-center">
            <span data-plugin="counterup">{{ $properties->count() }}</span>
          </h2>
          
        </div>
      </div>
    </div>
   <div class="col-md-6 col-xl-3">
      <div class="card" id="tooltip-container3">
        <div class="card-body">
          <i
            class="fa fa-info-circle text-muted float-end"
            data-bs-container="#tooltip-container3"
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            title="More Info"
          ></i>
          <h4 class="mt-0 font-16">Total Rooms</h4>
          <h2 class="text-primary my-3 text-center">
            <span data-plugin="counterup">{{ $totalRooms }}</span>
          </h2>
          
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xl-3">
      <div class="card" id="tooltip-container2">
        <div class="card-body">
          <i
            class="fa fa-info-circle text-muted float-end"
            data-bs-container="#tooltip-container2"
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            title="More Info"
          ></i>
          <h4 class="mt-0 font-16">Total Expense </h4>
          <h2 class="text-primary my-3 text-center">
           $<span data-plugin="counterup">{{ $totalExpense }}</span>
          </h2>
          
        </div>
      </div>
    </div>
     <div class="col-md-6 col-xl-3">
      <div class="card" id="tooltip-container2">
        <div class="card-body">
          <i
            class="fa fa-info-circle text-muted float-end"
            data-bs-container="#tooltip-container2"
            data-bs-toggle="tooltip"
            data-bs-placement="bottom"
            title="More Info"
          ></i>
          <h4 class="mt-0 font-16">Total Income </h4>
          <h2 class="text-primary my-3 text-center">
           $<span data-plugin="counterup">{{ $totalIncome }}</span>
          </h2>
          
        </div>
      </div>
    </div>
  
   
  </div>
<!-- Filters for Expenses and Income -->
<!-- Expense Filters -->
<div class="row mb-3">
    <div class="col-md-2">
        <label for="expenseYearFilter" class="form-label">Year (Expense):</label>
        <select id="expenseYearFilter" class="form-control">
            @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                <option value="{{ $y }}" {{ $y == date('Y') ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
        </select>
    </div>
    <div class="col-md-2">
        <label for="expenseMonthFilter" class="form-label">Month (Expense):</label>
        <select id="expenseMonthFilter" class="form-control">
            @for ($i = 1; $i <= 12; $i++)
                @php $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                <option value="{{ $monthValue }}" {{ $monthValue == date('m') ? 'selected' : '' }}>
                    {{ date("F", mktime(0, 0, 0, $i, 1)) }}
                </option>
            @endfor
        </select>
    </div>
    <div class="col-md-2">
        <label for="expensePropertyFilter" class="form-label">Property (Expense):</label>
        <select id="expensePropertyFilter" class="form-control">
            <option value="">All Properties</option>
            @foreach ($properties as $property)
                <option value="{{ $property->id }}">{{ $property->property_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <label for="incomeYearFilter" class="form-label">Year (Income):</label>
        <select id="incomeYearFilter" class="form-control">
            @for ($y = date('Y'); $y >= date('Y') - 5; $y--)
                <option value="{{ $y }}" {{ $y == date('Y') ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
        </select>
    </div>
    <div class="col-md-2">
        <label for="incomeMonthFilter" class="form-label">Month (Income):</label>
        <select id="incomeMonthFilter" class="form-control">
            @for ($i = 1; $i <= 12; $i++)
                @php $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
                <option value="{{ $monthValue }}" {{ $monthValue == date('m') ? 'selected' : '' }}>
                    {{ date("F", mktime(0, 0, 0, $i, 1)) }}
                </option>
            @endfor
        </select>
    </div>
    <div class="col-md-2">
        <label for="incomePropertyFilter" class="form-label">Property (Income):</label>
        <select id="incomePropertyFilter" class="form-control">
            <option value="">All Properties</option>
            @foreach ($properties as $property)
                <option value="{{ $property->id }}">{{ $property->property_name }}</option>
            @endforeach
        </select>
    </div>
</div>


<!-- Expense and Income Charts -->
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Monthly Expenses</h4>
                <canvas id="expense-chart" height="300"></canvas>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">Daily Income (Month-wise)</h4>
                <canvas id="income-chart" height="300"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('style')
<style>
    #expense-chart, #income-chart {
        max-height: 300px !important;
        width: 100% !important;
    }
  
</style>
@endpush

@section('scripts')
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctxExpense = document.getElementById('expense-chart').getContext('2d');
    const ctxIncome = document.getElementById('income-chart').getContext('2d');

    let expenseChart = new Chart(ctxExpense, { type: 'line', data: { labels: [], datasets: [] } });
    let incomeChart = new Chart(ctxIncome, { type: 'line', data: { labels: [], datasets: [] } });

    function fetchChartData(type) {
        let year, month, property;

        if (type === "expense") {
            year = $('#expenseYearFilter').val();
            month = $('#expenseMonthFilter').val();
            property = $('#expensePropertyFilter').val();
        } else {
            year = $('#incomeYearFilter').val();
            month = $('#incomeMonthFilter').val();
            property = $('#incomePropertyFilter').val();
        }

        $.ajax({
            url: "{{ route('fetch.chart.data') }}",
            type: "GET",
            data: { type: type, year: year, month: month, property_id: property },
            success: function(response) {
                let chart = (type === "expense") ? expenseChart : incomeChart;
                chart.data.labels = response.labels;
                chart.data.datasets = [{
                    label: type === "expense" ? 'Expenses' : 'Income',
                    data: response.data,
                    backgroundColor: type === "expense"
                        ? 'rgba(255, 99, 132, 0.2)'
                        : 'rgba(54, 162, 235, 0.8)',
                    borderColor: type === "expense"
                        ? 'rgba(255, 99, 132, 1)'
                        : 'rgba(54, 162, 235, 1)',
                    borderWidth: 2,
                    fill: true
                }];
                chart.update();
            }
        });
    }
    // Event Listeners for filters
    $('#expenseYearFilter, #expenseMonthFilter, #expensePropertyFilter').change(function() {
        fetchChartData("expense");
    });
    $('#incomeYearFilter, #incomeMonthFilter, #incomePropertyFilter').change(function() {
        fetchChartData("income");
    });

    // Initial load
    fetchChartData("expense");
    fetchChartData("income");
});

</script>
@endsection
