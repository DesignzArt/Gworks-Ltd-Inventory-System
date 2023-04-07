<?php require_once(dirname(__FILE__). '/inc/topnavigationsidebar-institution-user.php');?>
        <!-- page content -->
        <div class="right_col" role="main">
            <h3><span style="color: #000000;margin-left: 10px;">Received Items</span></h3>
          <div class="">            
            <div class="clearfix"></div>
     <?php 
    if(isset($_GET["receiveditem"])) {
            $receiveditem = $_GET['receiveditem'];
     echo "<div class='alert alert-success'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>This Item,<span style='color:#215488;'>&nbsp$receiveditem</span>&nbsp,has been Processed and Received Successfully.<br/>Continue and Receive other Items: </b><a href='receive-products' class='btn btn-sm btn-primary'>Receive New Item</a></div>";
    } ?>
            <div class="row">   
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel" style="margin: 10px;">
                  <div class="x_title">
                    <div id="prousgrp"></div>
                    <h2>Manage Received Items</h2>
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
                      <th>#</th>
                      <th>Items</th>
                      <th>Supplier</th>
                      <th>Date received</th>
                      <th>Qty Received</th>
                      <th>Unit Cost</th>
                      <th>Total</th>
                      <th></th>
                    </tr>
                  </thead>
                     <tbody> 
   <?php   $category_query = "SELECT * FROM tbl_receiveditems ORDER BY date_created DESC";
           $run_query = $connection->query($category_query) or die($connection->error);
            $numofrows = $run_query->num_rows;
         while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){ 
              $gid = $rowW5EDVuG0MTCyXi["ID"];
              $receiveitem_id = $rowW5EDVuG0MTCyXi["receiveitem_id"];
              $supplier = $rowW5EDVuG0MTCyXi["supplier"];
    $select_prepare_data = $connection->query("SELECT * FROM tbl_suppliers WHERE guarantor_id ='$supplier'");
      $numofrows = $connection->num_rows($select_prepare_data);
      if($numofrows > 0) {  
          while($row = $connection->fetch_array($select_prepare_data)) { 
             $fst = $row["guarantorname"]; 
           } 
        } ?>
            <tr>
              <td><?php echo $rowW5EDVuG0MTCyXi["ID"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["receiveitem"];?></td>
              <td><?php echo $fst;?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["receivedate"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["receiveqty"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["unitcost"];?></td>
              <td><?php echo $rowW5EDVuG0MTCyXi["linetotal"];?></td>
                              <!-- <td><button type="button" class="btn btn-md btn-primary viewdata" mnggrpid="<?php echo $gcode;?>" data-toggle="modal" data-target=".manage-groups-modal-sm"><span class="glyphicon glyphicon-edit"></span></button></td>-->
                              <td><button type="button" class="btn btn-sm btn-danger deletereceiver" dltreceiverid="<?php echo $receiveitem_id;?>" data-toggle="modal" data-target=".delete-groups-modal-sm"><span class="glyphicon glyphicon-trash"></span></button></td> 
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
            </div>

            <div class="row">   <!-------------------------------------stat row-->
              <div class="col-md-6 col-sm-6 col-xs-6"> 
                <div class="x_panel" style="margin: 10px;">
                  <div class="x_title">
                    <div id="prousgrp"></div>
                    <h2>Manage Received Items By Date</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">  


          <form id="form-data" class="form-horizontal form-label-left" method="POST" novalidate>
                <div class="item form-group">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">FROM THIS DATE:-<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class='input-group date' id='myDatepicker2'>
                                <input type='text' name="refromdate" id="refromdate" class="form-control" />
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                      </div>
                </div> 
                <div class="item form-group">
                      <label class="control-label col-md-5 col-sm-5 col-xs-12" for="name">TO THIS DATE:-<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                           <div class='input-group date' id='myDatepicker3'>
                                <input type='text' name="retodate" id="retodate" class="form-control" />
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                      </div>
                </div> 
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-5">
                    <button id="prodatereceiveditems" type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-save"></span>&nbsp Analyse Received Items</button>
                  </div>
                </div>
          </form>
          
                  </div>
                </div>
              </div>
               <div class="col-md-6 col-sm-6 col-xs-6"> 
                      <div id="receiveitemdateselection"></div>
               </div>

             <!--stt modal : edit user group-->
              <div class="modal fade manage-groups-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Update User Group</h4>
                        </div>
                        <div class="modal-body"><!-- <h4>Upload profile pic</h4><br/> -->
                            <div id="get_mnggr"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                        </div>
                      </div>
                    </div>
              </div> <!--end modal : edit user group-->
              <!--stt modal : delete user group-->
              <div class="modal fade delete-groups-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Delete Received Item</h4>
                        </div>
                            <div id="yesspecificborower2"></div>
                        <div class="modal-body"><!-- <h4>Upload profile pic</h4><br/> -->
                            <div id="get_dltreceiverid"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                        </div>
                      </div>
                    </div>
              </div><!--end modal : delete user group-->
          </div>

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
         <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap-datetimepicker -->    
    <script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
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
     <script>
    $('#myDatepicker2').datetimepicker({
        format: 'MM/DD/YYYY'
      });
    $('#myDatepicker3').datetimepicker({
        format: 'MM/DD/YYYY'
      });
        $('#myDatepicker4').datetimepicker({
            ignoreReadonly: true,
            allowInputToggle: true
        });
        $('#myDatepicker5').datetimepicker({
            ignoreReadonly: true,
            allowInputToggle: true
        });
    </script>
  </body>
</html>