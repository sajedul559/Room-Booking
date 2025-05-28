<?php $page = 'register'; ?>
@extends('layout.mainlayout')

@section('content')

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-5">
                    <h2 class="mb-4 text-center">Vendor Signup</h2>

                    <form action="{{ route('store.vendor') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" placeholder="Enter Name" value="{{ old('name') }}">
                                @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" placeholder="Enter Email" value="{{ old('email') }}">
                                @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{ old('phone') }}">
                                @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address" value="{{ old('address') }}">
                                @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Country -->
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" class="form-control" name="country" placeholder="Enter Country" value="{{ old('country') }}">
                                @error('country') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- State -->
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" class="form-control" name="state" placeholder="Enter State" value="{{ old('state') }}">
                                @error('state') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- City -->
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" class="form-control" name="city" placeholder="Enter City" value="{{ old('city') }}">
                                @error('city') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                           <!-- ID Verification -->
                            <div class="col-md-6">
                                <label class="form-label">ID Verification</label>
                                <input type="file" name="id_verification" class="form-control" accept="image/*" onchange="previewImage(event)">
                                @error('id_verification') <div class="text-danger">{{ $message }}</div> @enderror
                                <div class="mt-2">
                                    <img id="preview" src="" alt="Preview Image" style="display: none; width: 120px;" />
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="col-md-6">
                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" placeholder="Enter Password">
                                @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="col-md-6">
                                <label class="form-label">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                                @error('password_confirmation') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 mt-3">Sign Up</button>
                            </div>

                            <!-- Login Link -->
                            <div class="col-12 text-center mt-3">
                                Already have an account? <a href="{{ url('login') }}">Sign In</a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('preview');

        if (input.files && input.files[0]) {
            const file = input.files[0];
            if (file.type.startsWith('image/')) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = '';
                preview.style.display = 'none';
            }
        }
    }
</script>

