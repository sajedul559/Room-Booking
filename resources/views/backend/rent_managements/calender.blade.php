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
                        <select id="monthSelect" class="form-control w-auto">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}" {{ date('m') == $i ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $i, 1)) }}
                                </option>
                            @endfor
                        </select>
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
<style>
    .fc-toolbar-chunk{
       display: none;
}
</style>
    
@endpush
@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var monthSelect = document.getElementById('monthSelect');

    var today = new Date();
    var currentMonth = today.getMonth() + 1; // Convert 0-based to 1-based
    var currentYear = today.getFullYear();

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: today,
        events: function(fetchInfo, successCallback, failureCallback) {
            let selectedMonth = monthSelect.value; 
            let selectedYear = fetchInfo.start.getUTCFullYear();

            console.log("Fetching events for Month:", selectedMonth, "Year:", currentYear);

            fetch("{{ route('rent_calendar.events') }}?month=" + selectedMonth + "&year=" + currentYear)
                .then(response => response.json())
                .then(data => successCallback(data))
                .catch(error => failureCallback(error));
        },
        datesSet: function(fetchInfo) {
            currentYear = today.getFullYear();
        },
        eventClick: function(info) {
            alert('Rent: ' + info.event.title + '\nAmount: $' + info.event.extendedProps.amount);
        }
    });

    calendar.render();

    // Handle dropdown change
    monthSelect.addEventListener('change', function() {
        let selectedMonth = this.value;
        let newDate = new Date(currentYear, selectedMonth - 1, 1);
        calendar.gotoDate(newDate); // Move calendar to selected month
        calendar.refetchEvents(); // Fetch new events after changing month
    });
});
</script>
@endpush
