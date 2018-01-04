@php
    // Convert name for label use
    $name_title_case = title_case(preg_replace('/[_]/', ' ', $name));

    $value = Form::getValueAttribute($name);

    // Set value
    if (isset($old) && $old($name) && empty($value)) {
        $value = $old($name);
    }

    // Set type
    $type = 'text';
    $disabled = false;
    $placeholder = $name_title_case;

    foreach ($attributes as $attribute => $val) {
        switch ($attribute) {
            case 'password':
                $type = 'password';
                break;
            case 'file':
                $type = 'file';
                break;
            case 'disabled':
                $disabled = true;
                break;
            case 'placeholder':
                $placeholder = $val;
                break;
        }
    }
@endphp

<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">

    <label for="{{ $name }}" class="control-label">{{ $name_title_case }}</label>

    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" id="{{ $name }}" class="form-control" @if($disabled){{ 'readonly' }}@endif placeholder="{{ $placeholder }}">

</div>

@if(array_has($attributes, 'confirmation'))
    @php
        $name_confirmation = $name . '_confirmation';
        $name_confirmation_title_case = 'Confirm ' . title_case(preg_replace('/[_]/', ' ', $name));
    @endphp

    <div class="form-group {{ $errors->has($name_confirmation) ? ' has-error' : '' }}">

        <label for="{{ $name_confirmation }}" class="control-label">{{ $name_confirmation_title_case }}</label>

        <input type="{{ $type }}" name="{{ $name_confirmation }}" value="{{ $value }}" id="{{ $name_confirmation }}"
               class="form-control">

    </div>
@endif