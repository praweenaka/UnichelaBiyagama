<?php
session_start();
?>

<div class="container">
    <div class="modal fade" id="myModal_search" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <label class="modal-title" id="myModalLabel" style="font-size: 20px;">Select Food</label>
                    <div class="col-sm-3">

                        <!--<h4 class="modal-title" id="myModalLabel">Select Food</h4>-->
                        <?php
//                                if ($_SESSION['mealType'] == "VIP") {
                        echo"<select id = \"menuCombo1\" onchange = \"search_cos();\"  class =\"form-control input-sm\">";

                        $sql = "select * from view_menu_search";
                        foreach ($conn->query($sql) as $row) {
                            echo "<b><option value='" . trim($row["menu"]) . "'>" . $row["menu"] .'asdsad'. " -  " . $row["price"] . "</option></b>";
                        }


                        echo"</select>";
//                                }
                        ?>
                    </div>
                    <a onclick = "foodsave();" id="foodsave" class = "btn btn-success btn-sm">
                        <span class = "fa fa-save"></span> &nbsp;
                        Save
                    </a>

                </div>
                <div class="modal-body">

                    <div id="msg_box1"  class="span12 text-center"></div>
                    <div class="modal-body" >
                        <table style="table-layout: fixed;word-wrap: break-word;" class="table table-striped">
<!--                            <tr>
                                <th style="width: 20%" class="hidden">Item Code</th>
                                <th>Menu</th>
                                <th class="hidden">Description</th>
                                <th class="hidden">Price</th>
                            </tr>-->
                            <tr>

                            <label class="col-sm-2 text-right " for="require_time">Required Time</label>


                            <div class="col-sm-3">
                                <input type="time"  id="requireTime" class="form-control col-sm-2 input-sm">
                            </div>
                            <label class="col-sm-2 text-right" for="contact">Serving Location</label>
                            <div class="col-sm-5">
                                <input type="text"  id="savinglockTxt" placeholder="Serving Location" class="form-control input-sm"/>
                            </div>

                            </tr>

                            <tr>
                                <td><input class="form-control input-mini" placeholder="Search Food" onkeyup="search_cos('');" style="width: 200px;" id="costnum"></td>

                                <!--<td><input type="text"  id="savinglockTxt" placeholder="Serving Location" class="form-control input-sm"/></td>-->
                            </tr>


                        </table>

                        <div style="height: 350px;overflow: scroll;" id="search_res">

                        </div>


                    </div>
                    <input type="hidden" id="action">
                    <input type="hidden" id="form">


                    <span id="txterror">

                    </span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                <table>
                    <!--uda table eke tiyen rows tika me.ida madi nisa mthna damme-->
                    <tr>
                        <td><input class="form-control input-mini hidden" onkeyup="search_cos('');" id="jobno"></td>                                
                        <td><input class="form-control input-mini hidden" onkeyup="search_cos('');" id="invoiceno"></td>
                        <td><input class="form-control input-mini hidden" onkeyup="search_cos('');" id="creditor"></td>
                    </tr>

                    <tr>
                    <div class="col-sm-5">
                        <div id="divdate">

                        </div>
                        <?php
//                                if ($_SESSION['mealType'] == "VIP") {
                        echo"<select id = \"menuCombodate\" onchange = \"search_cos();\" style=\"visibility: hidden\" class =\"form-control input-sm \">";

                        $sql = "select * from special_menu_date";
                        foreach ($conn->query($sql) as $row) {
                            echo "<b><option value='" . trim($row["menu_date"]) . "'>" . $row["menu_date"] . "</option></b>";
                        }


                        echo"</select>";
//                                }
                        ?>
                    </div>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
