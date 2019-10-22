<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box purple " >
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> Change General Settings 
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload font-purple" @click="__mounted"></a>
                            </div>

                        </div>
                        <div class="portlet-body form">
                            <vue-element-loading :active="pageloader" spinner="bar-fade-scale" color="#8E44AD"/>
                            <div class="" id="errorsdiv" style="display: none;"></div>
                            <form action="#" class="ajaxform form-horizontal form-bordered ">
                                <div class="form-body">
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Logo</label>
                                        <div class="col-md-9">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img :src="logo" alt=""> </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                <div>
                                                    <span class="btn default btn-file">
                                                        <span class="fileinput-new"> Select image </span>
                                                        <span class="fileinput-exists"> Change </span>
                                                        <input type="file" name="logo"> </span>
                                                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <template v-for="(item,index) in data.social_links">
                                        <div class="form-group last">
                                            <label class="control-label col-md-3">{{index}}</label>
                                            <div class="col-md-9 form-group form-md-line-input has-success">
                                                <div class="input-icon right">
                                                    <input type="text" class="form-control border-purple" :placeholder="index" :name="index" :value="item">
                                                    <i class="icon-star font-purple"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                                <button id="submitbtn" v-on:click="submitform" type="button" class="btn purple uppercase mt-ladda-btn ladda-button" data-style="zoom-in">
                                                    <span class="ladda-label">
                                                        <i class="glyphicon glyphicon-saved"></i>
                                                        Update
                                                    </span>
                                                    <span class="ladda-spinner"></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            data: {},
            pageloader : false
        }
    },
    mounted() {
        this.__mounted();
    },
    head: {
        link: [
            { r: 'stylesheet', h: window.adminassets + '/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css', t: 'text/css' }
        ]
    },
    computed: {
        logo() {
            return window.storagepath + this.data.logo;
        }
    },
    destroy() {
        this.$unloadScript(window.adminassets + "/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js").then(() => {}).catch(() => {});
    },
    methods: {
        submitform() {
            var form = document.querySelector('.ajaxform');
            var formData = new FormData(form);
            ajax(route('general.update'), 'POST', formData, document.getElementById("submitbtn"), this,null,'pageloader');
        },
        __mounted() {
            this.$Progress.start();
            this.pageloader = true;
            this.$loadScript(window.adminassets + "/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js")
                .then(() => {})
                .catch(() => {});
            ajax(route('general.index'), 'GET',undefined,undefined ,this,undefined,'pageloader');
        }
    }
}

</script>
