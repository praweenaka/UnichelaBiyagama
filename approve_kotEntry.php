<!DOCTYPE html>

<?php
session_start();
?>
<?php
$_SESSION['mealType'] = "breakFast";
?>

<html lang="en">

    <head>
        <title>Approve KOT Entry</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="dist/css/font-awesome-4.7.0/css/font-awesome.min.css">  

        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="css/ionicons/css/ionicons.min.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
        <style>
            .form-group {margin-bottom : 8px; }

        </style>
    </head>

    <body class="hold-transition skin-red sidebar-mini" onload="add_tmp()">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="home.php" class="logo"> <!-- mini logo for sidebar mini 50x50 pixel <a href="home.php" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span class="logo-mini"><b></b></span> <!-- logo for regular state and mobile devices --> <span class="logo-lg"><b>Unichela</b></span> </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->

                            <!-- Notifications: style can be found in dropdown.less -->

                            <!-- Tasks: style can be found in dropdown.less -->

                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs"><?php echo strtoupper($_SESSION['UserName']); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
<!--                                    <li class="user-header">
                                        <img src="dist/img/avatar04.png" class="img-circle" alt="User Image">
                                        <span class="hidden-xs">CANTEEN</span>

                                        <p>
                                        </p>
                                    </li>-->
                                    <!-- Menu Body -->
