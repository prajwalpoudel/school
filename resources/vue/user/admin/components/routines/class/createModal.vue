<template>
    <div class="modal fade" :id="'createModal'+day.id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ day.name + ' Routine'}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table m-table m-table--head-no-border">
                        <thead>
                            <tr>
                                <th>Period</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(period, key) in periods">
                                <th>
                                    {{ period.name + '(' + period.start + ' - ' + period.end + ')' }}
                                    {{ handlePeriodId(key, period.id) }}
                                </th>
                                <th>
                                    <select-input
                                        :label="''"
                                        :disabled-option-text="'Select Subject'"
                                        :options="subjects"
                                        :option-value="'id'"
                                        :option-text="'name'"
                                        :name="'subject_id'"
                                        @change="handleSubjectChange(key, $event)"
                                    ></select-input>
                                </th>
                                <th>
                                    <select-input
                                        :label="''"
                                        :disabled-option-text="'Select Teachers'"
                                        :options="teachers"
                                        :option-value="'id'"
                                        :option-text="'name'"
                                        :name="'teacher_id'"
                                        @change="handleTeacherChange(key, $event)"
                                    ></select-input>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeWeekDayModal" data-dismiss="modal">Close</button>
                    <button @click="handleSave" type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SelectInput from "../../../../../../vue/general/inputs/select";
    import admin from "../../../api/admin";

    export default {
        data() {
            return {
                routines: [],
        }
        },
        components: {
            'select-input': SelectInput
        },
        props: {
            periods: {
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
            day: {
                type: Object,
                default() {
                    return {};
                }
            },
            formData: {
                type: Object,
                default() {
                    return {};
                }
            }
        },
        methods: {
            handleSave() {
                let self = this;
                admin.storeClassRoutine(self.routines)
            },
            handleSubjectChange(key, value) {
                let self = this;
                self.routines[key].subject_id = value
            },
            handleTeacherChange(key, value) {
                this.routines[key].teacher_id = value
            },
            handlePeriodId(key, value) {
                let self = this;
                this.routines[key] = {
                    'period_id': value,
                    'day' : self.day.id,
                };
            }
        }
    }
</script>
