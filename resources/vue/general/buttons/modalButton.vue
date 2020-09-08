<template>
    <button type="button" :class="buttonClass" :id="buttonId" data-toggle="modal" :data-target="'#'+targetModal">{{ buttonName}}</button>
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
            buttonName: {
                type: String,
                default() {
                    return 'Button';
                }
            },
            buttonId: {
                type: String,
                default() {
                    return 'button';
                }
            }
        }
    }
</script>
