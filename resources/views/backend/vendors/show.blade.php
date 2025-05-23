@extends('layouts.layouts')
@section('title', 'Vendor Details')

@section('content')
    <div class="row justify-content-center pt-3">
        <div class="col-md-10">
           <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="mb-0">{{ $vendor->user->name ?? 'Vendor' }} Details</h4>
                <a href="{{ route('vendors.index') }}" class="btn btn-sm btn-primary">← Back to List</a>
            </div>

                <div class="card-body">
                    <div class="row">
                        {{-- Column 1 --}}
                        <div class="col-md-6 mb-3">
                            <p><strong>User:</strong><br> {{ $vendor->user->name ?? 'N/A' }}</p>
                            <p><strong>Email:</strong><br> {{ $vendor->email ?? 'N/A' }}</p>
                            <p><strong>Phone:</strong><br> {{ $vendor->phone ?? 'N/A' }}</p>
                            @php
                                $statusClass = match($vendor->status) {
                                    'approve' => 'success',
                                    'rejected' => 'danger',
                                    default => 'warning',
                                };
                            @endphp
                            <p><strong>Status:</strong><br>
                                <span class="badge bg-{{ $statusClass }}">
                                    {{ ucfirst($vendor->status) }}
                                </span>
                            </p>
                            <p><strong>ID Verification:</strong><br>
                                @if ($vendor->id_verification)
                                    <a href="{{ asset('storage/' . $vendor->id_verification) }}" target="_blank">View Document</a>
                                @else
                                    <span class="text-muted">No document uploaded</span>
                                @endif
                            </p>
                        </div>

                        {{-- Column 2 --}}
                        <div class="col-md-6 mb-3">
                            <p><strong>Address:</strong><br>
                                {{ $vendor->address }},
                                {{ $vendor->city }},
                                {{ $vendor->state }},
                                {{ $vendor->country }} - {{ $vendor->postcode }}
                            </p>
                            <p><strong>Approved By:</strong><br> {{ $vendor->approvedBy->name ?? 'N/A' }}</p>
                            <p><strong>Last Approved By:</strong><br> {{ $vendor->lastApprovedBy->name ?? 'N/A' }}</p>
                            <p><strong>Approved Date:</strong><br>
                                {{ $vendor->approved_date ? \Carbon\Carbon::parse($vendor->approved_date)->format('d M Y') : 'N/A' }}
                            </p>
                            <p><strong>Last Update Date:</strong><br>
                                {{ $vendor->last_update_date ? \Carbon\Carbon::parse($vendor->last_update_date)->format('d M Y') : 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
                 <div class="card-footer text-end">
                    <a href="{{ route('vendors.edit', $vendor->id) }}" class="btn btn-warning btn-sm">
                        <i class="mdi mdi-pencil"></i> Edit
                    </a>
                    {{-- <form action="{{ route('properties.destroy', $property->id) }}" method="POST" class="d-inline"
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
