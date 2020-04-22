
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"><strong>KOT Register</strong></h2>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">
                <div class="form-group">
                    <label  class="col-sm-2 control-label text-center"  for="invno">Month</label>
                    <div class="col-sm-2">
                        <input type="Date" value="<?php echo date('Y M'); ?>" id="month" class="form-control dt input-sm">
                    </div>
                    <a onclick="generat();" class="btn btn-default btn-sm">
                        <span class="fa fa-server"></span> &nbsp; GENERATE
                    </a>
                </div>

                <div id="tab_con"></div>


                <div class="form-group">
                    <hr>

                    <div class="form-group"></div>
                    <div class="form-group"></div>

                    <label  class="col-sm-10 control-label"  for="grand_tot">Total Completed KOD</label>
                    <div class="col-sm-2">
                        <input type="text" id="tot_com_kod" class="form-control  input-sm">
                    </div>
                    <div class="form-group"></div>

                </div>

            </div>
        </form>
    </div>

</section>
<script src="js/kod_registers.js"></script>
<script>

</script>

<script>

</script> 

