<?php $page = 'rental-order-step1'; ?>
@extends('layout.mainlayout')
@section('content')
    @component('components.breadcrumb')
        @slot('title')
            Rental Booking
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Rental Booking
        @endslot
    @endcomponent

    <!-- Detail View Section -->
    <section class="content inner-content bg-white">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="success-div">
                        <span><i class="bx bx-check-circle me-1"></i> {{ $room->name }} is available for
                            rental</span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="details-div">
                        <div class="details-div-content">
                            {{-- <h5>Details</h5>
                            <p>Modern Apartment in the city centre</p> --}}
                            <h5>Location </h5>
                            <p class="mb-0">{{ $room->property?->location }}</p>
                        </div>
                        <div class="details-div-price">
                            <h5>Booking Amount</h5>
                            <h6>${{ $room->weekly_rent }} <span>/ Weekly</span></h6>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-12">
                    <div class="booking-details">
                        <h4> Booking Details</h4>
                        <ul>
                            <li>
                                <h5>Arrival Time</h5>
                                <p>{{ $booking->start_date }}</p>
                            </li>
                            <li>
                                <h5>Departure Time</h5>
                                <p>{{ $booking->end_date }}</p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                {{-- <div class="col-lg-12">
                    <div class="booking-details">
                        <h4>Booking Details</h4>
                        <ul>
                            <li>
                                <h5>Arrival Time</h5>
                                <p>318-330 S Oakley Blvd, Chicago, IL 60612, USA</p>
                            </li>
                            <li>
                                <h5>Departure Time</h5>
                                <p>318-330 S Oakley Blvd, Chicago, IL 60612, USA</p>
                            </li>
                        </ul>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <div class="booking-details mb-0">
                        <h4>Fill out this quick form</h4>
                        <div class="row">
                            <form action="{{ route('booking.information.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="room_id" value="{{ $room->id }}">
                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                            
                                <label>Name<span class="manitory">*</span></label>
                                <input type="text" class="form-control" name="name" value="{{ $user->name ?? '' }}" placeholder="Enter Name" required>
                            
                                <label>Phone Number <span class="manitory">*</span></label>
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone ?? '' }}" placeholder="Enter Phone Number" required>
                            
                                <label>Email Address</label>
                                <input type="text" class="form-control" name="email" value="{{ $user->email ?? '' }}" placeholder="Enter Email">
                            
                                <label>Full Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address">
                            
                                <label>Special Requests / Questions / Comments</label>
                                <textarea rows="5" class="form-control" name="comments" placeholder="Enter Comments"></textarea>
                                

                                <label class="pt-5">Upload Identity Images (Minimum 50 Points)</label>
                                @if ($errors->has('identity_documents'))
                                    <div class="text-danger mb-2">
                                        {{ $errors->first('identity_documents') }}
                                    </div>
                                @endif
                                <div id="image-upload-repeater">
                                    <div class="image-upload-item mb-3 border p-3 rounded">
                                        <label>Document Type</label>
                                        <select name="identity_documents[0][type]" class="form-control document-type" required>
                                            <option value="">-- Select --</option>
                                            <option value="passport" data-points="70">Passport (70 pts)</option>
                                            <option value="birth_certificate" data-points="70">Birth Certificate (70 pts)</option>
                                            <option value="citizenship_certificate" data-points="70">Citizenship Certificate (70 pts)</option>
                                            <option value="drivers_license" data-points="40">Driver’s Licence (40 pts)</option>
                                            <option value="photo_id_card" data-points="40">Photo ID Card (40 pts)</option>
                                            <option value="student_id" data-points="40">Student ID Card (40 pts)</option>
                                            <option value="medicare" data-points="25">Medicare Card (25 pts)</option>
                                            <option value="bank_card" data-points="25">Bank/Credit Card (25 pts)</option>
                                            <option value="utility_bill" data-points="25">Utility Bill / Rental / Bank Statement (25 pts)</option>
                                        </select>

                                        <label class="mt-2">Upload Image</label>
                                        <input type="file" name="identity_documents[0][file]" accept="image/*" class="form-control" required>

                                        <button type="button" class="btn btn-danger btn-sm mt-2 remove-upload-btn" style="display:none;">Remove</button>
                                    </div>
                                </div>

                                <button type="button" id="add-upload-btn" class="btn btn-outline-primary btn-sm mb-3">
                                    <span class="plus-icon">+</span> Add Another Document
                                </button>

                                <div><strong>Total Points:</strong> <span id="total-points">0</span></div>

                                <input type="hidden" name="point" id="point" value="0">


                                {{-- <button type="submit" class="btn btn-primary mt-3">Submit</button> --}}
                                <div class="col-lg-12">
                                    <div class="booking-details-btn">
                                        {{-- <a href="{{ url()->previous() }}" class="btn btn-lightred me-2">Back to Booking Details</a> --}}
                                        <button type="submit" class="btn btn-primary mt-3">Go to Order Confirmation</button>

                                    </div>
                                </div>
                            </form>
                            
                        </div>
                    </div>

                </div>
               
            </div>
        </div>
    </section>
    <!-- /Detail View Section -->
@endsection

@push('scripts')
  <script>
let docIndex = 1;

$('#add-upload-btn').click(function () {
    let item = `
    <div class="image-upload-item mb-3 border p-3 rounded">
        <label>Document Type</label>
        <select name="identity_documents[${docIndex}][type]" class="form-control document-type" required>
            <option value="">-- Select --</option>
            <option value="passport" data-points="70">Passport (70 pts)</option>
            <option value="birth_certificate" data-points="70">Birth Certificate (70 pts)</option>
            <option value="citizenship_certificate" data-points="70">Citizenship Certificate (70 pts)</option>
            <option value="drivers_license" data-points="40">Driver’s Licence (40 pts)</option>
            <option value="photo_id_card" data-points="40">Photo ID Card (40 pts)</option>
            <option value="student_id" data-points="40">Student ID Card (40 pts)</option>
            <option value="medicare" data-points="25">Medicare Card (25 pts)</option>
            <option value="bank_card" data-points="25">Bank/Credit Card (25 pts)</option>
            <option value="utility_bill" data-points="25">Utility Bill / Rental / Bank Statement (25 pts)</option>
        </select>

        <label class="mt-2">Upload Image</label>
        <input type="file" name="identity_documents[${docIndex}][file]" accept="image/*" class="form-control" required>

        <button type="button" class="btn btn-danger btn-sm mt-2 remove-upload-btn">Remove</button>
    </div>`;
    $('#image-upload-repeater').append(item);
    docIndex++;
    updateRemoveButtons();
});

$(document).on('click', '.remove-upload-btn', function () {
    $(this).closest('.image-upload-item').remove();
    calculatePoints();
    updateRemoveButtons();
});

$(document).on('change', '.document-type', function () {
    calculatePoints();
});

function calculatePoints() {
    let total = 0;
    $('.document-type').each(function () {
        const selected = $(this).find(':selected');
        const points = parseInt(selected.data('points')) || 0;
        total += points;
    });
    $('#total-points').text(total);
    $('#point').val(total);
}

function updateRemoveButtons() {
    $('.remove-upload-btn').toggle($('.image-upload-item').length > 1);
}

updateRemoveButtons();
</script>

@endpush


