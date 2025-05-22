@extends('layouts.layouts')
@section('title', 'Review Details')

@section('content')
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Review Details</h4>
                    <a href="{{ route('reviews.index') }}" class="btn btn-light btn-sm">Back to List</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{-- Left Column --}}
                        <div class="col-md-6">
                            <h5 class="text-secondary mb-3">🧑‍💼 Reviewer Info</h5>
                            <p><strong>User Name:</strong> {{ $review->name ?? 'N/A' }}</p>
                            <p><strong>Email:</strong> {{ $review->email ?? 'N/A' }}</p>

                            <hr>
                            <h5 class="text-secondary mb-3">💬 Review Content</h5>
                            <p><strong>Comment:</strong> {{ $review->comment ?? 'N/A' }}</p>
                            <p><strong>Star:</strong>
                                <span class="badge bg-warning text-dark">{{ $review->star ?? 0 }} ★</span>
                            </p>
                            <p>
                                <strong>Status:</strong>
                                <span class="badge bg-{{ 
                                    $review->status === 'confirmed' ? 'success' : 
                                    ($review->status === 'rejected' ? 'danger' : 'warning') 
                                }}">
                                    {{ ucfirst($review->status ?? 'Pending') }}
                                </span>
                            </p>
                        </div>

                        {{-- Right Column --}}
                        <div class="col-md-6">
                            @if(optional($review->room)->name)
                                <h5 class="text-secondary mb-3">🛏️ Room Info</h5>
                                <p><strong>Room Name:</strong> {{ $review->room->name ?? 'N/A' }}</p>
                                <p><strong>Room Type:</strong> {{ $review->room->room_type ?? 'N/A' }}</p>
                            @else
                                <p class="text-muted">No Room information available.</p>
                            @endif

                            @if(optional(optional(optional($review->room)->property)->vendor)->user)
                                <hr>
                                <h5 class="text-secondary mb-3">🏢 Tenant Info</h5>
                                <p><strong>Tenant Name:</strong> {{ optional($review->room->property->vendor->user)->name ?? 'N/A' }}</p>
                                <p><strong>Tenant Email:</strong> {{ optional($review->room->property->vendor->user)->email ?? 'N/A' }}</p>
                                <p><strong>Tenant Phone:</strong> {{ optional($review->room->property->vendor->user)->phone ?? 'N/A' }}</p>
                            @else
                                <p class="text-muted">No Tenant information available.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
