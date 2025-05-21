@extends('layouts.layouts')
@section('title', 'Partners')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
            <div class="card" id="partnerList">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h4 class="header-title mb-0">Partner List</h4>
                        <a class="btn btn-success" href="{{ route('partners.create') }}">
                            <i class="mdi mdi-plus-circle me-2"></i>New Partner
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Updated By</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($partners as $partner)
                                <tr>
                                    <td>{{ $partner->id }}</td>
                                    <td>{{ $partner->name }}</td>
                                    <td>
                                        @if($partner->image_path)
                                            <img src="{{ asset('storage/' . $partner->image_path) }}" alt="Partner Image" width="50">
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                    <td>
                                        @if ($partner->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $partner->createdBy->name ?? 'N/A' }}</td>
                                    <td>{{ $partner->updatedBy->name ?? 'N/A' }}</td>
                                    <td class="text-start">
                                        <x-common.action-drop-down>
                                            <a class="dropdown-item edit-item-btn" href="{{ route('partners.edit', $partner->id) }}">
                                                <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                            </a>
                                            <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $partner->id }}">
                                                <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                            </button>
                                        </x-common.action-drop-down>

                                        <form id="delete-form-{{ $partner->id }}" action="{{ route('partners.destroy', $partner->id) }}" method="POST" style="display: none;">
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
@endpush

