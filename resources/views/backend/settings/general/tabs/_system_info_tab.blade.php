<div class="row">
    <div class="col-lg-12">
        <form id="system-infos" method="POST" enctype="multipart/form-data"
            action="{{ route('settings.general.store') }}" autocomplete="off" class="needs-validation"
            novalidate>
            @csrf

            <div class="card">
                <div class="card-body">

                    {{-- System Title --}}
                    <div class="mb-3">
                        <label class="form-label" for="title">System Title <x-common.required /></label>
                        <input type="text" class="form-control" value="{{ getSetting('title') }}"
                            name="types[title]" id="title">
                    </div>

                    {{-- Browser Title Separator --}}
                    <div class="mb-3">
                        <label class="form-label" for="separator">Browser Tab Title Separator <x-common.required /></label>
                        <input type="text" class="form-control" value="{{ getSetting('separator') }}"
                            name="types[separator]" id="separator">
                    </div>

                    {{-- Contact Email --}}
                    <div class="mb-3">
                        <label class="form-label" for="contact_email">Contact Email <x-common.required /></label>
                        <input type="text" class="form-control" value="{{ getSetting('contact_email') }}"
                            name="types[contact_email]" id="contact_email">
                    </div>

                    {{-- Contact Phone --}}
                    <div class="mb-3">
                        <label class="form-label" for="contact_phone">Contact Phone <x-common.required /></label>
                        <input type="text" class="form-control" value="{{ getSetting('contact_phone') }}"
                            name="types[contact_phone]" id="contact_phone">
                    </div>

                    {{-- Address --}}
                    <div class="mb-3">
                        <label class="form-label" for="address">Address <x-common.required /></label>
                        <textarea class="form-control" id="address" name="types[contact_address]" rows="3">{!! getSetting('contact_address') !!}</textarea>
                    </div>

                    {{-- Large Logo White --}}
                    <div class="mb-3">
                        <label class="form-label" for="large_logo_white">Large Logo White <x-common.required /></label>
                        @if(getSetting('large_logo_white'))
                            <div class="mb-2">
                                <img id="preview_large_logo_white" src="{{ asset(getSetting('large_logo_white')) }}" alt="Large Logo White" height="80">
                            </div>
                        @else
                            <img id="preview_large_logo_white" src="#" alt="Preview" style="display:none;" height="80">
                        @endif
                        <input type="file" accept="image/*" class="form-control" name="systemFiles[large_logo_white]" id="large_logo_white" onchange="previewImage(this, 'preview_large_logo_white')">
                    </div>

                    {{-- Large Logo Dark --}}
                    <div class="mb-3">
                        <label class="form-label" for="large_logo_dark">Large Logo Dark <x-common.required /></label>
                        @if(getSetting('large_logo_dark'))
                            <div class="mb-2">
                                <img id="preview_large_logo_dark" src="{{ asset(getSetting('large_logo_dark')) }}" alt="Large Logo Dark" height="80">
                            </div>
                        @else
                            <img id="preview_large_logo_dark" src="#" alt="Preview" style="display:none;" height="80">
                        @endif
                        <input type="file" accept="image/*" class="form-control" name="systemFiles[large_logo_dark]" id="large_logo_dark" onchange="previewImage(this, 'preview_large_logo_dark')">
                    </div>

                    {{-- Small Logo --}}
                    <div class="mb-3">
                        <label class="form-label" for="small_logo">Small Logo <x-common.required /></label>
                        @if(getSetting('small_logo'))
                            <div class="mb-2">
                                <img id="preview_small_logo" src="{{ asset(getSetting('small_logo')) }}" alt="Small Logo" height="80">
                            </div>
                        @else
                            <img id="preview_small_logo" src="#" alt="Preview" style="display:none;" height="80">
                        @endif
                        <input type="file" accept="image/*" class="form-control" name="systemFiles[small_logo]" id="small_logo" onchange="previewImage(this, 'preview_small_logo')">
                    </div>

                    {{-- Favicon --}}
                    <div class="mb-3">
                        <label class="form-label" for="favicon">Favicon <x-common.required /></label>
                        @if(getSetting('favicon'))
                            <div class="mb-2">
                                <img id="preview_favicon" src="{{ asset(getSetting('favicon')) }}" alt="Favicon" height="80">
                            </div>
                        @else
                            <img id="preview_favicon" src="#" alt="Preview" style="display:none;" height="80">
                        @endif
                        <input type="file" accept="image/*" class="form-control" name="systemFiles[favicon]" id="favicon" onchange="previewImage(this, 'preview_favicon')">
                    </div>

                </div>
            </div>

            {{-- Submit Button --}}
            <div class="text-end mb-3">
                <button type="submit" class="btn btn-success w-sm">Submit</button>
            </div>
        </form>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
