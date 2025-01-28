@extends('layouts.layouts')
@section('title', 'Update Profile')

@section('content')
<div class="row justify-content-center pt-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header"><h4>Update Profile</h4></div>

            <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Phone --}}
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" class="form-control @error('phone') is-invalid @enderror">
                        @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Type (disabled for update) --}}
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <input type="text" id="type" value="{{ auth()->user()->type }}" class="form-control" disabled>
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label for="password" class="form-label">New Password <small class="text-muted">(Leave blank if unchanged)</small></label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Photo --}}
                    <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label><br>
                        @if(auth()->user()->photo)
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" class="rounded mb-2" width="100" alt="Profile Image">
                        @endif
                        <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror"  onchange="previewImage(event)">
                        @error('photo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    {{-- Submit --}}
                    <div class="text-end">
                        <button class="btn btn-primary">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
{{-- JavaScript for Preview --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('photo');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endpush