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
                                            <a class="font-purple" href="javascript:;" @click="addnew"> New Board </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tools">
                                <a href="javascript:;" class="reload font-purple" @click="__mounted"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <vue-element-loading :active="this.$store.state.pageloader" spinner="bar-fade-scale" color="#8E44AD" />
                            <div class="mt-element-card mt-card-round mt-element-overlay" style="display: block;">
                                <div class="row">
                                    <div v-for="(board,index) in data.data" :key="board.id" class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                        <div class="mt-card-item">
                                            <div class="mt-card-avatar mt-overlay-1">
                                                <img :src="boardsimg(board.img)" class="boardimages">
                                                <div class="mt-overlay">
                                                    <ul class="mt-info">
                                                        <li>
                                                            <router-link :to="{ name: 'timeline',params: { id: board.id } }">
                                                                <i class="glyphicon glyphicon-resize-full"></i>
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="mt-card-content">
                                                <h3 class="mt-card-name font-purple">{{board.name.substring(0,21)}}</h3>
                                                <p class="mt-card-desc font-grey-mint"></p>
                                                <div class="mt-card-social">
                                                    <ul>
                                                        <li>
                                                            <a href="javascript:;" @click="edit(index)">
                                                                <i class="glyphicon glyphicon-edit font-purple"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="javascript:;" @click="del(index)">
                                                                <i class="glyphicon glyphicon-trash font-red-thunderbird"></i>
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
        <v-runtime-template :templateProps="templateProps" :template="template"></v-runtime-template>

    </div>
    <!-- END CONTENT -->
</template>
<script>
import VRuntimeTemplate from "v-runtime-template";
import newboardmodal from "@/admin_components/boards/modals/newboardmodal";
import editboardmodal from "@/admin_components/boards/modals/editboardmodal";

export default {
    components :{
        'v-runtime-template' : VRuntimeTemplate,
        'newboardmodal' :newboardmodal,
        'editboardmodal' :editboardmodal
    },
    data() {
        return {
            data: {},
            template:'<newboardmodal></newboardmodal>',
            templateProps:{
            }
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
        addnewboard() {
            var form = document.querySelector('.ajaxform');
            var formData = new FormData(form);
            ajaxmodel(route('board.store'), 'POST', formData, document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
        },
        updateboard(){
            var form = document.querySelector('.ajaxform');
            var formData = new FormData(form);
            ajaxmodel(route('board.update'), 'POST', formData, document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
        },
        addnew() {
            this.templateProps={};
            this.addnewboard = this.addnewboard;
            this.template = "<newboardmodal></newboardmodal>";
            this.$nextTick(() =>{
                $('.fileinput').first().fileinput('clear');
                $('.namefield').val('');
                $('#static').modal('show');
            });
            
        },
        edit(e) {
            this.templateProps={};
            this.updateboard = this.updateboard;
            this.template = "<editboardmodal></editboardmodal>";
            this.$nextTick(() =>{
            $('.modalimg').attr('src', this.boardsimg(this.data.data[e].img));
            $('.namefield').val(this.data.data[e].name);
            $('.recfield').val(this.data.data[e].id);
            $('#static').modal('show');
            });
        },
        del(e) {
            ajaxmodel(route('board.delete',this.data.data[e].id), 'GET',undefined,undefined ,this,undefined,'pageloader');
        },
        boardsimg(img) {
            return window.storagepath + img;
        },
        substring(str) {
            return str.substr(0, 20);
        },
        __mounted(page = 1) {
            this.$loadScript(window.adminassets + "/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js")
                .then(() => {})
                .catch(() => {});
            ajaxmodel(route('board.index') + '?page=' + page, 'GET',undefined,undefined ,this,undefined,'pageloader');
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
