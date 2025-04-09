<?php $page = 'register'; ?>
@extends('layout.mainlayout')
@section('content')
<div class="login-wrapper">
    <div class="loginbox">
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>Signup! <span class="d-block"> New Account.</span></h1>
                <form action="{{ route('register.custom') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Name <span>*</span></label>
                                <input  type="text" class="form-control" placeholder="Enter Name" name="name" id="name">
                                <div class="text-danger pt-2">
                                    @error('name') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Email <span>*</span></label>
                                <input style="background-color: #fff;"  type="email" class="form-control" placeholder="Enter Email" name="email" id="email">
                                <div class="text-danger pt-2">
                                    @error('email') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Password <span>*</span></label>
                                <div class="pass-group">
                                    <input type="password" style="background-color: #fff;" 
                                    class="form-control pass-input" placeholder="Enter Password" name="password" id="password">
                                    <span class="fas fa-eye toggle-password feather-eye-off"></span>
                                </div>
                                <div class="text-danger pt-2">
                                    @error('password') {{ $message }} @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Confirm Password <span>*</span></label>
                            <div class="pass-group position-relative">
                                <input type="password" 
                                       class="form-control pass-new-input" 
                                       style="background-color: #fff;" 
                                       placeholder="Enter Confirm Password" 
                                       name="confirm_password" 
                                       id="confirm_password">
                                <span class="fas fa-eye toggle-password1 feather-eye-off" 
                                      style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></span>
                            </div>
                            <div class="text-danger pt-2">
                                @error('confirm_password') {{ $message }} @enderror
                            </div>
                        </div>
                        
                    </div>

                    <div class="form-group">
                        <label class="custom_check mt-0 mb-0"><span>Remember me</span>
                            <input type="checkbox" name="remember">
                            <span class="checkmark"></span>
                        </label>
                    </div>

                    <div>
                        <button class="btn btn-outline-light w-100 btn-size" type="submit">Sign Up</button>
                    </div>

                    <div class="text-center dont-have">Already have login ? <a href="{{ url('login') }}">Sign In</a></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
