<template>
    <portlets @handleSubmit="handleSubmit" :head-title="'Register'" :form="true" :portlet-class="'col-md-8 offset-xl-2'">
        <template v-slot:content>
            <div class="form-group m-form__group row">
                <input-text @input="input($event, 'first_name')" :label="'First Name'" :type="'text'" :form-class="'col-md-6'" ></input-text>
                <input-text @input="input($event, 'last_name')" :label="'Last Name'" :type="'text'" :form-class="'col-md-6'"></input-text>
            </div>
            <div class="form-group m-form__group row">
                <input-text @input="input($event, 'email')" :label="'Email'" :type="'email'" :form-class="'col-md-12'"></input-text>
            </div>
            <div class="form-group m-form__group row">
                <bootstrap-select :form-class="'col-md-12'" :label="'Role'" :label-for="'Role'" :name="'role_id'" :select-id="'roles'" :options="roles" ></bootstrap-select>
            </div>
            <div class="form-group m-form__group row">
                <input-text @input="input($event, 'password')" :label="'Password'" :type="'password'" :form-class="'col-md-12'"></input-text>
            </div>
            <div class="form-group m-form__group row">
                <input-text @input="input($event, 'confirm_password')" :label="'Confirm Password'" :type="'password'" :form-class="'col-md-12'"></input-text>
            </div>
        </template>
        <template v-slot:footer>
            <hr>
            <div class="m-form__actions">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </template>
    </portlets>
</template>

<script>
    import Portlets from "../base/portlets";
    import InputText from '../base/inputs/text'
    import BootstrapSelect from '../base/inputs/bootstrapSelect'
    import front from "../../api/front";
    export default {
        data() {
            return {
                formData : {
                    'first_name' : null,
                    'last_name' : null,
                    'email' : null,
                    'password' : null,
                    'role_id' : 2,
                    'confirm_password' : null
                }
            }
        },
        props: {
          roles: {
              type: Array,
              default: []
          }
        },
        components : {
            'portlets' : Portlets,
            'input-text' : InputText,
            'bootstrapSelect' : BootstrapSelect
        },
        methods : {
            input(val, key) {
                this.formData[key] = val;
            },
            handleSubmit() {
                let self = this;
                front.register(self.formData).then(res => {
                    window.location.href = baseUrl + res.data.redirect;
                }).catch(res => {

                });
            }
        }
    }
</script>
