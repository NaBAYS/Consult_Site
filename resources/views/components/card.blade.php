@php
    $card_classes = ['card'];
    $tag = 'div';

    if (isset($class))
        $card_classes[] = $class;

    if (!isset($image))
        $image = false;

    if (isset($link))
        $tag = 'a';

    $card_classes = implode(' ', $card_classes);
@endphp

<{{ $tag }} class="{{ $card_classes }}" @isset($link)href="{{ $link }}"@endisset>
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
</{{ $tag }}>