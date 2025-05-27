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
                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            @include('backend.blogs.form', ['submitButtonText' => 'Update', 'blog' => $blog])
                        </form>

                </div> <!-- Row -->
            </div> <!-- Card -->
        </div> <!-- Col-12 -->
    </div>
@endsection

@push('style')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">



@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            height: 300,
            tabsize: 2

        });
    });
</script>
@endpush