<template>
    <button type="button" :class="buttonClass" :id="buttonId" data-toggle="modal" :data-target="'#'+targetModal">Set WeekDays</button>
</template>

<script>
    export default {
        props: {
            targetModal: {
                type: String,
                default() {
                    return ''
                }
            },
            buttonClass: {
                type: String,
                default() {
                    return 'btn btn-accent';
                }
            },
            buttonId: {
                type: String,
                default() {
                    return '';
                }
            }
        }
    }
</script>
