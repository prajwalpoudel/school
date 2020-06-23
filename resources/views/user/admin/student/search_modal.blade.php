<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="searchModalLabel">Search Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group m-form__group row">
                        <x-inputs.text form-class="col-lg-6" label="First Name" labelfor="first_name" name="first_name" type="text"></x-inputs.text>
                        <x-inputs.text form-class="col-lg-6" label="Last Name" labelfor="last_name" name="last_name" type="text"></x-inputs.text>
                    </div>
                    <div class="form-group m-form__group row">
                        <x-inputs.text form-class="col-lg-6" label="Email" labelfor="first_name" name="first_name" type="text"></x-inputs.text>
                        <x-inputs.text form-class="col-lg-6" label="Address" labelfor="last_name" name="last_name" type="text"></x-inputs.text>
                    </div>
                    <div class="form-group m-form__group row">
                        <x-inputs.text form-class="col-lg-6" label="Grade" labelfor="first_name" name="first_name" type="text"></x-inputs.text>
                        <x-inputs.text form-class="col-lg-6" label="Section" labelfor="last_name" name="last_name" type="text"></x-inputs.text>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>
