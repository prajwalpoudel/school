<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['emailTemplate']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Title" labelfor="title" name="title" type="text" value="{{  $data['emailTemplate']->title ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Slug" labelfor="slug" name="slug" type="text" value="{{  $data['emailTemplate']->slug ?? null }}"></x-inputs.text>
        </div>
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Subject" labelfor="subject" name="subject" type="text" value="{{  $data['emailTemplate']->subject ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Email From" labelfor="email_from" name="email_from" type="email" value="{{  $data['emailTemplate']->email_from ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.ckeditor form-class="col-lg-12" label="Content" labelfor="content" name="content" input-id="content" value="{!! $data['emailTemplate'] ? $data['emailTemplate']->content : null !!}"></x-inputs.ckeditor>
        </div>


    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
