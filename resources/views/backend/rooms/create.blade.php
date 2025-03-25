@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">

                    
                    <div class="container">
                        <form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property</label>
                                        <select name="property_id" class="form-control" required>
                                            <option value="">Select Property</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}" {{ old('property_id', $expense->property_id ?? '') == $property->id ? 'selected' : '' }}>
                                                    {{ $property->property_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" id="summernote" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Furnishings</label>
                                        <input type="text" name="room_furnishings" class="form-control">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Internet Available?</label>
                                        <select name="internet" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Price</label>
                                        <input type="number" step="0.01" name="price" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Weekly Rent</label>
                                        <input type="number" step="0.01" name="weekly_rent" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Is Bill Included in Rent?</label>
                                        <select name="is_bill_included_rent" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bond</label>
                                        <input type="number" step="0.01" name="bond" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Available Date</label>
                                        <input type="date" name="available_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Minimum Length of Stay (months)</label>
                                        <input type="number" name="min_length_of_stay" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Maximum Length of Stay (months)</label>
                                        <input type="number" name="max_length_of_stay" class="form-control">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Is Smoking Allowed?</label>
                                        <select name="is_smoking_allowed" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Are Pets Allowed?</label>
                                        <select name="is_pet_allowed" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">On Welfare Allowed?</label>
                                        <select name="on_welfare_allowed" class="form-control">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Video URL</label>
                                        <input type="url" name="video_url" class="form-control" placeholder="Enter video URL">
                                    </div>
                                </div>
                            
                                <!-- Video Image Input -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Video Thumbnail Image (805 W and 447 H)</label>
                                        <input type="file" name="video_image" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Image (416 W and 293 H)</label>
                                        <input type="file" name="room_image" class="form-control" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="input-field">
                                            <label class="active">Service Gallery Image (817 W and 446 H)</label>
                                            <div class="input-images-1" style="padding-top: .5rem;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                            <button type="submit" class="btn btn-success">Save Room</button>
                        </form>
                    </div>
                    

                </div> <!-- Row -->
            </div> <!-- Card -->
        </div> <!-- Col-12 -->
    </div>
@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/image-uploader.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">



@endpush
@push('scripts')
<script src="{{ asset('assets/frontend/js/image-uploader.js') }}"></script>

<!-- Include CKEditor Script -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.input-images-1').imageUploader();
        $('#summernote').summernote();

    });
   
</script>


@endpush