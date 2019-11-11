<template>
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN TODO SIDEBAR -->
                    <div class="todo-ui">
                        <div class="todo-sidebar">
                            <div class="portlet box purple">
                                <div class="portlet-title">
                                    <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                                        <span class="caption-subject bold uppercase font-white"><i class="fa fa-list"></i> Lists</span>
                                        <span class="caption-helper visible-sm-inline-block visible-xs-inline-block font-white-sharp">click to view Board lists</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn white btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
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
                                                    <div class="singlelistitem">
                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <span class="listname font-purple">{{listname(list.name)}}</span>
                                                            </div>
                                                            <div class="col-sm-4 text-right">
                                                                <i class="glyphicon glyphicon-edit editicon font-purple" @click="editlist(index)"></i>
                                                                <i class="glyphicon glyphicon-trash deleteicon font-red-thunderbird" @click="deletelist(index)"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </perfect-scrollbar>
                                </div>
                            </div>
                        </div>
                        <div class="todo-content">
                            <div class="portlet box purple bordered">
                                <!-- PROJECT HEAD -->
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-bar-chart font-purple-sharp hide"></i>
                                        <span class="caption-subject font-white-sharp bold uppercase"><i class="fa fa-list"></i> Details</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn white btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                                <i class="icon-settings"></i>&nbsp;
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;"> New Task </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end PROJECT HEAD -->
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4">\
                                            <div class="todo-tasklist">
                                                <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                                    <img class="todo-userpic pull-left" src="" width="27px" height="27px">
                                                    <div class="todo-tasklist-item-title"> Slider Redesign </div>
                                                    <div class="todo-tasklist-item-text"> Lorem dolor sit amet ipsum dolor sit consectetuer dolore. </div>
                                                    <div class="todo-tasklist-controls pull-left">
                                                        <span class="todo-tasklist-date">
                                                            <i class="fa fa-calendar"></i> 21 Sep 2014 </span>
                                                        <span class="todo-tasklist-badge badge badge-roundless">Urgent</span>
                                                    </div>
                                                </div>
                                            </div>
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
            templateProps: {}

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
            this.templateProps = {};
            this.templateProps.createlist = this.createlist;
            this.templateProps.board_id = this.id;
            this.template = "<newlistmodel></newlistmodel>";
            this.$nextTick(() => {
                $('#static').modal('show');
            });
        },
        editlist(index) {
            this.templateProps = {};
            this.templateProps.updatelist = this.updatelist;
            this.template = "<editlistmodel></editlistmodel>";
            this.$nextTick(() => {
                $('.namefield').val(this.data.lists[index].name);
                $('.recfield').val(this.data.lists[index].id);
                $('#static').modal('show');
            });
        },
        deletelist(index) {
            ajaxmodel(route('list.delete', this.data.lists[index].id), 'GET', undefined, undefined, this, undefined, undefined);
        },
        createlist() {
            ajaxmodel(route('list.store'), 'POST', $('.ajaxform').serialize(), document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
        },
        updatelist() {
            ajaxmodel(route('list.update'), 'POST', $('.ajaxform').serialize(), document.getElementById("submitbtn"), this, $('#static'), 'modelloader');
        },
        listname(name) {
            console.log(name.substr())
            return name.substr(0, 12);
        }
    }
}

</script>
<style scoped="">
.listscroll {
    max-height: 300px;
    padding: 5px;
}

.listname {
    cursor: pointer;
}

.editicon,
.deleteicon {
    cursor: pointer;
}

.singlelistitem {
    padding: 10px 0px;
}

.singlelistitem:hover {
    background-color: #eee;
}

.singlelistitem a:hover.singlelistitem a:active {
    text-decoration: none;
}

</style>
