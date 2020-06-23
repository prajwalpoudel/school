<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['category']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Name" labelfor="name" name="name" type="text" value="{{  $data['category']->name ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Code" labelfor="code" name="code" type="text" value="{{  $data['category']->code ?? null}}"></x-inputs.text>
        </div>
        <div class="form-group m-form__group row">
            <x-inputs.ckeditor form-class="col-lg-12" label="Description" labelfor="description" name="description" input-id="description" value="{!! $data['category'] ? $data['category']->description : null !!}"></x-inputs.ckeditor>
        </div>

    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
