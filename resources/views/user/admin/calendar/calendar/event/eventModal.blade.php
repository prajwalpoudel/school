<div class="modal fade" id="event-modal" tabindex="-1" role="dialog" aria-labelledby="eventModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-6" label="Title" labelfor="title" name="title" type="text" value="{{  $data['group']->title ?? null }}"></x-inputs.text>
                    <x-inputs.bootstrap-select form-class="col-lg-6" label="Group" labelfor="group" name="group_id" select-id="group" placeHolder="Enter group" :options="$groups" :optionText="'title'" :optionValue="'id'"></x-inputs.bootstrap-select>
                </div>
                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-6" label="Start Date" labelfor="title" name="title" type="date" value="{{  $data['group']->title ?? null }}"></x-inputs.text>
                    <x-inputs.text form-class="col-lg-6" label="End Date" labelfor="color" name="color_code" type="date" value="{{  $data['group']->color_code ?? '#ffffff' }}"></x-inputs.text>
                </div>
                <div class="form-group m-form__group row">
                    <x-inputs.text form-class="col-lg-6" label="Start Time" labelfor="title" name="title" type="time" value="{{  $data['group']->title ?? null }}"></x-inputs.text>
                    <x-inputs.text form-class="col-lg-6" label="End Time" labelfor="color" name="color_code" type="time" value="{{  $data['group']->color_code ?? '#ffffff' }}"></x-inputs.text>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
