@extends('layouts.layouts')
@section('title', 'Roles')
@section('content')
    <!-- start page title -->
        <x-common.bread-crum/>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header  border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">Role List</h5>
                        <div class="flex-shrink-0">

                            <x-common.off-canvas-btn target="offcanvasRole" title="New Role" />
                        </div>
                    </div>
                </div>

                <div class="card-body pt-2">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">
                        <thead class="">
                            <tr class="">
                                <th class="sort" data-sort="id">SL</th>
                                <th class="sort" data-sort="name">Name</th>
                                <th class="sort" data-sort="name">Created By</th>
                                <th class="sort" data-sort="name">LastUpdated By</th>
                                <th class="sort" data-sort="name">Status</th>
                                <th class="sort text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all">
                            @include('backend.roles.list')
                        </tbody>
                    </table>



                </div>
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->
    @include('backend.roles.form')
    @include('backend.roles.edit')
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.edit-item-btn', function(e) {
                e.preventDefault();
                let editUrl = $(this).data('edit-url');
                let updateUrl = $(this).data('update-url');
                $('form#editRoleForm').attr('action', updateUrl);
                $.ajax({
                    url: editUrl,
                    type: 'GET',
                    dataType: 'JSON',
                    success: function(result) {
                        console.log(result);
                        let myOffcanvas = new bootstrap.Offcanvas($('#offcanvasEditRole'));
                        myOffcanvas.show();
                        $('#editRoleForm #name').val(result.name);
                        $('#editRoleForm #is_active').val(result.is_active).change();

                    },
                    error: function() {

                    }
                })
                // showOffcanvas('#offcanvasBankAccount');

            })
        })
    </script>
@endpush
