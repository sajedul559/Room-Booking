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
                                <div class="">
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
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Name</label>
                                        <input type="text" placeholder="Enter the name of the room" name="name" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Type</label>
                                        <select name="room_type" class="form-control">
                                            <option value="1">Private</option>
                                            <option value="0">Shared</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="summernote" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Furnishings</label>
                                        <select name="room_furnishings" class="form-control">
                                            <option value="0">Flexible</option>
                                            <option value="1">Furnished</option>
                                            <option value="2">Unfurnished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bathroom</label>
                                        <select name="bathroom_type" class="form-control">
                                            <option value="Shared">Shared</option>
                                            <option value="Own">Own</option>
                                            <option value="Ensuite">Ensuite</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bed Size</label>
                                        <select name="bed_size" class="form-control">
                                            <option value="Single">Single</option>
                                            <option value="Double">Double</option>
                                            <option value="Queen">Queen</option>
                                            <option value="King">King</option>
                                            <option value="None">None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <x-common.label title="Room Furnishings and Features"/>
                                        <x-common.select2 name="furnishFeatures[]" id="accessibility-features-select" multiple="multiple" placeholder="Select">
                                            <option value="" disabled>Select Furnishing's Features</option>
                                            
                                            @foreach (\App\Models\Room::getFurnishFeatures() as $type => $label)
                                                <option value="{{ $type }}" {{ in_array($label, old('accessibility', $property->furnishFeatures ?? [])) ? 'selected' : '' }}>
                                                    {{ $label }}
                                                </option>
                                            @endforeach
                                        </x-common.select2>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Total Rent</label>
                                            <input type="number" placeholder="Enter the monthly rent amount" step="0.01" name="price" class="form-control" required>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bond</label>
                                            <input type="number" placeholder="Enter the total bond" step="0.01" name="bond" class="form-control">
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Weekly Rent</label>
                                        <input type="number" placeholder="Enter the weekly rent amount" step="0.01" name="weekly_rent" class="form-control" required>
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
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Available Date</label>
                                        <input type="date" min="{{ date('Y-m-d') }}" name="available_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Minimum Length of Stay</label>
                                        <select name="min_length_of_stay" class="form-control">
                                                <option value="0">No minimum stay</option>
                                                <option value="1">1 week</option>
                                                <option value="2">2 weeks</option>
                                                <option value="3">1 month</option>
                                                <option value="4">2 months</option>
                                                <option value="5">3 months</option>
                                                <option value="6">4 months</option>
                                                <option value="7">6 months</option>
                                                <option value="8">9 months</option>
                                                <option value="9">12 months+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Maximum Length of Stay</label>
                                        <select name="max_length_of_stay" class="form-control">
                                                <option value="0">No maximum stay</option>
                                                <option value="1">1 week</option>
                                                <option value="2">2 weeks</option>
                                                <option value="3">1 month</option>
                                                <option value="4">2 months</option>
                                                <option value="5">3 months</option>
                                                <option value="6">4 months</option>
                                                <option value="7">6 months</option>
                                                <option value="8">9 months</option>
                                                <option value="9">12 months+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tenant Preference</label>
                                    <select id="tenant_preference" name="tenant_preference" class="form-control">
                                            <option value="">Select</option>
                                            <option value="0">Women only</option>
                                            <option value="1">Men only</option>
                                            <option value="2">No couples</option>
                                            <option value="3">Couple</option>
                                            <option value="4">Anyone (inc.couples)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-common.label title="Accepting Options"/>
                                    <x-common.select2 name="accepting_options[]" id="accepting_options" multiple="multiple" placeholder="Select">
                                        <option value="" disabled>Select Accepting Options</option>
                                        @foreach (\App\Models\Room::getAcceptingOptions() as $type => $label)
                                            <option value="{{ $type }}" {{ in_array($label, old('accepting', $property->accepting_options ?? [])) ? 'selected' : '' }}>
                                                {{ $label }}
                                            </option>
                                        @endforeach
                                    </x-common.select2>
                                </div>
                            </div>
                        </div>
                        <div id="is_women_only_div" class="col-md mb-3" style="display: none;">
                            <label class="form-label">Is this property for women only?</label>
                            <select name="is_women_only" class="form-control">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                            </select>
                        </div>
                    
                            <div class="row">
                                
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
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label class="form-label">Room Image (416 W and 293 H)</label>
                                    <input type="file" name="room_image" class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="input-field">
                                        <label class="active">Service Gallery Image (817 W and 446 H)</label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <x-common.label title="Publish" />
                                <x-common.checkbox name="is_publish" value="1" 
                                                :checked="old('is_publish', false)" />
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
        $('.input-images-1').imageUploader({
            imagesInputName: 'images',
            extensions: ['.jpg', '.jpeg', '.png', '.gif', '.bmp', '.webp'],
            mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp'],
        });
        $('#summernote').summernote();
        $('.image-uploader input[type="file"]').attr('accept', 'image/*');

        // changing the tenant Preference
        $('#tenant_preference').on('change', function() {
            var selectedValue = $(this).val();
            console.log('selected', selectedValue);
            if (selectedValue === '0') {
                $('#is_women_only_div').show();
            } else {
                $('#is_women_only_div').hide();
                $('#is_women_only_div input').val('');
            }
        });

    });
   
</script>


@endpush