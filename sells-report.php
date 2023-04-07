<?php require_once(dirname(__FILE__). '/inc/topnavigationsidebar-institution-user.php');?>
        <!-- page content -->
        <div class="right_col" role="main">
            <h3><span style="color: #000000;margin-left: 10px;">Sells Report</span></h3>
          <div class="">            
            <div class="clearfix"></div>
          <div>
            <div class="row">   
              <div class="col-md-12 col-sm-12 col-xs-12"> 
                <div class="x_panel" style="margin: 10px;">
                  <div class="x_title">
                    <div id="prousgrp"></div>
                    <h2>Manage Sells Report</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <!-- <li><a class="close-link"><i class="fa fa-close"></i></a></li> -->
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">  
            <?php $staffAdmin = 'StaffAdmin';
             $Customer = 'Customer';      
            $KQHWQ1OFNV = 'KQHWQ1OFNV'; ?>  
      <table id="datatable-buttons" style="font-size: 11px;" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Qty</th>
            <th>Cost Value</th>
            <th>Price Value</th>
            <th>Total Cost</th>
            <th>Total Sells</th>
            <th>Gross Profit</th>
          </tr>
        </thead>
           <tbody> 
           <?php   
                  $category_query = "SELECT * FROM tbl_createnewproduct_comp ORDER BY date_created DESC";
                  $run_query = $connection->query($category_query) or die($connection->error);
                  $numofrows = $run_query->num_rows;
                 while($rowW5EDVuG0MTCyXi = $run_query->fetch_array()){ 
                      $ID = $rowW5EDVuG0MTCyXi["ID"];
                      $newproduct_id = $rowW5EDVuG0MTCyXi["newproduct_id"]; 
                      $itmqty = $rowW5EDVuG0MTCyXi["itemquantity"];
                      $costval = $rowW5EDVuG0MTCyXi["unitpurchasecost"];
                      $unitprice = $rowW5EDVuG0MTCyXi["unitprice"];
                      $totalcost = $itmqty * $costval;
                      $totalsells = $itmqty * $unitprice;
                      $grosprofit =  $totalsells - $totalcost; ?>
                <tr>
          <td><?php echo $rowW5EDVuG0MTCyXi["productname"];?></td>
          <td><?php echo $rowW5EDVuG0MTCyXi["itemquantity"];?></td>
          <td><?php echo $rowW5EDVuG0MTCyXi["unitpurchasecost"];?></td>
          <td>Kshs:<?php echo $rowW5EDVuG0MTCyXi["unitprice"];?></td>
          <td><?php echo $totalcost;?></td>
          <td><?php echo $totalsells;?></td>
          <td><?php echo $grosprofit;?></td>
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
                    <h2>Sells Report By Date</h2>
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
                                <input type='text' name="fromdate" id="fromdate" class="form-control" />
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
                                <input type='text' name="todate" id="todate" class="form-control" />
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                      </div>
                </div> 
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-5">
                    <button id="prosellsreportselec" type="button" class="btn btn-success btn-block"><span class="glyphicon glyphicon-save"></span>&nbsp Analyse Sells Report</button>
                  </div>
                </div>
          </form>
                  </div>
                </div>
              </div>
               <div class="col-md-6 col-sm-6 col-xs-6"> 
                       <div id="sellsreportselection"></div>
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
                          <h4 class="modal-title" id="myModalLabel2">Delete Item</h4>
                        </div>
                        <div id="yesspecificborower2"></div>
                        <div class="modal-body"><!-- <h4>Upload profile pic</h4><br/> -->
                            <div id="get_dltborowerid"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                        </div>
                      </div>
                    </div>
              </div><!--end modal : delete user group-->
              <div class="modal fade invoice-cust-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Customer Invoice</h4>
                        </div>
                        <div class="modal-body"><!-- <h4>Upload profile pic</h4><br/> -->
                            <div id="get_custinvoice"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                        </div>
                      </div>
                    </div>
              </div><!--end modal : delete user group-->
              <div class="modal fade receipt-cust-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Customer Receipt</h4>
                        </div>
                        <div class="modal-body"><!-- <h4>Upload profile pic</h4><br/> -->
                            <div id="get_custreceipt"></div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                        </div>
                      </div>
                    </div>
              </div><!--end modal : delete user group-->
            </div><!-----------------------------------------------------end row-->

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
        format: 'YYYY-MM-DD'
      });
    $('#myDatepicker3').datetimepicker({
        format: 'YYYY-MM-DD'
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