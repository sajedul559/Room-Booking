<div class="col-8">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title mb-3">Permission Route List</h4>
            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Name</th>
                        <th>Route</th>
                        <th>Parent Route</th>
                       
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($routes as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->route }}</td>
                            <td>{{ $permission->parent_route }}</td>                          
                            <td>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="action-icon"> <i class="fas fa-pencil-alt"></i></a>
                                <a href="javascript:void(0);" class="action-icon deleteItem" data-delete_url="{{ route('permissions.delete', $permission->id) }}"> <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- end card body-->
    </div>
    <!-- end card -->
</div>