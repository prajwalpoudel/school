<template>
    <div :class="formClass">
        <label v-if="label" :for="labelFor">{{ label }}</label>
        <div class="dropdown bootstrap-select form-control m-bootstrap-select m_">
            <select :class="'form-control m-bootstrap-select m_selectpicker ' + selectClass" tabindex="-98" :id="selectId" :placeholder="placeHolder" :name="name">
                <option>{{ disabledText }}</option>
                <option>{{ disabledText }}</option>

                <!--                <option v-for="option in options" :value="option.id">{{ option.display_name }}</option>-->
            </select>
        </div>
        <span v-if="helpText" :class="'m-form__help ' + helpClass">{{ helpText }}</span>
    </div>
</template>

<script>
    export default {
        props : {
            formClass : {
                type : String,
                default : null,
            },
            label : {
                type : String,
                default : null,
            },
            labelFor : {
                type : String,
                default : null,
            },
            selectClass : {
                type : String,
                default : null,
            },
            selectId : {
                type : String,
                default : null,
            },
            name : {
                type : String,
                default : null,
            },
            placeHolder : {
                type : String,
                default : null,
            },
            disabledOption: {
                type: Boolean,
                default: true
            },
            disabledText: {
                type: String,
                default: "Select an option"
            },
            options: {
                type: Array,
                default: []
            },
            helpText : {
                type : Boolean,
                default : false,
            },
            helpClass : {
                type : String,
                default : null,
            },
        }
    }
</script>
