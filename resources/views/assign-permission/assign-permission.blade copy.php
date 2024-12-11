@extends('layouts.layouts')

@section('content')
    @push('style')
        <style>
            .main-section {
                background-color: #6f42c1;
                /* Purple background */
                color: white;
                padding: 10px;
                border-radius: 5px;
                margin-bottom: 10px;
                cursor: pointer;
            }

            .main-section:hover {
                background-color: #5a379a;
            }

            .child-checkboxes {
                padding-left: 25px;
                padding-top: 10px;
            }
        </style>
    @endpush
    <div class="container my-4">
        <h3 class="mb-4">Assign Permission ({{ $role->name }})</h3>

       
        @foreach ($permissions as $permission)            
          <!-- Sidebar Manager Section -->
          <div class="main-section d-flex align-items-center justify-content-between" data-bs-toggle="collapse"
              data-bs-target="#sidebarManagerSection_{{ $permission->id }}">
              <div>
                  <input type="checkbox" id="sidebarManagerCheckbox_{{ $permission->id }}" class="form-check-input me-2"
                      onchange="toggleChildCheckboxes('sidebarManagerSection_{{ $permission->id }}', this)">
                  <label for="sidebarManagerCheckbox_{{ $permission->id }}" class="form-check-label">{{ $permission->name }}</label>
              </div>
              <span class="toggle-icon">+</span>
          </div>
          <div id="sidebarManagerSection_{{ $permission->id }}" class="collapse">
              <div class="child-checkboxes">
                  <!-- Add any relevant permissions here -->
                  @foreach ($permission->childRoutes as $item)
                      
                  <div class="form-check">
                    <input type="checkbox" id="manageMenu" class="form-check-input">
                    <label for="manageMenu" class="form-check-label">{{ $item->name }}</label>
                  </div>
                  @endforeach
                 
              </div>
          </div>
        @endforeach

    </div>
@endsection
@section('scripts')
    <script>
        function toggleChildCheckboxes(sectionId, mainCheckbox) {
            const section = document.getElementById(sectionId);
            const checkboxes = section.querySelectorAll('.form-check-input');
            checkboxes.forEach(checkbox => checkbox.checked = mainCheckbox.checked);
        }
    </script>
@endsection
