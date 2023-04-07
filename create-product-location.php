<?php require_once(dirname(__FILE__). '/inc/topnavigationsidebar-institution-user.php');?>
        <!-- page content -->
        <div class="right_col" role="main">
          <h3><span style="color: #000000;margin-left: 10px;">Item Location</span></h3>
            <div class="clearfix"></div>
          <div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel" style="margin: 10px;">         
                  <div class="x_title">
                    <h2>Create New Item Location.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
          <!-- start form for validation -->
                <div id="procrtprodcate2"></div>
                  <form id="form-data" class="form-horizontal form-label-left" method="POST" novalidate>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Location Name:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <input type="text" id="locationname" name="locationname" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                          </div>
  <input type="hidden" id="insti_id" class="form-control" readonly="readonly" value="<?php echo $user_id;?>" name="insti_id" />  
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Location Status:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="locationstatus" id="locationstatus" class="form-control" required="required">
                                    <option>......Select Option......</option>
                                    <option value="Active">Active</option>
                                    <option value="Not-active">Not Active</option>
                                    <option value="None">None</option>
                                </select>
                            </div>
                          </div>
                          <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Location Description:<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea class="form-control" id="locationdesc" name="locationdesc" required="required" rows="3" placeholder="Comments"></textarea>
                            </div>
                          </div> <br/><br/>
                          <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                              <button id="locationprocateprodu" type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-save"></span>&nbsp Create Item Location</button>
                            </div>
                          </div>
                    </form> 
          <!-- end form for validations --> 
                  </div>
                </div>
              </div>
            </div>
          </div>
              <?php //require_once(dirname(__FILE__). '/inc/middle-level-footer.php');?>
          </div>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <?php require_once(dirname(__FILE__). '/inc/footer-section.php');?>
        <!-- /footer content -->
      </div>
    </div>
      <!--upload user profile-->
        <!-- <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                  <h4 class="modal-title" id="myModalLabel2">Hi,&nbsp<?php echo $FNpupil;?></h4>
                </div>
                <div class="modal-body">
                  <h4>Upload profile pic</h4><br/>
                  <p><form id="avatar_form" enctype="multipart/form-data" method="POST" action="dashboarduser">
                      <input class="form-control" type="file" name="avatar" id="avatar" required><br/>
                      <input type="submit" class="btn btn-sm btn-success" value="Upload Profile Pic">
                  </form>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Upload</button>
                </div>
              </div>
            </div>
          </div> -->
    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
     <!-- jQuery -->
    <script src="process_logic.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="../vendors/validator/validator.js"></script>
     <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>