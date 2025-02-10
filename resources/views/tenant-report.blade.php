<?php $page = 'contact-us'; ?>
@extends('layout.mainlayout')
@section('content')
    {{-- @component('components.breadcrumb')
        @slot('title')
            Contact Us
        @endslot
        @slot('li_1')
            Home
        @endslot
        @slot('li_2')
            Contact Us
        @endslot
    @endcomponent --}}

    <!-- Contact Info Details -->
    <section class="section contact-info-sec">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ route('tenant-reports.store') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3>Create Tenant Report</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="form-group">
                                            <label>Select a property</label>
                                            <select name="property_id" class="form-control">
                                                @foreach ($properties as $data)
                                                <option value="{{ $data->id }}">{{ $data->property_name }}</option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Report Details</label>
                                            <textarea name="report_details" class="form-control" rows="5" placeholder="Enter report details" required></textarea>
                                            @error('report_details')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                    
                    
                </div>
                
            </div>
        </div>
    </section>
    <!-- /Contact Info Details -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    </script>
@endsection
