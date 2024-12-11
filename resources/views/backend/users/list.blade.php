@extends('layouts.layouts')
@section('title', 'Admins')
@section('content')
    <x-common.bread-crum />
    <div class="row">
        <div class="col-12">
                <div class="card" id="orderList">
                    <div class="card-header" >
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="header-title mb-0">Admin List</h4>
                            <a class="btn btn-success" href="{{ route('admins.create') }}" class="btn btn-primary"> <i class="mdi mdi-plus-circle me-2"></i>New Admin</a>

                        </div>
                    </div>
                <div class="card-body">
                   
                    
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">

                     <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->roles->isNotEmpty())
                                    {{ $user->roles->first()->name }}  <!-- Display the first role name -->
                                @else
                                    <span class="text-danger">No data found</span>  <!-- No role assigned -->
                                @endif
                            </td>
                            <td class="text-start">
                                <x-common.action-drop-down>
                                    <!-- Edit Button -->
                                    <a class="dropdown-item edit-item-btn" href="{{ route('admins.edit', $user->id) }}">
                                        <i class="mdi mdi-pencil me-2 text-muted vertical-middle"></i>Edit
                                    </a>
                                    <!-- Delete Button -->
                                    <button type="button" class="dropdown-item delete-item-btn" data-id="{{ $user->id }}">
                                        <i class="mdi mdi-delete me-2 text-muted vertical-middle"></i>Delete
                                    </button>
                                </x-common.action-drop-down>
                                <form id="delete-form-{{ $user->id }}" action="{{ route('admins.destroy', $user->id) }}" method="POST" style="display: none;">
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
    .dt-buttons{
        display:none;
    }
</style>
@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  

</script>

<script>
    @if (session('success'))
        toastr.success("{{ session('success') }}");
    @endif

    @if (session('error'))
        toastr.error("{{ session('error') }}");
    @endif
</script>

@endpush
