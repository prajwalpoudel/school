<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}" :model="$data['student']">
    <x-slot name="headTitle">{{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="First Name" labelfor="first_name" name="first_name" type="text" placeHolder="Enter first name" value="{{  $data['student']->user->first_name ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Last Name" labelfor="last_name" name="last_name" type="text" placeHolder="Enter last name" value="{{  $data['student']->user->last_name ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.text form-class="col-lg-6" label="Email" labelfor="email" name="email" type="text" placeHolder="Enter email" value="{{  $data['student']->user->email ?? null }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Address" labelfor="address" name="address" type="text" placeHolder="Enter address" value="{{  $data['student']->user->detail->address ?? null }}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.bootstrap-dependent-select
                form-class1="col-lg-6"
                label1="Grade"
                labelfor1="grade"
                name1="grade_id"
                select-id1="grade"
                placeHolder1="Enter grade"
                :options1="$grades"
                optionText1="name"
                optionValue1="id"
                form-class2="col-lg-6"
                label2="Section"
                labelfor2="section"
                name2="section_id"
                select-id2="section"
                select-class2="section"
                placeHolder2="Enter section"
                :options2="$sections"
                optionText2="name"
                optionValue2="id"
                check-field="grade_id"
            ></x-inputs.bootstrap-dependent-select>
        </div>
         <div class="form-group m-form__group row">
            
            <x-inputs.bootstrap-select form-class="col-lg-6" label="house"
                                           labelfor="house"
                                           name="house_id" select-id="house_id"
                                           placeHolder="Enter House"
                                           :options="$houses" optionText="name"
                                           optionValue="id">
                </x-inputs.bootstrap-select>
        </div>


    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
