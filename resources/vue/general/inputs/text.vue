<template>
    <div>
        <label>{{ this.label}}</label>
        <ValidationProvider :name="name" :rules="validationRule" v-slot="{ errors }">
            <input :type="type" :class="inputClass" :id="inputId" :placeholder="placeHolder" :name="name"
                   v-model="formData.text" @input="input">
            <span class="error">{{ errors[0] }}</span>
        </ValidationProvider>
    </div>

</template>

<script>
    export default {
        data() {
            return {
                formData: {
                    text: ''
                }
            }
        },
        props: {
            label: {
                type: String,
                default() {
                    return 'Label';
                }
            },
            type: {
                type: String,
                default() {
                    return 'text';
                }
            },
            name: {
                type: String,
                default() {
                    return '';
                }
            },
            inputClass: {
                type: String,
                default() {
                    return 'form-control m-input';
                }
            },
            inputId: {
                type: String,
                default() {
                    return '';
                }
            },
            placeHolder: {
                type: String,
                default() {
                    return '';
                }
            },
            validationRule: {
                type: String,
                default() {
                    return '';
                }
            }
        },
        methods: {
            input(e) {
                this.$emit('input', e.target.value);
            }
        }
    }
</script>
