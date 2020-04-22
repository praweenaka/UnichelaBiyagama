
<!-- Main content -->
<section class="content">
    <div class="box box-primary col-lg-12">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <div class="box-header with-border">
            <h3 class="box-title"><b>REPORTS</b></h3>
        </div>

        <form role="form" name ='form1' action="report_outstanding.php" target="_blank" method="GET" class="form-horizontal">
            <div class="box-body">

                <div class="form-group-sm">
                    <div class="col-sm-2">
                        <fieldset>
                            <legend>
                                Date Range
                            </legend>
                        </fieldset>
                    </div>
                    <label  class="col-sm-1 control-label text-center"  for="invno">From</label>
                    <div class="col-sm-2">
                        <input type="text" value="<?php echo date('Y-m-d'); ?>" id="from" name="from" class="form-control dt input-sm">
                    </div>
                </div>
                <div class="form-group">

                    <label  class="col-sm-1 control-label text-center"  for="invno">To</label>
                    <div class="col-sm-2">
                        <input type="text" value="<?php echo date('Y-m-d'); ?>" id="to" name="to" class="form-control dt input-sm">
                    </div>
                    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox"  value="datecheck" name="datecheck"> <b>Date Range</b>
                    <div class="col-sm-2">
                        <select id="department" name="department" class="form-control">
                            <option value="All">All</option>
                            <option value="HR">HR</option>
                            <option value="PRODUCTION">PRODUCTION</option>
                            <option value="QUALITY">QUALITY</option>
                            <option value="CUTTING">CUTTING</option>
                            <option value="PCU">PCU</option>
                            <option value="COMMERCIAL">COMMERCIAL</option>
                            <option value="R & I">R & I</option>
                            <option value="BONDING">BONDING</option>
                            <option value="FINANCE">FINANCE</option>
                            <option value="MAINTENANCE">MAINTENANCE</option>
                            <option value="COOPERATE">COOPERATE</option>
                            <option value="MOS">MOS</option>
                            <option value="PLAINING">PLAINING</option>
                            <option value="OTHER">OTHER</option>
                            <option value="IE">IE</option>
                            <option value="RM & FG">RM & FG</option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="kotentry" value="kotentry">
                            Pending Kot Entries
                        </label>

                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="finishentry" value="finishentry">
                            Approved Kot Entries
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="Canteenfinishentry" value="Canteenfinishentry">
                            Canteen Approved Kot Entries
                        </label>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="kotentrycancel" value="kotentrycancel">
                            Canceled  Kot Entries
                        </label>
                    </div>

                    <div class="radio">
                        <label>
                            <input type="radio" name="optionsRadios" id="kotentrycanteencancel" value="kotentrycanteencancel">
                            Canteen Canceled Kot Entries
                        </label>
                    </div>
                </div>

                <div class="form-group"></div>

                <div class="form-group">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-2">
                        <input type="submit" class="btn btn-default fa fa-print"  value="View">
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
</section>
</div>
<script src="js/repo.js"></script>

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
<script src="js/user.js"></script>
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
