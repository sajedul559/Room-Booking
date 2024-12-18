@extends('layouts.layouts')

@section('content')
    @push('style')
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-color: #f9f9f9;
                color: #333;
            }

            h3 {
                color: #4a4a4a;
                font-weight: bold;
            }

            .main-container {
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .permission-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .form-check-label {
                font-weight: 500;
            }

            .accordion-item {
                background-color: #f1f5f9;
                border-radius: 8px;
                margin-bottom: 15px;
                border: none;
            }

            .accordion-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                padding: 15px;
                font-size: 16px;
                font-weight: bold;
                background-color: #e2e8f0;
                border-radius: 8px;
                cursor: pointer;
            }

            .accordion-body {
                padding: 15px;
                background-color: #fff;
                border-top: 1px solid #ccc;
                border-radius: 0 0 8px 8px;
            }

            .child-checkboxes {
                margin-left: 20px;
            }

            .btn-primary {
                background-color: #4caf50;
                border: none;
                border-radius: 6px;
                padding: 10px 20px;
                color: white;
                cursor: pointer;
                transition: 0.3s;
            }

            .btn-primary:hover {
                background-color: #45a049;
            }

            .btn-secondary {
                background-color: #e0e0e0;
                color: #555;
                border-radius: 6px;
                padding: 10px 20px;
                cursor: pointer;
            }

            .btn-secondary:hover {
                background-color: #d6d6d6;
            }
        </style>
    @endpush

    <div class="mt-4">
        <div class="main-container">
            <div class="permission-header">
                <h3>Assign Permission ({{ $role->name }})</h3>
                <div class="form-check">
                    <input type="checkbox" id="check-all" class="form-check-input">
                    <label class="form-check-label" for="check-all">Check All Permissions</label>
                </div>
            </div>
            <form action="{{ route('assign-permissions.store') }}" method="POST">
                @csrf
                <div class="row">
                    <input type="hidden" value="{{ $role->name }}" name="role" class="form-check-input">
                    @foreach ($permissions as $permission)
                        @if ($permission->parent_id === null)
                            <div class="col-md-4">
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion('{{ $permission->id }}')">
                                        <span>
                                            <input type="checkbox" 
                                                id="parent-{{ $permission->id }}" 
                                                class="form-check-input"
                                                onchange="toggleChildren('{{ $permission->id }}')"
                                                name="permissions[]" 
                                                value="{{ $permission->id }}" 

                                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="parent-{{ $permission->id }}">{{ $permission->name }}</label>
                                        </span>
                                        <span>&#x25BC;</span>
                                    </div>
                                    <div class="accordion-body" id="accordion-body-{{ $permission->id }}" style="display: none;">
                                        @foreach ($permissions->where('parent_id', $permission->id) as $child)
                                            <div class="form-check child-checkboxes">
                                                <input type="checkbox" 
                                                    id="child-{{ $child->id }}" 
                                                    class="form-check-input parent-{{ $permission->id }}" 
                                                    name="permissions[]" 
                                                    value="{{ $child->id }}" 
                                                    {{ in_array($child->id, $rolePermissions) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="child-{{ $child->id }}">{{ $child->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                
                <div class="d-flex justify-content-end mt-4">
                    <button type="button" class="btn-secondary" style="margin-right: 5px;" onclick="window.location.href='{{ route('roles.index') }}'">Cancel</button>
                    <button type="submit" class="btn-primary ml-2">Submit</button>
                </div>
            </form>
            
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.getElementById('check-all').addEventListener('change', function() {
        const isChecked = this.checked;
        document.querySelectorAll('input[type="checkbox"]').forEach(checkbox => {
            checkbox.checked = isChecked;
        });
    });

    function toggleAccordion(id) {
        const body = document.getElementById(`accordion-body-${id}`);
        body.style.display = body.style.display === 'none' ? 'block' : 'none';
    }

    function toggleChildren(parentId) {
        const isChecked = document.getElementById(`parent-${parentId}`).checked;
        document.querySelectorAll(`.parent-${parentId}`).forEach(child => {
            child.checked = isChecked;
        });
    }
</script>

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
@endsection
