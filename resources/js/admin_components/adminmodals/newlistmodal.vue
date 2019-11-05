<template>
        <!-- END CONTENT BODY -->
        <div id="static" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-purple font-white">
                        <h4 class="modal-title">Add New List</h4>
                    </div>
                    <div class="modal-body">
                        <vue-element-loading :active="this.$store.state.modelloader" spinner="bar-fade-scale" color="#8E44AD" />
                        <div class="" id="errorsdiv" style="display: none;"></div>
                        <form action="javascript:;" class="ajaxform form-horizontal form-bordered ">
                            <input type="hidden" name="board_id" :value="this.$parent.board_id">
                            <div class="p-2">
                                <label for="">List Name</label>
                                <input type="text" class="form-control namefield border-purple" name="name" value="">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button id="submitbtn" @click="this.$parent.createlist" type="button" class="btn purple uppercase mt-ladda-btn ladda-button" data-style="zoom-in" data-dismiss="#">
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