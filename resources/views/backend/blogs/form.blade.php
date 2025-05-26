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
    <x-common.label title="Image" />
    <x-common.input type="file" name="image" />

    @if ($isEdit && !empty($blog->image))
        <div class="mt-2">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="100">
        </div>
    @endif
</div>

<button type="submit" class="btn btn-success">{{ $submitButtonText }}</button>

