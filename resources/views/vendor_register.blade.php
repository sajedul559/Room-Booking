<?php $page = 'register'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="login-wrapper ">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>Signup For Vendor.</h1>
                {{-- <h1>Signup! <span class="d-block"> For Vendor.</span></h1> --}}
                <form action="{{ route('store.vendor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                
                        <!-- Name -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name <span>*</span></label>
                                <input style="background-color: #fff;" type="text" class="form-control"
                                       placeholder="Enter Name" name="name" id="name" value="{{ old('name') }}">
                                <div class="text-danger pt-2">
                                    @error('name') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                
                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email <span>*</span></label>
                                <input style="background-color: #fff;" type="email" class="form-control"
                                       placeholder="Enter Email" name="email" id="email" value="{{ old('email') }}">
                                <div class="text-danger pt-2">
                                    @error('email') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                
                        <!-- Phone -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Phone <span>*</span></label>
                                <input style="background-color: #fff;" type="number" class="form-control"
                                       name="phone" id="phone" value="{{ old('phone') }}">
                                <div class="text-danger pt-2">
                                    @error('phone') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                
                        <!-- ID Verification -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">ID Verification</label>
                                <input type="file" name="id_verification" class="form-control" accept="image/*" onchange="previewImage(event)">
                                <div class="text-danger pt-2">
                                    @error('id_verification') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                
                        <!-- Password -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password <span>*</span></label>
                                <div class="pass-group">
                                    <input type="password" style="background-color: #fff;" 
                                           class="form-control pass-input" placeholder="Enter Password" 
                                           name="password" id="password">
                                    <span class="fas fa-eye toggle-password feather-eye-off"></span>
                                </div>
                                <div class="text-danger pt-2">
                                    @error('password') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                
                        <!-- Confirm Password -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Confirm Password <span>*</span></label>
                                <div class="pass-group position-relative">
                                    <input type="password" class="form-control pass-new-input" 
                                           style="background-color: #fff;" 
                                           placeholder="Enter Confirm Password" 
                                           name="password_confirmation" id="password_confirmation">
                                    <span class="fas fa-eye toggle-password1 feather-eye-off" 
                                          style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></span>
                                </div>
                                <div class="text-danger pt-2">
                                    @error('password_confirmation') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>
                
                    </div>
                
                    <div>
                        <button class="btn btn-outline-light w-100 btn-size" type="submit">Sign Up</button>
                    </div>
                
                    <div class="text-center dont-have" style="margin-bottom: 100px;">
                        Already have login? <a href="{{ url('login') }}">Sign In</a>
                    </div>
                </form>
                
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
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
