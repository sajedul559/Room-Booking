@props([
    'id',
    'model',
    'status'=>0,
])
<div class="form-check form-switch form-switch-custom form-switch-success listChangeStatus" data-id="{{ $id }}" data-model="{{ $model }}">
    <input {{$attributes->class(['form-check-input'])->merge(['type' => 'checkbox'])}} value="{{ $status }}" role="switch" id="SwitchCheck11" {{ $status == 1 ? 'checked':'' }}>
</div>