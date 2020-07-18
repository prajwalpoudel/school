<x-basic.accordion.accordion-detail id='basic-id' href='basic-href' title="Basic Details" parent-id="gradeaccordion" :collapsed="null" show="show" expanded="true">
    <x-slot name="content">
        <div class="form-group m-form__group row pt-10">
            <x-inputs.text form-class="col-lg-6" label="Grade" disabled="disabled" type="text" value="{{  $grade->name}}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Display Name" disabled="disabled" name="display_name" type="text" value="{{  $grade->display_name}}"></x-inputs.text>
        </div>

        <div class="form-group m-form__group row pt-10">
            <x-inputs.text form-class="col-lg-6" label="Number of Sections" disabled="disabled" type="text" value="{{  $grade->section_count }}"></x-inputs.text>
            <x-inputs.text form-class="col-lg-6" label="Number of Students" disabled="disabled" type="text" value="{{  $grade->student_count }}"></x-inputs.text>
        </div>
    </x-slot>
</x-basic.accordion.accordion-detail>
