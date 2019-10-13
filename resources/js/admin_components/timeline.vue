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
                        <span class="caption-subject font-green-sharp bold uppercase">Boards </span>
                        <span class="caption-helper visible-sm-inline-block visible-xs-inline-block">click to view Boards</span>
                     </div>
                     <div class="actions">
                        <div class="btn-group">
                           <a class="btn green btn-circle btn-outline btn-sm todo-projects-config" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false">
                           <i class="icon-settings"></i> &nbsp;
                           <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu pull-right">
                              <li>
                                 <a href="javascript:;"> New Board </a>
                              </li>
                              <li class="divider"> </li>
                              <li>
                                 <a href="javascript:;"> Archived Boards </a>
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
               <div class="portlet light bordered">
                  <div class="portlet-title">
                     <div class="caption" data-toggle="collapse" data-target=".todo-project-list-content">
                        <span class="caption-subject font-green-sharp bold uppercase">Lists </span>
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
                                 <a href="javascript:;"> New List </a>
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
                           <li>
                              <a href="javascript:;">
                              <span class="badge badge-info"> 6 </span> AirAsia Ads </a>
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
                           <div class="todo-tasklist">
                              <div class="todo-tasklist-item todo-tasklist-item-border-green">
                                 <div class="portlet">
                                    <div class="portlet-title">
                                       <div class="caption">
                                          <i class="icon-bar-chart font-green-sharp hide"></i>
                                          <span class="caption-subject font-green-sharp bold uppercase">Details</span>
                                       </div>
                                       <div class="actions">
                                          <div class="btn-group">
                                             <a class="btn btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Options
                                             <i class="fa fa-angle-down"></i>
                                             </a>
                                             <ul class="dropdown-menu pull-right">
                                                <li>
                                                   <a href="javascript:;"> New Task </a>
                                                </li>
                                                <li class="divider"> </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="portlet-body">
                                       dasdasd
                                    </div>
                                 </div>
                                 <div class="portlet">
                                    <div class="portlet-title">
                                       <div class="caption">
                                          <i class="icon-bar-chart font-green-sharp hide"></i>
                                          <span class="caption-subject font-green-sharp bold uppercase">Details</span>
                                       </div>
                                       <div class="actions">
                                          <div class="btn-group">
                                             <a class="btn green btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Options
                                             <i class="fa fa-angle-down"></i>
                                             </a>
                                             <ul class="dropdown-menu pull-right">
                                                <li>
                                                   <a href="javascript:;"> New Task </a>
                                                </li>
                                                <li class="divider"> </li>
                                             </ul>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="portlet-body">
                                       dasdasd
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="todo-tasklist-devider"> </div>
                        </div>
                        <div class="col-md-7 col-sm-8">
                           <form action="#" class="form-horizontal">
                              <!-- TASK HEAD -->
                              <div class="form">
                                 <div class="form-group">
                                    <div class="col-md-8 col-sm-8">
                                       <div class="todo-taskbody-user">
                                          <img class="todo-userpic pull-left" :src=adminassets"/pages/media/users/avatar6.jpg" width="50px" height="50px">
                                          <span class="todo-username pull-left">Vanessa Bond</span>
                                          <button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp;edit&nbsp;</button>
                                       </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                       <div class="todo-taskbody-date pull-right">
                                          <button type="button" class="todo-username-btn btn btn-circle btn-default btn-sm">&nbsp; Complete &nbsp;</button>
                                       </div>
                                    </div>
                                 </div>
                                 <!-- END TASK HEAD -->
                                 <!-- TASK TAGS -->
                                 <div class="form-group">
                                    <div class="col-md-12">
                                       <select class="form-control todo-taskbody-tags select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                          <option value="Pending">Pending</option>
                                          <option value="Completed">Completed</option>
                                          <option value="Testing">Testing</option>
                                          <option value="Approved">Approed</option>
                                          <option value="Rejected">Rejected</option>
                                       </select>
                                       <span class="select2 select2-container select2-container--bootstrap" dir="ltr" style="width: 520px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-snm7-container"><span class="select2-selection__rendered" id="select2-snm7-container" title="Pending">Pending</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                                 </div>
                                 <!-- TASK TAGS -->
                                 <div class="form-actions right todo-form-actions">
                                    <button class="btn btn-circle btn-sm green">Save Changes</button>
                                    <button class="btn btn-circle btn-sm btn-default">Cancel</button>
                                 </div>
                              </div>
                              <div class="tabbable-line">
                                 <ul class="nav nav-tabs ">
                                    <li class="active">
                                       <a href="#tab_1" data-toggle="tab"> Comments </a>
                                    </li>
                                    <li>
                                       <a href="#tab_2" data-toggle="tab"> History </a>
                                    </li>
                                 </ul>
                                 <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                       <!-- TASK COMMENTS -->
                                       <div class="form-group">
                                          <div class="col-md-12">
                                             <ul class="media-list">
                                                <li class="media">
                                                   <a class="pull-left" href="javascript:;">
                                                   <img class="todo-userpic" :src=adminassets"/pages/media/users/avatar8.jpg" width="27px" height="27px"> </a>
                                                   <div class="media-body todo-comment">
                                                      <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                      <p class="todo-comment-head">
                                                         <span class="todo-comment-username">Christina Aguilera</span> &nbsp;
                                                         <span class="todo-comment-date">17 Sep 2014 at 2:05pm</span>
                                                      </p>
                                                      <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                      </p>
                                                      <!-- Nested media object -->
                                                      <div class="media">
                                                         <a class="pull-left" href="javascript:;">
                                                         <img class="todo-userpic" :src=adminassets"/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                         <div class="media-body">
                                                            <p class="todo-comment-head">
                                                               <span class="todo-comment-username">Carles Puyol</span> &nbsp;
                                                               <span class="todo-comment-date">17 Sep 2014 at 4:30pm</span>
                                                            </p>
                                                            <p class="todo-text-color"> Thanks so much my dear! </p>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </li>
                                                <li class="media">
                                                   <a class="pull-left" href="javascript:;">
                                                   <img class="todo-userpic" :src=adminassets"/pages/media/users/avatar5.jpg" width="27px" height="27px"> </a>
                                                   <div class="media-body todo-comment">
                                                      <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                      <p class="todo-comment-head">
                                                         <span class="todo-comment-username">Andres Iniesta</span> &nbsp;
                                                         <span class="todo-comment-date">18 Sep 2014 at 9:22am</span>
                                                      </p>
                                                      <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                                         in vulputate at, tempus viverra turpis.
                                                         <br> 
                                                      </p>
                                                   </div>
                                                </li>
                                                <li class="media">
                                                   <a class="pull-left" href="javascript:;">
                                                   <img class="todo-userpic" :src=adminassets"/pages/media/users/avatar6.jpg" width="27px" height="27px"> </a>
                                                   <div class="media-body todo-comment">
                                                      <button type="button" class="todo-comment-btn btn btn-circle btn-default btn-sm">&nbsp; Reply &nbsp;</button>
                                                      <p class="todo-comment-head">
                                                         <span class="todo-comment-username">Olivia Wilde</span> &nbsp;
                                                         <span class="todo-comment-date">18 Sep 2014 at 11:50am</span>
                                                      </p>
                                                      <p class="todo-text-color"> Cras sit amet nibh libero, in gravida nulla. Scelerisque ante sollicitudin commodo Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum
                                                         in vulputate at, tempus viverra turpis.
                                                         <br> 
                                                      </p>
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
                                                   <img class="todo-userpic" :src=adminassets"/pages/media/users/avatar4.jpg" width="27px" height="27px"> </a>
                                                   <div class="media-body">
                                                      <textarea class="form-control todo-taskbody-taskdesc" rows="4" placeholder="Type comment..."></textarea>
                                                   </div>
                                                </li>
                                             </ul>
                                             <button type="button" class="pull-right btn btn-sm btn-circle green"> &nbsp; Submit &nbsp; </button>
                                          </div>
                                       </div>
                                       <!-- END TASK COMMENT FORM -->
                                    </div>
                                    <div class="tab-pane" id="tab_2">
                                       <ul class="todo-task-history">
                                          <li>
                                             <div class="todo-task-history-date"> 20 Jun, 2014 at 11:35am </div>
                                             <div class="todo-task-history-desc"> Task created </div>
                                          </li>
                                          <li>
                                             <div class="todo-task-history-date"> 21 Jun, 2014 at 10:35pm </div>
                                             <div class="todo-task-history-desc"> Task category status changed to "Top Priority" </div>
                                          </li>
                                          <li>
                                             <div class="todo-task-history-date"> 22 Jun, 2014 at 11:35am </div>
                                             <div class="todo-task-history-desc"> Task owner changed to "Nick Larson" </div>
                                          </li>
                                          <li>
                                             <div class="todo-task-history-date"> 30 Jun, 2014 at 8:09am </div>
                                             <div class="todo-task-history-desc"> Task completed by "Nick Larson" </div>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</template>
<script>
export default {

}
</script>