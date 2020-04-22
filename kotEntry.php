<?php
session_start();
?>
<?php
$_SESSION['mealType'] = "breakFast";
?>
<!-- Main content -->
<section class="content">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h2 class="box-title"><strong>KOT ENTRY</strong></h2>
        </div>
        <form name= "form1" role="form" class="form-horizontal">
            <div class="box-body">

                <input type="hidden" id="tmpno" class="form-control">

                <input type="hidden" id="item_count" value = "1" class="form-control">

                <div class="form-group-sm">

                    <a onclick="newent();" class="btn btn-default btn-sm">
                        <span class="fa fa-user-plus"></span> &nbsp; NEW
                    </a>
                    <a  onclick="cancel_inv();" class="btn btn-danger btn-sm">
                        <span class="fa fa-remove"></span> &nbsp; CANCEL
                    </a>

                    <?php
                    $sql = "select * from view_menu where username= '" . strtoupper($_SESSION["CURRENT_USER"]) . "' and docid= '27'";

                    $result = $conn->query($sql);
                    $row = $result->fetch();
                    if ($row['doc_view'] == "1") {
                        ?>

                        <a  onclick="save_inv();" id="save" class="btn btn-success btn-sm">
                            <span class="fa fa-save"></span> &nbsp; APPROVE
                        </a>
                        <?php
                    } else {
                        ?>
                        <a  onclick="save_inv();" id="save" class="btn btn-success btn-sm">
                            <span class="fa fa-save"></span> &nbsp; SUBMIT
                        </a>
                        <?php
                    }
                    ?>
                    <a onclick="issueNote();" style="visibility: hidden;" class="btn btn-primary btn-sm" id="but">
                        <span class="fa fa-product-hunt"></span> &nbsp; Approved
                    </a>

                </div>

                <div class="form-group-sm"></div>
                <div class="form-group"></div> 
                <div class="form-group"></div>

                <div id="msg_box"  class="span12 text-center"  ></div>

                <div class="form-group"></div>
                <div class="form-group"></div>

                <table class="col-md-12" >
                    <tr >
                        <td class="col-md-10">
