<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['section']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Grade" labelfor="grade" name="grade_id" select-id="grade" placeHolder="Enter grade" :options="$grades"></x-inputs.bootstrap-select>
            <x-inputs.text form-class="col-lg-6" label="Section" labelfor="name" name="name" type="text" value="{{  $data['section']->name ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Display Name" labelfor="display_name" name="display_name" type="text" value="{{  $data['section']->display_name ?? null}}"></x-inputs.text>
        </div>

    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
