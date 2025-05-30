@extends('layouts.layouts')

@section('title', 'Blogs')

@section('content')
    <x-common.bread-crum />

    <div class="row">
        <div class="col-12">
            <div class="card" id="blogList">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="header-title mb-0">Blog List</h4>
                        <a class="btn btn-success" href="{{ route('blogs.create') }}">
                            <i class="mdi mdi-plus-circle me-2"></i>New Blog
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blog)
                                <tr>
                                    <td>{{ $blog->id }}</td>
                                    <td>{{ $blog->title }}</td>
                                    <td>{{ $blog->category->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $blog->status == '1' ? 'success' : 'danger' }}">
                                            {{ $blog->status == '1' ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td>
                                        @if ($blog->image)
                                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="60">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td class="text-start">
                                        <x-common.action-drop-down>
                                            <a class="dropdown-item edit-item-btn" href="{{ route('blogs.edit', $blog->id) }}">
                                                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                            </a>

                                            <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $blog->id }}">
                                                <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                            </button>
                                        </x-common.action-drop-down>

                                        <form id="delete-form-{{ $blog->id }}" action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </div>
@endsection

@push('style')
    <style>
        .dt-buttons {
            display: none;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.querySelectorAll('.delete-item-btn').forEach(btn => {
            btn.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${id}`).submit();
                    }
                });
            });
        });
    </script>
@endpush
