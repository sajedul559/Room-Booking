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
                    <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Property ID</label>
                            <input type="number" name="property_id" class="form-control" required>
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Weekly Rent</label>
                            <input type="number" step="0.01" name="weekly_rent" class="form-control" required>
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Available Date</label>
                            <input type="date" name="available_date" class="form-control">
                        </div>
                
                        <div class="mb-3">
                            <label class="form-label">Images</label>
                            <input type="file" name="images[]" class="form-control" multiple>
                        </div>
                        <div class="mb-3">
                            <div class="input-field">
                                <label class="active">Service Gellary Image</label>
                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>
                        </div>

                
                        <button type="submit" class="btn btn-success">Save Room</button>
                    </form>

                </div> <!-- Row -->
            </div> <!-- Card -->
        </div> <!-- Col-12 -->
    </div>
@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/image-uploader.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




@endpush
@push('scripts')
<script src="{{ asset('assets/frontend/js/image-uploader.js') }}"></script>

<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>
<script>
    $(document).ready(function() {
        $('.input-images-1').imageUploader();
       
    });


    


    
</script>


@endpush