<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['house']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Name" labelfor="name" name="name" type="text" value="{{  $data['house']->name ?? null }}"></x-inputs.text>

            <x-inputs.text form-class="col-lg-6" label="Color" labelfor="color" name="color" type="color" value="{{  $data['house']->color ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            @if($data['house'] && $data['house']->students()->count())
                <x-inputs.text form-class="col-lg-6" label="Captain" labelfor="house_captain_id" name="house_captain_id" type="text" value="{{  $data['house']->house_captain_id ?? null }}"></x-inputs.text>
            @endif
        </div>

    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
