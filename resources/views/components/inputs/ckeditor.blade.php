<div class="{{ $formClass ?? '' }}">
    @if($label)
        <label for="{{$labelFor}}">{{ $label }}</label>
    @endif
    <textarea class="form-control m-input m-input--air {{ $inputClass ?? '' }}" id="{{ $inputId ?? ''}}"
              aria-describedby="{{$name.'Help'}}" placeholder="{{ $placeHolder }}" name="{{$name}}"
              value="{{ $value }}"></textarea>
    @if($helpText)
        <span class="m-form__help {{ $helpClass }}">{{ $helpText }}</span>
    @endif
</div>

@push('script')
    <script>
        $(document).ready(function () {
            var inputId = {!! json_encode($inputId) !!}
            var value = {!! json_encode($value) !!}
                CKEDITOR.replace(inputId);
            if (value) {
                CKEDITOR.instances[inputId].setData(value);
            }
        });
    </script>
@endpush
