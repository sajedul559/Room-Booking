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
                                        <label class="form-label">Property ID</label>
                                        <input type="number" name="property_id" class="form-control" required value="{{ $room->property_id }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" required value="{{ $room->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Description</label>
                                        <textarea name="description" class="form-control">{{ $room->description }}</textarea>
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
                                        <label class="form-label">Price</label>
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
                                        <label class="form-label">Minimum Length of Stay (months)</label>
                                        <input type="number" name="min_length_of_stay" class="form-control" value="{{ $room->min_length_of_stay }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Maximum Length of Stay (months)</label>
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
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="input-field">
                                        <label class="active">Service Gallery Image</label>
                                        <div class="input-images-1" style="padding-top: .5rem;"></div>
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




@endpush
@push('scripts')
<script src="{{ asset('assets/frontend/js/image-uploader.js') }}"></script>


<script>
    $(document).ready(function() {
        // $('.input-images-1').imageUploader();

        var posts = {!! json_encode($gellary_image) !!};
        let preloaded = [];
        posts.forEach(function(post) {
            $photo = post['image_path'];
            // do something
            let data = {
                id: post['id'],
                src: "{{ asset('storage/') }}/" + $photo + ""
            };
            preloaded.push(data);
        });
        $('.input-images-1').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old'
        });
       
    });
    
</script>


@endpush