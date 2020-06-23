@extends('user.admin.layouts.master')
@section('breadcrumbs')
    {!! $breadcrumbs !!}
@endsection
@section('content')
    <div class="m-content">
        <x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true>
            <x-slot name="headTitle"> Prajwal</x-slot>
            <x-slot name="content">
                <x-inputs.form-description form-class="m--margin-top-10" content="The example form below demonstrates common HTML form elements air(box shadowed) style."></x-inputs.form-description>

                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-6" label="Email" labelfor="email" name="email" type="text" placeHolder="Enter email Here" help-text="This is a help text"></x-inputs.text>
                    <x-inputs.text form-class="col-lg-6" label="Email" labelfor="email" name="email" type="text" placeHolder="Enter email Here" help-text="This is a help text"></x-inputs.text>
                </div>

                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-6" label="Email" labelfor="email" name="email" type="text" placeHolder="Enter email Here" help-text="This is a help text"></x-inputs.text>
                    <x-inputs.text form-class="col-lg-6" label="Email" labelfor="email" name="email" type="text" placeHolder="Enter email Here" help-text="This is a help text"></x-inputs.text>
                </div>
                <x-inputs.text form-class="form-group m-form__group" label="Email" labelfor="email" name="email" type="text" placeHolder="Enter email Here" help-text="This is a help text"></x-inputs.text>


            </x-slot>
            <x-slot name="footer">
                    <div class="m-form__actions">
                        <button type="reset" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                    </div>
            </x-slot>
        </x-portlets.base>
    </div>
@endsection

