<template>
        <!-- END CONTENT BODY -->
        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-purple font-white">
                        <h4 class="modal-title">Add New Card</h4>
                    </div>
                    <div class="modal-body">
                        <vue-element-loading :active="this.$store.state.modelloader" spinner="bar-fade-scale" color="#8E44AD" />
                        <div class="" id="errorsdiv" style="display: none;"></div>
                        <form action="javascript:;" class="ajaxform form-horizontal form-bordered ">
                            <input class="namefield" type="hidden" name="list_id" :value="this.$parent.list_id">
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
                            <div class="p-2">
                                <label for="">Card Title</label>
                                <input type="text" class="form-control namefield border-purple" name="name">
                            </div>
                            <div class="p-2">
                                <label for="">Card Description</label>
                                <textarea class="form-control border-purple" name="details"></textarea> 
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="submitbtn" @click="this.$parent.createcard" type="button" class="btn purple uppercase mt-ladda-btn ladda-button" data-style="zoom-in" data-dismiss="#">
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
</template>
<script>
   export default {
   }
</script>