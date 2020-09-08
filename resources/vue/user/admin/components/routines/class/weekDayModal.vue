<template>
    <div v-if="modalShow" class="modal fade" id="weekDaysModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Select Week Days</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table m-table m-table--head-no-border">
                        <thead>
                            <th>Is Class</th>
                            <th>Week Days</th>
                        </thead>
                        <tbody>
                            <tr v-for="(day, key) in weekDays">
                                <td>
                                    <input type="checkbox" :value="day.id" v-model="workingDays[key]">
                                </td>
                                <td>
                                    {{ day.name }}
                                </td>
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
    export default {
        data() {
            return{
                workingDays: [],
                modalShow: false
            }
        },

        props: {
            weekDays: {
                type: Array,
                default() {
                    return [];
                }
            },
        },
        methods: {
            handleSave() {
                let self = this;
                var data = [];
                _.forEach(self.weekDays, function(day, key) {
                    if(self.workingDays[key] == true) {
                        data.push(self.weekDays[key]);
                    }
                });
                this.$emit('workingDays', data);
                document.getElementById('closeWeekDayModal').click();
            },
            show() {
                this.modalShow = true;
            },
            hide() {
                this.modalShow = false;
            }
        }
    }
</script>
