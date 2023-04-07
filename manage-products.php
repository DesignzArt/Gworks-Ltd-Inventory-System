<?php require_once(dirname(__FILE__). '/inc/topnavigationsidebar-institution-user.php'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <h3><span style="color: #000000;margin-left: 10px;">Manage All Items</span></h3>
          <div class="">
            <div class="clearfix"></div>
          <div>
  <?php 
    if(isset($_GET["item"])) {
            $item = $_GET['item'];
      echo "<div class='alert alert-success'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This Item, <span style='color:#215488;'>&nbsp$item</span>&nbsp,has been Created and Saved Successfully.<br/>Create more Items.</b></div>";
    }
  ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel" style="margin: 10px;">
                  <div class="x_title">
                    <div id="prousgrp"></div> 
                    <h2>Manage New and Existing Items</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
    <table id="datatable-buttons" style="font-size: 11px;" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Code</th> 
          <th>Category</th>
          <th>Item Name</th>
          <th>Item Quantity</th>
          <th>Unit P.C</th>
          <th>Unit price</th> 
          <th>Tax %</th>
          <th>Location</th>
          <th></th>
        </tr>
      </thead>
         <tbody> 
         <?php  $category_query = "SELECT * FROM tbl_createnewproduct_comp ORDER BY date_created DESC";
                 $run_query = $connection->query($category_query) or die($connection->error);
                  $numofrows = $run_query->num_rows;
               while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){ 
                    $ID = $rowW5EDVuG0MTCyXi["ID"];
                    $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; ?>
              <tr>
        <td><?php echo $rowW5EDVuG0MTCyXi["ID"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["productcategory"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["productname"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["itemquantity"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["unitpurchasecost"];?></td>
              <td>Kshs:<?php echo $rowW5EDVuG0MTCyXi["unitprice"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["protax"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["itemlocation"];?></td>
        <td><button type="button" class="btn btn-sm btn-primary viewproduct" viewprodctid="<?php echo $newproduct_id;?>" data-toggle="modal" data-target=".manage-groups-modal-sm"><span class="glyphicon glyphicon-edit"></span></button></td>
        <!-- <td><button type="button" class="btn btn-md btn-danger deleteprodcts" dltproductid="<?php echo $newproduct_id;?>" data-toggle="modal" data-target=".delete-user-modal-sm"><span class="glyphicon glyphicon-trash"></span></button></td> -->                            

                              </tr>
                      <?php  } ?>        
                  </tbody>
                </table> 
                  </div>
                </div>
              </div>  
            <!--modal -->
              <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Upload profile image</button> -->
            <!-- /modals -->
            <!--stt modal : update user group-->
            <div class="modal fade manage-groups-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Update Product</h4>
                          <div id="updateproduct2"></div>
                        </div>
                        <div class="modal-body"><!-- <h4>Upload profile pic</h4><br/> -->
                            <div id="get_viewproduct"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                        </div>
                      </div>
                    </div>
            </div>  <!--end modal : update user group-->
                <!--stt modal : delete user-->
              <div class="modal fade delete-user-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Delete User</h4>
                        </div>
                        <div class="modal-body"><!-- <h4>Upload profile pic</h4><br/> -->
                            <div id="get_deleteuser"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                        </div>
                      </div>
                    </div>
              </div><!--end modal : delete user-->
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
     <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <!-- PNotify -->
    <script src="../vendors/pnotify/dist/pnotify.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>