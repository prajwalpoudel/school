<div class="{{ $formClass ?? '' }}">
    @if($label)
        <label for="{{$labelFor}}">{{ $label }}</label>
    @endif
    <input type="{{ $type }}" class="form-control m-input m-input--air {{ $inputClass ?? '' }}" id="{{ $inputId ?? ''}}"
           aria-describedby="{{$name.'Help'}}" placeholder="{{ $placeHolder }}" name="{{$name}}" value="{{ $value }}">

    @if($helpText)
        <span class="m-form__help {{ $helpClass }}">{{ $helpText }}</span>
    @endif
</div>