<!--                                    <li class="user-body">

                                         /.row 
                                    </li>-->
                                    <!-- Menu Footer-->
                                    <li class="user-footer">

                                        <div class="pull-right">
                                            <a onclick="logout();" class="btn btn-success btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <!--<img src="" class="img-circle" alt="User Image">-->
                        </div>
                        <div class="pull-left info">
                            <p>
                                admin                            </p>
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
<!--                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </button> </span>-->
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <!--                        <li class="header">
                                                    MAIN MENU
                                                </li>
                                                <li class="treeview">
                                                    <a href="#"> <i class="fa fa-th"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i> </a>
                                                    <ul class="treeview-menu ">
                        
                        
                        
                                                        <li>                                <a href="home.php?url=Airport"><i class="fa fa-circle-o"></i>Airport Details</a></li>
                        
                        
                                                                                <a href="home.php?url=cusmas"><i class="fa fa-circle-o"></i>Clients Details</a></li>
                        
                                                                                <a href="home.php?url=Carrier"><i class="fa fa-circle-o"></i>Carrier Details</a></li>
                        
                                                        <li>                        <a href="home.php?url=Container"><i class="fa fa-circle-o"></i>Container Types</a></li>
                        
                                                        <li>                        <a href="home.php?url=LoadUnload"><i class="fa fa-circle-o"></i>Loading / Unloading Places</a></li>
                        
                                                        <li>                        <a href="home.php?url=Package_type"><i class="fa fa-circle-o"></i>Package Type</a></li>
                        
                                                                                <a href="home.php?url=Charge_code"><i class="fa fa-circle-o"></i>Charge Code</a></li>
                        
                                                        <li>                                <a href="home.php?url=item-master"><i class="fa fa-circle-o"></i>PO Items</a></li>
                        
                        
                                                        <li>                        <a href="home.php?url=pr"><i class="fa fa-circle-o"></i>PR</a></li>
                        
                        
                        
                                                        <li>                        <a href="home.php?url=Currency"><i class="fa fa-circle-o"></i>Currency</a></li>
                        
                                                        <li>                        <a href="home.php?url=Vessel"><i class="fa fa-circle-o"></i>Vessel</a></li>
                        
                                                                        <a href="home.php?url=Sales_rep"><i class="fa fa-circle-o"></i>Sales Rep</a></li>
                        
                                                                                                                        <a href="home.php?url=helpdesk"><i class="fa fa-circle-o"></i>Help Desk</a></li>
                                                        <li>                        <a href="home.php?url=lcode"><i class="fa fa-circle-o"></i>Ledger Code</a></li>
                        
                        
                                                    </ul>
                                                </li>
                                                <li class="treeview">
                                                    <a href="#"> <i class="fa fa-dashboard"></i> <span>OP Accounts</span> <i class="fa fa-angle-left pull-right"></i> </a>
                                                    <ul class="treeview-menu">
                        
                        
                                                        <li>                            <a href="home.php?url=po"><i class="fa fa-circle-o"></i>PO</a></li>
                        
                        
                                                        <li>                    <a href="home.php?url=Credit_note"><i class="fa fa-circle-o"></i>Credit Note</a></li>
                        
                                                        <li>                    <a href="home.php?url=Debit_note"><i class="fa fa-circle-o"></i>Debit Note</a></li>
                        
                                                        <li>                    <a href="home.php?url=Payments"><i class="fa fa-circle-o"></i>Payments In Cheque</a></li>
                        
                                                                <a href="home.php?url=Consol_Costing"><i class="fa fa-circle-o"></i>Consol Costing</a></li>
                                                        <li>                    <a href="home.php?url=jou"><i class="fa fa-circle-o"></i>Journal Entry</a></li>
                        
                                                        <li>                    <a href="home.php?url=Receipt_entry"><i class="fa fa-circle-o"></i>Direct Receipt</a></li>
                        
                                            <li>                    <a href="home.php?url=Return_Receipt"><i class="fa fa-circle-o"></i>Return Cheque Entry</a></li>
                        
                                                        <li class='active'>                    <a href="home.php?url=inv"><i class="fa fa-circle-o"></i>Invoice</a></li>
                                                        <li>                    <a href="home.php?url=Receipt"><i class="fa fa-circle-o"></i>Receipt</a></li>
                        
                                                        <li>                    <a href="home.php?url=bank_rec"><i class="fa fa-circle-o"></i>Bank Rec.</a></li>
                        
                        
                        
                        
                                                    </ul>
                                                </li>
                        
                                                <li class="treeview">
                                                    <a href="#"> <i class="fa fa-book"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i> </a>
                                                    <ul class="treeview-menu"> 
                                                        <li>                            <a href="home.php?url=tb"><i class="fa fa-circle-o"></i>Trail Balance</a>
                                                        <li>                            <a href="home.php?url=out"><i class="fa fa-circle-o"></i>Outstanding</a>
                                                        <li>                            <a href="home.php?url=pnlbs"><i class="fa fa-circle-o"></i>PNL & BS</a>
                        
                        
                        
                                                    </ul> 
                                                </li>
                        
                        
                                                <li class="treeview">
                                                    <a href="#"> <i class="fa fa-cogs"></i> <span>Administration</span> <i class="fa fa-angle-left pull-right"></i> </a>
                                                    <ul class="treeview-menu"> 
                                                        <li>                            <a href="home.php?url=user"><i class="fa fa-circle-o"></i>Create User</a>
                        
                        
                                                    </ul> 
                                                </li>-->



                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Control Sidebar -->
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane" id="control-sidebar-home-tab">

                        <!-- /.control-sidebar-menu -->


                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">

                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h2 class="box-title"><strong>APPROVE KOT ENTRY</strong></h2>
                        </div>
                        <form name= "form1" role="form" class="form-horizontal">
                            <div class="box-body">

                                <input type="hidden" id="tmpno" class="form-control">

                                <input type="hidden" id="item_count" value="1" class="form-control">

                                <div class="form-group-sm">

                                    <!--                                    <a onclick="newent();" class="btn btn-default btn-sm">
                                                                            <span class="fa fa-user-plus"></span> &nbsp; NEW
                                                                        </a>-->
                                    <a onclick="save_inv();" class="btn btn-success btn-sm ">
                                        &nbsp; Approve Order
                                    </a>
                                    <a onclick="cancel_inv();" class="btn btn-danger btn-sm ">
                                        &nbsp; Cancel Order
                                    </a>

                                    &nbsp; &nbsp; &nbsp;



                                </div>

                                <div class="form-group-sm"></div>
                                <div class="form-group"></div> 
                                <div class="form-group"></div>

                                <div id="msg_box"  class="span12 text-center"  ></div>

                                <div class="form-group"></div>
                                <div class="form-group"></div>

                                <div class="form-group-sm">
                                    <input id="apstep" value="1" class="hidden">
                                    <input id="cancel" value="0" class="hidden">


                                    <input type="hidden"  id="tmpno1" value="<?php echo $_GET['var16']; ?>">


                                    <label  class="col-sm-2 text-right"  for="invno">Entry No</label>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="Entry No" disabled id="entryNoTxt" value="<?php echo $_GET['var']; ?>" class="form-control  input-sm">
                                    </div>
                                    <div class="col-sm-1"></div>
                                    <label class="col-sm-2 text-right" for="type"> Visit Type</label>
                                    <div class="col-sm-2">
                                        <input type="text" disabled id="visitorTypeCombo" value="<?php echo $_GET['var1']; ?>" class="form-control input-sm"/>
