@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">
                    
                    <div class="container">
                        <form action="{{ route('rooms.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Property <span class="text-danger"> *</span></label>
                                        <select name="property_id" class="form-control" required>
                                            <option value="">Select Property</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}" {{ old('property_id', $room->property_id ?? '') == $property->id ? 'selected' : '' }}>
                                                    {{ $property->property_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name <span class="text-danger"> *</span></label>
                                        <input type="text" name="name" class="form-control" required value="{{ $room->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Description <span class="text-danger"> *</span></label>
                                        <textarea name="description" id="summernote" class="form-control">{{ $room->description }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Furnishings</label>
                                        <input type="text" name="room_furnishings" class="form-control" value="{{ $room->room_furnishings }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Internet Available?</label>
                                        <select name="internet" class="form-control">
                                            <option value="1" {{ $room->internet ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ !$room->internet ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Price <span class="text-danger"> *</span></label>
                                        <input type="number" step="0.01" name="price" class="form-control" required value="{{ $room->price }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Weekly Rent</label>
                                        <input type="number" step="0.01" name="weekly_rent" class="form-control" required value="{{ $room->weekly_rent }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Is Bill Included in Rent?</label>
                                        <select name="is_bill_included_rent" class="form-control">
                                            <option value="1" {{ $room->is_bill_included_rent ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ !$room->is_bill_included_rent ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bond</label>
                                        <input type="number" step="0.01" name="bond" class="form-control" value="{{ $room->bond }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Available Date</label>
                                        <input type="date" name="available_date" class="form-control" value="{{ $room->available_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Minimum Length of Stay (months) <span class="text-danger"> *</span></label>
                                        <input type="number" name="min_length_of_stay" class="form-control" value="{{ $room->min_length_of_stay }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Maximum Length of Stay (months) <span class="text-danger"> *</span></label>
                                        <input type="number" name="max_length_of_stay" class="form-control" value="{{ $room->max_length_of_stay }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Is Smoking Allowed?</label>
                                        <select name="is_smoking" class="form-control">
                                            <option value="1" {{ $room->is_smoking ? 'selected' : '' }}>Yes</option>
                                            <option value="0" {{ !$room->is_smoking ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Video URL <span class="text-danger"> *</span></label>
                                        <input type="url" name="video_url"  value="{{ $room->video_url }}" class="form-control" placeholder="Enter video URL">
                                    </div>
                                </div>
                            
                                <!-- Video Image Input -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Video Thumbnail Image (805 W and 447 H) <span class="text-danger"> *</span>
                                        </label>
                                        <input type="file" name="video_image" class="form-control mb-2" accept="image/*">
                                        <img style="height:100px;" src="{{ asset('storage/' . $room->video_image) }}" alt="Video Thumbnail">

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Image (416 W and 293 H)<span class="text-danger"> *</span></label>
                                        <input type="file" name="room_image" class="form-control mb-2" accept="image/*">
                                        <img style="height:100px;" src="{{ asset('storage/' . $room->room_image) }}" alt="Room Image">

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="input-field">
                                            <label class="active">Service Gallery Image (817 W and 446 H) <span class="text-danger"> *</span></label>
                                            <div class="input-images-1" style="padding-top: .5rem;"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary">Update Room</button>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
@push('style')
<link rel="stylesheet" href="{{ asset('assets/frontend/css/image-uploader.css') }}">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">



@endpush
@push('scripts')
<script src="{{ asset('assets/frontend/js/image-uploader.js') }}"></script>


<script>
   $(document).ready(function () {
    setTimeout(function () {
        var posts = @json($gellary_image);
        let preloaded = [];
        
        posts.forEach(function (post) {
            let data = {
                id: post.id,
                src: "{{ asset('storage') }}/" + post.image_path
            };
            preloaded.push(data);
        });

        $('.input-images-1').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old'
        });

    }, 500); // Delay for smoother loading
});

    
</script>

<!-- Include CKEditor Script -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('.input-images-1').imageUploader();
        $('#summernote').summernote();

    });
   
</script>
@endpush