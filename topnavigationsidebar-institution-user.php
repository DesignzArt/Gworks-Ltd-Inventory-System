<?php   require_once(dirname(__FILE__). '/setsigninsessionfile.php'); //load signin session file ?> 
 <?php   //upload user avatar
        $upload_imageerror=""; $picurl=""; $profilepic="";
      if(isset($_FILES["avataruser"]["name"]) && $_FILES["avataruser"]["name"] != "") {
            $filename   = $_FILES["avataruser"]["name"];
            $fileTmpLoc = $_FILES["avataruser"]["tmp_name"];
            $fileType   = $_FILES["avataruser"]["type"];
            $fileSize   = $_FILES["avataruser"]["size"];
            $fileErrorMsg = $_FILES["avataruser"]["error"];  
            $kaboom = explode(".", $filename);
            $fileExt = end($kaboom);
            list($width, $height) = getimagesize($fileTmpLoc);
            if($width < 10 || $height < 10) {  //$upload_imageerror ="Error:That image has no dimensions";
                  header("location: gworks-kenya-limited?msgnodimension=Error:That image has no dimensions");
                //rand(1000,999) 
              }
            $db_file_name = $user_id.".".$fileExt;
            if($fileSize > 1048576) { // $upload_imageerror = "Error:Your image is large than 1mb";
                  header("location: gworks-kenya-limited?msg=Error:Your-image-is-large-than-1mb");
                exit();
            } else if(!preg_match("/\.(gif|jpg|png)$/i", $filename)) { //$upload_imageerror = "Error: Your image was not gif,jpg or png type";
                  header("location: gworks-kenya-limited?msgtype=Error:Your-image-was-not-gif-jpg-or-png-type");
                exit();
            } else if($fileErrorMsg == 1) { // $upload_imageerror = "Error: Unknow error occured";
                  header("location: gworks-kenya-limited?msgunknown=Error: Unknow-error-occured");
                exit();
            } 
                  $sql = "SELECT avataruser FROM tbl_insti_createusers WHERE user_id = '$user_id'";
                  $query = $connection->query($sql);
                  $row = $connection->num_rows($query);
                  if($row != "") {
                      $picurl = "institutionuserstaff/$row";
                      if(file_exists($picurl)) {
                        unlink($picurl); 
                     }
                  }
                  $moveResult = move_uploaded_file($fileTmpLoc,"institutionuserstaff/$db_file_name");
                  if($moveResult != true) {  //$upload_imageerror= "Error:File upload failed";
                  header("location: gworks-kenya-limited?msguploadfail=Error: File upload failed");
                      exit();
                  }
                include_once("inc/imageresizefile.php");
                  $target_file = "institutionuserstaff/$db_file_name";
                  $resized_file = "institutionuserstaff/$db_file_name";
                  $wmax = 200;
                  $hmax = 300;
                  img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
                  $sql = "UPDATE tbl_insti_createusers SET avataruser = '$db_file_name' WHERE user_id = '$user_id'";
                  $query = $connection->query($sql);
              $profilepic = '<img src="institutionuserstaff/$row" alt="" class="img-circle profile_img">';
                  //close connection here : $connection->close();
                header("location: gworks-kenya-limited?usrd=$user_id&instid=$insti_id&instimbsno=$membershipnousr&usr=$firstname");
                  // exit();
    } ?>
  <?php    if(isset($_POST["groupname"])) { 
                $groupname  = validatedatainputHHJRJG45656($_POST["groupname"]);
                $Home  = validatedatainputHHJRJG45656($_POST["Home"]);
                $createprofile = validatedatainputHHJRJG45656($_POST["createprofile"]);
                $permissiongroup      = validatedatainputHHJRJG45656($_POST["permissiongroup"]);  
                $companystaff      = validatedatainputHHJRJG45656($_POST["companystaff"]);
                $productcategory      = validatedatainputHHJRJG45656($_POST["productcategory"]);
                $newproduct       = validatedatainputHHJRJG45656($_POST["newproduct"]);  
                $sellproduct  = validatedatainputHHJRJG45656($_POST["sellproduct"]);
                $receiveproducts  = validatedatainputHHJRJG45656($_POST["receiveproducts"]);
                $transferproducts = validatedatainputHHJRJG45656($_POST["transferproducts"]);
                $productlocations      = validatedatainputHHJRJG45656($_POST["productlocations"]);  
                $newcustomer      = validatedatainputHHJRJG45656($_POST["newcustomer"]);
                $newsupplier       = validatedatainputHHJRJG45656($_POST["newsupplier"]);
                $taxmanagement       = validatedatainputHHJRJG45656($_POST["taxmanagement"]);  
                $allcontacts       = validatedatainputHHJRJG45656($_POST["allcontacts"]);
                $report  = validatedatainputHHJRJG45656($_POST["report"]);
          if(strlen($groupname) < 4) {
            header("location: create-group?grpnameshort=Error:Group Name is short");
            exit();
          }
      // put validation code here
      // $options = ['cost' => 8,];  //hash the created user passwords
      // $hash5468546546fefwefwefwffwpassword  =  password_hash($pPASS, PASSWORD_BCRYPT, $options);
          $get_current_date = date("d:m:Y");  //generate automatic date,get date of transaction
          $jdskghkuhwileuhdjdmembershipcode = '789456123cardit';      //generate a unique membership code
            $options_userid = ['cost' => 8,];
            $hashpassword5468546546fefwefwefwffw  =  password_hash($jdskghkuhwileuhdjdmembershipcode, PASSWORD_BCRYPT, $options_userid);
            $substring_membershipcode = substr($hashpassword5468546546fefwefwefwffw,10,10);
        $setuppercase = strtoupper($substring_membershipcode);
            $select_prepare_data = $connection->query("SELECT group_name FROM tbl_usergroups WHERE group_name = '$groupname'");
            $numofrows = $connection->num_rows($select_prepare_data);
            if($numofrows > 0){
              header("location: create-group?allexst=Error:Group allready exist");
                exit();
              }else{
             //create a new member library acceess for registered users
                $confirm_code = 0;
                //get user ip address
            $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
            $ordersql = "INSERT INTO tbl_usergroups (group_id,group_name,Home,createprofile,permissiongroup,companystaff,productcategory,newproduct,sellproduct,receiveproducts,transferproducts,productlocations,newcustomer,newsupplier,taxmanagement,allcontacts,report,ip,date_created) VALUES ('$setuppercase','$groupname','$Home','$createprofile','$permissiongroup','$companystaff','$productcategory','$newproduct','$sellproduct','$receiveproducts','$transferproducts','$productlocations','$newcustomer','$newsupplier','$taxmanagement','$allcontacts','$report','$ip',now())";
            $orderquery = $connection->query($ordersql) or die($connection->error);
            //send user email related to the new library access  
              header("location: manage-groups?success=success:Group created successfully");
                }
      }   ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gworks Limited Kenya - Your Partner in Auto-Business |</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

     <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../assets/css/sharp-web-solutions.css">
    <link rel="stylesheet" href="../assets/css/owl.css">
    <link rel="stylesheet" href="../assets/css/lightbox.css">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- PNotify -->
    <!-- <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet"> -->
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
     <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

    <style type="text/css">
      div #menuformbuttons fieldset button  {
          margin: 0px 0px 20px;
          border-radius: 1px;
          max-height: 40px;
          font-size: 12px;
          padding-left: 13px;
        }
      div #menuformbuttons fieldset button .btn-block-prof {
          background-color: rgba(22,34,57,0.95) !important;
      }
    </style>
    
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="gworks-kenya-limited?usrd=<?php echo $user_id;?>&instid=<?php echo $insti_id;?>&instimbsno=<?php echo $membershipnousr;?>&usr=<?php echo $firstname.'nbsp'.$lastname;?>" class="site_title"><i class="fa fa-paw"></i> <span><?php echo $firstname?></span></a>
            </div>
            <div class="clearfix"></div>
            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
              <!-- <img src="images/placeholder.png" alt="..." class="img-circle profile_img"> -->
    <?php   
      $sql = "SELECT avataruser FROM tbl_insti_createusers WHERE user_id = '$user_id' LIMIT 1";
                  $query = $connection->query($sql);
                  $row = $connection->fetch_array($query);  
                    $getpic = $row["avataruser"];
            $profilepic = '<img src="institutionuserstaff/'.$getpic.'" class="img-circle profile_img" style="width:50px;height:50px;" alt="profilepic">';
            $profilepicsmall = '<img src="institutionuserstaff/'.$getpic.'" class="img-circle" style="width:20px;height:20px;" alt="profilepic">';
            $profilepicprofilepage = '<span id="useravatar"><img src="institutionuserstaff/'.$getpic.'" style="width:200px;height:200px;" class="img-responsive avatar-view" alt=""></span>';
        if($getpic == NULL) {
            $profilepic = '<span id="useravatar"><img src="institutionuserstaff/userdefault.png" style="width:50px;height:50px;" class="img-circle profile_img" alt=""></span>';
            $profilepicsmall = '<span id="useravatar"><img src="institutionuserstaff/userdefault.png" style="width:20px;height:20px;" class="img-circle" alt=""></span>';
            $profilepicprofilepage = '<span id="useravatar"><img src="institutionuserstaff/userdefault.png" style="width:200px;height:200px;" class="img-responsive avatar-view" alt=""></span>';
                  } ?>  
              <?php echo $profilepic;?>
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $firstname.'&nbsp'.$lastname;?></h2>
              </div>
                    <!-- <a class="btn btn-success btn-sm"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a> -->
              <!--modal 
                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target=".bs-example-modal-sm"><i class="fa fa-edit m-right-xs"></i>Upload Image</button>-->
            <!--modal
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm">Upload profile image</button>
             /modals -->
                </div>
         
            <!-- /menu profile quick info -->     
             <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">    
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="gworks-kenya-limited?usrd=<?php echo $user_id;?>&instid=<?php echo $insti_id;?>&instimbsno=<?php echo $membershipnousr;?>&usr=<?php echo $firstname.'nbsp'.$lastname;?>"><i class="fa fa-home"></i> Home</a>
                  </li>
                    
              <li><a><i class="fa fa-edit"></i>Profile<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="company-profile">Profile Information</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-tasks"></i>Permission Groups<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="create-group">Create Permision Grps</a></li>
                  <li><a href="manage-groups">Manage Permission Grps</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-users"></i>Employee Management<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="create-user">Create Employee</a></li>
                  <li><a href="manage-users">Manage Employees</a></li>  
                </ul>
              </li>
              <li><a><i class="fa fa-institution"></i>Item Category<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="create-product-category">Create Category</a></li>
                  <li><a href="manage-productcategories">Manage Categories</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-pencil-square"></i>New Stock<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="create-products">Create Item</a></li>
                  <li><a href="manage-products">Manage Items</a></li>
                </ul>
              </li>
             <li><a><i class="fa fa-edit"></i>Sell Stock<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="sell-products">Sell an Item</a></li>
                  <li><a href="manage-sold-products">Manage Sold Items</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-edit"></i>Receive Stock<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="receive-products">Receive Items</a></li>
                  <li><a href="manage-received-products">Manage Received Items</a></li>
                </ul> 
              </li>
               <li><a><i class="fa fa-user"></i>New Customer<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="create-borrower">Create Customer</a></li>
                  <li><a href="manage-borrowers">Manage Customers</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-edit"></i>New Supplier<span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="create-supplier">Create Supplier</a></li>
                    <li><a href="manage-suppliers">Manage Suppliers</a></li>
                  </ul>
              </li> 
       <!--  <li><a><i class="fa fa-random"></i>Transfer Products<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="transfer-products">Transfer Product</a></li>
            <li><a href="manage-transfered-products">Manage Transfered Products</a></li>
          </ul>
        </li> -->
              <li><a><i class="fa fa-building"></i>Product Locations<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="create-product-location">New Location</a></li>
                  <li><a href="manage-productlocations">Manage Locations</a></li>
                </ul>
              </li>
              <li><a><i class="fa fa-legal"></i>Tax Management<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="create-product-taxes">New Tax</a></li>
                  <li><a href="manage-producttaxes">Manage Taxes</a></li>
                </ul>
              </li>
    <!--   <li><a><i class="fa fa-edit"></i>All Contacts<span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="#">Manage Contacts</a></li>
        </ul>
      </li> -->
              <li><a><i class="fa fa-edit"></i>Reports<span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="Inventory-report">Inventory Report</a></li>
                  <li><a href="Inventory-by-location">Inventory By Location</a></li>
                  <li><a href="Inventory-by-category">Inventory By Category</a></li>
                  <li><a href="sells-report">Sells Report</a></li>
                </ul>
              </li>


                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout-insti-user">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo $profilepicsmall;?><?php echo $firstname;?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                     <li><a href="javascript:;">
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bs-example-modal-sm">Upload profile image</button>
                     </a></li>
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="logout-insti-user"><i class="fa fa-sign-out pull-right"></i> <b>Log Out</b> |&nbsp<?php echo $firstname;?></a></li>
                  </ul>
                </li>
              <div id="get_category"></div>
                

                    <!-- <li role="presentation" class="dropdown">
                      <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">6</span>
                      </a>
                      <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <li>
                          <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <a>
                            <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                            <span>
                              <span>John Smith</span>
                              <span class="time">3 mins ago</span>
                            </span>
                            <span class="message">
                              Film festivals used to be do-or-die moments for movie makers. They were where...
                            </span>
                          </a>
                        </li>
                        <li>
                          <div class="text-center">
                            <a>
                              <strong>See All Alerts</strong>
                              <i class="fa fa-angle-right"></i>
                            </a>
                          </div>
                        </li>
                      </ul>
                    </li> -->


              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
         <!--upload user profile-->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
          <h4 class="modal-title" id="myModalLabel2">&nbsp<?php echo $firstname.'&nbsp'.$lastname;?></h4>
                </div>
                <div class="modal-body">
                  <h4>Upload profile Image</h4><br/>
                  <p>
                    <form id="avatar_form" enctype="multipart/form-data" method="POST" action="institution-user-staff">
                      <input class="form-control" type="file" name="avataruser" id="avataruser" required><br/>
                      <input type="submit" class="btn btn-sm btn-success" value="Upload Profile Pic">
                    </form>
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <!-- <button type="button" class="btn btn-primary">Upload</button>-->
                </div>
              </div>
            </div>
          </div>