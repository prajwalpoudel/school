<div class="{{ $formClass ?? '' }}">
    @if($label)
        <label for="{{$labelFor}}">{{ $label }}</label>
    @endif
    <select class="form-control m-select2 {{ $selectClass ?? null }}" id="m_select2_3" name="{{ $name }}" multiple="multiple" value="{{2}}">
{{--        @foreach($optionGroup as $group)--}}
{{--            <optgroup label="{{ $group->name }}">--}}
                @foreach($options as $option)
                    <option value="{{ $option[$optionValue] }}"> {{ $option[$optionText] }} </option>
                @endforeach
{{--            </optgroup>--}}
{{--        @endforeach--}}
    </select>
</div>
