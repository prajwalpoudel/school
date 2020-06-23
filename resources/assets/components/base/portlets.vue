<template>
    <div :class="'m-portlet ' + portletClass ">
        <div v-if="headTitle" :class="'m-portlet__head ' + headClass">
            <div :class="'m-portlet__head-caption ' + headCaptionClass ">
                <div :class="'m-portlet__head-title ' + headTitleClass">
                    <span v-if="headIcon" :class="'m-portlet__head-icon ' +  headIconClass ">
                            <i :class="headIcon"></i>
                        </span>
                    <h3 :class="'m-portlet__head-text ' + headTitleTextClass">
                        {{ headTitle }}
                    </h3>
                </div>
            </div>
        </div>
        <form v-if="form" :class="'m-form m-form--label-align-right ' + formClass" @submit.prevent="handleSubmit()">
            <div :class="'m-portlet__body ' + bodyClass">
                <slot name="content"></slot>
            </div>
            <div :class="'m-portlet__foot' + footerClass">
                <slot name="footer"></slot>
            </div>
        </form>
        <template v-else>
            <div :class="'m-portlet__body ' + bodyClass">
                <slot name="content"></slot>
            </div>
            <div v-if="footer" :class="'m-portlet__foot' + footerClass">
                {{ footer }}
            </div>
        </template>
    </div>
</template>

<script>
    export default {
        methods : {
          handleSubmit() {
              this.$emit('handleSubmit');
          }
        },
        props : {
            portletClass : {
                type : String,
                default : null,
            },
            headTitle : {
                type : String,
                default : null,
            },
            headClass : {
                type : String,
                default : null,
            },
            headCaptionClass : {
                type : String,
                default : null,
            },
            headTitleClass : {
                type : String,
                default : null,
            },
            headIcon : {
                type : String,
                default : null,
            },
            headIconClass : {
                type : String,
                default : null,
            },
            headTitleTextClass : {
                type : String,
                default : null,
            },
            form : {
                type : Boolean,
                default : false,
            },
            formClass : {
                type : String,
                default : null,
            },
            content : {
                type : String,
                default : null,
            },
            bodyClass : {
                type : Boolean,
                default : false,
            },
            footer : {
                type : String,
                default : null,
            },
            footerClass : {
                type : String,
                default : null,
            },
        }
    }
</script>
