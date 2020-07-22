<x-portlets.base portlet-class="col-md-12" footer-class="m-portlet__foot--fit" :form=true
                 form-action="{{ $data['form-action'] }}" form-method="{{ $data['form-method'] }}"
                 :model="$data['section']">
    <x-slot name="headTitle"> {{ $data['form-title'] }}</x-slot>
    <x-slot name="content">
        <div class="form-group m-form__group row">
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Grade" labelfor="grade" name="grade_id"
                                       select-id="grade" placeHolder="Enter grade" :options="$grades" optionText="name"
                                       optionValue="id">

            </x-inputs.bootstrap-select>
            <x-inputs.text form-class="col-lg-6" label="Section" labelfor="name" name="name"
                           type="text" value="{{  $data['section']->name ?? null }}">

            </x-inputs.text>
        </div>

        <div class="form-group m-form__group row">
            <x-inputs.bootstrap-select form-class="col-lg-6" label="Section Teacher" labelfor="section_teacher"
                                       name="teacher_id" select-id="teacher" placeHolder="Enter Section Teacher"
                                       :options="$teachers" optionText="full_name"
                                       optionValue="id">
            </x-inputs.bootstrap-select>
            @if($data['section'] && $data['section']->students()->count())
                <x-inputs.bootstrap-select form-class="col-lg-6" label="Section Representative"
                                           labelfor="section_representative"
                                           name="captain_id" select-id="captain" placeHolder="Enter Section Representive"
                                           :options="$data['section']->students" optionText="full_name"
                                           optionValue="id">
                </x-inputs.bootstrap-select>
            @endif
        </div>

        @if($data['section'] && $data['section']->students()->count())
            <div class="form-group m-form__group row">

                <x-inputs.bootstrap-select form-class="col-lg-6" label="Section Vice Representative"
                                           labelfor="section_vice_representative"
                                           name="vice_captain_id" select-id="vice-captain"
                                           placeHolder="Enter Section Vice Representive"
                                           :options="$data['section']->students" optionText="full_name"
                                           optionValue="id">
                </x-inputs.bootstrap-select>
            </div>
        @endif
    </x-slot>
    <x-slot name="footer">
        <div class="m-form__actions">
            <button type="submit" class="btn btn-primary">{{ $data['button-text'] }}</button>
            <button type="reset" class="btn btn-secondary">Cancel</button>
        </div>
    </x-slot>
</x-portlets.base>