<!--                                        <select id="visitorTypeCombo" disabled value="" class="form-control input-sm">
                                            <option value="Standred Visit">Standred Visit</option>
                                            <option value="VIP Visit">VIP Visit</option>
                                            <option value="VVIP Visit">VVIP Visit</option>
                                        </select>-->
                                    </div>
                                    <label class="col-sm-2 hidden text-right" for="invdate">Entry Date</label>
                                    <div class="col-sm-3 hidden">
                                        <input type="text"   placeholder="Date" id="entryDate" value="<?php echo $_GET['var1']; ?>" class="hidden form-control dt input-sm">
                                    </div>

                                </div>

                                <div class="form-group"></div>

                                <div class="form-group-sm">
                                    <label class="col-sm-2 text-right" for="name_of_visitor">Visit Details</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="nameOfVisitorTxt" disabled value="<?php echo $_GET['var3']; ?>" placeholder="Visitors Details" class="form-control  input-sm">
                                    </div>
                                    <label class="col-sm-2 text-right" for="no_of_person">No of Visitors</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="noOfVisitorTxt" onchange="counter();" disabled value="<?php echo $_GET['var4']; ?>" placeholder="No of Visitors" class="form-control  input-sm">
                                    </div>
                                    <label class="col-sm-2 text-right" for="contact">Required Date</label>
                                    <div class="col-sm-2">
                                        <input type="date" placeholder="Date" disabled id="requireDate" value="<?php echo $_GET['var7']; ?>" class="form-control dt input-sm">
                                    </div>
                                </div>
                                <div class="form-group"></div>

                                <div class="form-group-sm">

                                    <label class="col-sm-2 text-right" for="department_name">Department</label>
                                    <div class="col-sm-2">
                                        <input type="text" disabled id="departmentCombo" value="<?php echo $_GET['var2']; ?>" class="form-control input-sm"/>
<!--                                        <select id="departmentCombo" disabled value="" class="form-control input-sm">
                                            <option value="Sample Room">Sample Room</option>
                                            <option value="Merchandising">Merchandising</option>
                                            <option value="Technical">Technical</option>
                                            <option value="Fabric/Material">Fabric/Material</option>
                                            <option value="Design">Design</option>
                                            <option value="Finance">Finance</option>
                                            <option value="HR">HR</option>
                                            <option value="Admin">Admin</option>
                                        </select>-->
                                    </div>
                                    <label class="col-sm-2 text-right" for="no_of_person">No Of Employees</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="noOfPersonTxt" onchange="counter();" disabled value="<?php echo $_GET['var5']; ?>" placeholder="No Of Employees" class="form-control  input-sm">
                                    </div>
                                    <label class="col-sm-2 text-right" for="type">Credit Account</label>
                                    <div class="col-sm-2">
                                        <input type="text" disabled id="creditCombo" value="<?php echo $_GET['var12']; ?>" class="form-control input-sm"/>

                                    </div>
                                </div>


                                <div class="form-group"></div>

                                <div class="form-group-sm">
                                    <label class="col-sm-2 text-right">Special Instructions</label>
                                    <div class="col-sm-2">
