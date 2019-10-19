<template>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box purple vld-parent" ref="formContainer">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fa fa-gift"></i> Change General Settings </div>
                        </div>
                        <div class="portlet-body form">
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
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
</template>
<script>
export default {
    data() {
        return {
            data: {}
        }
    },
    mounted() {
        this.$Progress.start();
        let loader = this.$loading.show({
            container: this.$refs.formContainer,
        });
        this.$loadScript(window.adminassets + "/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js")
            .then(() => {})
            .catch(() => {});
        axios.get(route('general.index'), {
                headers: {
                    'APP-TOKEN': '1l23f134b1'
                }
            })
            .then((data) => {
                this.data = data.data.general;
                this.$Progress.finish();
                loader.hide()
            })
            .catch((error) => {
                this.$Progress.fail();
                loader.hide()
            });
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
            ajax(route('general.update'), 'POST', formData, document.getElementById("submitbtn"), this);
        }
    }
}

</script>
