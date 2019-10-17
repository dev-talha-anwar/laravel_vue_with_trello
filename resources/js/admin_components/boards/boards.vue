<template>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <div class="caption font-purple">
                                <i class="icon-users font-purple"></i>
                                Boards
                            </div>
                            <div class="actions font-purple">
                                <div class="btn-group">
                                    <a class="btn purple btn-circle btn-outline btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                        <i class="icon-settings"></i> &nbsp;
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a data-toggle="modal" href="#static"> New Board </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload font-purple" @click="__mounted"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="mt-element-card mt-card-round mt-element-overlay" style="display: block;">
                                <div class="row">
                                    <template v-for="board in data.data">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="mt-card-item">
                                                <div class="mt-card-avatar mt-overlay-1">
                                                    <img :src="boardsimg(board.img)" class="boardimages">
                                                    <div class="mt-overlay">
                                                        <ul class="mt-info">
                                                            <li>
                                                                <a class="btn default btn-outline" href="javascript:;">
                                                                    <i class="glyphicon glyphicon-resize-full"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mt-card-content">
                                                    <h3 class="mt-card-name">{{board.name.substring(0,21)}}</h3>
                                                    <p class="mt-card-desc font-grey-mint"></p>
                                                    <div class="mt-card-social">
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="glyphicon glyphicon-edit"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="glyphicon glyphicon-trash "></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-footer" style="text-align: center;">
                            <pagination :data="data" @pagination-change-page="__mounted" align="center"></pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-purple font-white">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Add New Board</h4>
                    </div>
                    <div class="modal-body vld-parent" ref="formContainer">
                        <div class="" id="errorsdiv" style="display: none;"></div>
                        <form action="#" class="ajaxform form-horizontal form-bordered ">
                            <div class="form-group last">
                                <label class="control-label col-md-3">Image</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img alt="">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                        <div>
                                            <span class="btn default btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="image"> </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2">
                                <label for="">Title</label>
                                <input type="text" class="form-control border-purple" name="name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="submitbtn" v-on:click="submitform" type="button" class="btn purple uppercase mt-ladda-btn ladda-button" data-style="zoom-in">
                            <span class="ladda-label">
                                <i class="glyphicon glyphicon-saved"></i>
                                Create
                            </span>
                            <span class="ladda-spinner"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
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
    computed: {

    },
    mounted() {
        this.__mounted();
    },
    head: {
        link: [
            { r: 'stylesheet', h: window.adminassets + '/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css', t: 'text/css' }
        ]
    },
    methods: {
        submitform() {
            var form = document.querySelector('.ajaxform');
            var formData = new FormData(form);
            ajax(route('board.store'), 'POST', formData, document.getElementById("submitbtn"), this, $('#static'));
            $('.fileinput').fileupload('reset');
        },
        boardsimg(img) {
            return window.storagepath + img;
        },
        substring(str) {
            return substr(str, 0, 20);
        },
        __mounted(page = 1) {
            this.$Progress.start();
            let loader = this.$loading.show({
                container: this.$refs.formContainer,
            });
            this.$loadScript(window.adminassets + "/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js")
                .then(() => {})
                .catch(() => {});
            axios.get(route('board.index') + '?page=' + page, {
                    headers: {
                        'APP-TOKEN': '1l23f134b1'
                    }
                })
                .then((data) => {
                    this.data = data.data.data;
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
<style scoped="">
.boardimages {
    width: auto !important;
    height: 150px !important;
}

.reload {
    margin: 0px 10px;
}

</style>
