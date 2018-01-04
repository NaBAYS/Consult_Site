@php
    // Convert name for label use
    $name_title_case = title_case(preg_replace('/[_]/', ' ', $name));

    // Set value
    $value = Form::getValueAttribute($name);

    if (isset($old) && $old($name) && empty($value)) {
        $value = $old($name);
    }

    // Set attribute defaults
    $multi = false;
    $form_group = ['form-group'];
    $select_classes = ['form-control', 'js-select2-multi'];
    $placeholder = $name_title_case;

    foreach ($attributes as $attribute => $val) {
        switch ($attribute) {
            case 'placeholder':
                $placeholder = $val;
                break;
            case 'multi':
                $multi = $val;
                break;
        }
    }

    // Add error
    if ($errors->has($name))
        $form_group[] = 'has-error';

    // Merge form class groups
    $form_group = implode(' ', $form_group);
    $select_classes = implode(' ', $select_classes);
    $select_options = $options;

    // If multi, turn value into array
    if ($multi && $value) {
        if (!is_string($value) && !is_array($value)) {
            $value = $value->pluck('id')->toArray();
        } else if (is_array($value)) {
            $value = $value;
        } else {
            $value = [$value];
        }
    }
@endphp

<div class="{{ $form_group }}">

    <label for="{{ $name }}" class="control-label">{{ $placeholder }}</label>

    <select name="{{ !$multi ? $name : $name.'[]' }}" id="{{ $name }}" class="{{ $select_classes }}"
            @if($multi)multiple="multiple"@endif>
        @if(!$multi)
            <option value="" disabled="disabled" selected>{{ $placeholder }}</option>
        @endif

        @foreach($options as $option_value => $option)
            @if($multi && $value)
                <option value="{{ $option_value }}" @if(in_array($option_value, $value)){{ 'selected' }}@endif>{{ $option }}</option>
            @else
                @if(is_numeric($option_value))
                    @php
                        $value = (int)$value;
                        $option_value = (int)$option_value;
                    @endphp
                @endif

                <option value="{{ $option_value }}" @if($value === $option_value){{ 'selected' }}@endif>{{ $option }}</option>
            @endif
        @endforeach
    </select>

</div>