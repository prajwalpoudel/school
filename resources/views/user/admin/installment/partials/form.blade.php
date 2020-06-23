<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['installment']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-12" label="Name" labelfor="name" name="name" type="text" value="{{  $data['installment']->name ?? null }}"></x-inputs.text>
        </div>
        <div class="form-group m-form__group row">
            <x-inputs.multi-select form-class="col-lg-12" name="categories[]"  label="Fee Category" labelfor="fee_category" :options="$feeCategories" option-text="name" option-value="id"></x-inputs.multi-select>
        </div>
    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
