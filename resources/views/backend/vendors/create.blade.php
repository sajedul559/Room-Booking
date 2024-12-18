@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">

                    {{-- <form action="{{ route('properties.store') }}" method="POST">
                        @csrf
                        @include('backend.properties.form')
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form> --}}
                    <form action="{{ route('vendors.store') }}" method="POST">
                        @csrf
                        @include('backend.vendors.form', ['submitButtonText' => 'Create Vendor'])
                    </form>

                </div> <!-- Row -->
            </div> <!-- Card -->
        </div> <!-- Col-12 -->
    </div>
@endsection

@push('scripts')
<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>

@endpush