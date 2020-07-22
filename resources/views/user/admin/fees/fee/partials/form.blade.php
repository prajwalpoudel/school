<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['fee']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Grade" labelfor="grade" name="grade_id" select-id="grade" placeHolder="Enter grade" :options="$grades" optionText="display_name" optionValue="id"></x-inputs.bootstrap-select>
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Category" labelfor="category" name="category_id" select-id="category" placeHolder="Enter category" :options="$categories" optionText="name" optionValue="id"></x-inputs.bootstrap-select>
        </div>
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Amount" labelfor="amount" name="amount" type="number" value="{{  $data['fee']->amount ?? null }}"></x-inputs.text>
        </div>

    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
