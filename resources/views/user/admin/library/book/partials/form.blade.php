<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['book']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Name" labelfor="name" name="name" type="text" value="{{  $data['book']->name ?? null }}"></x-inputs.text>
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Category" labelfor="category" name="category_id" select-id="category" placeHolder="Enter category" :options="$categories"></x-inputs.bootstrap-select>
        </div>
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Publication" labelfor="publication" name="publication" type="text" value="{{  $data['book']->publication ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Edition" labelfor="edition" name="edition" type="text" value="{{  $data['book']->edition ?? null}}"></x-inputs.text>
        </div>
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Author" labelfor="author" name="author" type="text" value="{{  $data['book']->author ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Price" labelfor="price" name="price" type="number" value="{{  $data['book']->price ?? null}}"></x-inputs.text>
        </div>
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Position" labelfor="position" name="position" type="text" value="{{  $data['book']->position ?? null }}"></x-inputs.text>
            @if(!$data['book'])
                <x-inputs.text form-class="col-lg-6" label="Number of Books" labelfor="no_of_books" name="no_of_books" type="text" value="1"></x-inputs.text>
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
