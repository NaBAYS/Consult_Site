@php
    // Convert name for label use
    $name_title_case = title_case(preg_replace('/[_]/', ' ', $name));

    $value = Form::getValueAttribute($name);

    // Set value
    if (isset($old) && $old($name) && empty($value)) {
        $value = $old($name);
    }

    $placeholder = $name_title_case;
    $label = $name_title_case;

    if (isset($attributes)) {
        foreach ($attributes as $attribute => $val) {
            switch ($attribute) {
                case 'placeholder':
                    $placeholder = $val;
                    break;
                case 'label':
                    $label = $val;
                    break;
            }
        }
    }

@endphp

<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">

    <label for="{{ $name }}" class="control-label @if(!$label){{ 'sr-only' }}@endif">{{ $label }}</label>

    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}"
              rows="@if(array_has($attributes, 'rows')){{ $attributes['rows'] }}@else{{ '10' }}@endif">@if(!empty($value)){{ $value }}@endif</textarea>

</div>