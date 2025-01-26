@extends('layouts.layouts')
@section('title', 'Property Details')

@section('content')
    {{-- <x-common.bread-crum /> --}}

    <div class="row justify-content-center pt-2">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">{{ $property->property_name }} Details</h4>
                    <a href="{{ route('properties.index') }}" class="btn btn-sm btn-primary">← Back to List</a>
                </div>

                <div class="card-body row">
                    {{-- Left Side Image --}}
                   <div class="col-md-5">
                        <img src="{{ $property->image_path ? asset('storage/' . $property->image_path) : asset('assets/frontend/img/default.png') }}"
                            class="img-fluid rounded border"
                            alt="Property Image"
                            style="max-height: 300px; width: 100%;">
                    </div>


                    {{-- Right Side Details --}}
                    <div class="col-md-7">
                        <table class="table table-borderless table-sm">
                            <tr>
                                <th>Property Name:</th>
                                <td>{{ $property->property_name }}</td>
                            </tr>
                            <tr>
                                <th>Slug:</th>
                                <td>{{ $property->slug }}</td>
                            </tr>
                            <tr>
                                <th>Type:</th>
                                <td>{{ $property->property_type }}</td>
                            </tr>
                            <tr>
                                <th>Location:</th>
                                <td>{{ $property->location }}, {{ $property->city }}, {{ $property->state }}</td>
                            </tr>
                            <tr>
                                <th>Bedrooms:</th>
                                <td>{{ $property->total_bedroom }}</td>
                            </tr>
                            <tr>
                                <th>Bathrooms:</th>
                                <td>{{ $property->total_bathroom }}</td>
                            </tr>
                            <tr>
                                <th>People Can Live:</th>
                                <td>{{ $property->total_people_live }}</td>
                            </tr>
                            <tr>
                                <th>Parking:</th>
                                <td>{{ $property->parking ? 'Yes' : 'No' }}</td>
                            </tr>
                            <tr>
                                <th>Internet:</th>
                                <td>{{ $property->internet ? 'Available' : 'Not Available' }}</td>
                            </tr>
                            <tr>
                                <th>Accessibility:</th>
                                <td>{{ $property->accessibility ? 'Accessible' : 'Not Accessible' }}</td>
                            </tr>
                          <tr>
                                <th>Nearby Places:</th>
                                <td colspan="2">
                                    @if (!empty($property->nearby_places) && is_array($property->nearby_places))
                                        <ul class="mb-0 ps-3">
                                            @foreach ($property->nearby_places as $place)
                                                <li>{{ $place['name'] ?? 'N/A' }} ({{ $place['distance'] ?? 'N/A' }} km)</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <span class="text-muted">No nearby places listed.</span>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Vendor:</th>
                                <td>{{ $property->vendor->user->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Created By:</th>
                                <td>{{ $property->createdBy->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated By:</th>
                                <td>{{ $property->updatedBy->name ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($property->is_publish)
                                        <span class="badge bg-success">Published</span>
                                    @else
                                        <span class="badge bg-warning">Unpublished</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card-footer text-end">
                    {{-- <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning btn-sm">
                        <i class="mdi mdi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Are you sure to delete this property?')">
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
