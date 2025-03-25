@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">
                        {{-- <form action="{{ route('properties.update', $property) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('backend.properties.form', ['property' => $property])
                            <button type="submit" class="btn btn-success">Update</button>
                        </form> --}}
                        <form action="{{ route('rent_managements.update', $rentManagement->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('backend.rent_managements.form', ['submitButtonText' => 'Update', 'rent' => $rentManagement])
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