<template>
    <div :class="formClass">
        <label v-if="label" :for="labelFor">{{ label }}</label>
            <input :type="type" :class="'form-control m-input m-input--air ' +  inputClass " :id="inputId"
               :aria-describedby="name + 'Help'" :placeholder="placeHolder" :name="name" :value="value" @input="$emit('input', $event.target.value)">
        <span v-if="helpText" :class="'m-form__help ' + helpClass">{{ helpText }}</span>
    </div>
</template>

<script>
    export default {
        props : {
            value : {
                type : String,
                default : null,
            },
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
            type : {
                type : String,
                default : 'text',
            },
            inputClass : {
                type : String,
                default : null,
            },
            inputId : {
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
            rules: {
                type: String,
                default: null
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

