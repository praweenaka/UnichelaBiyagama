
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Stock Card</title>

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
            .labelColour{
                color: blue;
                background-color: #b3d1ff;
               
            }
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="home.php" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span class="logo-mini"><b>H</b>MS</span> <!-- logo for regular state and mobile devices --> <span class="logo-lg"><b>Hospital</b>ManagementSystem</span> </a>
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
                                    <span class="hidden-xs">Alexander Pierce</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">

                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="mspace" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a onclick="logout();" class="btn btn-default btn-flat">Sign out</a>
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
                                <br />
                            <font size='1'><table class='xdebug-error xe-notice' dir='ltr' border='1' cellspacing='0' cellpadding='1'>
                                <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: UserName in E:\wamp64\www\wings_simple_2\header.php on line <i>100</i></th></tr>
                                <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
                                <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
                                <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0020</td><td bgcolor='#eeeeec' align='right'>259672</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='E:\wamp64\www\wings_simple_2\home.php' bgcolor='#eeeeec'>...\home.php<b>:</b>0</td></tr>
                                <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0059</td><td bgcolor='#eeeeec' align='right'>313736</td><td bgcolor='#eeeeec'>include( <font color='#00bb00'>'E:\wamp64\www\wings_simple_2\header.php'</font> )</td><td title='E:\wamp64\www\wings_simple_2\home.php' bgcolor='#eeeeec'>...\home.php<b>:</b>16</td></tr>
                            </table></font>
                            </p>
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
                        <li class="header">
                            MAIN MENU
                        </li>
                        <li class="treeview">
                            <a href="#"> <i class="fa fa-th"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i> </a>
                            <ul class="treeview-menu ">



                                <li>                                <a href="home.php?url=Airport"><i class="fa fa-circle-o"></i>Airport Details</a></li>


                                                        <!--<a href="home.php?url=cusmas"><i class="fa fa-circle-o"></i>Clients Details</a></li>-->

                                                        <!--<a href="home.php?url=Carrier"><i class="fa fa-circle-o"></i>Carrier Details</a></li>-->

                                <li>                        <a href="home.php?url=Container"><i class="fa fa-circle-o"></i>Container Types</a></li>

                                <li>                        <a href="home.php?url=LoadUnload"><i class="fa fa-circle-o"></i>Loading / Unloading Places</a></li>

                                <li>                        <a href="home.php?url=Package_type"><i class="fa fa-circle-o"></i>Package Type</a></li>

                                                        <!--<a href="home.php?url=Charge_code"><i class="fa fa-circle-o"></i>Charge Code</a></li>-->

                                <li>                                <a href="home.php?url=item-master"><i class="fa fa-circle-o"></i>PO Items</a></li>


                                <li>                        <a href="home.php?url=pr"><i class="fa fa-circle-o"></i>PR</a></li>



                                <li>                        <a href="home.php?url=Currency"><i class="fa fa-circle-o"></i>Currency</a></li>

                                <li>                        <a href="home.php?url=Vessel"><i class="fa fa-circle-o"></i>Vessel</a></li>

                                                <!--<a href="home.php?url=Sales_rep"><i class="fa fa-circle-o"></i>Sales Rep</a></li>-->

                        <!--                                                                        <a href="home.php?url=helpdesk"><i class="fa fa-circle-o"></i>Help Desk</a></li>-->
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

                                        <!--<a href="home.php?url=Consol_Costing"><i class="fa fa-circle-o"></i>Consol Costing</a></li>-->
                                <li>                    <a href="home.php?url=jou"><i class="fa fa-circle-o"></i>Journal Entry</a></li>

                                <li>                    <a href="home.php?url=Receipt_entry"><i class="fa fa-circle-o"></i>Direct Receipt</a></li>

                    <li>                    <!--<a href="home.php?url=Return_Receipt"><i class="fa fa-circle-o"></i>Return Cheque Entry</a></li>-->

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
                        </li>



                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">

                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><b>Stock Card</b></h3>
                        </div>
                        <form name= "form1" role="form" class="form-horizontal">

                            <div class="box-body">
                                <div class="form-group-sm">
                                    <a onclick="sess_chk('new', 'pch');" class="btn btn-primary btn-sm">
                                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT
                                    </a>
                                    <a onclick="sess_chk('save', 'pch');" class="btn btn-success btn-sm">
                                        <span class="fa fa-save"></span> &nbsp; SUP CARD
                                    </a>                    
                                    <a  onclick="sess_chk('print1', 'rec');" class="btn btn-default btn-sm">
                                        <span class="fa fa-print"></span> &nbsp; CLOSE
                                    </a>
                                </div>
                                <br>
                                <input type="hidden" id="tmpno" class="form-control">

                                <input type="hidden" id="item_count" class="form-control">



                                <div id="msg_box"  class="span12 text-center"  ></div>

                                <div class="form-group">
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">January</span>

                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">February</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">March</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">April</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">May</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">June</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">July</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">August</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">September</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">October</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">November</span>
                                    </div>
                                    <div class="col-sm-1">
                                        <span class="label label-info"  class="col-sm-1">December</span>
                                    </div>
                                </div>

                                <div class="form-group">

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="des"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                    <div class="col-sm-1">
                                        <input type="text" placeholder="" id="doctor"class="col-sm-1"/>
                                    </div>
                                </div>
                                <div class="form-group"></div>
                                <br>
                                <div class="form-group-sm">
                                    <label class="col-sm-2 input-sm labelColour" for="invno">Item Code</label>
                                    <div class="col-sm-2">


                                        <select id="currency" class="form-control input-sm">
                                            <option value=""></option>
                                        </select>

                                    </div>
                                    <br>
                                    <br>
                                    <label class="col-sm-2 input-sm labelColour" for="invno">Items Names</label>
                                    <div class="col-sm-4">
                                        <input type="text" placeholder="Items Names" id="txt_entno" class="form-control  input-sm"> 

                                    </div>
                                   
                                </div>
                                <br>
                                <br>
                                <div class="form-group-sm">
                                    <label class="col-sm-2 input-sm labelColour" for="invno">Prepare To</label>



                                    <div class="col-sm-4">
                                        <input type="date" placeholder="date" name="date" id="datee" class="form-control dt input-sm">

                                    </div>

                                </div>
                                <br>
                                <br>
                                <div class="form-group-sm">
                                    <label class="col-sm-2 input-sm labelColour" for="invno">Department</label>
                                    <div class="col-sm-4">
                                      <!-- <input type="text" placeholder="Department" id="txt_entno" class="form-control  input-sm"> -->
                                        <select id="currency" class="form-control input-sm">
                                            <option value=""></option>
                                        </select>
