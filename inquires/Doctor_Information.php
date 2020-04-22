
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doctor Information</title>

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
            .form-group {margin-bottom : 9px; }
            .btnupload{

                -webkit-border-radius: 30px 30px 30px 30px;
                border-radius: 30px 30px 30px 30px;
            }
           
            .labelColour{color: blue};
/*            margin-top: 6px;
            }
            .combo{
                 margin-top: 6px;*/
/*            }*/
            
        </style>
    </head>

    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
               <a href="home.php" class="logo"> <!-- mini logo for sidebar mini 50x50 pixels --> <span class="logo-mini"><b>H</b>MS</span> <!-- logo for regular state and mobile devices --> <span class="logo-lg"><b>HOSPITAL</b>&nbsp;HOLDING</span> </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"> <span class="sr-only">Toggle navigation</span> </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!--                                                 Messages: style can be found in dropdown.less
                                                
                                                                             Notifications: style can be found in dropdown.less 
                                                
                                                                             Tasks: style can be found in dropdown.less 
                                                
                                                                             User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                    <span class="hidden-xs">Alexander Pierce</span>
                                </a>
                                <ul class="dropdown-menu">
                                    User image 
                                    <li class="user-header">
                                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                        <p>
                                        </p>
                                    </li>
                                    <!--                                                         Menu Body -->
                                    <!--                                                        <li class="user-body">
                                                        
                                                                                                 /.row 
                                                                                            </li>-->
                                    <!--Menu Footer-->
                                    <li class="user-footer">
                                        <!--                                                            <div class="pull-left">
                                                                                                        <a href="mspace" class="btn btn-default btn-flat">Profile</a>
                                                                                                    </div>-->
                                        <div class="pull-right">
                                            <a onclick="logout();" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!--Control Sidebar Toggle Button--> 
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
                                <tr><th align='left' bgcolor='#f57900' colspan="5"><span style='background-color: #cc0000; color: #fce94f; font-size: x-large;'>( ! )</span> Notice: Undefined index: UserName in C:\wamp64\www\wings_simple_2\header.php on line <i>100</i></th></tr>
                                <tr><th align='left' bgcolor='#e9b96e' colspan='5'>Call Stack</th></tr>
                                <tr><th align='center' bgcolor='#eeeeec'>#</th><th align='left' bgcolor='#eeeeec'>Time</th><th align='left' bgcolor='#eeeeec'>Memory</th><th align='left' bgcolor='#eeeeec'>Function</th><th align='left' bgcolor='#eeeeec'>Location</th></tr>
                                <tr><td bgcolor='#eeeeec' align='center'>1</td><td bgcolor='#eeeeec' align='center'>0.0025</td><td bgcolor='#eeeeec' align='right'>260600</td><td bgcolor='#eeeeec'>{main}(  )</td><td title='C:\wamp64\www\wings_simple_2\home.php' bgcolor='#eeeeec'>...\home.php<b>:</b>0</td></tr>
                                <tr><td bgcolor='#eeeeec' align='center'>2</td><td bgcolor='#eeeeec' align='center'>0.0069</td><td bgcolor='#eeeeec' align='right'>314680</td><td bgcolor='#eeeeec'>include( <font color='#00bb00'>'C:\wamp64\www\wings_simple_2\header.php'</font> )</td><td title='C:\wamp64\www\wings_simple_2\home.php' bgcolor='#eeeeec'>...\home.php<b>:</b>16</td></tr>
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
                            <h3 class="box-title"><b>DOCTOR INFORMATION</b></h3>
                        </div>
                        <form name= "form1" role="form" class="form-horizontal">

                            <div class="box-body">
                                <!--                                <div class="form-group-sm">
                                                                    <a onclick="sess_chk('new', 'pch');" class="btn btn-default btn-sm">
                                                                        <span class="fa fa-user-plus"></span> &nbsp; New
                                                                    </a>
                                                                    <a onclick="sess_chk('save', 'pch');" class="btn btn-success btn-sm">
                                                                        <span class="fa fa-save"></span> &nbsp; Edit
                                                                    </a>                    
                                                                    <a  onclick="sess_chk('print1', 'rec');" class="btn btn-default btn-sm">
                                                                        <span class="fa fa-print"></span> &nbsp; Save
                                                                    </a>
                                                                    <a  onclick="sess_chk('print', 'rec');" class="btn btn-default btn-sm">
                                                                        <span class="glyphicon glyphicon-trash"></span> &nbsp; Delete
                                                                    </a>
                                                                    <a onclick="sess_chk('delete', 'crn');" class="btn btn-success btn-sm">
                                                                        <span class="glyphicon glyphicon-off"></span> &nbsp; Exit
                                                                    </a>
                                                                </div>-->

                                <input type="hidden" id="tmpno" class="form-control">

                                <input type="hidden" id="item_count" class="form-control">



                                <div id="msg_box"  class="span12 text-center"  ></div>

                                <!--                                <div class="form-group">
                                                                    <label class="col-sm-1 control-label"style="margin-Right: 10px; ">Code</label>
                                                                    <label class="col-sm-1 control-label" >Description</label>
                                                                    <div class="col-sm-3">                     
                                                                    </div>
                                                                    <label class="col-sm-2 control-label" >Doctor Charge</label>
                                
                                                                    <label class="col-sm-2 control-label"  style="margin-left: 20px;">Hospital Charge</label>
                                                                    <label class="col-sm-2 control-label" >Active</label>
                                                                </div>-->

                                <div class="form-group-sm">
                                    <label class="col-sm-1 input-sm labelColour" style="text-align: left; background-color: #b3d1ff;" id="doctorcode" for="doctor">Doctor Code</label>
                                    <div class="col-sm-2">
                                        <input type="text" placeholder="Doctor Code" id="txt_patient" class="form-control input-sm">
                                    </div>

                                    <label class="col-sm-1 input-sm labelColour" style="text-align: left; background-color: #b3d1ff;" for="doctor">Date From</label>
                                    <div class="col-sm-2">
                                        <input type="date" placeholder="Date From" id="txt_patient" class="form-control input-sm">
                                    </div>
                                    <div class="col-sm-3">
                                        
                                    </div>

                                    <label class="col-sm-1 input-sm labelColour" style="text-align: left; background-color: #b3d1ff;" for="doctor">Catergory 1</label>
                                    <div class="col-sm-2 combo">
                                        <select id="doctor" class="form-control input-sm" onchange="">
                                            <option value="production">ee</option>
                                            <option value="">we</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <div class="form-group-sm">
                                    <label class="col-sm-1 input-sm labelColour" style="text-align: left; background-color: #b3d1ff;" for="doctor">Bill No</label>
                                    <div class="col-sm-2 combo">
                                        <input type="text" placeholder="Bill No" id="txt_patient" class="form-control input-sm">
                                    </div>

                                    <label class="col-sm-1 input-sm labelColour"  style="text-align: left; background-color: #b3d1ff;"for="doctor">Date To</label>
                                    <div class="col-sm-2">
                                        <input type="date" placeholder="Date To" id="txt_patient" class="form-control input-sm">
                                    </div>


                                    <label class="col-sm-1 input-sm  labelColour" style="text-align: left; background-color: #b3d1ff;" for="doctor">Type</label>
                                    <div class="col-sm-2 ">
                                        <select id="doctor" class="form-control input-sm combo" onchange="">
                                            <option value="production">ee</option>
                                            <option value="">we</option>
                                        </select>
                                    </div>


                                    <label class="col-sm-1 input-sm labelColour"style="text-align: left; background-color: #b3d1ff;" for="doctor">Catergory 2</label>
                                    <div class="col-sm-2 ">
                                        <select id="doctor" class="form-control input-sm combo  " onchange="">
                                            <option value="production">ee</option>
                                            <option value="">we</option>
                                        </select>
                                    </div>
                                </div>

                                <br>
                                <br>
                                <br>

                                <div class="form-group-sm">
                                    <table class="table table-striped"> 
                                        <tr class="info">
                                            <th class="col-sm-1">Bill NO</th>
                                            <th class="col-sm-2">App Date</th>
                                            <th class="col-sm-2">Amount</th>
                                            <th class="col-sm-2">Doctor</th>
                                            <th class="col-sm-2">Type</th>
                                            <th class="col-sm-2">Billed</th>
                                            <th class="col-sm-2">P.Name</th>

                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>eeeee</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>1</td>
                                            <td>eeeee</td>
                                            <td>0</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>eeeee</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>1</td>
                                            <td>eeeee</td>
                                            <td>0</td>
                                        </tr>

                                        <tr>
                                            <td>1</td>
                                            <td>eeeee</td>
                                            <td>0</td>
                                            <td>0</td>
                                            <td>1</td>
                                            <td>eeeee</td>
                                            <td>0</td>

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


