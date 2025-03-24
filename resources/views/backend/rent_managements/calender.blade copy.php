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
                    </div>
                </div>
                <div class="card-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var today = new Date();
    var currentMonth = today.getMonth() + 1; // Convert from 0-based to 1-based
    var currentYear = today.getFullYear();
    console.log("current month:", currentMonth);

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: today, // Ensure it starts with today's date
        events: function(fetchInfo, successCallback, failureCallback) {
            let selectedMonth = fetchInfo.start.getUTCMonth(); // Use getUTCMonth() + 1
            let selectedYear = fetchInfo.start.getUTCFullYear();

            console.log("Fetching events for month:", currentMonth, "Year:", selectedYear);

            fetch("{{ route('rent_calendar.events') }}?month=" + currentMonth + "&year=" + currentYear)
                .then(response => response.json())
                .then(data => successCallback(data))
                .catch(error => failureCallback(error));
        },
        datesSet: function(fetchInfo) {
            currentMonth = fetchInfo.start.getUTCMonth() + 1; // Ensure correct conversion
            currentYear = fetchInfo.start.getUTCFullYear();
        },
        eventClick: function(info) {
            alert('Rent: ' + info.event.title + '\nAmount: $' + info.event.extendedProps.amount);
        }
    });

    calendar.render();
});


</script>
@endpush
