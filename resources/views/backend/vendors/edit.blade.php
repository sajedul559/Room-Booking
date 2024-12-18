@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">
                        {{-- <form action="{{ route('properties.update', $property) }}" method="POST">
                            @csrf
                            @method('PUT')
                            @include('backend.properties.form', ['property' => $property])
                            <button type="submit" class="btn btn-success">Update</button>
                        </form> --}}
                        <form action="{{ route('vendors.update', $vendor->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('backend.vendors.form', ['submitButtonText' => 'Update Vendor', 'vendor' => $vendor])
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