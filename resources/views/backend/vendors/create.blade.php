@extends('layouts.layouts')
@section('content')

    <x-common.bread-crum />
    <div class="row pt-1">
        <div class="col-12">
            <div class="card p-4 border-0 shadow-sm">
                <div class="row">
                    <form action="{{ route('vendors.store') }}" method="POST"  enctype="multipart/form-data">
                        @csrf
                        @include('backend.vendors.form', ['submitButtonText' => 'Create Vendor'])
                    </form>

                </div> <!-- Row -->
            </div> <!-- Card -->
        </div> <!-- Col-12 -->
    </div>
@endsection

@push('scripts')
{{-- JavaScript for Preview --}}
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

@endpush