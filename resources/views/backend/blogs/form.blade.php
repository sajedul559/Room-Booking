@php
    $isEdit = isset($blog);
@endphp

<div class="mb-3">
    <x-common.label title="Title" isRequired="true" />
    <x-common.input 
        name="title" 
        placeholder="Enter blog title" 
        :value="old('title', $blog->title ?? '')" 
        required 
    />
</div>

<div class="mb-3">
    <x-common.label title="Category" isRequired="true" />
    <x-common.select2 name="blog_category_id">
        <option value="">Select Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ old('blog_category_id', $blog->blog_category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </x-common.select2>
</div>

<div class="mb-3">
    <x-common.label title="Short Description" />
    <x-common.textarea 
        name="description" 
        placeholder="Enter short description"
        :value="old('description', $blog->description ?? '')" 
    />
</div>

<div class="mb-3">
    <x-common.label title="Content" isRequired="true" />
    <textarea 
        name="content" 
        id="summernote" 
        class="form-control" 
        required>{{ old('content', $blog->content ?? '') }}</textarea>
</div>

<div class="mb-3">
    <x-common.label title="Status" isRequired="true" />
    <x-common.select2 name="status">
        <option value="">Select Status</option>
        <option value="1" {{ old('status', $blog->status ?? '') == '1' ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('status', $blog->status ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
    </x-common.select2>
</div>

<div class="mb-3">
    <x-common.label title="Feature Image" /><span> (image size: 416 w * 330 h)</span>
    <x-common.input type="file" name="image"  id="imageInput"/>

    <div class="mt-2" id="imagePreview">
        @if ($isEdit && !empty($blog->image))       
         <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100">        
        @endif
    </div>
</div>
<div class="mb-3">
    <x-common.label title="Details Image" /> <span> (image size: 1076 w * 510 h)</span>
    <x-common.input type="file" name="feature_image" id="featureImageInput"/>
    <div class="mt-2" id="featureImagePreview">
        @if ($isEdit && !empty($blog->feature_image))       
        <img src="{{ asset('storage/' . $blog->feature_image) }}" alt="Blog feature_image" width="100">      
        @endif
    </div>
</div>

<button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>

<script>
    function previewImage(input, previewContainerId) {
        const file = input.files[0];
        const previewContainer = document.getElementById(previewContainerId);

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview" width="100">`;
            };
            reader.readAsDataURL(file);
        }
    }

    document.getElementById('imageInput').addEventListener('change', function () {
        previewImage(this, 'imagePreview');
    });

    document.getElementById('featureImageInput').addEventListener('change', function () {
        previewImage(this, 'featureImagePreview');
    });
</script>
