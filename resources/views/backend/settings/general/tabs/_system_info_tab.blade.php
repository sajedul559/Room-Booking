<div class="row">
    <div class="col-lg-12">
        <form id="system-infos" method="POST" enctype="multipart/form-data"
            action="{{ route('settings.general.store') }}" autocomplete="off" class="needs-validation"
            novalidate>
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label" for="title">System Title <x-common.required /></label>
                        <input type="text" class="form-control" value="{{ getSetting('title') }}"
                            name="types[title]" id="title">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="separator">Browser Tab Title Separator
                            <x-common.required /></label>
                        <input type="text" class="form-control" value="{{ getSetting('separator') }}"
                            name="types[separator]" id="separator">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="contact_email">Contact Email
                            <x-common.required /></label>
                        <input type="text" class="form-control"
                            value="{{ getSetting('contact_email') }}" name="types[contact_email]" id="contact_email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="contact_phone">Contact Phone
                            <x-common.required /></label>
                        <input type="text" class="form-control"
                            value="{{ getSetting('contact_phone') }}" name="types[contact_phone]" id="contact_phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address <x-common.required /></label>
                        <textarea class="form-control" id="address" name="types[contact_address]" rows="3">{!! getSetting('contact_address') !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Large Logo <x-common.required /></label>
                        <input type="file" class="form-control" name="systemFiles[large_logo]"
                            id="logo">
                    </div>
                    <div class="mb-3">
                        <label for="dark_logo" class="form-label">Small Logo </label>
                        <input type="file" class="form-control" name="systemFiles[small_logo]"
                            id="dark_logo">
                    </div>
                    <div class="mb-3">
                        <label for="favicon" class="form-label">Favicon <x-common.required /></label>
                        <input type="file" class="form-control" name="systemFiles[favicon]"
                            id="favicon">
                    </div>

                </div>
            </div>

            <div class="text-end mb-3">
                <button type="submit" class="btn btn-success w-sm">Submit</button>
            </div>
        </form>
    </div>
    <!-- end col -->


</div>
<!-- end row -->
