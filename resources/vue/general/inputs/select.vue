<template>
    <div>
        <label v-if="label">{{ this.label }}</label>
        <ValidationProvider :name="name" :rules="validationRule" v-slot="{ errors }">
            <select :class="selectClass" :id="selectId" @change="handleChange" :name="name" v-model="formData.select">
                <option v-if="disabledOptionText" disabled selected>{{ disabledOptionText }}</option>
                <option v-for="(option, key) in options" :value="option[optionValue]">{{ option[optionText]}}</option>
            </select>
            <span class="error">{{ errors[0] }}</span>
        </ValidationProvider>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                formData: {
                    select: ''
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
            disabledOptionText: {
                type: String,
                default() {
                    return '';
                }
            },
            options: {
                type: Array,
                default() {
                    return [
                    ];
                }
            },
            optionValue: {
                type: String,
                default() {
                    return '';
                }
            },
            optionText: {
                type: String,
                default() {
                    return '';
                }
            },
            selectId: {
                type: String,
                default() {
                    return '';
                }
            },
            selectClass: {
                type: String,
                default() {
                    return 'form-control m-input m-input--square';
                }
            },
            name: {
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
            handleChange(e) {
                this.$emit('change', e.target.value)
            }
        }
    }
</script>
