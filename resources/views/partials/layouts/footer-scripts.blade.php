@isset($options)
    @if(array_has($options, 'parallax'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax.js/1.4.2/parallax.min.js"></script>
    @endif

    @if(array_has($options, 'select2'))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.js-select2-multi').select2();
            });
        </script>
    @endif
@endisset