<input type="{{ $type }}"
    id="{{ $id }}"
    class="{{ in_array($type, ['radio', 'checkbox']) ? 'form-check-input' : 'form-control'}}"
    name="{{ $name }}"
    placeholder="{{ $placeholder }}"
    value="{{ old($name, $value) }}"
    {{ $required }}
>
