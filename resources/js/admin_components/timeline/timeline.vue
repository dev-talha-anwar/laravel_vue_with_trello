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
                                                                <span class="listname font-purple" @click="listdetail(index)">{{listname(list.name)}}</span>
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
                                        <span class="caption-subject font-white-sharp bold uppercase"><i class="fa fa-list"></i> List Details</span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            <a class="btn white btn-outline btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                                                <i class="icon-settings"></i>&nbsp;
                                                <i class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="javascript:;" @click="addnewcard" id=""> New Card </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end PROJECT HEAD -->
                                <div class="portlet-body">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-4">
                                            <div class="todo-tasklist">
                                                <div v-for="(card,index) in this.cards" class="todo-tasklist-item todo-tasklist-item-border-red" @click="carddetails(index)">
                                                    <img class="todo-userpic pull-left" :src="cardpic(card.image)" width="30px" height="30px">
                                                    <div class="todo-tasklist-item-title font-purple"> {{card.name}} </div>
                                                    <div class="todo-tasklist-item-text"> {{card.details}} </div>
                                                    <div class="todo-tasklist-controls pull-left">
                                                        <span class="todo-tasklist-date">
                                                            <i class="fa fa-calendar"></i> {{card.updated_at}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-8">
                                            <!-- TASK HEAD -->
                                            <template v-if="selectedcardstatus">
                                            <div class="form">
                                                <div class="form-group">
                                                    <div class="todo-taskbody-user">
                                                        <img class="todo-userpic" :src="cardpic(this.cards[this.selectedcard].image)" width="50px" height="50px">
                                                        <span class="todo-username">{{this.cards[this.selectedcard].name}}</span>
                                                    </div>
                                                </div>
                                                <!-- END TASK HEAD -->
                                                <!-- TASK DESC -->
                                                <div class="form-group">
                                                    <input type="text" class="form-control todo-taskbody-tasktitle" :value="this.cards[this.selectedcard].name">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control todo-taskbody-taskdesc" rows="8" placeholder="Task Description...">{{this.cards[this.selectedcard].details}}</textarea>
                                                </div>
                                                <!-- END TASK DESC -->
                                                <!-- TASK TAGS -->
                                                <div class="form-actions right todo-form-actions">
                                                    <button class="btn btn-circle btn-sm purple">Save Changes</button>
                                                    <button class="btn btn-circle btn-sm red-thunderbird">Cancel</button>
                                                </div>
                                            </div>
                                            <div class="tabbable-line">
                                                <ul class="nav nav-tabs ">
                                                    <li class="active">
                                                        <a href="#tab_1" data-toggle="tab"> Comments </a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab_1">
                                                        <!-- TASK COMMENTS -->
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <ul class="media-list">
                                                                    <li class="media" v-for="(comment,index) in this.comments">
                                                                        <a class="pull-left" href="javascript:;">
                                                                            <img class="todo-userpic" :src="cardpic(this.cards[this.selectedcard].image)" width="27px" height="27px"> </a>
                                                                        <div class="media-body todo-comment">
                                                                            <button type="button" class="todo-comment-btn btn btn-circle purple btn-sm">&nbsp; Edit &nbsp;</button>
                                                                            <p class="todo-comment-head">
                                                                                <span class="todo-comment-username">{{comment.admins.name}}</span> &nbsp;
                                                                                <span class="todo-comment-date">{{comment.updated_at}}</span>
                                                                            </p>
                                                                            <p class="todo-text-color"> {{comment.comment}} </p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- END TASK COMMENTS -->
                                                        <!-- TASK COMMENT FORM -->
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <ul class="media-list">
                                                                    <li class="media">
                                                                        <a class="pull-left" href="javascript:;">
                                                                            <img class="todo-userpic" :src="cardpic(this.cards[this.selectedcard].image)" width="27px" height="27px"> </a>
                                                                        <div class="media-body">
                                                                            <textarea class="form-control todo-taskbody-taskdesc" rows="4" placeholder="Type comment...">
                                                                            </textarea>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <button type="button" class="pull-right btn btn-sm btn-circle purple"> &nbsp; Submit &nbsp; </button>
                                                            </div>
                                                        </div>
                                                        <!-- END TASK COMMENT FORM -->
                                                    </div>
                                                </div>
                                            </div>
                                            </template>
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
import newcardmodel from "@/admin_components/timeline/modals/newcardmodal";
import editlistmodel from "@/admin_components/timeline/modals/editlistmodal";
export default {
    props: [
        'id'
    ],
    components: {
        'v-runtime-template': VRuntimeTemplate,
        'newlistmodel': newlistmodel,
        'newcardmodel': newcardmodel,
        'editlistmodel': editlistmodel,
    },
    data() {
        return {
            data: {
                lists: {},
            },
            template: '<newlistmodel></newlistmodel>',
            templateProps: {},
            listid: null,
            cards: {},
            selectedcard: null,
            selectedcardstatus:false,
            comments: {}
        }
    },
    mounted() {
        this.__mounted();
    },
    head: {
        link: [
            { r: 'stylesheet', h: window.adminassets + '/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css', t: 'text/css' },
            { r: 'stylesheet', h: window.adminassets + '/apps/css/todo-2.min.css', t: 'text/css' }
        ]
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
            ajaxmodel(route('list.delete', this.data.lists[index]), 'GET', undefined, undefined, this, undefined, undefined);
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
        },
        listdetail(index) {
            this.listid = index;
            this.selectedcard = null;
            this.selectedcardstatus = false;
            ajaxmodel(route('list.show', this.data.lists[index].id), 'GET', undefined, undefined, this, undefined, undefined, 'cards');

        },
        addnewcard() {
            if (this.listid != null) {
                this.$loadScript(window.adminassets + "/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js")
                    .then(() => {})
                    .catch(() => {});
                this.templateProps = {};
                this.templateProps.createcard = this.createcard;
                this.templateProps.list_id = this.data.lists[this.listid].id;
                this.template = "<newcardmodel></newcardmodel>";
                this.$nextTick(() => {
                    $('#static').modal('show');
                });
            }

        },
        createcard() {
            var form = document.querySelector('.ajaxform');
            var formData = new FormData(form);
            ajaxmodel(route('card.store'), 'POST', formData, document.getElementById("submitbtn"), this, $('#static'), 'modelloader', 'cards');
        },
        cardpic(image) {
            return window.storagepath + image;
        },
        carddetails(index) {
            this.selectedcard = index;
            ajaxmodel(route('card.show', this.cards[index].id), 'GET', undefined, undefined, this, undefined, undefined, 'comments');
            this.selectedcardstatus = true;
        }
    }
}

</script>
<style scoped="">
.listscroll {
    max-height: 300px;
    padding: 5px;
}

.editicon,
.deleteicon,
.listname {
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
