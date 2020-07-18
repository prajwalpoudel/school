<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['subject']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Subject" labelfor="subject" name="name" type="text" value="{{  $data['subject']->name ?? null }}"></x-inputs.text>
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Grade" labelfor="grade" name="grade_id" select-id="grade" placeHolder="Enter grade" :options="$grades" optionText="display_name" optionValue="id"></x-inputs.bootstrap-select>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Author" labelfor="author" name="author" type="text" value="{{  $data['subject']->author ?? null}}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Publication" labelfor="publication" name="publication" type="text" value="{{  $data['subject']->publication ?? null}}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Edition" labelfor="edition" name="edition" type="text" value="{{  $data['subject']->edition ?? null}}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Price" labelfor="price" name="price" type="number" value="{{  $data['subject']->price ?? null}}"></x-inputs.text>
        </div>

    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
