@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">

                        <form action="{{ route('vendors.update', $vendor->id) }}" method="POST"  enctype="multipart/form-data">
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