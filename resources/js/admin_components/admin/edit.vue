<template>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE BASE CONTENT -->
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box purple bordered vld-parent" ref="formContainer">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-users"></i>
                                Edit Profile
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload font-purple" @click="__mounted"></a>
                            </div>
                        </div>
                        <div class="portlet-body form">
                            <div class="" id="errorsdiv" style="display: none;"></div>
                            <form autocomplete="off" class="ajaxform form-horizontal form-bordered" role="form">
                                <div class="form-body">
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Name</label>
                                        <div class="col-md-9 form-group form-md-line-input has-success">
                                            <div class="input-icon right">
                                                <input type="text" class="form-control border-purple" name="name" :value="data.name">
                                                <i class="icon-user font-purple"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group last">
                                        <label class="control-label col-md-3">Enter New Password</label>
                                        <div class="col-md-9 form-group form-md-line-input has-success">
                                            <div class="input-icon right">
                                                <input name="password" type="text" class="form-control border-purple" id="password_strength">
                                                <i class="icon-key font-purple"></i>
                                            </div>
                                        </div>
                                    </div>
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
    props: [
        'id'
    ],
    data() {
        return {
            data: {},
        }
    },
    mounted() {
        this.__mounted();
    },
    methods: {
        submitform() {
            ajax(route('admin.update', this.id), 'PUT', $('.ajaxform').serialize(), document.getElementById("submitbtn"), this);
        },
        __mounted() {
            this.$Progress.start();
            let loader = this.$loading.show({
                container: this.$refs.formContainer,
            });
            this.$loadScript(window.adminassets + "/global/plugins/bootstrap-pwstrength/pwstrength-bootstrap.min.js")
                .then(() => {})
                .catch(() => {});
            axios.get(route('admin.edit', this.id))
                .then((data) => {
                    this.data = data.data.admin;
                    $('#password_strength').pwstrength();
                    this.$Progress.finish();
                    loader.hide();
                })
                .catch((error) => {
                    this.$Progress.fail();
                    loader.hide()
                });
        }
    }
}

</script>
