
@props([
    'target',
    'title',
    'icon'=>'ri-add-line align-bottom me-1'
])
<button class="btn btn-success" type="button" data-bs-toggle="offcanvas"
 data-bs-target="#{{ $target }}" aria-controls="{{ $target }}">
 <i class="ri-add-line align-bottom me-1"></i> {{ $title }}

</button>
