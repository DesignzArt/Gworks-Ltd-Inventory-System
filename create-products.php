<?php require_once(dirname(__FILE__). '/inc/topnavigationsidebar-institution-user.php'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <h3><span style="color: #000000;margin-left: 10px;">New Stock</span></h3>
          <div class="">
            <div class="clearfix"></div>
          <div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">   
                <div class="x_panel" style="margin: 10px;">
                  <div class="x_title">
                    <h2>Create New Item.</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div id="showprocrtcompprodt"></div>
           <form class="form-horizontal form-label-left" method="POST" novalidate>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Category<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="productcategory" name="productcategory" class="form-control" required="required">
                          <option>...Select Item Category...</option>
                          <?php 
                              $select_prepare_data = $connection->query("SELECT * FROM  tbl_create_newaccount ORDER BY date_created DESC");
                              $numofrows = $connection->num_rows($select_prepare_data);
                              if($numofrows > 0) {  
                                  while($row = $connection->fetch_array($select_prepare_data)) { 
                                     $accountsavings_id = $row["accountsavings_id"];  ?>
                                  <option value="<?php echo $row["productcategory"];?>"><?php echo $row["productcategory"];?></option>
                                  <?php } 
                              } else {
                                      echo "<option>....No Item Category Created Yet......</option>";
                                  } ?>
                        </select>
                        <p style="color: red;"><i><b>Note:</b> select above the item category the New product belongs to.(important)</i></p>
                    </div>
                    <a href="create-product-category" type="button" class="btn btn-sm btn-primary">Add New Category</a>
                  </div>
                  <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item sub-Category<span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="productsubcategory" name="productsubcategory" class="form-control" required="required">
                          <option>....Select Item Sub-Category....</option>
                          <?php 
                              $select_prepare_data = $connection->query("SELECT * FROM tbl_create_newaccount ORDER BY date_created DESC");
                              $numofrows = $connection->num_rows($select_prepare_data);
                              if($numofrows > 0) {  
                                  while($row = $connection->fetch_array($select_prepare_data)) { 
                                     $accountsavings_id = $row["accountsavings_id"];  ?>
                                  <option value="<?php echo $row["productcategory"];?>"><?php echo $row["productcategory"];?></option>
                                  <?php } 
                              } else {
                                      echo "<option>...No Item Sub-Category Created Yet..</option>";
                                  } ?>
                        </select>
                        <p style="color: red;"><i><b>Note:</b> select above the item category the New product belongs to.(important)</i></p>
                    </div>
                  </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Name<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="productname" name="productname" required="required" placeholder="Product Name" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>   
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Quantity:<span class="required">*</span>
                        </label> 
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="itemquantity" name="itemquantity" required="required" placeholder="Product Quantity" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit purchase cost:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="unitpurchasecost" name="unitpurchasecost" required="required" placeholder="Unit purchase cost" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                       <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit price:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="unitprice" name="unitprice" required="required" placeholder="Product Quantity" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Serial Code<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="productserialcode" name="productserialcode" required="required" placeholder="Product Serialcode" value="" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Item Description:<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea class="form-control" id="productdescrpt" name="productdescrpt" required="required" rows="3" placeholder="Product Description"></textarea>
                        </div>
                      </div> 
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Tax Ratio %<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="protax" id="protax" class="form-control" required="required">
                                 <option>....Select Item Tax....</option>
                          <?php 
                              $select_prepare_data = $connection->query("SELECT * FROM tbl_create_producttax ORDER BY date_created DESC");
                              $numofrows = $connection->num_rows($select_prepare_data);
                              if($numofrows > 0) {  
                                  while($row = $connection->fetch_array($select_prepare_data)) { 
                                     $accountsavings_id = $row["accountsavings_id"];  ?>
                                  <option value="<?php echo $row["taxpercentage"];?>"><?php echo $row["taxpercentage"];?></option>
                                  <?php } 
                              } else {
                                      echo "<option>...No Item Tax created yet....</option>";
                                  }
                          ?>
                            </select> 
                        </div>
                      </div>
                     <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Item Location<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="itemlocat" id="itemlocat" class="form-control" required="required">
                                <option>...Select Item Location...</option>
                          <?php 
                              $select_prepare_data = $connection->query("SELECT * FROM tbl_create_productlocation ORDER BY date_created DESC");
                              $numofrows = $connection->num_rows($select_prepare_data);
                              if($numofrows > 0) {  
                                  while($row = $connection->fetch_array($select_prepare_data)) { 
                                     $accountsavings_id = $row["accountsavings_id"];  ?>
                                  <option value="<?php echo $row["itemlocation"];?>"><?php echo $row["itemlocation"];?></option>
                                  <?php } 
                              } else {
                                      echo "<option>...No Item Locations yet....</option>";
                                  }
                          ?>
                            </select>
                        </div>
                      </div><br/>
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Item Keyword Tags</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="tags_1" name="tags_1" type="text" class="tags form-control" value="" />
                          <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
 <input type="hidden" id="insti_id" class="form-control" readonly="readonly" value="<?php echo $user_id;?>" name="insti_id" /> 
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                        <!-- <button id="procrtcompprodt" type="button" class="btn btn-success">Save Product</button> -->
                        <button id="procrtcompprodt" type="button" class="btn btn-success btn-md btn-block"><i class="fa fa-edit"></i>&nbspCreate New Item</button>
                        <!-- <button type="submit" class="btn btn-success btn-sm btn-block"><i class="fa fa-edit m-right-xs"></i>Create New Product</button> -->
                        <!-- <input type="submit" class="btn btn-success btn-sm btn-block" value="Create New Item"> -->

                        </div>
                      </div>
                    </form>

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
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- jQuery Tags Input -->
    <script src="../vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>