<!--                                        <input type="text" placeholder="Remark" id="remarkTxt1" value="" class="form-control input-sm">-->
                                        <textarea rows="2" id="remarkTxt"disabled=""  class="form-control  input-sm"><?php echo $_GET['var8']; ?></textarea>
                                    </div>
                                    <label class="col-sm-2 text-right">Contact No</label>
                                    <div class="col-sm-2">
                                        <input type="text"  id="contactTxt" disabled placeholder="Contact No" value="<?php echo $_GET['var10']; ?>" class="form-control input-sm"/>
                                    </div>
                                    <label class="col-sm-2 text-right" for="type">Request By</label>
                                    <div class="col-sm-2">
                                        <input type="text" disabled id="orderby" value="<?php echo $_GET['var13']; ?>" class="form-control input-sm"/>

                                    </div>

                                </div>

                                <div class="form-group"></div>
                                <div class="form-group-sm hidden">
                                    <label class="col-sm-2 text-right">Menu Type</label>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Standard_BreakFast');" onclick="clear();hiddenMenu();" value="None Retanable" id="radio13"/>Standard Breakfast &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Standard_Lunch');" onclick="clear();hiddenMenu();"  value="None Retanable" id="radio15"/>Standard Lunch &nbsp;&nbsp;&nbsp;
                                    </div><div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Standard_Dinner');" onclick="clear();hiddenMenu();"  value="None Retanable" id="radio14"/>Standard Dinner &nbsp;&nbsp;&nbsp;
                                    </div>

                                </div>

                                <div class="form-group"></div>
                                <div class="form-group-sm hidden">

                                    <label class="col-sm-2 text-right"></label>
                                    <div class="col-sm-2" >
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 4 Hours  Before The Require Time"  onchange="food('BreakFast');" onclick="clear();hiddenMenu1();gtothidden();" checked="" value="Retanable" id="radio1"/>&nbsp;&nbsp;Breakfirst &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-md-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 4 Hours  Before The Require Time" onchange="food('Lunch');" onclick="clear();hiddenMenu1();gtothidden();" value="None Retanable" id="radio3"/>Lunch &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 4 Hours  Before The Require Time" onchange="food('Dinner');" onclick="clear();hiddenMenu1();gtothidden();" value="None Retanable" id="radio2"/>&nbsp;&nbsp;Dinner &nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                                <div class="form-group"></div>

                                <div class="form-group-sm hidden">
                                    <label class="col-sm-2 text-right"></label>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Tea/PlainTea/Coffee');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio4"/>Tea /Plain Tea /Coffee &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Special_Dishes');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio5"/>Special Dishes &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Sandwiches');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio6"/>Sandwiches &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 4 Hours  Before The Require Time" onchange="food('VIP');" onclick="clear();hiddenMenu1();gtothidden();" value="None Retanable" id="radio12"/><b>VIP</b> &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <?php
                                    include './connectioni.php';

                                    if (strtoupper($_SESSION["UserName"]) == "ADMIN" OR strtoupper($_SESSION["UserName"]) == "MANAGER") {
                                        echo"<div class = \"col-sm-2\">";

                                        echo"<input type = \"radio\" name = \"radio\" data-toggle = \"tooltip\" title = \"Order Should Be Placed 2 Days  Before The Require Time\" onclick=\"clear();hiddenMenu();gtothidden1();\" onchange = \"food('CreateOwnMenu');\" on value = \"None Retanable\" id = \"radio16\"/><b>Create Own Menu</b> &nbsp;";
                                        echo"&nbsp;";
                                        echo"&nbsp;";
                                        echo"</div>";
                                    } else {
                                        echo"<div class = \"col-sm-2 hidden\">";

                                        echo"<input type = \"radio\" name = \"radio\" data-toggle = \"tooltip\" title = \"Order Should Be Placed 2 Days  Before The Require Time\" onclick=\"clear();hiddenMenu();gtothidden1();\" onchange = \"food('CreateOwnMenu');\" on value = \"None Retanable\" id = \"radio16\"/><b>Create Own Menu</b> &nbsp;";
                                        echo"&nbsp;";
                                        echo"&nbsp;";
                                        echo"</div>";
                                    }
                                    ?>

                                </div>
                                <div class="form-group"></div>
                                <div class="form-group-sm hidden">
                                    <label class="col-sm-2 text-right"></label>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Cake_Pcs');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio7"/>Cake Pcs &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Snacks');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio8"/>Snacks &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Dessert');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio9"/>Dessert &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Juices');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio10"/>Juices &nbsp;&nbsp;&nbsp;
                                    </div>
                                    <div class="col-sm-2">
                                        <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Other');" onclick="clear();hiddenMenu1();gtothidden1();" value="None Retanable" id="radio11"/> Other &nbsp;&nbsp;&nbsp;
                                    </div>

                                </div>
                                <div class="form-group"></div>

                                <table class = "table table-striped">
                                    <tr class = 'danger'>
                                        <th style = "width: 120px;">Item Code</th>
                                        <th >Description</th>
                                        <th style = "width: 10px;"></th>
                                        <th style = "width: 120px;">Qty</th>
                                        <th style = "width: 120px;">Amount</th>
                                        <th style = "width: 100px;"></th>
                                    </tr>

                                    <tr class="hidden">
                                        <td>
                                            <input type = "text" placeholder = "Item Code" disabled id = "itemCodeTxt" class = "form-control input-sm">
                                        </td>
                                        <td>
                                            <input type = "text" placeholder = "Description" disabled id = "itemDescTxt" class = "form-control input-sm">
                                        </td>
                                        <td>
                                            <div class="col-sm-1">
                                                <input type="button" onclick="search();" class="btn btn-default" style="background-color: #40c625" value="Menu.." id="searchcost" name="searchcost">
                                            </div>
                                        </td>
                                        <td>
                                            <input type = "text" placeholder = "Qty" id = "qty" class = "form-control input-sm">
                                        </td>
                                        <td>
                                            <input type = "text" placeholder = "Amount" disabled id = "amountTxt" class = "form-control input-sm">
                                        </td>
                                        <td>
                                            <a onclick = "add_tmp2();" class = "btn btn-default btn-sm"> <span class = "fa fa-plus"></span> &nbsp;
                                            </a></td>
                                    </tr>

                                </table>
                                <div id="itemdetails" >

                                </div>

                                <table id = 'subtotal' class = "table">

                                    <tr>
                                        <td style = "width: 800px;"></td>
                                        <th style = "width: 100px;">Grand Total</th>
                                        <td style = "width: 180px;">
                                            <input type = "text" placeholder = "0.00" disabled id = "gtot" value="<?php echo $_GET['var15']; ?>" class = "form-control input-sm text-center">
                                        </td> 
                                        <td></td> <td></td> <td></td>
                                    </tr>
                                </table>


                        </form>
                    </div>

                </section>
                <script src="js/approve_kotEntry.js"></script>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h4 class="modal-title" id="myModalLabel">Please Login</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="form-signin">

                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <input type="text" id="inputEmail" class="form-control" placeholder="User Name" required autofocus>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-3">
                                                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <input type="hidden" id="action">
                                        <input type="hidden" id="form">

                                    </div>
                                </div> <!-- /container -->
                                <span   id="txterror">

                                </span>
                            </div>

                            <div class="modal-footer">

                                <button class="btn btn-primary"  onclick="IsValiedData();">Sign in</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/approve_kotEntry.js"></script><!-- Modal -->
                <div class="modal fade" id="myModal_c" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Confirm Cancel</h4>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="form-signin">

                                        <div class="modal-body">
                                            <p>Cancel this entry?&hellip;</p>
                                        </div>
                                        <input type="hidden" id="action">
                                        <input type="hidden" id="form">

                                    </div>
                                </div> <!-- /container -->
                                <span   id="txterror">

                                </span>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button class="btn btn-primary"  onclick="cancel_inv();">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="js/approve_kotEntry.js"></script>  
                <style>

                    .sf-bottom-list li img {
                        float: left;
                        margin-right: 5px;
                    }
                </style>

                <footer class="footer">

                </footer>



                </body>
                </html>


                <!-- jQuery 2.2.3 -->
                <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
                <!-- Bootstrap 3.3.6 -->
                <script src="bootstrap/js/bootstrap.min.js"></script>
                <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
                <script type="text/javascript">
                                                $(function () {
                                                    $('.dt').datepicker({
                                                        format: 'yyyy-mm-dd',
                                                        autoclose: true
                                                    });
                                                });
                </script>

                <!-- FastClick -->
                <script src="plugins/fastclick/fastclick.js"></script>
                <!-- AdminLTE App -->
                <script src="dist/js/app.min.js"></script>
                <!-- Sparkline -->
                <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
                <!-- jvectormap -->
                <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
                <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
                <!-- SlimScroll 1.3.0 -->
                <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
                <!-- ChartJS 1.0.1 -->
                <script src="plugins/chartjs/Chart.min.js"></script>
                <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
                <script src="dist/js/pages/dashboard2.js"></script>
                <!-- AdminLTE for demo purposes -->
                <script src="dist/js/demo.js"></script>

                <script src="js/user.js"></script>



                <script src="js/comman.js"></script>

                <script>
                                                $("body").addClass("sidebar-collapse");
                </script>  

                <?php
                include './connection_sql.php';

                include 'search_costing_form.php';
                ?>

