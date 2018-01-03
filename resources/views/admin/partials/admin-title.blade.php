@php
    $btn_text = isset($btn) ? $btn : 'Create';
@endphp

<div class="row">
    <div class="col-md-12 push-30">
        <h2 class="h3 pull-left" style="display: inline-block;">{{ $title }}</h2>
        {{ Form::submit($btn_text, ['class' => 'btn btn-primary pull-right']) }}
    </div>
</div>