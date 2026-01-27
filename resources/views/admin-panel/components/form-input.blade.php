@props([
    'inputClassName' => null,
    'className' => null,
    'name' => null,
    'label',
    'type',
    'disabled' => false,
    'required' => false,
    'value',
    'placeholder',
])

{{-- Jika tidak diberikan atribut placeholder, maka akan menggunakan Input + label --}}
<div class="{{ $className }} mb-1" id="group_{{ $name }}">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="form-control {{ $inputClassName }} @error($name) validation-form @enderror" placeholder="{{ isset($placeholder) ? $placeholder : 'Input ' . $label }}" value="{{ isset($value) ? old($name, $value) : old($name) }}" {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }}>

    @error($name)
        <div class="alert alert-danger fs-11 m-0 p-1">
            {{ $message }}
        </div>
    @enderror
</div>
