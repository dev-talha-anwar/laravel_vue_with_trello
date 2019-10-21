<template>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet box purple">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-users"></i>
                                Boards
                            </div>
                            <div class="actions">
                                <div class="btn-group">
                                    <a class="btn white btn-outline btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                        <i class="icon-settings"></i> &nbsp;
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li>
                                            <a href="javascript:;" @click="addnew"> New Board </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload font-purple" @click="__mounted"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <vue-element-loading :active="pageloader" spinner="bar-fade-scale" color="#8E44AD" />
                            <div class="mt-element-card mt-card-round mt-element-overlay" style="display: block;">
                                <div class="row">
                                    <div v-for="board in data.data" :key="board.id" class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
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
                                                            <a href="javascript:;" @click="edit($event.target)" :id="board.id">
                                                                <i class="glyphicon glyphicon-edit"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" @click="del($event.target)" :id="board.id">
                                                                <i class="glyphicon glyphicon-trash "></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="portlet-footer bg-white" style="text-align: center;">
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
                        <h4 class="modal-title">Add New Board</h4>
                    </div>
                    <div class="modal-body">
                        <vue-element-loading :active="modelloader" spinner="bar-fade-scale" color="#8E44AD" />
                        <div class="" id="errorsdiv" style="display: none;"></div>
                        <form action="#" class="ajaxform form-horizontal form-bordered ">
                            <div class="form-group last">
                                <label class="control-label col-md-3">Image</label>
                                <div class="col-md-9">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                            <img alt="" class="modalimg">
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
                            <input type="hidden" name="recid" class="recfield">
                            <div class="p-2">
                                <label for="">Title</label>
                                <input type="text" class="form-control namefield border-purple" name="name">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="submitbtn" v-on:click="submitform" type="button" class="btn purple uppercase mt-ladda-btn ladda-button" data-style="zoom-in">
                            <span class="ladda-label">
                                <i class="glyphicon glyphicon-saved"></i>
                                <span class="ladabtn-text">Create</span>
                            </span>
                            <span class="ladda-spinner"></span>
                        </button>
                        <button type="button" class="btn red-thunderbird" data-dismiss="modal">Cancel</button>
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
            data: {},
            flag: false,
            pageloader: false,
            modelloader: false
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
            if (this.flag) {
                ajax(route('board.store'), 'POST', formData, document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
            } else {
                ajax(route('board.update'), 'POST', formData, document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
            }
            $('.namefield').val('');
            $('.fileinput').first().fileinput('clear');
        },
        addnew() {
            $('.modalimg').attr('src', '');
            $('.namefield').val('');
            $('.recfield').val('');
            $('.ladabtn-text').html('Create');
            $('#static').modal('show');
            this.flag = true;
        },
        edit(e) {
            $('.fileinput').first().fileinput('clear');
            $('.modalimg').attr('src', $(e).parents('.mt-card-item').find('.boardimages').first().attr('src'));
            $('.namefield').val($(e).parents('.mt-card-item').find('h3').html());
            $('.recfield').val($(e).parent().first().attr('id'));
            $('.ladabtn-text').html('Update');
            $('#static').modal('show');
            this.flag = false;
        },
        del(e) {

        },
        boardsimg(img) {
            return window.storagepath + img;
        },
        substring(str) {
            return substr(str, 0, 20);
        },
        __mounted(page = 1) {
            this.$loadScript(window.adminassets + "/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js")
                .then(() => {})
                .catch(() => {});
            ajax(route('board.index') + '?page=' + page, 'GET',undefined,undefined ,this,undefined,'pageloader');
        }
    }
}

</script>
<style scoped="">
.boardimages {
    width: 100% !important;
    height: 130px !important;
}

@media only screen and (max-width: 768px) {
    .boardimages {
        width: 100% !important;
        height: auto !important;
    }
}

.reload {
    margin: 0px 10px;
}

</style>