<!--                                           <input type="text" placeholder="Patient" id="txt_entno" class="form-control  input-sm">
                                        <input type="text" placeholder="Patient" id="txt_entno" class="form-control  input-sm">-->
                                    </div>
                                    <div class="col-sm-1">
                                        <a onfocus="this.blur()" onclick="NewWindow('serach_inv.php', 'mywin', '800', '700', 'yes', 'center');
                                                return false" href="">
<!--                                            <input type="button" class="btn btn-default "  id="searchcust" name="searchcust">-->

                                        </a>
                                    </div>




                                </div>
                                <br>
                                <br>
                                <div class="form-group-sm">
                                    <label class="col-sm-2 input-sm labelColour" for="invno">Part No</label>
                                    <div class="col-sm-2">

                                        <input type="text" placeholder="Part No" id="txt_entno" class="form-control  input-sm">


                                    </div>

                                    <div class="col-sm-1">
                                        <a onfocus="this.blur()" onclick="NewWindow('serach_inv.php', 'mywin', '800', '700', 'yes', 'center');
                                                return false" href="">
<!--                                            <input type="button" class="btn btn-default "  id="searchcust" name="searchcust">-->

                                        </a>
                                    </div>


                                </div>



                                <div class="form-group-sm">
                                    <table class="table table-striped" style="width:100%"> 
                                        <tr>
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-1"></td>
                                            <td class="col-sm-1"></td>
                                            <td>
                                                <table class="table table-striped" style="width:60%">
                                                    <tr>
                                                        <td>
                                                            <label class="col-sm-4 control-label" for="invno">Selling</label>
                                                            <div class="col-sm-4">

                                                                <input type="text" placeholder="Selling" id="txt_entno" class="form-control  input-sm">


                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="" width=""  height=""></td>
                                                    </tr>
                                                    <tr>
                                                    <table class="table table-striped" style="width:40%">
                                                        <tr>
                                                            <td>Department</td>
                                                            <td>Stock</td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </table >
                                        </tr>
                                    </table>
                                    </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </table>
                                    <table class="table table-striped" style="width:40%">

                                    </table>
                                </div>

                                <div class="form-group-sm" >
                                    <table class="table table-striped" style="width:40%">
                                        <tr>
                                            <td>
                                                <label class="col-sm-4 control-label" for="invno">Pending Orders</label>
                                                <div class="col-sm-4">

                                                    <input type="text" placeholder="Pending Orders" id="txt_entno" class="form-control  input-sm">

<!--                                           <input type="text" placeholder="Patient" id="txt_entno" class="form-control  input-sm">
 <input type="text" placeholder="Patient" id="txt_entno" class="form-control  input-sm">-->
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </form>
                    </div>

                </section>
                <script src="js/invoice.js"></script>
                <script>
                                            new_inv();
                </script>
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
                <script src="js/user.js"></script><!-- Modal -->
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
                <script src="js/user.js"></script>    <style>

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



