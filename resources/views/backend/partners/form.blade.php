<div class="mb-3">
    <x-common.label title="Partner Name" isRequired="true" />
    <x-common.input name="name" placeholder="Enter partner name" 
                    value="{{ old('name', $partner->name ?? '') }}" required />
    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Partner Image (Recommended: 416 W x 293 H)" />
    <input type="file" name="image" class="form-control" accept="image/*" id="image-input">

    <div class="mt-2">
        <img id="image-preview" 
             src="{{ !empty($partner->image_path) ? asset('storage/' . $partner->image_path) : '' }}" 
             alt="Partner Image" 
             style="max-width: 150px; {{ empty($partner->image_path) ? 'display: none;' : '' }}">
    </div>

    @error('image')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <x-common.label title="Status" />
    <select name="status" class="form-control" required>
        <option value="1" {{ old('status', $partner->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $partner->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
    @error('status')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
@push('scripts')
<script>
    document.getElementById('image-input').addEventListener('change', function (event) {
        const preview = document.getElementById('image-preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush

