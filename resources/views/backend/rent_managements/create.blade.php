@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">

                    {{-- <form action="{{ route('properties.store') }}" method="POST">
                        @csrf
                        @include('backend.properties.form')
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form> --}}
                    <form method="POST" action="{{ route('rent_managements.store') }}" enctype="multipart/form-data">

                        @csrf
                        @include('backend.rent_managements.form', ['submitButtonText' => 'Add'])
                    </form>

                </div> <!-- Row -->
            </div> <!-- Card -->
        </div> <!-- Col-12 -->
    </div>
@endsection

@push('scripts')

<script>
    $(document).ready(function () {
        let selectedRoomId = "{{ old('room_id', $rent->room_id ?? '') }}";
        let propertyId = "{{ old('property_id', $rent->property_id ?? '') }}";

        if (propertyId) {
            fetchRooms(propertyId, selectedRoomId);
        }

        $('#property_id').change(function () {
            let propertyId = $(this).val();
            fetchRooms(propertyId, null);
        });

        function fetchRooms(propertyId, selectedRoomId) {
            $('#room_id').html('<option value="">Loading...</option>');

            if (propertyId) {
                $.ajax({
                    url: "{{ route('get.rooms.by.property') }}",
                    type: "GET",
                    data: { property_id: propertyId },
                    success: function (data) {
                        let options = '<option value="">Select Room</option>';
                        data.forEach(room => {
                            let isSelected = (selectedRoomId && selectedRoomId == room.id) ? 'selected' : '';
                            options += `<option value="${room.id}" ${isSelected}>${room.name}</option>`;
                        });
                        $('#room_id').html(options);
                    }
                });
            } else {
                $('#room_id').html('<option value="">Select Room</option>');
            }
        }
    });
</script>
@endpush