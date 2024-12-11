    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
    <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>


    <script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>

    <script src="{{ asset('assets/libs/dropify/js/dropify.min.js')}}"></script>
    <script src="{{ asset('assets/js/pages/form-fileuploads.init.js')}}"></script>

    <!-- Plugins js-->
    
    <script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>
    <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script>

    <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>
    <!-- App js-->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- Add Select2 CSS -->

    <!-- Add jQuery and Select2 JS -->
    <script src="{{ asset('assets/nice-select/js/jquery.nice-select.min.js') }}"></script>
    <!-- Datatables init -->
 
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
        {!! Toastr::message() !!}
    <script>
        $(document).ready(function() {
            $('.nice_select').niceSelect({
                search: true,
            });
            $('[data-toggle="select2"]').select2(),
            $('[data-toggle="flatpicker"]').flatpickr({
                altInput: !0,
                altFormat: "Y-m-d",
                dateFormat: "Y-m-d",
            });
            var tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.forEach(function (tooltipTriggerEl) {
                new bootstrap.Tooltip(tooltipTriggerEl)
            })
        })
    </script>
    <script src="{{ asset('assets/js/developer.js') }}"></script>

    @yield('scripts')
    @stack('js')
    <script>
        $(document).ready(function () {
            $('.delete-item-btn').on('click', function () {
                const propertyId = $(this).data('id');
                const deleteForm = $(`#delete-form-${propertyId}`);

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
                        deleteForm.submit(); // Submit the form
                    }
                });
            });
        });
    </script>
    @stack('scripts')

