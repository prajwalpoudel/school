<div class="{{ $formClass ?? '' }}">
    @if($label)
        <label for="{{$labelFor}}">{{ $label }}</label>
    @endif
    <div class="dropdown bootstrap-select form-control m-bootstrap-select m_">
        <select class="form-control m-bootstrap-select m_selectpicker {{ $selectClass ?? '' }}" tabindex="-98" id="{{ $selectId ?? ''}}" placeholder="{{ $placeHolder }}" name="{{$name}}">
            @if($disabledOption)
                <option disabled>{{ $disabledText }}</option>
            @endif
            @foreach($options as $option)
                <option value="{{ $option[$optionValue] }}">{{ $option[$optionText] }}</option>
            @endforeach
        </select>
    </div>
    @if($helpText)
        <span class="m-form__help {{ $helpClass }}">{{ $helpText }}</span>
    @endif
</div>
