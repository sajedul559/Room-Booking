@props([
    'link'=>null,
    'title'=>null,
    'icon'=>'ri-add-line align-bottom'
])
<a href="{{ $link }}" class="btn btn-danger"><i
    class="{{ $icon }} me-1"></i>{{ $title }}</a>