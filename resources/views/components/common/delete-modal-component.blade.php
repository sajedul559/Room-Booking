<div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    id="btn-close"></button>
            </div>
            <div class="modal-body p-5 text-center">
                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                    colors="primary:#25a0e2,secondary:#00bd9d" style="width: 90px; height: 90px"></lord-icon>
                <div class="mt-4 text-center">
                    <h4 class="fs-semibold">
                        You are about to delete a Data ?
                    </h4>
                    <p class="text-muted fs-14 mb-4 pt-1">
                        Deleting your Data will remove all of your
                        information from our database.
                    </p>
                    <div class="hstack gap-2 justify-content-center remove">
                        <button class="btn btn-link link-primary fw-medium text-decoration-none"
                            data-bs-dismiss="modal">
                            <i class="ri-close-line me-1 align-middle"></i>
                            Close
                        </button>
                        <form action="" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-primary" id="delete-record" type="submit">
                                Yes, Delete It!!
                            </button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
