<template>
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light bordered vld-parent" ref="formContainer">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="icon-users"></i>
                                Boards
                            </div>
                            <div class="actions">
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
                        </div>
                        <div class="portlet-body">
                            <div class="mt-element-card mt-card-round mt-element-overlay" style="display: block;">
                                <div class="row">
                                    <template v-for="board in data">
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                            <div class="mt-card-item">
                                                <div class="mt-card-avatar mt-overlay-1">
                                                    <img :src="boardsimg(img)">
                                                    <div class="mt-overlay">
                                                        <ul class="mt-info">
                                                            <li>
                                                                <a class="btn default btn-outline" href="javascript:;">
                                                                    <i class="icon-magnifier"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="btn default btn-outline" href="javascript:;">
                                                                    <i class="icon-link"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="mt-card-content">
                                                    <h3 class="mt-card-name">Jennifer Lawrence</h3>
                                                    <p class="mt-card-desc font-grey-mint">Creative Director</p>
                                                    <div class="mt-card-social">
                                                        <ul>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-social-facebook"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-social-twitter"></i>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;">
                                                                    <i class="icon-social-dribbble"></i>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- END CONTENT BODY -->
        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <div class="modal-body">
                        <p> Would you like to continue with some arbitrary task? </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn purple">Continue Task</button>
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
        boardsimg(img) {
            data: {}
        }
    },
    mounted() {
        this.$Progress.start();
        let loader = this.$loading.show({
            container: this.$refs.formContainer,
        });
        axios.get(route('board.index'))
            .then((data) => {
                this.data = data.data.boards;
                this.$Progress.finish();
                loader.hide();
            })
            .catch((error) => {
                this.$Progress.fail();
                loader.hide()
            });
    },
    methods: {
        paginate(page = 1) {
            ajax(route('board.index') + '?page=' + page, 'GET', '', '', this);
        }
    }
}

</script>
