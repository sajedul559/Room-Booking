<form action="" method="POST" class="editRoleForm" id="editRoleForm">
    @csrf
    @method('PUT')
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditRole" aria-labelledby="offcanvasEditRoleLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasEditRoleLabel">Update Role</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mb-3">
                <x-common.label for="name" title="Name" isRequired=true />
                <x-common.input name="name" id="name" value="" placeholder="Enter brnad name"/>
            </div>
            {{-- <div class="mb-3">
                <x-common.label for="is_active" title="Is Active?" isRequired=true />
                <x-common.select name="is_active" id="is_active">
                    <option value="1">Active</option>
                    <option value="2">DeActive</option>
                </x-common.select>
            </div> --}}

        </div>
        <div class="offcanvas-foorter border p-3 text-center __web-inspector-hide-shortcut__">           
            <button class="btn btn-success" id="submitBtn" type="submit">Update</button>
        </div>
    </div>
</form>
