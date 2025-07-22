@extends('layouts.layouts')
@section('title', 'User Details')

@section('content')
    <div class="row justify-content-center pt-3">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">User Details</h4>
                    <a href="{{ route('admins.index') }}" class="btn btn-sm btn-primary">← Back to List</a>
                </div>

                <div class="card-body">
                    <div class="row">
                        {{-- Column 1 --}}
                        <div class="col-md-6 mb-3">
                            <p><strong>Name:</strong><br>{{ $user->name }}</p>
                            <p><strong>Email:</strong><br>{{ $user->email ?? 'N/A' }}</p>
                            <p><strong>Phone:</strong><br>{{ $user->phone ?? 'N/A' }}</p>
                            <p><strong>Status:</strong><br>
                                <span class="badge bg-{{ $user->status ? 'success' : 'danger' }}">
                                    {{ $user->status ? 'Active' : 'Inactive' }}
                                </span>
                            </p>
                        </div>

                        {{-- Column 2 --}}
                        <div class="col-md-6 mb-3">
                            <p><strong>Type:</strong><br>{{ $user->type ?? 'N/A' }}</p>
                            <p><strong>Role:</strong><br>{{ $user->role->name ?? 'N/A' }}</p>
                            <p><strong>Created At:</strong><br>{{ $user->created_at->format('d M Y h:i A') }}</p>
                            <p><strong>Updated At:</strong><br>{{ $user->updated_at->format('d M Y h:i A') }}</p>
                        </div>
                    </div>

                    {{-- Identity Documents --}}
                    <div class="mt-4">
                        <h5>User Identity Documents</h5>
                        @if ($user->identities->count())
                            <div class="row">
                                @foreach ($user->identities as $identity)
                                    <div class="col-md-4 mb-4">
                                        <div class="card border">
                                            <div style="height: 200px; overflow: hidden; border-radius: 5px 5px 0 0;">
                                                <img src="{{ asset('storage/' . $identity->image_path) }}"
                                                     alt="Document Image"
                                                     class="w-100"
                                                     style="object-fit: cover; height: 100%;">
                                            </div>
                                            <div class="card-body">
                                                <p class="mb-1"><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $identity->document_type)) }}</p>
                                                <p class="mb-1"><strong>Points:</strong> {{ $identity->point }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-muted">No identity documents uploaded.</p>
                        @endif
                    </div>
                </div>

                <div class="card-footer text-end">
                    <a href="{{ route('admins.edit', $user->id) }}" class="btn btn-warning btn-sm">
                        <i class="mdi mdi-pencil"></i> Edit
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
