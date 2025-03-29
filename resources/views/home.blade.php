@extends('layouts.layouts')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">{{ getTimeBasedGreeting() }}, {{ auth()->user()->name }}!</h4>
        </div>
    </div>
</div>

<!-- Filters for Expenses and Income -->
<div class="row mb-3">
  <div class="col-md-6">
      <label for="expenseMonthFilter" class="form-label">Select Month for Expenses:</label>
      <select id="expenseMonthFilter" class="form-control">
          @for ($i = 1; $i <= 12; $i++)
              @php $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
              <option value="{{ $monthValue }}" {{ $monthValue == date('m') ? 'selected' : '' }}>
                  {{ date("F", mktime(0, 0, 0, $i, 1)) }}
              </option>
          @endfor
      </select>
  </div>
  <div class="col-md-6">
      <label for="incomeMonthFilter" class="form-label">Select Month for Income:</label>
      <select id="incomeMonthFilter" class="form-control">
          @for ($i = 1; $i <= 12; $i++)
              @php $monthValue = str_pad($i, 2, '0', STR_PAD_LEFT); @endphp
              <option value="{{ $monthValue }}" {{ $monthValue == date('m') ? 'selected' : '' }}>
                  {{ date("F", mktime(0, 0, 0, $i, 1)) }}
              </option>
          @endfor
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
    .card-body {
        height: 350px;
    }
</style>
@endpush

@section('scripts')
<script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js')}}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctxExpense = document.getElementById('expense-chart').getContext('2d');
    const ctxIncome = document.getElementById('income-chart').getContext('2d');

    let expenseChart = new Chart(ctxExpense, {
        type: 'line',
        data: { labels: [], datasets: [] },
        options: { responsive: true, maintainAspectRatio: false }
    });

    let incomeChart = new Chart(ctxIncome, {
        type: 'bar',
        data: { labels: [], datasets: [] },
        options: { responsive: true, maintainAspectRatio: false }
    });

    function fetchChartData(type, month) {
        $.ajax({
            url: "{{ route('fetch.chart.data') }}",
            type: "GET",
            data: { type: type, month: month },
            success: function(response) {
                if (type === "expense") {
                    expenseChart.data.labels = response.labels;
                    expenseChart.data.datasets = [{
                        label: 'Expenses',
                        data: response.data,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: true
                    }];
                    expenseChart.update();
                } else {
                    incomeChart.data.labels = response.labels;
                    incomeChart.data.datasets = [{
                        label: 'Income',
                        data: response.data,
                        backgroundColor: 'rgba(54, 162, 235, 0.8)', // Matching color from the image

                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        fill: true
                    }];
                    incomeChart.update();
                }
            }
        });
    }

    $('#expenseMonthFilter').change(function() {
        fetchChartData("expense", $(this).val());
    });

    $('#incomeMonthFilter').change(function() {
        fetchChartData("income", $(this).val());
    });

    // Load initial data
    fetchChartData("expense", new Date().getMonth() + 1);
    fetchChartData("income", new Date().getMonth() + 1);
});
</script>
@endsection
