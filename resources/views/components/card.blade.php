@php
    $card_classes = ['card'];

    if (isset($class))
        $card_classes[] = $class;

    if (!isset($image))
        $image = false;

    $card_classes = implode(' ', $card_classes);
@endphp

<div class="{{ $card_classes }}">
    @if(isset($title) || isset($header))
        <div class="card-header">
            @isset($title)
                <h2 class="h4">{{ $title }}</h2>
            @endisset

            @isset($header)
                {{ $header }}
            @endisset
        </div>
    @endif
    <div class="card-body">
        @if($image)
            <img src="{{ $image }}" class="card-image">
        @endif

        {{ $slot }}
    </div>
</div>