<div class="{{ $formClass ?? '' }}">
    <label class="m-checkbox m-checkbox--solid m-checkbox--success">
        <input type="checkbox" name="{{ $name }}" {{ $value ? 'checked' : null }} value="1"> {{ $label }}
        <span></span>
    </label>
    @if($helpText)
        <span class="m-form__help {{ $helpClass }}">{{ $helpText }}</span>
    @endif
</div>
