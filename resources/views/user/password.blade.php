@extends('layouts.layouts')
@section('content')
@section('title','User Password Change')


@if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
@endif


<div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Change Password </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('user.pass.reset') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    submit request
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



@endsection
