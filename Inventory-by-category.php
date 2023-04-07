<?php require_once(dirname(__FILE__). '/inc/topnavigationsidebar-institution-user.php'); ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <h3><span style="color: #000000;margin-left: 10px;">Inventory By Item Category</span></h3><br/>
          <div class="">
            <div class="clearfix"></div>
          <div>
            <div class="row">
  
              <div class="col-md-4 col-sm-4 col-xs-4"> 
                <h2>All Item Categories</h2>
                    <div class="well">
                      <div id="itemcategory"></div>
                    </div>
              </div>
              <div class="col-md-8 col-sm-8 col-xs-8"> 
                <div class="x_panel" style="margin: 10px;">
                  <div class="x_title">
                    <div id="prousgrp"></div> 
                    <h2>Manage Inventory By Item Category</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content"> 
                                        <div id="categoryitm"></div>
    <div id="hidedtbl">
          <table id="datatable-buttons" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Item Locations</th>
                <th>Category</th>
                <th>Item Name</th>
                <th>Item Desc</th> 
              </tr>
            </thead>
               <tbody> 
        <?php  $category_query = "SELECT * FROM tbl_createnewproduct_comp,tbl_create_productlocation WHERE tbl_createnewproduct_comp.itemlocation = tbl_create_productlocation.itemlocation";
               $run_query = $connection->query($category_query) or die($connection->error);
             while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){ 
                  $ID = $rowW5EDVuG0MTCyXi["ID"];
              ?>
                    <tr>
        <td><?php echo $rowW5EDVuG0MTCyXi["itemlocation"];?></td>
        <td><?php echo $rowW5EDVuG0MTCyXi["productcategory"];?></td>
        <td><?php echo $rowW5EDVuG0MTCyXi["productname"];?></td>
        <td><?php echo $rowW5EDVuG0MTCyXi["productdescrpt"];?></td>
                        </tr>
                <?php  } ?>        
            </tbody>
          </table>
    </div>

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
  
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>