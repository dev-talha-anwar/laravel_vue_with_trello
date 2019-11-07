<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN TODO SIDEBAR -->
                    <div class="todo-ui">
                        <div class="todo-sidebar">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                        <span class="caption-subject font-green-sharp bold uppercase">Lists</span>
                                        <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view Board lists</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green btn-circle btn-outline btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                                <i class="icon-settings"></i> &nbsp;
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;" @click="addnewlist"> New List </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body todo-project-list-content">
                                    <perfect-scrollbar class="listscroll">
                                        <div class="todo-project-list">
                                            <ul class="nav nav-stacked">
                                                <li v-for="(list,index) in data.lists">
                                                    <div>
                                                        <a href="javascript:;" class="float-left">{{list.name}}</a>
                                                        <span class="float-right">
                                                            <i class="glyphicon glyphicon-edit editicon" @click="editlist(index)"></i>
                                                            <i class="glyphicon glyphicon-trash deleteicon" @click="deletelist(index)"></i>
                                                        </span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </perfect-scrollbar>
                                </div>
                            </div>
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                        <span class="caption-subject font-green-sharp bold uppercase">Teams </span>
                                        <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view Teams</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green btn-circle btn-outline btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                                <i class="icon-settings"></i> &nbsp;
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> New Team </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Archived Teams </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body todo-project-list-content" style="height: auto;">
                                    <div class="todo-project-list">
                                        <ul class="nav nav-stacked">
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="todo-content">
                            <div class="portlet light bordered">
                                <!-- PROJECT HEAD -->
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-green-sharp hide"></i>
                                        <span class="caption-subject font-green-sharp bold uppercase">Details</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> MANAGE
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> New Task </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Pending
                                                        <span class="badge badge-danger"> 4 </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Completed
                                                        <span class="badge badge-success"> 12 </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:;"> Overdue
                                                        <span class="badge badge-warning"> 9 </span>
                                                    </a>
                                                </li>
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Delete Project </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end PROJECT HEAD -->
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4">
                                        </div>
                                        <div class="col-md-7 col-sm-8">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <v-runtime-template :templateProps="templateProps" :template="template"></v-runtime-template>
    </div>
</template>
<script>
import VRuntimeTemplate from "v-runtime-template";
import newlistmodel from "@/admin_components/timeline/modals/newlistmodal";
import editlistmodel from "@/admin_components/timeline/modals/editlistmodal";
export default {
    props: [
        'id'
    ],
    components: {
        'v-runtime-template': VRuntimeTemplate,
        'newlistmodel': newlistmodel,
        'editlistmodel': editlistmodel,
    },
    data() {
        return {
            data: {
                lists: {},
                teams: {}
            },
            template: '<newlistmodel></newlistmodel>',
            templateProps:{
            }

        }
    },
    mounted() {
        this.__mounted();
    },
    methods: {
        __mounted() {
            ajaxmodel(route('board.show', this.id), 'GET', undefined, undefined, this, undefined, 'pageloader');
        },
        addnewlist() {
            this.templateProps={};
            this.templateProps.createlist = this.createlist;
            this.templateProps.board_id= this.id;
            this.template = "<newlistmodel></newlistmodel>";
            this.$nextTick(() =>{
                $('#static').modal('show');
            });
        },
        editlist(index){
            this.templateProps={};
            this.templateProps.updatelist = this.updatelist;
            this.template = "<editlistmodel></editlistmodel>";
            this.$nextTick(() =>{
                $('.namefield').val(this.data.lists[index].name);
                $('.recfield').val(this.data.lists[index].id);
                $('#static').modal('show');
            });
        },
        deletelist(index){
            ajaxmodel(route('list.delete',this.data.lists[index].id), 'GET', undefined, undefined, this, undefined, undefined);
        },
        createlist() {
            ajaxmodel(route('list.store'), 'POST', $('.ajaxform').serialize(), document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
        },
        updatelist(){
            ajaxmodel(route('list.update'), 'POST', $('.ajaxform').serialize(), document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
        }
    }
}

</script>
<style scoped="">
.listscroll {
    max-height: 250px;
}
.editicon,.deleteicon{
    cursor: pointer;
}
</style>
