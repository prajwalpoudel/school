<div class="{{ $formClass ?? '' }}">
    @if($label)
        <label for="{{$labelFor}}">{{ $label }}</label>
    @endif
    <input type="file" class="form-control m-input m-input--air {{ $inputClass ?? '' }}" id="{{ $inputId ?? ''}}" name="{{$name}}" value="{{ $value }}">
        <img src="https://cdn.britannica.com/55/174255-050-526314B6/brown-Guernsey-cow.jpg" id="preview-image" alt="">
    @if($helpText)
        <span class="m-form__help {{ $helpClass }}">{{ $helpText }}</span>
    @endif
    @if($errors)
        <span class="error">{{ $errors->first($name) }}</span>
    @endif
</div>

@push('script')
    <script>
        $(document).ready(function () {
            var id = {!! json_encode($inputId) !!}
            $('#' + id).on('change', function () {
                var reader = new FileReader();
                reader.onload =function (e) {
                    $('#preview-image').attr('src', e.target.result).width(400).height(400);
                };
            });
        })
    </script>
@endpush
