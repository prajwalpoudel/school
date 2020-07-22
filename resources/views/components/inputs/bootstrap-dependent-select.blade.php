<div class="{{ $formClass1 ?? '' }}">
    @if($label1)
        <label for="{{$labelFor1}}">{{ $label1 }}</label>
    @endif
    <div class="dropdown bootstrap-select form-control m-bootstrap-select m_">
        <select class="form-control m-bootstrap-select m_selectpicker {{ $selectClass1 ?? '' }}" tabindex="-98"
                id="{{ $selectId1 ?? ''}}" placeholder="{{ $placeHolder1 }}" name="{{$name1}}">
                <option disabled selected>Select an option</option>
            @foreach($options1 as $option)
                <option value="{{ $option[$optionValue1] }}">{{ $option[$optionText1] }}</option>
            @endforeach
        </select>
    </div>
    @if($helpText1)
        <span class="m-form__help {{ $helpClass1 }}">{{ $helpText1 }}</span>
    @endif
</div>

<div class="{{ $formClass2 ?? '' }}">
    @if($label2)
        <label for="{{$labelFor2}}">{{ $label2 }}</label>
    @endif
    <div class="dropdown bootstrap-select form-control m-bootstrap-select m_">
        <select class="form-control m-bootstrap-select m_selectpicker {{ $selectClass2 ?? '' }} selectpicker" tabindex="-98"
                id="{{ $selectId2 ?? ''}}" placeholder="{{ $placeHolder2 }}" name="{{$name2}}">
        </select>
    </div>
    @if($helpText2)
        <span class="m-form__help {{ $helpClass2 }}">{{ $helpText2 }}</span>
    @endif
</div>

@push('script')
    <script>
        $(document).ready(function() {
            var selectId1 = {!! json_encode($selectId1) !!}
            var selectId2 = {!! json_encode($selectId2) !!}
            var selectClass2 = {!! json_encode($selectClass2) !!}
            var options2 = {!! json_encode($options2) !!}
            var optionText2 = {!! json_encode($optionText2) !!}
            var optionValue2 = {!! json_encode($optionValue2) !!}

            var options = '<option disabled selected>Select an option</option>'
            var checkField = {!! json_encode($checkField) !!}

            $('.' + selectClass2).selectpicker();
            $('#' + selectId1).on('change', function () {
                    var selected = $(this).val();
                $(options2).each(function (key,item) {
                    if(item[checkField] == selected)
                        {
                            options+= '<option value='+item[optionValue2]+'>'+ item[optionText2] +'</option>';
                        }
                    });
                $('#' + selectId2).html(options).selectpicker('refresh');
            });


        });
    </script>
@endpush
