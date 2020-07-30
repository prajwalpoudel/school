<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['teacher']">
    <x-slot name="headTitle">{{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="First Name" labelfor="first_name" name="first_name" type="text" placeHolder="Enter first name" value="{{  $data['teacher']->user->first_name ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Last Name" labelfor="last_name" name="last_name" type="text" placeHolder="Enter last name" value="{{  $data['teacher']->user->last_name ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Email" labelfor="email" name="email" type="text" placeHolder="Enter email" value="{{  $data['teacher']->user->email ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Address" labelfor="address" name="address" type="text" placeHolder="Enter address" value="{{  $data['teacher']->user->detail->address ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Phone" labelfor="phone" name="phone" type="text" placeHolder="Enter Phone" value="{{  $data['teacher']->user->detail->address ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Salary" labelfor="salary" name="salary" type="number" placeHolder="Enter salary" value="{{  $data['teacher']->user->salary ?? null }}"></x-inputs.text>
        </div>



    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