<!--                            <input id="aplvl" value="1" class="hidden">-->
                            <input id="apstep" value="0" class="hidden">
                            <input id="cancel" value="0" class="hidden">

                            <input type="hidden"  id="tmpno1" >

                            <div class="form-group-sm">

                                <label  class="col-sm-2 text-right " for="invno">Entry No</label>
                                <div class="col-sm-1">
                                    <input type="text" placeholder="Entry No" disabled id="entryNoTxt" class="form-control  input-sm">
                                </div>
                                <div class="col-sm-1"> 
                                    <?php
                                    $sql = "select * from view_menu where username= '" . strtoupper($_SESSION["CURRENT_USER"]) . "' and docid= '27'";

                                    $result = $conn->query($sql);
                                    $row = $result->fetch();
                                    if ($row['doc_view'] == "1") {
                                        ?>
                                        <a onclick = "NewWindow('search_kotEntry.php', 'mywin', '800', '700', 'yes', 'center');" class = "btn btn-default btn-sm">
                                            <span class = "fa fa-search"></span> &nbsp
                                        </a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <label class="col-sm-2 text-right" for="type"> Visitor Type</label>
                                <div class="col-sm-2">
                                    <?php
                                    echo"<select id = \"visitorTypeCombo\" class =\"form-control input-sm\">";
                                    $sql = "select * from visiter_type";
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<b><option value='" . trim($row["visiter_type"]) . "'>" . $row["visiter_type"] . "</option></b>";
                                    }
                                    echo"</select>";
                                    ?>
                                </div>
                            </div>

                            <div class="form-group"></div>


                            <div class="form-group"></div>

                            <div class="form-group-sm">
                                <label class="col-sm-2 text-right" for="name_of_visitor">Visit Details </label>
                                <div class="col-sm-2">
                                    <input type="text" id="nameOfVisitorTxt" placeholder="Visit Details" class="form-control  input-sm">
                                </div>
                                <label class="col-sm-2 text-right" for="no_of_person">No of Visitors</label>
                                <div class="col-sm-2">
                                    <input type="text" id="noOfVisitorTxt"  placeholder="No of Vistors" class="form-control  input-sm">
                                </div>
                                <label class="col-sm-2 text-right" for="type">Request By</label>
                                <div class="col-sm-2">
                                    <?php
                                    $sql = "select user_depart from user_mast where user_name ='" . $_SESSION["CURRENT_USER"] . "'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch();
                                    echo"<input type=\"text\" id=\"orderby\" value=\"" . $_SESSION["CURRENT_USER"] . "\" disabled class=\"form-control input-sm\"/>";
                                    ?>
                                </div>
                            </div>

                            <div class="form-group"></div>

                            <div class="form-group-sm">
                                <label class="col-sm-2 text-right" for="department_name">Department</label>
                                <div class="col-sm-2">

                                    <?php
                                    echo"<select id = \"departmentCombo\" class =\"form-control input-sm\">";
                                    $sql = "select * from creditdepart_master";
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<b><option value='" . trim($row["user_depart"]) . "'>" . $row["user_depart"] . "</option></b>";
                                    }
                                    echo"</select>";
                                    ?>

                                </div>
                                <label class="col-sm-2 text-right" for="no_of_person">No Of Employees</label>
                                <div class="col-sm-2">
                                    <input type="text" id="noOfPersonTxt" onchange="counter();" placeholder="No Of Employees" class="form-control  input-sm">
                                </div>
                                <label class="col-sm-2 text-right" for="no_of_person">Credit Account</label>
                                <div class="col-sm-2">
                                    <?php
                                    $sql = "select user_depart from user_mast where user_name ='" . $_SESSION["CURRENT_USER"] . "'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch();
                                    echo"<input type=\"text\"  id=\"creditCombo\" value=\"" . $row['user_depart'] . "\" disabled class=\"form-control input-sm\"/>";
                                    ?>

                                </div>

                            </div>

                            <div class="form-group"></div>

                            <div class="form-group-sm">
                                <label class="col-sm-2 hidden text-right" for="invdate">Entry Date</label>
                                <div class="col-sm-3 hidden">
                                    <input type="text"   placeholder="Date" id="entryDate" value="<?php echo date("Y-m-d h:i:s"); ?>" class="hidden form-control dt input-sm">
                                </div>
                                <label class="col-sm-2 text-right" for="contact">Required Date</label>
                                <div class="col-sm-2">
                                    <input type="text"  id="requireDate" placeholder="Require Date"  class="form-control dt  input-sm"/>
                                </div> </div>  

                            <div class="form-group"></div>
                            <div class="form-group-sm">
                                <label class="col-sm-2 text-right">Special Instructions</label>
                                <div class="col-sm-2">
                                    <textarea rows="2" id="remarkTxt"  placeholder="Special Instructions" class="form-control  input-sm"></textarea>
                                </div>
                                <label class="col-sm-2 text-right">Contact No</label>
                                <div class="col-sm-2">
                                    <input type="text"  id="contactTxt" placeholder="Contact No" class="form-control input-sm"/>
                                </div>

                                <label class="col-sm-2 text-right" for="no_of_person">Approve By</label>
                                <div class="col-sm-2">
                                    <?php
                                    $sql = "select name from approve_by where department = '" . $row['user_depart'] . "' and name != '" . strtoupper($_SESSION["CURRENT_USER"]) . "'";
                                    $result = $conn->query($sql);
                                    $row = $result->fetch();
                                    echo"<select id = \"approveCombo\" multiple='multiple' class =\"form-control input-sm\">";
                                    foreach ($conn->query($sql) as $row) {
                                        echo "<b><option value='" . trim($row["name"]) . "'>" . $row["name"] . "</option></b>";
                                    }
                                    echo"</select>";
                                    ?>

                                </div>
                            </div>

                            <div class="form-group"></div>
                            <div class="form-group-sm hidden"  >
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Standard_BreakFast');"  value="None Retanable" id="radio13"/>Standard Breakfast &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Standard_Lunch');"   value="None Retanable" id="radio15"/>Standard Lunch &nbsp;&nbsp;&nbsp;

                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Standard_Dinner');"   value="None Retanable" id="radio14"/>Standard Dinner &nbsp;&nbsp;&nbsp;
                                </div>
                            </div>

                            <div class="form-group"></div>
                            <div class="form-group-sm">

                                <label class="col-sm-2 text-right">Menu Type</label>
                                <div class="col-sm-2" >
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 16 Hours  Before The Require Time"  onchange="food('BreakFast');"  checked="" value="Retanable" id="radio1"/>&nbsp;&nbsp;Breakfast &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 3 Hours  Before The Require Time" onchange="food('Lunch');"  value="None Retanable" id="radio3"/> Lunch &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 6 Hours  Before The Require Time" onchange="food('Dinner');"  value="None Retanable" id="radio2"/>&nbsp;&nbsp;Dinner &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 6 Hours  Before The Require Time" onchange="food('Menu 130');"  value="None Retanable" id="radio17"/>&nbsp;&nbsp;Menu 130 &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-md-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 6 Hours  Before The Require Time" onchange="food('Hurbal Drink');"  value="None Retanable" id="radio18"/>&nbsp;&nbsp;Hurbal Drink &nbsp;&nbsp;&nbsp;
                                </div>

                            </div>
                            <div class="form-group"></div>

                            <div class="form-group-sm">
                                <label class="col-sm-2 text-right"></label>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Tea/PlainTea/Coffee');"  value="None Retanable" id="radio4"/>Tea /Plain Tea /Coffee &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 3 Hours  Before The Require Time" onchange="food('Special_Dishes');"  value="None Retanable" id="radio5"/>Special Dishes &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours  Before The Require Time" onchange="food('Sandwiches');"  value="None Retanable" id="radio6"/>Sandwiches &nbsp;&nbsp;&nbsp;
                                </div>

                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Days  Before The Require Time" onchange="food('VIP');"  value="None Retanable" id="radio12"/><b>VIP</b> &nbsp;&nbsp;&nbsp;
                                </div>

                                <?php
                                $sql = "select * from view_menu where username= '" . strtoupper($_SESSION["CURRENT_USER"]) . "' and docid= '28'";

                                $result = $conn->query($sql);
                                $row = $result->fetch();
                                if ($row['doc_view'] == "1") {
                                    ?>
                                    <div class ="col-sm-2">

                                        <input type = "radio" name = "radio" data-toggle ="tooltip" title = "Order Should Be Placed 2 Days  Before The Require Time"  onchange = "food('CreateOwnMenu');" on value = "None Retanable" id = "radio16"/><b>Create Own Menu</b> &nbsp;
                                        &nbsp;
                                        &nbsp;
                                    </div>

                                    <?php
                                } else {
                                    ?>
                                    <div class ="col-sm-2 hidden">

                                        <input type = "radio" name = "radio" data-toggle = "tooltip" title = "Order Should Be Placed 2 Days  Before The Require Time"  onchange = "food('CreateOwnMenu');" on value = "None Retanable" id = "radio16"/><b>Create Own Menu</b> &nbsp;
                                        &nbsp;
                                        &nbsp;
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                ?>

                            </div>

                            <div class="form-group"></div>
                            <div class="form-group-sm">
                                <label class="col-sm-2 text-right"></label>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 1 Day Before The Require Time" onchange="food('Cake_Pcs');"  value="None Retanable" id="radio7"/>Cake Pcs &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 1 Day Before The Require Time" onchange="food('Snacks');"  value="None Retanable" id="radio8"/>Snacks &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 1 Day Before The Require Time" onchange="food('Dessert');"  value="None Retanable" id="radio9"/>Dessert &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 2 Hours Before The Require Time" onchange="food('Juices');"  value="None Retanable" id="radio10"/>Juices &nbsp;&nbsp;&nbsp;
                                </div>
                                <div class="col-sm-2">
                                    <input type="radio" name="radio" data-toggle="tooltip" title="Order Should Be Placed 1 Day Before The Require Time" onchange="food('Other');"  value="None Retanable" id="radio11"/>Other &nbsp;&nbsp;&nbsp;
                                </div>

                            </div>
                        </td>


                        <td class="col-md-2 hidden">
                            <fieldset style="margin-top:-130px;
                                      ">
                                <legend>
                                    Acception Levels
                                </legend>
                            </fieldset>
                            <div class="form-group-sm">
                                <label class = "col-sm-5 control-label text-center" for = "invno">Step 1 :</label>
                                <div class = "col-sm-1">
                                    <?php
                                    ?>    


                                    <?php
                                    $sql = "select * from view_menu where username= '" . strtoupper($_SESSION["CURRENT_USER"]) . "' and docid= '29'";

                                    $result = $conn->query($sql);
                                    $row = $result->fetch();
                                    if ($row['doc_view'] == "1") {
                                        ?>
                                        <input type = "checkbox" checked onclick = "lvl1enb();" id = "lvl1">
                                        <?php
                                    } else {
                                        ?>
                                        <input type = "checkbox" disabled onclick = "lvl1enb();" id = "lvl1">
                                        <?php
                                    }
                                    ?>
                                </div>


                                <div class="form-group"></div>

                                <label  class="col-sm-5 control-label text-center"  for=\"invno\">Step 2 :</label>
                                <div class="col-sm-1">
                                    <?php
                                    ?>
                                    <?php
                                    $sql = "select * from view_menu where username= '" . strtoupper($_SESSION["CURRENT_USER"]) . "' and docid= '30'";

                                    $result = $conn->query($sql);
                                    $row = $result->fetch();
                                    if ($row['doc_view'] == "1") {
                                        ?>
                                        <input type="checkbox" checked onclick = "lvl2enb();"  id="lvl2">
                                        <?php
                                    } else {
                                        ?>
                                        <input type = "checkbox" disabled onclick = "lvl2enb();" id = "lvl2">
                                        <?php
                                    }
                                    ?>
                                </div>


                                <div class = "form-group"></div>

                                <label class = "col-sm-5 control-label text-center" for = "invno">Step 3 :</label>
                                <div class = "col-sm-1">
                                    <?php ?>

                                    <?php
                                    $sql = "select * from view_menu where username= '" . strtoupper($_SESSION["CURRENT_USER"]) . "' and docid= '31'";

                                    $result = $conn->query($sql);
                                    $row = $result->fetch();
                                    if ($row['doc_view'] == "1") {
                                        ?>
                                        <input type = "checkbox" checked onclick = "lvl3enb();" id = "lvl3">
                                        <?php
                                    } else {
                                        ?>
                                        <input type ="checkbox" disabled onclick ="lvl3enb();" id = "lvl3">
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class = "form-group"></div>


                            </div>
                        </td>
                    </tr>
                </table>
                <div class = "form-group "></div>


                <table class = "table table-striped">
                    <tr class = 'danger'>
                        <th style = "width: 120px;">Item Code</th>
                        <th >Description</th>
                        <th style = "width: 10px;"></th>
                        <th style = "width: 120px;">Qty</th>
                        <th style = "width: 120px;">Amount</th>
                        <th style = "width: 100px;"></th>
                    </tr>

                    <tr>
                        <td id="trtable1">
                            <input type = "text" placeholder = "Item Code"  id = "itemCodeTxt" class = "form-control input-sm">
                        </td>
                        <td id="trtable2">
                            <input type = "text" placeholder = "Description"  id = "itemDescTxt" class = "form-control input-sm">
                        </td>
                        <td id="trtable3">
                            <div class="col-sm-1">
                                <input type="button" onclick="search();"  class="btn btn-default" style="background-color: #40c625;" value="Menu.." id="searchcost" name="searchcost">
                            </div>
                        </td>

                        <td id="trtable4">
                            <input type = "text" placeholder = "Qty"  id = "qty" class = "form-control input-sm">
                        </td>
                        <td id="trtable5">
                            <input type = "text" placeholder = "Amount"  id = "amountTxt" class = "form-control input-sm">
                        </td>
                        <td id="trtable6">
                            <a onclick = "add_tmp2();" class = "btn btn-default btn-sm"> <span class = "fa fa-plus"></span> &nbsp;</a>                         
                        </td>
                    </tr>

                </table>

                <div id ="itemdetails"></div>

                <table id = 'subtotal' class = "table">

                    <tr>

                        <td style = "width: 800px;"></td>
                        <th style = "width: 100px;"id="grandTot">Sub Total</th>
                        <td style = "width: 180px;">
                            <input type = "text" placeholder = "0.00" disabled id = "gtot" class = "form-control input-sm text-center">
                        </td> 

                        <td>
                            <?php ?>
                        </td> 
                        <td></td> <td></td> <td></td>
                    </tr>

                </table>
            </div>
        </form>
    </div>

</section>

<script src = "js/kotEntry.js"></script>

<?php
include 'search_costing_form.php';
?>

<script>
                                newent();
</script>  

