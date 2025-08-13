@extends('layouts.layouts')
@section('title', 'Rent Calender')
@section('content')
    <x-common.bread-crum />
    <div class="row">
       <div class="col-12">
            @if($unpaidRents->count() > 0)
                <div class="py-3">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-danger text-white d-flex justify-content-between align-items-center">
                            <a class="text-white text-decoration-none d-flex align-items-center w-100"
                            data-bs-toggle="collapse" 
                            href="#unpaidRentsCollapse" 
                            role="button" 
                            aria-expanded="false" 
                            aria-controls="unpaidRentsCollapse">
                                <span>Click Here to View Unpaid Rents</span>
                                <i class="fas fa-chevron-down ms-auto" id="unpaidRentsIcon"></i>
                            </a>
                        </div>

                        <div class="collapse" id="unpaidRentsCollapse">
                            <ul class="list-group list-group-flush" id="unpaidRentsList">
                                @foreach($unpaidRents->take(10) as $rent)
                                    <li class="list-group-item d-flex justify-content-between align-items-start flex-column flex-md-row">
                                        <div>
                                            <strong>{{ $rent->user->name ?? 'Unknown Tenant' }}</strong><br>
                                            <small>
                                                Status: <span class="text-warning">{{ ucfirst($rent->status) }}</span> |
                                                Month: {{ \Carbon\Carbon::parse($rent->created_at)->format('l, d F Y') }}
                                            </small>
                                        </div>
                                        <div class="text-end">
                                            <div><strong>Total:</strong> {{ number_format($rent->amount, 2) }}$</div>
                                            <div><strong>Paid:</strong> {{ number_format($rent->paid_amount ?? 0, 2) }}$</div>
                                            <div><strong>Due:</strong> 
                                                <span class="text-danger">
                                                    {{ number_format($rent->amount - ($rent->paid_amount ?? 0), 2) }}$
                                                </span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            @if($unpaidRents->count() > 5)
                                <div class="text-center p-3">
                                    <button id="loadMoreBtn" class="btn btn-outline-danger btn-sm">Load More</button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>
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
.fc-list-event-time{
    display: none;
}
.fc-list-event-graphic{
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
            initialView: 'listMonth',
            initialDate: today,
            eventDisplay: 'block',
            dayMaxEventRows: false,
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
                // Apply background color to .fc-list-event-title

                 // Apply color to the full row (works in list views)
                

                  const dayCell = info.el.closest('.fc-list-event');
                const eventsContainer = dayCell?.querySelector('.fc-list-event-title');

                if (eventsContainer && !eventsContainer.dataset.bgSet) {
                    eventsContainer.style.backgroundColor = info.event.backgroundColor || info.event.color;
                    eventsContainer.style.color = '#fff'; // Text color white
                    eventsContainer.style.borderRadius = '6px';
                    eventsContainer.style.padding = '4px 8px'; // Adjust padding if needed
                    eventsContainer.style.margin = '5px 100px';
                    eventsContainer.style.display = 'inline-block'; // ✅ Only cover text width
                    eventsContainer.dataset.bgSet = true;
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
<script>
    $(document).ready(function () {
        const allRents = @json($unpaidRents);
        const $listContainer = $('#unpaidRentsList');
        const $loadMoreBtn = $('#loadMoreBtn');
        const $icon = $('#unpaidRentsIcon');

        let visibleCount = 10;

        // Icon rotation
        $('#unpaidRentsCollapse').on('show.bs.collapse', function () {
            $icon.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        });
        $('#unpaidRentsCollapse').on('hide.bs.collapse', function () {
            $icon.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        });

        // Load more functionality
        $loadMoreBtn.on('click', function () {
            visibleCount += 10;
            let html = '';

            $.each(allRents.slice(0, visibleCount), function (index, rent) {
                html += `
                    <li class="list-group-item d-flex justify-content-between align-items-start flex-column flex-md-row">
                        <div>
                            <strong>${rent.user?.name ?? 'Unknown Tenant'}</strong><br>
                            <small>
                                Status: <span class="text-warning">${rent.status.charAt(0).toUpperCase() + rent.status.slice(1)}</span> |
                                Month: ${new Date(rent.created_at).toLocaleDateString('en-US', { weekday: 'long', day: '2-digit', month: 'long', year: 'numeric' })}
                            </small>
                        </div>
                        <div class="text-end">
                            <div><strong>Total:</strong> ${parseFloat(rent.amount).toFixed(2)}$</div>
                            <div><strong>Paid:</strong> ${parseFloat(rent.paid_amount ?? 0).toFixed(2)}$</div>
                            <div><strong>Due:</strong> 
                                <span class="text-danger">
                                    ${(rent.amount - (rent.paid_amount ?? 0)).toFixed(2)}$
                                </span>
                            </div>
                        </div>
                    </li>
                `;
            });

            $listContainer.html(html);

            if (visibleCount >= allRents.length) {
                $loadMoreBtn.hide();
            }
        });
    });
</script>


@endpush
