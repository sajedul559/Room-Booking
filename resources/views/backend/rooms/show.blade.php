@extends('layouts.layouts')
@section('title', 'Room Details')

@section('content')
    <div class="row justify-content-center pt-3">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Room Details</h4>
                    <a href="{{ route('rooms.index') }}" class="btn btn-sm btn-primary">← Back to List</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Column 1 --}}
                        <div class="col-md-6 mb-3">
                            <p><strong>Room Name:</strong><br>{{ $room->name }}</p>
                            <p><strong>Property Name:</strong><br>{{ $room->property->property_name ?? 'N/A' }}</p>
                            <p><strong>Capacity:</strong><br>{{ $room->capacity }}</p>
                            <p><strong>Is Available:</strong><br>
                                <span class="badge bg-{{ $room->is_available ? 'success' : 'danger' }}">
                                    {{ $room->is_available ? 'Yes' : 'No' }}
                                </span>
                            </p>
                            <p><strong>Room Type:</strong><br>
                                @if ($room->room_type == 1)
                                    Private
                                @elseif ($room->room_type == 0)
                                    Shared
                                @else
                                    Common
                                @endif
                            </p>

                            <p><strong>Room Furnishings:</strong><br>{{ $room->room_furnishings }}</p>
                            <p><strong>Bathroom Type:</strong><br>{{ $room->bathroom_type }}</p>
                            <p><strong>Bed Size:</strong><br>{{ $room->bed_size }}</p>
                            <p><strong>Furnish Features:</strong><br>{{ $room->furnishFeatures }}</p>
                            <p><strong>Tenant Preference:</strong><br>{{ $room->tenant_preference }}</p>
                            <p><strong>Women Only:</strong><br>{{ $room->is_women_only ? 'Yes' : 'No' }}</p>
                            <p><strong>Accepting Options:</strong><br>{{ $room->accepting_options }}</p>
                            <p><strong>Internet:</strong><br>{{ $room->internet ? 'Yes' : 'No' }}</p>
                        </div>

                        {{-- Column 2 --}}
                        <div class="col-md-6 mb-3">
                            <p><strong>Price:</strong><br>${{ number_format($room->price, 2) }}</p>
                            <p><strong>Weekly Rent:</strong><br>${{ number_format($room->weekly_rent, 2) }}</p>
                            <p><strong>Bills Included:</strong><br>{{ $room->is_bill_included_rent ? 'Yes' : 'No' }}</p>
                            <p><strong>Bond:</strong><br>${{ number_format($room->bond, 2) }}</p>
                            <p><strong>Available Date:</strong><br>
                                {{ $room->available_date ? \Carbon\Carbon::parse($room->available_date)->format('d M Y') : 'N/A' }}
                            </p>
                            <p><strong>Min Stay:</strong><br>{{ $room->min_length_of_stay }} weeks</p>
                            <p><strong>Max Stay:</strong><br>{{ $room->max_length_of_stay }} weeks</p>
                            <p><strong>Smoking Allowed:</strong><br>{{ $room->is_smoking_allowed ? 'Yes' : 'No' }}</p>
                            <p><strong>Pet Allowed:</strong><br>{{ $room->is_pet_allowed ? 'Yes' : 'No' }}</p>
                            <p><strong>Welfare Allowed:</strong><br>{{ $room->on_welfare_allowed ? 'Yes' : 'No' }}</p>
                            <p><strong>Published:</strong><br>{{ $room->is_publish ? 'Yes' : 'No' }}</p>
                            <p><strong>Created By:</strong><br>{{ $room->creator->name ?? 'N/A' }}</p>
                            <p><strong>Updated By:</strong><br>{{ $room->updater->name ?? 'N/A' }}</p>

                        </div>
                    </div>
                    <div class="mt-4 row">
                        <div class="col-md-6 mb-3">
                            <p><strong>Room Image:</strong></p>
                            <div style="width: 100%; max-width: 300px; height: 200px; overflow: hidden; border-radius: 8px;">
                                @if($room->room_image)
                                    <img src="{{ asset('storage/' . $room->room_image) }}"
                                        alt="Room Image"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div class="text-muted d-flex justify-content-center align-items-center"
                                        style="height: 100%; background-color: #f0f0f0;">
                                        No Image
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <p><strong>Video Image:</strong></p>
                            <div style="width: 100%; max-width: 300px; height: 200px; overflow: hidden; border-radius: 8px;">
                                @if($room->video_image)
                                    <img src="{{ asset('storage/' . $room->video_image) }}"
                                        alt="Video Image"
                                        style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <div class="text-muted d-flex justify-content-center align-items-center"
                                        style="height: 100%; background-color: #f0f0f0;">
                                        No Video Image
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Images & Video --}}
                    <div class="mt-4">

                        <p><strong>Video URL:</strong><br>
                            @if($room->video_url)
                                <a href="{{ $room->video_url }}" target="_blank">{{ $room->video_url }}</a>
                            @else
                                <span class="text-muted">No video link provided</span>
                            @endif
                        </p>

                        <p><strong>Description:</strong><br>
                            {!! (($room->description)) !!}
                        </p>
                    </div>
                    
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('rooms.edit', $room->id) }}" class="btn btn-warning btn-sm">
                        <i class="mdi mdi-pencil"></i> Edit
                    </a>
                    {{-- <form action="{{ route('rooms.destroy', $room->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this room?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="mdi mdi-delete"></i> Delete
                        </button>
                    </form> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
