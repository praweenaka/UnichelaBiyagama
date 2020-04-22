<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"><strong>Report</strong></h2>
        </div>
        <form name= "form1" role="form" class="form-horizontal">
            <div class="box-body">

                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">

                    <a onclick="sess_chk('new', 'crn');" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a onclick="sess_chk('save', 'crn');" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>

                    <a onclick="print();" class="btn btn-default btn-sm">
                        <span class="glyphicon glyphicon-print"></span> &nbsp; PRINT INVOICE
                    </a>


                    <a onclick="sess_chk('delete', 'crn');" class="btn btn-danger btn-sm">
                        <span class="fa fa-trash-o"></span> &nbsp; DELETE
                    </a>

                </div>

                <div id="msg_box"  class="span12 text-center"  ></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group-sm">
                    <div class="col-sm-2">
                        <fieldset>
                            <legend>
                                Month
                            </legend>
                        </fieldset>
                    </div>
                    <label  class="col-sm-1 control-label text-center"  for="invno"></label>
                    <div class="col-sm-2">
                        <input type="Date" value="<?php echo date('M Y'); ?>" id="month" class="form-control dt input-sm">
                    </div>
                    <a onclick="generate();" class="btn btn-default btn-sm">
                        <span class="fa fa-server"></span> &nbsp; GENERATE
                    </a>
                </div>
                <div class="form-group">

                </div>
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
                        <input type="Date" value="<?php echo date('Y-m-d'); ?>" id="from" class="form-control dt input-sm">
                    </div>
                </div>
                <div class="form-group">

                    <label  class="col-sm-1 control-label text-center"  for="invno">To</label>
                    <div class="col-sm-2">
                        <input type="Date" value="<?php echo date('Y-m-d'); ?>" id="to" class="form-control dt input-sm">
                    </div>

                    <a onclick="generateDateRange();" class="btn btn-default btn-sm">
                        <span class="fa fa-server"></span> &nbsp; GENERATE
                    </a>

                </div>
                <div class="form-group">
                </div>  
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <table class="table table-striped">
                    <tr class='danger '>
                        <th style="width: 220px;">Entry No</th>
                        <th style="width: 320px;">Description</th>
                        <th style="width: 320px;">Date</th>
                        <th style="width: 182px;">Price</th>
                    </tr>
                </table>
                <div id="tab_con">

                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-9 control-label"  for="grand_tottxt">TOTAL</label>
                <div class="col-sm-2">
                    <input type="text" id="total" style="text-align: right" class="form-control  input-sm">
                </div>
            </div>
            <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
            <div class="form-group"></div>
    </div>
</form>
</div>

</section>
<script src="js/invoice.js"></script>
<script>
                        new_inv();
</script>

<script>
    dv();
</script>    