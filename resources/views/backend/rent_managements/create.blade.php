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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function () {
        $('#property_id').change(function () {
            let property_id = $(this).val();
            $('#room_id').html('<option value="">Loading...</option>');

            if (property_id) {
                $.ajax({
                    url: "{{ route('get.rooms.by.property') }}",
                    type: "GET",
                    data: { property_id: property_id },
                    success: function (data) {
                        let options = '<option value="">Select Room</option>';
                        data.forEach(room => {
                            options += `<option value="${room.id}">${room.name}</option>`;
                        });
                        $('#room_id').html(options);
                    }
                });
            } else {
                $('#room_id').html('<option value="">Select Room</option>');
            }
        });
    });
</script>

@endpush