@php
    // Convert name for label use
    $name_title_case = title_case(preg_replace('/[_]/', ' ', $name));

    $value = Form::getValueAttribute($name);

    // Set value
    if (isset($old) && $old($name) && empty($value)) {
        $value = $old($name);
    }

@endphp

<div class="form-group {{ $errors->has($name) ? ' has-error' : '' }}">

    <label for="{{ $name }}" class="control-label">{{ $name_title_case }}</label>

    <textarea name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $name_title_case }}"
              rows="@if(array_has($attributes, 'rows')){{ $attributes['rows'] }}@else{{ '10' }}@endif">@if(!empty($value)){{ $value }}@endif</textarea>

</div>