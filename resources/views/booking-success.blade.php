<?php $page = 'blog-grid'; ?>
@extends('layout.mainlayout')
@section('content')

    <div class="section blog-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3"> 
                    <div class="card shadow-lg p-4 text-center">
                        <h1 class="text-success pt-5">Payment Successful! 🎉</h1>
                        <p>Your room has been booked successfully.</p>
                        <div class="d-flex justify-content-center pt-5">
                            <a href="{{ route('index') }}" class="btn btn-primary mt-3 px-4" style="width: 200px;">Back to Home</a>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
