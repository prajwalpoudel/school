<template>
    <div class="row">
        <div class="col-lg-12">
            <basic-portlet :title="'Select Grade and Section'">
                <template v-slot:content>
                    <ValidationObserver ref="observer" v-slot="{ errors, invalid }" tag="form">
                        <div class="form-group m-form__group row">
                        <div class="col-md-3">
                            <select-input
                                :label="'Select Grade'"
                                :disabled-option-text="'Select Grade'"
                                :options="grades"
                                :option-value="'id'"
                                :option-text="'name'"
                                :validation-rule="'required'"
                                :name="'grade_id'"
                                @change="handleGradeChange"
                            ></select-input>
                        </div>
                        <div class="col-md-3">
                            <select-input
                                :label="'Select Section'"
                                :disabled-option-text="'Select Section'"
                                :options="filteredSections"
                                :option-value="'id'"
                                :option-text="'name'"
                                :validation-rule="'required'"
                                :name="'section_id'"
                                @change="handleSectionChange"
                            ></select-input>
                        </div>
                        <div class="col-md-3">
                                <text-input
                                    :label="'Time Table Name'"
                                    :name="'name'"
                                    :validation-rule="'required'"
                                    @input="handleTimeTableInput"
                                ></text-input>
                        </div>
                        <div class="col-md-3">
                            <button type="button" @click="validateGradeSection" class="btn btn-accent mt-rem-2" data-toggle="modal" data-target="#weekDaysModal">Set Week Days</button>
                            <week-day-modal ref="weekDaysModal" :week-days="days" @workingDays="handleWorkingDays"></week-day-modal>
                        </div>
                    </div>
                    </ValidationObserver>
                </template>
            </basic-portlet>
        </div>
        <div class="col-lg-12">
            <basic-portlet :title="'Create Time Table'">
                <template v-slot:content>
                    <table class="table m-table m-table--head-no-border">
                        <thead>
                            <tr>
                                <th>
                                    <span >Period</span>
                                    <br>
                                    <span>Day</span>
                                </th>
                                <th v-for="period in periods">
                                    <span >{{period.name }}</span>
                                    <br>
                                    <span>{{'(' + period.start + ' - ' + period.end + ')'}}</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr v-for="(day, key) in formData.workingDays">
                            <td>
                                <strong>{{ day.name }}</strong>
                                <span v-html="addIconClass(checkRoutine(day), day)"></span>
                            </td>
                            <td v-for="period in periods">
                                Not Assigned
                            </td>
                            <create-modal :periods="periods" :subjects="filteredSubjects" :teachers="teachers" :day="day" :formData="formData"></create-modal>
                        </tr>
                        </tbody>
                    </table>
                    <edit-modal></edit-modal>
                </template>
            </basic-portlet>
        </div>


    </div>
</template>

<script>
    import BasicPortlet from "../../../../../../vue/general/portlets/basic";
    import SelectInput from "../../../../../../vue/general/inputs/select";
    import TextInput from "../../../../../../vue/general/inputs/text";
    import ModalButton from "../../../../../../vue/general/buttons/modalButton";
    import WeekDayModal from './weekDayModal'
    import CreateModal from './createModal'
    import EditModal from './editModal'
    import admin from "../../../api/admin";


    export default {
        components: {
            'basic-portlet': BasicPortlet,
            'select-input': SelectInput,
            'text-input': TextInput,
            'modal-button': ModalButton,
            'week-day-modal': WeekDayModal,
            'create-modal': CreateModal,
            'edit-modal': EditModal,
        },
        data() {
            return {
                periods: [
                    {'id': 1, 'name': '1st', 'start': '10:00', 'end': '10:40'},
                    {'id': 2, 'name': '2nd', 'start': '10:40', 'end': '11:20'},
                    {'id': 3, 'name': '3rd', 'start': '11:20', 'end': '12:00'},
                    {'id': 4, 'name': '4th', 'start': '12:00', 'end': '12:40'},
                    {'id': 5, 'name': 'Tiffin', 'start': '12:40', 'end': '01:20'},
                    {'id': 6, 'name': '5th', 'start': '01:20', 'end': '02:00'},
                    {'id': 7, 'name': '6th', 'start': '02:00', 'end': '02:40'},
                    {'id': 8, 'name': '7th', 'start': '02:40', 'end': '03:20'},
                    {'id': 9, 'name': '8th', 'start': '03:20', 'end': '04:00'}
                ],
                filteredSections: [],
                filteredSubjects: [],
                modalShow: false,
                formData: {
                    grade_id: '',
                    section_id: '',
                    name: '',
                    workingDays: []
                }
            }
        },
        props: {
            grades: {
                type: Array,
                default() {
                    return [];
                }
            },
            sections: {
                type: Array,
                default() {
                    return [];
                }
            },
            subjects: {
                type: Array,
                default() {
                    return [];
                }
            },
            teachers: {
                type: Array,
                default() {
                    return [];
                }
            },
            days: {
                type: Array,
                default() {
                    return [];
                }
            }
        },
        methods: {
            validateGradeSection() {
                this.$refs.observer.validate().then((valid) => {
                    if (valid) {
                        this.$refs.weekDaysModal.show()
                    }
                })

            },
            handleGradeChange(value) {
                let self = this;
                self.filteredSections = _.filter(this.sections, function(section) {
                    return section.grade_id == value;
                });
                self.filteredSubjects = _.filter(this.subjects, function(subject) {
                    return subject.grade_id == value;
                });
                self.formData.grade_id = value;
            },
            handleSectionChange(value) {
                let self = this;
                self.formData.section_id = value;
            },
            handleTimeTableInput(value) {
                let self = this;
                self.formData.name = value;
            },
            handleWorkingDays(data) {
                let self = this;
                self.formData.workingDays = data;
                admin.storeClassRoutine(self.formData).then(res => {
                    if (res.status == 200) {
                        alert('success');
                    }
                }).catch(res => {
                    if (res.response.status == 422) {
                        alert('Failure');
                    }

                });

            },
            checkRoutine(day) {
                return false;
            },
            addIconClass(value, day) {
                if(value) {
                    return '<i class="primary fa fa-edit-circle" data-toggle="modal" data-target="#editModal'+ day.id + '"></i>';
                }
                else {
                    return '<i class="success fa fa-plus-circle" data-toggle="modal" data-target="#createModal'+ day.id + '"></i>';
                }
            }
        },
    }
</script>
