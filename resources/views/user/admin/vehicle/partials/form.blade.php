<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['vehicle']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Vehicle" labelfor="vehicle" name="name" type="text" value="{{  $data['vehicle']->name ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Driver Name" labelfor="driver_name" name="driver_name" type="text" value="{{  $data['vehicle']->driver_name ?? null}}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Driver Number" labelfor="driver_number" name="driver_number" type="text" value="{{  $data['vehicle']->driver_number ?? null}}"></x-inputs.text>
        </div>

    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
