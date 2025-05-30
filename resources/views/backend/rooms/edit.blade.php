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
                                <div class="">
                                    <div class="mb-3">
                                        <label class="form-label">Property</label>
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
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Name</label>
                                        <input type="text" placeholder="Enter the name of the room" name="name" class="form-control" required value="{{ $room->name }}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Type</label>
                                        <select name="room_type" class="form-control">
                                            <option value="1" {{ $room->room_type == 1 ? 'selected' : '' }}>Private</option>
                                            <option value="0" {{ $room->room_type == 0 ? 'selected' : '' }}>Shared</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="">
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" id="summernote" class="form-control">{{ $room->description }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Room Furnishings</label>
                                        <select name="room_furnishings" class="form-control">
                                            <option value="0" {{ $room->room_furnishings == 0 ? 'selected' : '' }}>Flexible</option>
                                            <option value="1" {{ $room->room_furnishings == 1 ? 'selected' : '' }}>Furnished</option>
                                            <option value="2" {{ $room->room_furnishings == 2 ? 'selected' : '' }}>Unfurnished</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bathroom</label>
                                        <select name="bathroom_type" class="form-control">
                                            <option value="Shared" {{ $room->bathroom_type =='Shared' ? 'selected' : '' }}>Shared</option>
                                            <option value="Own" {{ $room->bathroom_type =='Own' ? 'selected' : '' }}>Own</option>
                                            <option value="Ensuite" {{ $room->bathroom_type =='Ensuite' ? 'selected' : '' }}>Ensuite</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Bed Size</label>
                                        <select name="bed_size" class="form-control">
                                            <option value="Single" {{ $room->bed_size =='Single' ? 'selected' : '' }}>Single</option>
                                            <option value="Double" {{ $room->bed_size =='Double' ? 'selected' : '' }}>Double</option>
                                            <option value="Queen" {{ $room->bed_size =='Queen' ? 'selected' : '' }}>Queen</option>
                                            <option value="King" {{ $room->bed_size =='King' ? 'selected' : '' }}>King</option>
                                            <option value="None" {{ $room->bed_size =='None' ? 'selected' : '' }}>None</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">

                                        <x-common.label title="Room Furnishings and Features"/>
                                        <x-common.select2 name="furnishFeatures[]" id="accessibility-features-select" multiple="multiple" placeholder="Select">
                                            <option value="" disabled>Select Furnishing's Features</option>
                                            
                                            @foreach (\App\Models\Room::getFurnishFeatures() as $type => $label)
                                                <option value="{{ $type }}" {{ in_array($label, old('accessibility', $room->furnishFeatures ?? [])) ? 'selected' : '' }}>
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
                                            <input type="number" placeholder="Enter the monthly rent amount" min="0" step="0.01" name="price" class="form-control" required value="{{ $room->price }}">
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Bond</label>
                                            <input type="number" placeholder="Enter the total bond" step="0.01" name="bond" class="form-control" value="{{ $room->bond }}">
                                        </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Weekly Rent</label>
                                        <input type="number" placeholder="Enter the weekly rent amount" step="0.01" name="weekly_rent" class="form-control" required value="{{ $room->weekly_rent }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Is Bill Included in Rent?</label>
                                            <select name="is_bill_included_rent" class="form-control">
                                                <option value="1" {{ $room->is_bill_included_rent == 1 ? 'selected' : '' }}>Yes</option>
                                                <option value="0" {{ $room->is_bill_included_rent == 0 ? 'selected' : '' }}>No</option>
                                            </select>
                                        </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label class="form-label">Available Date</label>
                                        <input type="date" min="{{ date('Y-m-d') }}" name="available_date" class="form-control" value="{{ $room->available_date }}">
                                    </div>
                                </div>
                            </div>
                    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Minimum Length of Stay</label>
                                        <select name="min_length_of_stay" class="form-control">
                                                <option value="0" {{ $room->min_length_of_stay == 0 ? 'selected' : '' }}>No minimum stay</option>
                                                <option value="1" {{ $room->min_length_of_stay == 1 ? 'selected' : '' }}>1 week</option>
                                                <option value="2" {{ $room->min_length_of_stay == 2 ? 'selected' : '' }}>2 weeks</option>
                                                <option value="3" {{ $room->min_length_of_stay == 3 ? 'selected' : '' }}>1 month</option>
                                                <option value="4" {{ $room->min_length_of_stay == 4 ? 'selected' : '' }}>2 months</option>
                                                <option value="5" {{ $room->min_length_of_stay == 5 ? 'selected' : '' }}>3 months</option>
                                                <option value="6" {{ $room->min_length_of_stay == 6 ? 'selected' : '' }}>4 months</option>
                                                <option value="7" {{ $room->min_length_of_stay == 7 ? 'selected' : '' }}>6 months</option>
                                                <option value="8" {{ $room->min_length_of_stay == 8 ? 'selected' : '' }}>9 months</option>
                                                <option value="9" {{ $room->min_length_of_stay == 9 ? 'selected' : '' }}>12 months+</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Maximum Length of Stay</label>
                                        <select name="max_length_of_stay" class="form-control">
                                                <option value="0" {{ $room->max_length_of_stay == 0 ? 'selected' : '' }}>No maximum stay</option>
                                                <option value="1" {{ $room->max_length_of_stay == 1 ? 'selected' : '' }}>1 week</option>
                                                <option value="2" {{ $room->max_length_of_stay == 2 ? 'selected' : '' }}>2 weeks</option>
                                                <option value="3" {{ $room->max_length_of_stay == 3 ? 'selected' : '' }}>1 month</option>
                                                <option value="4" {{ $room->max_length_of_stay == 4 ? 'selected' : '' }}>2 months</option>
                                                <option value="5" {{ $room->max_length_of_stay == 5 ? 'selected' : '' }}>3 months</option>
                                                <option value="6" {{ $room->max_length_of_stay == 6 ? 'selected' : '' }}>4 months</option>
                                                <option value="7" {{ $room->max_length_of_stay == 7 ? 'selected' : '' }}>6 months</option>
                                                <option value="8" {{ $room->max_length_of_stay == 8 ? 'selected' : '' }}>9 months</option>
                                                <option value="9" {{ $room->max_length_of_stay == 9 ? 'selected' : '' }}>12 months+</option>
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
                                            <option value="0" {{ $room->tenant_preference == 0 ? 'selected' : '' }}>Women only</option>
                                            <option value="1" {{ $room->tenant_preference == 1 ? 'selected' : '' }}>Men only</option>
                                            <option value="2" {{ $room->tenant_preference == 2 ? 'selected' : '' }}>No couples</option>
                                            <option value="3" {{ $room->tenant_preference == 3 ? 'selected' : '' }}>Couple</option>
                                            <option value="4" {{ $room->tenant_preference == 4 ? 'selected' : '' }}>Anyone (inc.couples)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <x-common.label title="Accepting Options"/>
                                    <x-common.select2 name="accepting_options[]" id="accepting_options" multiple="multiple" placeholder="Select">
                                        <option value="" disabled>Select Accepting Options</option>
                                        @foreach (\App\Models\Room::getAcceptingOptions() as $type => $label)
                                            <option value="{{ $type }}" {{ in_array($label, old('accepting', $room->accepting_options ?? [])) ? 'selected' : '' }}>
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
                                        <option value="0" {{ $room->is_women_only == 0 ? 'selected' : '' }}>No</option>
                                        <option value="1" {{ $room->is_women_only == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Video URL</label>
                                        <input type="url" name="video_url" class="form-control" placeholder="Enter video URL" value="{{ $room->video_url }}"> 
                                    </div>
                                </div>
                            
                                <!-- Video Image Input -->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Video Thumbnail Image (805 W and 447 H)</label> <span class="text-danger"> *</span>
                                        <input type="file" name="video_image" class="form-control mb-2" accept="image/*">
                                        <img style="height:100px;" src="{{ asset('storage/' . $room->video_image) }}" alt="Video Thumbnail">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label class="form-label">Room Image (416 W and 293 H)<span class="text-danger"> *</span></label>
                                    <input type="file" name="room_image" class="form-control mb-2" accept="image/*">
                                    <img style="height:100px;" src="{{ asset('storage/' . $room->room_image) }}" alt="Room Image">
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <div class="input-field">
                                        <label class="active">Service Gallery Image (817 W and 446 H)<span class="text-danger"> *</span></label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <x-common.label title="Publish" />
                                <x-common.checkbox name="is_publish" value="1" 
                                                :checked="old('is_publish', $room->is_publish == 1 ?? false)" />
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

<!-- Include CKEditor Script -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();

    });
   
</script>
@endpush