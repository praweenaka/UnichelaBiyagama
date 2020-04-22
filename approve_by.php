<?php
session_start();
?>
<!-- Main content -->
<section class="content">

    <div class="box box-header">
        <div class="box-header with-border ">
            <h3 class="box-title"><b>Approve By</b></h3>
        </div>
        <form name= "form1" role="form" class="form-horizontal">

            <div class="box-body">


                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" class="form-control">

                <div class="form-group-sm">



                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>

                    <a onclick="save_inv();" class="btn btn-success btn-sm">
                        <span class="fa fa-save"></span> &nbsp; SAVE
                    </a>
                    <!--                    <a onclick="update();" class="btn btn-warning btn-sm">
                                            <span class="glyphicon glyphicon-edit"></span> &nbsp; EDIT
                                        </a>-->
                    <a onclick="deleteproduct();" class="btn btn-danger btn-sm">
                        <span class="glyphicon glyphicon-trash"></span> &nbsp; DELETE
                    </a>


                    <div class="form-group"></div>
                </div>

                <div id="msg_box"  class="span12 text-center"></div>


                <div class="form-group-sm">
                    <label class="col-sm-2 labelColour input-sm" >Name</label>
                    <div class="col-sm-2 form-group-sm">
                        <?php
                        echo"<select id = \"nameTxt\" class =\"form-control input-sm\">";
                        $sql = "select * from user_mast where user_type !='CANTEEN'";
                        foreach ($conn->query($sql) as $row) {
                            echo "<b><option value = '" . trim($row["user_name"]) . "'>" . $row["user_name"] . "</option></b>";
                        }
                        echo"</select>";
                        ?>
                    </div>
                </div>
                <!--                <a onclick="NewWindow('search_panalti.php?stname=code', 'mywin', '800', '700', 'yes', 'center');
                        return false" href="" class="btn btn-default btn-sm">
                                    <span class="fa fa-search"></span> &nbsp;
                                </a>-->
                <div class="form-group"></div>
                <div class="form-groups-sm hidden">
                    <label class="col-sm-2 labelColour input-sm" > Email</label>
                    <div class="col-sm-3 form-group-sm ">
                        <input type="email" class="col-sm-4 form-control" id="emailTxt" placeholder="Email">       
                    </div>


                </div>
                <div class="form-group"></div>
                <div class="form-group-sm hidden">
                    <label class="col-sm-2 labelColour input-sm" >Department</label>
                    <div class="col-sm-3 form-group-sm">
                        <input type="text" class="col-sm-2 form-control" id="departmentcombo" placeholder="Department">       
                        <?php
//                        echo"<select id = \"departmentcombo\" class =\"form-control input-sm\">";
//                        $sql = "select user_depart from user_mast where user_name='" . $_GET['nameTxt'] . "'";
//                        foreach ($conn->query($sql) as $row) {
//                            echo "<b><option value='" . trim($row["user_depart"]) . "'>" . $row["user_depart"] . "</option></b>";
//                        }
//                        echo"</select>";
                        ?>
                    </div>                          
                </div>

                <!--            </div>
                    </div>-->

                <div id="itemdetails"></div>
            </div>

        </form>
    </div>
</div>
</section>



<script src="js/approve_by.js"></script>
<script>
                        newent();
</script>