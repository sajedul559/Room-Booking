@extends('layouts.layouts')

@section('title', 'Blog Categories')

@section('content')
    <x-common.bread-crum />

    <div class="row">
        <div class="col-12">
            <div class="card" id="categoryList">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="header-title mb-0">Blog Category List</h4>
                        <a class="btn btn-success" href="{{ route('blog-categories.create') }}">
                            <i class="mdi mdi-plus-circle me-2"></i>New Category
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <span class="badge bg-{{ $category->status ? 'success' : 'danger' }}">
                                            {{ $category->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>
                                    <td class="text-start">
                                        <x-common.action-drop-down>
                                            <a class="dropdown-item edit-item-btn" href="{{ route('blog-categories.edit', $category->id) }}">
                                                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                            </a>

                                            <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $category->id }}">
                                                <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                            </button>
                                        </x-common.action-drop-down>

                                        <form id="delete-form-{{ $category->id }}" action="{{ route('blog-categories.destroy', $category->id) }}" method="POST" style="display: none;">
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
