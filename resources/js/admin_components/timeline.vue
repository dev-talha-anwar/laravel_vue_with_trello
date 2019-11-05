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
                                                <li class="divider"> </li>
                                                <li>
                                                    <a href="javascript:;"> Archived Lists </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body todo-project-list-content" style="height: auto;">
                                    <div class="todo-project-list">
                                        <ul class="nav nav-stacked">
                                            <li v-for="list in data.lists">
                                                <a href="javascript:;">{{list.name}}</a>
                                            </li>
                                        </ul>
                                    </div>
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
        <v-runtime-template :templateProps="templateprops" :template="template"></v-runtime-template>
    </div>
</template>
<script>
import VRuntimeTemplate from "v-runtime-template";
import newlistmodel from "@/admin_components/adminmodals/newlistmodal";
export default {
    props: [
        'id'
    ],
    components :{
        'v-runtime-template' : VRuntimeTemplate,
        'newlistmodel' :newlistmodel
    },
    data() {
        return {
            data: {
               lists :{},
               teams :{}
            },
            template:'<newlistmodel></newlistmodel>',
            templateprops: {
                'board_id':this.id
            },
        }
    },
    mounted() {
      this.__mounted();
    },
    methods: {
        createlist(){
            ajaxmodel(route('list.store'), 'POST', $('.ajaxform').serialize() , document.getElementById("submitbtn"), this, $('#static') ,'modelloader');
        },
        __mounted(){
            ajax(route('board.show',this.id), 'GET',undefined,undefined ,this,undefined,'pageloader');
        },
        addnewlist(){
            $('#static').modal('show');
        }
    }
}

</script>
