@extends('layouts.layouts')
@section('title', 'Properties')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
            <div class="card" id="orderList">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="header-title mb-0">Rent Remainder Calendar</h4>
                        <div class="d-flex gap-2">
                            <select id="yearSelect" class="form-control w-auto me-2">
                                @for ($y = date('Y') - 5; $y <= date('Y') + 5; $y++)
                                    <option value="{{ $y }}" {{ date('Y') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                
                            <select id="monthSelect" class="form-control w-auto">
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ date('m') == $i ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css" />

<style>
    .fc-toolbar-chunk{
       display: none;
}
</style>
    
@endpush
@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src="https://unpkg.com/@popperjs/core@2"></script>
<script src="https://unpkg.com/tippy.js@6"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var monthSelect = document.getElementById('monthSelect');
        var yearSelect = document.getElementById('yearSelect');

        var today = new Date();

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            initialDate: today,
            events: function (fetchInfo, successCallback, failureCallback) {
                let selectedMonth = monthSelect.value;
                let selectedYear = yearSelect.value;

                console.log("Fetching events for Month:", selectedMonth, "Year:", selectedYear);

                fetch("{{ route('rent_calendar.events') }}?month=" + selectedMonth + "&year=" + selectedYear)
                    .then(response => response.json())
                    .then(data => successCallback(data))
                    .catch(error => failureCallback(error));
            },
            eventClick: function (info) {
                alert('Rent: ' + info.event.title + '\nAmount: $' + info.event.extendedProps.amount);
            },
            eventDidMount: function (info) {
                // Initialize Tippy.js tooltip with the extra hover info
                if (info.event.extendedProps.tooltip) {
                    tippy(info.el, {
                        content: info.event.extendedProps.tooltip,
                        placement: 'top',
                        arrow: true,
                        animation: 'scale',
                        theme: 'light-border',
                    });
                }
            }
        });

        calendar.render();

        function updateCalendarDate() {
            let selectedMonth = parseInt(monthSelect.value) - 1; // JavaScript month index is 0-based
            let selectedYear = parseInt(yearSelect.value);
            let newDate = new Date(selectedYear, selectedMonth, 1);
            calendar.gotoDate(newDate);
            calendar.refetchEvents();
        }

        monthSelect.addEventListener('change', updateCalendarDate);
        yearSelect.addEventListener('change', updateCalendarDate);
    });
</script>

@endpush
