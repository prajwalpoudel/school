<template>
    <div :class="portletClass">
        <div :class="portletHeadClass">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        {{ this.title }}
                    </h3>
                </div>
            </div>
        </div>

        <div :class="portletBodyClass">
            <slot name="content"></slot>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            title: {
                type: String,
                default() {
                    return 'Title';
                }
            },
            portletClass: {
                type: String,
                default() {
                    return 'm-portlet m-portlet--mobile m-portlet--body-progress-';
                }
            },
            portletHeadClass: {
                type: String,
                default() {
                    return 'm-portlet__head';
                }
            },
            portletBodyClass: {
                type: String,
                default() {
                    return 'm-portlet__body';
                }
            }

        }
    }
</script>
