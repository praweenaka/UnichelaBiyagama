<?php

session_start();

require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT entryNo FROM entry_nogen";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['entryNo'];

    $sql = "Select tmp_entryno from tmpinvpara_acc";
    $result = $conn->query($sql);
    $row = $result->fetch();

    $tono = $row['tmp_entryno'];

    $sql = "delete from tmp_po_data where tmp_no='" . $no . "'";
    $result = $conn->query($sql);

    $sql = "update tmpinvpara_acc set tmp_entryno=tmp_entryno+1";
    $result = $conn->query($sql);

    $ResponseXML .= "<id><![CDATA[$no]]></id>";

    $ResponseXML .= "<tmpno><![CDATA[" . $tono . "]]></tmpno>";
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}


if ($_GET["Command"] == "update_list") {
    $ResponseXML = "";
    $ResponseXML .= "<table class=\"table\">
	            <tr>
                        <th width=\"121\">Item No</th>
                        <th width=\"424\"> Item Description </th>
                        <th width=\"121\">Amount</th>
                    </tr>";


    $sql = "SELECT * from ass_vender where itcode <> ''";
    if ($_GET['refno'] != "") {
        $sql .= " and itcode like '%" . $_GET['refno'] . "%'";
    }
    if ($_GET['cusname'] != "") {
        $sql .= " and itname like '%" . $_GET['cusname'] . "%'";
    }
    $stname = $_GET['stname'];

    $sql .= " ORDER BY itcode limit 50";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row["itcode"];


        $ResponseXML .= "<tr>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['itcode'] . "</a></td>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['itname'] . "</a></td>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['price'] . "</a></td>
                            </tr>";
    }
    $ResponseXML .= "</table>";
    echo $ResponseXML;
}



if ($_GET["Command"] == "food") {
//shan
    $stname = $_GET['stname'];

    $_SESSION['mealType'] = $stname;

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

//    $sql = "Select * from food_menu_master where itemCode = '" . $_GET['id'] . "'";
//    if ($_SESSION['mealType'] == "Standard_BreakFast") {
//        $sql = "SELECT * from food_menu_master where Standard_BreakFast = 'Y'  order by itemCode";
//    } else if ($_SESSION['mealType'] == "Standard_Dinner") {
//        $sql = "SELECT * from food_menu_master where Standard_Dinner = 'Y'  order by itemCode";
//    } else if ($_SESSION['mealType'] == "Standard_Lunch") {
//        $sql = "SELECT * from food_menu_master where Standard_Lunch = 'Y'  order by itemCode";
//    }
//
//    $sql = $conn->query($sql);
//    if ($row = $sql->fetch()) {
//
//        $ResponseXML .= "<itemcode1><![CDATA[" . $row['itemCode'] . "]]></itemcode1>";
//        $ResponseXML .= "<itemdese1><![CDATA[" . $row['description'] . "]]></itemdese1>";
//        $ResponseXML .= "<price1><![CDATA[" . $row['amount'] . "]]></price1>";
//    }

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "setitem") {
//shan 04/23
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $reqdate = $_GET['requireDate'];

    $dt = $_GET['requireDate'] . " " . $_GET['requireTime'];
    $dt = date('Y-m-d H:i:s', strtotime($dt));

    $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
    $result = $conn->query($sql);

    $row = $result->fetch();

    $mnt = $row['time'];


    $dt1 = date('Y-m-d H:i:s', strtotime($_GET['entryDate'] . " + $mnt minutes"));

    if ($dt1 < $dt) {


        $sql = "delete from tmp_po_data where (id='" . $_GET['itemCode'] . "' or (mealtype='" . $_GET['mealtype'] . "' and menu='" . $_GET['menu'] . "')) and tmp_no='" . $_GET['tmpno1'] . "' ";

        $result = $conn->query($sql);

        if ($_GET["Command1"] == "add_tmp2") {

            $amount = str_replace(",", "", $_GET["amount"]);
            $qty = str_replace(",", "", $_GET["qty"]);

            $grandTot = 0;
            $subtotal = $amount * $qty;


            $sql = "Insert into tmp_po_data (itemcode, itemdesc, qty, amount,subtot, tmp_no,mealtype,user,menu,requiretime,savinglock)values
			('" . $_GET['itemCode'] . "', '" . $_GET['itemDesc'] . "', '" . $_GET['qty'] . "',  " . $_GET['amount'] . ",'" . $subtotal . "','" . $_GET['tmpno1'] . "','" . $_SESSION['mealType'] . "','" . $_SESSION['UserName'] . "','" . $_GET['itemDesc'] . "','" . $_GET['requireTime'] . "','" . $_GET['savinglock'] . "')";
            $result = $conn->query($sql);
        }


        $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					<tr>
						<td style=\"width: 90px;\">Item</td>
                                                <td style=\"width: 90px;\">Meal Type</td>
						<td style=\"width: 450px;\">Description</td>
                                                <td style=\"width: 100px;\">Require Time</td>
						<td style=\"width: 150px;\">Serving Location</td>
						<td style=\"width: 100px;\">Qty</td>
						<td style=\"width: 100px;\">Amount</td>
						<td style=\"width: 100px;\">Sub Total</td>
						<td style=\"width: 10px;\"></td>
					</tr>";

        $i = 1;
        $mtot = 0;

        $sql = "Select * from tmp_po_data where tmp_no='" . $_GET['tmpno1'] . "' group by menu,user,serialno";

        foreach ($conn->query($sql) as $row) {
            $ResponseXML .= "<tr>
                             <td>" . $row['itemcode'] . "</td>
                                                         <td>" . $row['mealtype'] . "</td>
							 <td>" . $row['menu'] . "</td>
                                                         <td>" . $row['requiretime'] . "</td>
                                                         <td>" . $row['savinglock'] . "</td>
							 <td>" . $row['qty'] . "</td>
							 <td>" . number_format($row['amount'], 2, ".", ",") . "</td>
							 <td>" . number_format($row['subtot'], 2, ".", ",") . "</td>
							 <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item('" . $row['id'] . "','" . $row['mealtype'] . "','" . $row['menu'] . "')\"> <span class='fa fa-remove'></span></a></td>
							 </tr>";

            $mtot = $mtot + $row['subtot'];
            $i = $i + 1;
        }

        $ResponseXML .= "</table>]]></sales_table>";
        $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";
        $ResponseXML .= "<subtot><![CDATA[" . number_format($mtot, 2, ".", "") . "]]></subtot>";
    } else {
        $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
        $result = $conn->query($sql);

        $row = $result->fetch();

        $mess = $row['time'] / 60;

        $mess1 = "Order Should Be Placed" . ' ' . $mess . ' ' . "Hours  Before The Require Time";
    }

    $ResponseXML .= "<stat><![CDATA[" . $mess1 . "]]></stat>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET['Command'] == "search_cos") {
    //shan 04/23

    $dt = date("l", strtotime($_GET['requireDate']));
    $dt = strtoupper($dt);

    $tb = "";

    $tb .= "<table  class=\"table table-striped\">";

    $tb .= "<tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>";

    if ($_GET['smtype'] == "BreakFast") {
        $sql = "select * from view_food_menu_master_special where menudate = '" . $dt . "' and mealtype='" . $_GET['smtype'] . "'";
    } else if ($_GET['smtype'] == "Dinner") {
        $sql = "select * from view_food_menu_master_special where menudate = '" . $dt . "' and mealtype='" . $_GET['smtype'] . "' ";
    } else if ($_GET['smtype'] == "Lunch") {
        $sql = "select * from view_food_menu_master_special where menudate = '" . $dt . "' and mealtype='" . $_GET['smtype'] . "' ";
    } else if ($_GET['smtype'] == "Menu 130") {
        $sql = "select * from view_food_menu_master_special where menudate = '" . $dt . "' and mealtype='" . $_GET['smtype'] . "' ";
    } else if ($_GET['smtype'] == "Hurbal Drink") {
        $sql = "select * from view_food_menu_master_special where menudate = '" . $dt . "' and mealtype='" . $_GET['smtype'] . "' ";
    } else if ($_GET['smtype'] == "Tea/PlainTea/Coffee") {
        $sql = "select * from food_menu_master where Tea_PlainTea_Coffee = 'Y' ";
    } else if ($_GET['smtype'] == "Special_Dishes") {
        $sql = "select * from food_menu_master where Special_Dishes = 'Y' ";
    } else if ($_GET['smtype'] == "Sandwiches") {
        $sql = "select * from food_menu_master where Sandwiches = 'Y' ";
    } else if ($_GET['smtype'] == "Cake_Pcs") {
        $sql = "select * from food_menu_master where Cake_Pcs = 'Y' ";
    } else if ($_GET['smtype'] == "Snacks") {
        $sql = "select * from food_menu_master where Snacks = 'Y' ";
    } else if ($_GET['smtype'] == "Dessert") {
        $sql = "select * from food_menu_master where Dessert = 'Y' ";
    } else if ($_GET['smtype'] == "Juices") {
        $sql = "select * from food_menu_master where Juices = 'Y' ";
    } else if ($_GET['smtype'] == "Other") {
        $sql = "select * from food_menu_master where Other = 'Y' ";
    } else if ($_GET['smtype'] == "VIP") {
        $sql = "select * from view_food_menu_master_vip where category = '" . $_GET['stname'] . "'";
    } else {
        $sql = "select * from view_food_menu_master_special where menudate = '" . $dt . "' and mealtype='" . $_GET['smtype'] . "'";
    }

    if ($_GET['smtype'] != "VIP") {

        if ($_GET['smtype'] == "BreakFast" or $_GET['smtype'] == "Dinner" or $_GET['smtype'] == "Lunch" or ( $_GET['smtype'] == "Hurbal Drink") or ( $_GET['smtype'] == "Menu 130")) {
            if ($_GET['costnum'] != "") {
                $sql .= " and menudesc like '" . $_GET['costnum'] . "%'";
            }
            $sql .= "  order by  menudesc desc, type";
        } else if ($_GET['costnum'] != "") {
            $sql .= " and description like '" . $_GET['costnum'] . "%'";
        } else {
            $sql .= "  order by itemCode";
        }
    } else {
        if ($_GET['costnum'] != "") {
            $sql .= " and menudesc like '" . $_GET['costnum'] . "%'";
        }
        $sql .= "  order by menudesc";
    }
    $sql = $sql . " limit 5000";

//    echo $sql;

    $menunameblank = "";
    $menunameblank1 = "";
    $menuType = "";
    foreach ($conn->query($sql) as $row) {
        if ($_GET['smtype'] == "VIP") {

            $j = $row['id'];

            if ($menunameblank != $row['menudesc']) {
                $tb .= "<tr class=\"info\">
                <td><a>" . $row['menudesc'] . "</a></td>
                <td><a></a></td>
                <td><a>" . $row['qty'] . "</a></td>
                <td><a></a></td>
                </tr>";
            }

            $tb .= "<tr>
                <td><a>" . $row['itemCode'] . "</a></td>
                <td><a>" . $row['mealname'] . "</a></td>";

            $sql = "select * from tmp_po_data_vip where tmp_no = '" . $_GET['tmpno1'] . "'and aa='" . $row['menudesc'] . "' and itemdesc='" . $row['mealname'] . "' ";
//            echo $sql;
            $result = $conn->query($sql);
            if ($row1 = $result->fetch()) {
                $tb .= "<td><input type = \"checkbox\" checked name=\"radio\" id=\"$j\" onclick=\"ADD(" . $j . ");\"></td>";
            } else {
                $tb .= " <td><input type = \"checkbox\" name=\"radio\" id=\"$j\" onclick=\"ADD(" . $j . ");\"></td>";
            }
            $menunameblank = $row['menudesc'];
        } else if ($_GET['smtype'] == "BreakFast" or $_GET['smtype'] == "Dinner" or $_GET['smtype'] == "Lunch" or $_GET['smtype'] == "Hurbal Drink" or $_GET['smtype'] == "Menu 130") {
            $j = $row['id'];

            if ($menunameblank1 != $row['menudesc']) {
                $tb .= "<tr class=\"info\">
                <td><a><input type=\"text\" class=\"hidden\" id=\"itemcode\" size=\"3;\" value=\"" . $row['itemCode'] . "\"/></a></td>
                <td><a><input type=\"text\" disabled id=\"desc" . $j . "\" value=\"" . $row['menudesc'] . " " . $row['type'] . "" . '-' . "" . $_GET['smtype'] . "\"/></a></td>
                <td><a><input type=\"text\" disabled id=\"price" . $j . "\" size=\"3;\" value=\"" . $row['price'] . "\"/></a></td>
                <td><a><input type=\"text\" id=\"qty" . $j . "\"/></a></td>
                <td><a><input type=\"checkbox\" id=\"check" . $j . "\" onclick=\"checkall(" . $j . ")\";/></a></td>
                <td><a></a></td>
                </tr>";
            } else {
                if ($menuType != $row['type']) {
                    $tb .= "<tr class=\"info\">
                    <td><a><input type=\"text\" class=\"hidden\" id=\"itemcode\" size=\"3;\" value=\"" . $row['itemCode'] . "\"/></a></td>
                    <td><a><input type=\"text\" disabled id=\"desc" . $j . "\" value=\"" . $row['menudesc'] . " " . $row['type'] . "" . '-' . "" . $_GET['smtype'] . "\"/></a></td>
                    <td><a><input type=\"text\" disabled id=\"price" . $j . "\" size=\"3;\" value=\"" . $row['price'] . "\"/></a></td>
                    <td><a><input type=\"text\" id=\"qty" . $j . "\"/></a></td>
                    <td><a><input type=\"checkbox\" onclick=\"checkall(" . $j . ")\";/></a></td>
                    <td><a></a></td>
                    </tr>";
                }
            }


            $tb .= "<tr>
                <td><a></a></td>
                <td><a>" . $row['mealname'] . "</a></td>";

            $sql = "select * from tmp_po_data where tmp_no = '" . $_GET['tmpno1'] . "'and aa='" . $row['menudesc'] . "' and itemdesc='" . $row['mealname'] . "' ";
            $result = $conn->query($sql);

            $menunameblank1 = $row['menudesc'];
            $menuType = $row['type'];
        } else {
            $tb .= "<tr>
                <td><a href=\"#\" onclick=\"get_cos('" . $row['itemCode'] . "');\">" . $row['itemCode'] . "</a></td>
                <td><a href=\"#\" onclick=\"get_cos('" . $row['itemCode'] . "');\">" . $row['description'] . "</a></td>
                <td><a href=\"#\" onclick=\"get_cos('" . $row['itemCode'] . "');\">" . $row['amount'] . "</a></td>
            </tr>";
        }
    }

//    echo $tb;

    $dt = date("l", strtotime($_GET['requireDate']));

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";


    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $ResponseXML .= "<stname><![CDATA[" . $_GET['stname'] . "]]></stname>";
    $ResponseXML .= "<tb><![CDATA[" . $tb . "]]></tb>";
    $ResponseXML .= "<dt><![CDATA[" . strtoupper($dt) . "]]></dt>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "cancel_item") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();


        $sql = "update kot_entry set cancel = '1'  where entryNo = '" . $_GET['entryNo'] . "'";

        $result = $conn->query($sql);

        $conn->commit();
        echo "Cancel";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "save_item") {

    $reqdate = $_GET['requireDate'];

    $dt = $_GET['requireDate'] . " " . $_GET['requireTime'];
    $dt = date('Y-m-d H:i:s', strtotime($dt));

    $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
    $result = $conn->query($sql);

    $row = $result->fetch();

    $mnt = $row['time'];

    $dt1 = date('Y-m-d H:i:s', strtotime($_GET['entryDate'] . " + $mnt minutes"));

    if ($dt1 < $dt) {

        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            $sql = "delete from kot_entry where entryNo = '" . $_GET['entryNo'] . "'";
            $result = $conn->query($sql);

            $sql = "Insert into kot_entry(entryNo,tmp_entryNo,entryDate,visitorType,department,visitorName,visitorNo,personNo,requireDate,remark,grandTot,ap_step,cancel,ap_lvl,contact,creditCombo,requestby,approveby)values
    ('" . $_GET['entryNo'] . "','" . $_GET['tmpno1'] . "','" . date("Y-m-d h:i:s") . "', '" . $_GET['visitorType'] . "','" . $_GET['department'] . "','" . $_GET['visitorName'] . "','" . $_GET['visitorNo'] . "','" . $_GET['personNo'] . "','" . $_GET['requireDate'] . "','" . $_GET['remark'] . "','" . $_GET['gtot'] . "','" . $_GET['apstep'] . "','" . $_GET['cancel'] . "','" . $_GET['check1'] . "','" . $_GET['contact'] . "','" . $_GET['creditCombo'] . "','" . $_GET['orderby'] . "','" . $_GET['approveby'] . "') ";

            $result = $conn->query($sql);

            $sql2 = "Insert into approve_lvl(entryNo,ap_lvl,ap_datetime,user)values
            ('" . $_GET['entryNo'] . "',  '" . $_GET['check1'] . "', '" . date("Y-m-d h:i:s") . "', '" . strtoupper($_SESSION['UserName']) . "')";
            $result = $conn->query($sql2);


            $sql = "delete from kot_itemdetail where entryNo = '" . $_GET['entryNo'] . "'";
            $result = $conn->query($sql);

            $sql = "Select * from tmp_po_data where tmp_no='" . $_GET['tmpno1'] . "'";
            foreach ($conn->query($sql) as $row) {

                $sql1 = "Insert into kot_itemdetail(entryNo,itemcode,itemdesc,qty,amount,mealtype,subtot,aa,serialno,menu,user,requiretime,savinglock)values
    ('" . $_GET['entryNo'] . "','" . $row['itemcode'] . "','" . $row['itemdesc'] . "','" . $row['qty'] . "','" . $row['amount'] . "','" . $row['mealtype'] . "','" . $row['subtot'] . "','" . $row['aa'] . "','" . $row['serialno'] . "','" . $row['menu'] . "','" . $row['user'] . "','" . $row['requiretime'] . "','" . $row['savinglock'] . "') ";

                $result1 = $conn->query($sql1);
            }

            $sql3 = "delete from tmp_po_data where tmp_no = '" . $_GET['tmpno1'] . "'";
            $result = $conn->query($sql3);

            $sql = "SELECT entryNo FROM entry_nogen";
            $resul = $conn->query($sql);
            $row = $resul->fetch();
            $no = $row['entryNo'];
            $no2 = $no + 1;
            $sql = "update entry_nogen set entryNo = $no2 where entryNo = $no";
            $result = $conn->query($sql);



            date_default_timezone_set('Asia/Colombo');

            require 'email/PHPMailerAutoload.php';
            $mail = new PHPMailer;
            $mail->isSMTP();

            $mail->Host = 'mail.infodatasl.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "autoemail@infodatasl.com";
            $mail->Password = "autoemail@123";

//            $mail->setFrom('praweenakahemachandra@gmail.com', 'Manager');
            if (strtoupper($_SESSION["User_Type"]) == "MANAGER" or strtoupper($_SESSION["User_Type"]) == "ADMIN") {
                $sql = "select * from approve_by_canteen where name='" . strtoupper($_SESSION["UserName"]) . "'";
                $result = $conn->query($sql);
//                echo $sql;
                if ($row = $result->fetch()) {

//                    $uemail = $row["U_email"];
                    $remail = $row["mail"];

                    $mail->setFrom('autoemail@infodatasl.com', 'Canteen');
                    $mail->addAddress($remail, 'hhh');
                }

                $table = "";

                $table .= "<table style = 'width: 660px;' class = 'table1'>
                    <tr>
                    <th class = 'bottom head' colspan = '3'><center>Unichela Biyagama</center></th>
                    </tr>

                    <tr>
                    <th class = 'bottom head' colspan = '3'><center>Kot Order</center></th>
                    </tr>
                    </table>";

                $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 40px;' class = 'left'>Entry No :</th>
                    <th style = 'width: 200px;' class = 'left'>" . $_GET['entryNo'] . "</th>

                    </tr></table>";

                $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 20px;' class = 'left'></th>
                    <th style = 'width: 200px;' class = 'left'>Approve Order :</th>
                    <a href = 'http://infodatasl.com/UnichelaBiyagama/index.php'>Approve</a>

                    </tr></table>";
                $mail->Body = '"' . $table . '"';
                $mail->Subject = 'Kot Order1';
                $mail->isHTML(true);

                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
            } else {

//                $sql = "select department from approve_by where department = '" . $_SESSION["department"] . "'";
//                $result = $conn->query($sql);
//                $row = $result->fetch();
//                $list = $_GET['approveby'];
//                $list .= $row["department"];
//                $pieces = explode(",", $list);
                $pieces = explode(",", $_GET['approveby']);
                if ($list != "") {

                    foreach ($pieces as $val) {

                        $sql = "select * from approve_by where name='" . $val . "'";
                        $result = $conn->query($sql);

                        if ($row = $result->fetch()) {

//                        $uemail = $row["U_email"];
                            $remail = $row["mail"];

                            $mail->setFrom('autoemail@infodatasl.com', 'Canteen');
                            $mail->addAddress($remail, 'hhh');
                        }

                        $table = "";

                        $table .= "<table style = 'width: 660px;' class = 'table1'>

                    <tr>
                    <th class = 'bottom head' colspan = '3'><center>Kot Order</center></th>
                    </tr>
                    </table>";

                        $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 40px;' class = 'left'>Entry No :</th>
                    <th style = 'width: 200px;' class = 'left'>" . $_GET['entryNo'] . "</th>

                    </tr></table>";

                        $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 20px;' class = 'left'></th>
                    <th style = 'width: 200px;' class = 'left'>Approve Order :</th>
                    <a href = 'http://infodatasl.com/UnichelaBiyagama/index.php'>Approve</a>
                    </tr></table>";


                        $mail->Body = '"' . $table . '"';
                        $mail->Subject = 'Kot Order2';
                        $mail->isHTML(true);

                        if (!$mail->send()) {
                            echo "Mailer Error: " . $mail->ErrorInfo;
                        }
                    }
                }
                $sql = "select R_email from user_mast where user_name='" . strtoupper($_SESSION["UserName"]) . "'";
                $result = $conn->query($sql);

                if ($row = $result->fetch()) {

//                    $uemail = $row["U_email"];
                    $remail = $row["R_email"];

                    $mail->setFrom('autoemail@infodatasl.com', 'Canteen');
                    $mail->addAddress($remail, 'hhh');
                }


                $table = "";

                $table .= "<table style = 'width: 660px;' class = 'table1'>

                    <tr>
                    <th class = 'bottom head' colspan = '3'><center>Kot Order</center></th>
                    </tr>
                    </table>";

                $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 40px;' class = 'left'>Entry No :</th>
                    <th style = 'width: 200px;' class = 'left'>" . $_GET['entryNo'] . "</th>

                    </tr></table>";

                $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 20px;' class = 'left'></th>
                    <th style = 'width: 200px;' class = 'left'>Approve Order :</th>
                    <a href = 'http://infodatasl.com/UnichelaBiyagama/index.php'>Approve</a>
                    </tr></table>";


                $mail->Body = '"' . $table . '"';
                $mail->Subject = 'Kot Order3';
                $mail->isHTML(true);

                if (!$mail->send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
            }


            echo "Saved";

            $conn->commit();
        } catch (Exception $e) {
            $conn->rollBack();
            echo $e;
        }
    } else {
        $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
        $result = $conn->query($sql);

        $row = $result->fetch();

        $mess = $row['time'] / 60;

        echo "Order Should Be Placed" . ' ' . $mess . ' ' . "Hours  Before The Require Time";
    }
}


if ($_GET["Command"] == "set") {
//shan
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

//        $sql = "delete from vehicle_master where code = '" . $_GET['code'] . "'";
//        $result = $conn->query($sql);


        $sql = "select * from food_menu_master_vip_item where id = '" . $_GET['id'] . "'";

        foreach ($conn->query($sql) as $row) {

            if ($_GET['stat'] == "1") {
//                echo $sql;
//            $sql1 = "select count(*) as limitCnt from food_menu_master_vip_item where menudesc = '" . $row["menudesc"] . "'";
                $sql1 = "select count(*) as limitCnt from tmp_po_data_vip where aa = '" . $row["menudesc"] . "' and tmp_no ='" . $_GET['tmpno1'] . "'";
//            echo $sql1;
                $result2 = $conn->query($sql1);
                $row2 = $result2->fetch();

                $qty = $row["qty"];
                $qty1 = 0;
                if (!is_null($row2["limitCnt"])) {
                    $qty1 = $row2["limitCnt"];
                }
                // echo $qty;
                if ($qty1 + 1 <= $qty) {

                    $sql1 = "Insert into tmp_po_data_vip(itemcode,aa,itemdesc,qty,amount,subtot,tmp_no,mealtype,user,menu)values
                ('" . $row['itemCode'] . "" . $qty . "','" . $row['menudesc'] . "','" . $row['mealname'] . "','1','" . $row['price'] . "','" . $row['price'] . "','" . $_GET['tmpno1'] . "','" . $_SESSION['mealType'] . "','" . $_SESSION['UserName'] . "','" . $_GET['menu'] . "')";
                    $result = $conn->query($sql1);
                    $stat = "";
                } else {
                    $stat = "Category Limit Reached";
                }
            } else {

                $sql2 = "delete from tmp_po_data_vip where aa = '" . $row["menudesc"] . "'and itemdesc ='" . $row['mealname'] . "' and tmp_no ='" . $_GET['tmpno1'] . "'";
                $result = $conn->query($sql2);
            }
        }

//        $result = $conn->query($sql1);
        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $ResponseXML .= "<stat><![CDATA[" . $stat . "]]></stat>";
    $ResponseXML .= "<id><![CDATA[" . $_GET['id'] . "]]></id>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "set1") {
//shan
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

//        $sql = "delete from vehicle_master where code = '" . $_GET['code'] . "'";
//        $result = $conn->query($sql);


        $sql = "select * from food_menu_master_special_item where id = '" . $_GET['id'] . "'";

        foreach ($conn->query($sql) as $row) {

            if ($_GET['stat'] == "1") {
//                echo $sql;
//            $sql1 = "select count(*) as limitCnt from food_menu_master_vip_item where menudesc = '" . $row["menudesc"] . "'";
                $sql1 = "select count(*) as limitCnt from tmp_po_data where aa = '" . $row["menudesc"] . "' and tmp_no ='" . $_GET['tmpno1'] . "'";
//            echo $sql1;
                $result2 = $conn->query($sql1);
                $row2 = $result2->fetch();

                $qty = $row["qty"];
                $qty1 = 0;
                if (!is_null($row2["limitCnt"])) {
                    $qty1 = $row2["limitCnt"];
                }

                if ($qty1 + 1 <= $qty) {

                    $sql1 = "Insert into tmp_po_data(itemcode,aa,itemdesc,qty,amount,subtot,tmp_no,mealtype)values
                ('" . $row['itemCode'] . "','" . $row['menudesc'] . "','" . $row['mealname'] . "','1','" . $row['price'] . "','" . $row['price'] . "','" . $_GET['tmpno1'] . "','" . $_SESSION['mealType'] . "')";
                    $result = $conn->query($sql1);
                    $stat = "";
                } else {
                    $stat = "Category Limit Reached";
                }
            } else {

                $sql2 = "delete from tmp_po_data where aa = '" . $row["menudesc"] . "'and itemdesc ='" . $row['mealname'] . "' and tmp_no ='" . $_GET['tmpno1'] . "'";
                $result = $conn->query($sql2);
            }
        }

        $conn->commit();
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";


    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					<tr>
						<td style=\"width: 190px;\">Item Code</td>
                                                <td style=\"width: 190px;\">Menu</td>
                                                <td style=\"width: 190px;\">Meal Type</td>
                                                <td style=\"width: 190px;\">Menu Name</td>
						<td style=\"width: 10px;\"></td>
					</tr>";
    $h = 0;
    $h1 = 0;
    $menqty = $_GET['menqty'];

    $sql = "Select * from tmp_po_data where tmp_no='" . $_GET['tmpno1'] . "' order by aa";
    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr>
                             <td>" . $row['itemcode'] . "</td>
                                                         <td>" . $row['aa'] . "</td>
                                                         <td>" . $row['mealtype'] . "</td>
                                                         <td>" . $row['itemdesc'] . "</td>

							 </tr>";
        if ($icode != $row['aa']) {
            $h = $h + $row['amount'];
        }

        $icode = $row['aa'];
        $h1 = $menqty * $h;
    }


    $ResponseXML .= "</table>]]></sales_table>";
//    $ResponseXML .= "<gtot><![CDATA[" . $h . "]]></gtot>";
    $ResponseXML .= "<subtot><![CDATA[" . $h1 . "]]></subtot>";
//    $ResponseXML .= "<stat><![CDATA[" . $stat . "]]></stat>";
    $ResponseXML .= "<id><![CDATA[" . $_GET['id'] . "]]></id>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "get_cos") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";
    $sql = "Select * from food_menu_master where itemCode = '" . $_GET['id'] . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<itemcode><![CDATA[" . $row['itemCode'] . "]]></itemcode>";
        $ResponseXML .= "<itemdese><![CDATA[" . $row['description'] . "]]></itemdese>";
        $ResponseXML .= "<price><![CDATA[" . $row['amount'] . "]]></price>";
    }

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}




if ($_GET["Command"] == "clear") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";


    if ($_SESSION['mealType'] == "Standard_BreakFast") {
        $sql = "SELECT * from food_menu_master where Standard_BreakFast = 'Y'  order by itemCode";
    } else if ($_SESSION['mealType'] == "Standard_Dinner") {
        $sql = "SELECT * from food_menu_master where Standard_Dinner = 'Y'  order by itemCode";
    } else if ($_SESSION['mealType'] == "Standard_Lunch") {
        $sql = "SELECT * from food_menu_master where Standard_Lunch = 'Y'  order by itemCode";
    } else {
        $sql = "SELECT * from food_menu_master where Standard_BreakFast = 'Y'  order by itemCode";
    }

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<itemcode1><![CDATA[" . $row['itemCode'] . "]]></itemcode1>";
        $ResponseXML .= "<itemdese1><![CDATA[" . $row['description'] . "]]></itemdese1>";
        $ResponseXML .= "<price1><![CDATA[" . $row['amount'] . "]]></price1>";
    }

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "get_list") {

    // echo $_GET['term'];
    $result = array();
    $sql = "select visitorName from kot_entry where  visitorName like '%" . $_GET['term'] . "%'";

    foreach ($conn->query($sql) as $items) {
        array_push($result, array("id" => $items['visitorName'], "label" => $items['visitorName'], "name" => $items['visitorName']));
//array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
    }


// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
    echo json_encode($result);
}
if ($_GET["Command"] == "get_list1") {

    // echo $_GET['term'];
    $result = array();
    $sql = "select savinglock from kot_entry where savinglock like '%" . $_GET['term'] . "%'";

    foreach ($conn->query($sql) as $items) {
        array_push($result, array("id" => $items['savinglock'], "label" => $items['savinglock'], "name" => $items['savinglock']));
//array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
    }


// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
    echo json_encode($result);
}
if ($_GET["Command"] == "get_list2") {

    // echo $_GET['term'];
    $result = array();
    $sql = "select contact from kot_entry where contact like '%" . $_GET['term'] . "%'";

    foreach ($conn->query($sql) as $items) {
        array_push($result, array("id" => $items['contact'], "label" => $items['contact'], "name" => $items['contact']));
//array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
    }


// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
    echo json_encode($result);
}


if ($_GET["Command"] == "checkadd") {
//shan 04/23

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $reqdate = $_GET['requireDate'];

    $dt = $_GET['requireDate'] . " " . $_GET['requireTime'];
    $dt = date('Y-m-d H:i:s', strtotime($dt));

    $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
    $result = $conn->query($sql);

    $row = $result->fetch();

    $mnt = $row['time'];

    $amount = str_replace(",", "", $_GET["price"]);
    $qty = str_replace(",", "", $_GET["qty"]);
    $subtotal = $amount * $qty;


    $dt1 = date('Y-m-d H:i:s', strtotime($_GET['entryDate'] . " + $mnt minutes"));

    if ($dt1 < $dt) {

        if ($_GET["Command1"] == "add_checkadd") {

            $sql1 = "Insert into tmp_po_data(itemcode,itemdesc,qty,amount,subtot,tmp_no,mealtype,user,menu,requiretime,savinglock)values
                ('" . $_GET['itemCode'] . "','" . $_GET['desc'] . "','" . $_GET['qty'] . "','" . $_GET['price'] . "','" . $subtotal . "','" . $_GET['tmpno1'] . "','" . $_SESSION['mealType'] . "','" . $_SESSION['UserName'] . "','" . $_GET['desc'] . "','" . $_GET['requireTime'] . "','" . $_GET['savinglock'] . "')";
            $result = $conn->query($sql1);
        }

        $ResponseXML = "";
        $ResponseXML .= "<salesdetails>";


        $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					<tr>
						<td style=\"width: 90px;\">Item</td>
                                                <td style=\"width: 90px;\">Meal Type</td>
						<td style=\"width: 450px;\">Description</td>
                                                <td style=\"width: 100px;\">Require Time</td>
						<td style=\"width: 150px;\">Serving Location</td>
						<td style=\"width: 100px;\">Qty</td>
						<td style=\"width: 100px;\">Amount</td>
						<td style=\"width: 100px;\">Sub Total</td>
						<td style=\"width: 10px;\"></td>
					</tr>";

        $i = 1;
        $mtot = 0;
        $sql = "Select * from tmp_po_data where tmp_no='" . $_GET['tmpno1'] . "' group by menu,user,serialno";
        foreach ($conn->query($sql) as $row) {

            $ResponseXML .= "<tr>
                             <td>" . $row['itemcode'] . "</td>
                                                         <td>" . $row['mealtype'] . "</td>
                                                         <td>" . $row['menu'] . "</td>
                                                         <td>" . $row['requiretime'] . "</td>
                                                         <td>" . $row['savinglock'] . "</td>
                                                         <td>" . $row['qty'] . "</td>
							 <td>" . number_format($row['amount'], 2, ".", ",") . "</td>
							 <td>" . number_format($row['subtot'], 2, ".", ",") . "</td>
              <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item('" . $row['id'] . "','" . $row['mealtype'] . "','" . $row['menu'] . "')\"> <span class='fa fa-remove'></span></a></td>
							 </tr>";

            $mtot = $mtot + $row['subtot'];
            $i = $i + 1;
        }


        $ResponseXML .= "</table>]]></sales_table>";
        $ResponseXML .= "<stat><![CDATA[" . $stat . "]]></stat>";
        $ResponseXML .= "<id><![CDATA[" . $_GET['id'] . "]]></id>";
        $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";
        $ResponseXML .= "<subtot><![CDATA[" . number_format($mtot, 2, ".", "") . "]]></subtot>";
    } else {
        $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
        $result = $conn->query($sql);

        $row = $result->fetch();

        $mess = $row['time'] / 60;

        $mess1 = "Order Should Be Placed" . ' ' . $mess . ' ' . "Hours  Before The Require Time";
    }

    $ResponseXML .= "<stat><![CDATA[" . $mess1 . "]]></stat>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "foodsave") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";


    $reqdate = $_GET['requireDate'];

    $dt = $_GET['requireDate'] . " " . $_GET['requireTime'];
    $dt = date('Y-m-d H:i:s', strtotime($dt));

    $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
    $result = $conn->query($sql);

    $row = $result->fetch();

    $mnt = $row['time'];

    $dt1 = date('Y-m-d H:i:s', strtotime($_GET['entryDate'] . " + $mnt minutes"));

    if ($dt1 < $dt) {
        $sql = "select * from tmp_po_data_vip where tmp_no = '" . $_GET['tmpno1'] . "'";

        foreach ($conn->query($sql) as $row) {
            $sql1 = "Insert into tmp_po_data(itemcode,aa,itemdesc,qty,amount,subtot,tmp_no,mealtype,serialno,user,menu,requiretime,savinglock)values
                ('" . $row['itemcode'] . "','" . $row['aa'] . "','" . $row['itemdesc'] . "','1','" . $row['amount'] . "','" . $row['amount'] . "','" . $_GET['tmpno1'] . "','" . $_SESSION['mealType'] . "','" . $_GET['serialno'] . "','" . $row['user'] . "','" . $row['menu'] . "','" . $_GET['requireTime'] . "','" . $_GET['savinglock'] . "')";
            $result = $conn->query($sql1);
        }

        $sql3 = "delete from tmp_po_data_vip where tmp_no = '" . $_GET['tmpno1'] . "'";
        $result = $conn->query($sql3);



        $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					<tr>
						<td style=\"width: 90px;\">Item</td>
                                                <td style=\"width: 90px;\">Meal Type</td>
						<td style=\"width: 450px;\">Description</td>
                                                <td style=\"width: 100px;\">Require Time</td>
						<td style=\"width: 150px;\">Serving Location</td>
						<td style=\"width: 100px;\">Qty</td>
						<td style=\"width: 100px;\">Amount</td>
						<td style=\"width: 100px;\">Sub Total</td>
						<td style=\"width: 10px;\"></td>
					</tr>";
        $h = 0;
        $h1 = 0;
        $i = 1;
        $mtot = 0;
        $sql = "Select * from tmp_po_data where tmp_no='" . $_GET['tmpno1'] . "' group by menu, user,serialno";
        foreach ($conn->query($sql) as $row) {
            $ResponseXML .= "<tr>
                             <td>" . $row['itemcode'] . "</td>
                                                         <td>" . $row['mealtype'] . "</td>
                                                         <td>" . $row['menu'] . "</td>
                                                         <td>" . $row['requiretime'] . "</td>
                                                         <td>" . $row['savinglock'] . "</td>
                                                         <td>" . $row['qty'] . "</td>
							<td>" . number_format($row['amount'], 2, ".", ",") . "</td>
							 <td>" . number_format($row['subtot'], 2, ".", ",") . "</td>
							 <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item1('" . $row['id'] . "','" . $row['mealtype'] . "','" . $row['menu'] . "')\"> <span class='fa fa-remove'></span></a></td>
							 </tr>";

            $mtot = $mtot + $row['subtot'];
            $h1 = $menqty * $h;
            $i = $i + 1;
        }


        $ResponseXML .= "</table>]]></sales_table>";

        $ResponseXML .= "<subtot><![CDATA[" . number_format($mtot, 2, ".", "") . "]]></subtot>";
        $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";
    } else {
        $sql = "Select time from food_time_range where type='" . $_GET['mmtype'] . "'";
        $result = $conn->query($sql);

        $row = $result->fetch();

        $mess = $row['time'] / 60;

        $mess1 = "Order Should Be Placed" . ' ' . $mess . ' ' . "Hours  Before The Require Time";
    }

    $ResponseXML .= "<stat><![CDATA[" . $mess1 . "]]></stat>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

if ($_GET["Command"] == "setitem1") {
//shan 04/23
    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $sql = "select * from tmp_po_data where  id='" . $_GET['id'] . "' ";
    $result = $conn->query($sql);
    $row = $result->fetch();

    $sql = "delete from tmp_po_data where user = '" . $row["user"] . "' and (serialno = '" . $row["serialno"] . "'  or (mealtype='" . $_GET['mealtype'] . "' and menu='" . $_GET['menu'] . "'))";
    $result = $conn->query($sql);

    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					<tr>
						<td style=\"width: 90px;\">Item</td>
                                                <td style=\"width: 90px;\">Meal Type</td>
						<td style=\"width: 450px;\">Description</td>
                                                <td style=\"width: 100px;\">Require Time</td>
						<td style=\"width: 150px;\">Serving Location</td>
						<td style=\"width: 100px;\">Qty</td>
						<td style=\"width: 100px;\">Amount</td>
						<td style=\"width: 100px;\">Sub Total</td>
						<td style=\"width: 10px;\"></td>
					</tr>";

    $h = 0;
    $h1 = 0;
    $i = 1;
    $menqty = $_GET['menqty'];
    $sql = "Select * from tmp_po_data where tmp_no='" . $_GET['tmpno1'] . "' group by menu, user,serialno";

    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr>
                             <td>" . $row['itemcode'] . "</td>
                                                         <td>" . $row['mealtype'] . "</td>
                                                         <td>" . $row['menu'] . "</td>
                                                         <td>" . $row['requiretime'] . "</td>
                                                         <td>" . $row['savinglock'] . "</td>
                                                         <td>" . $row['qty'] . "</td>
							<td>" . number_format($row['amount'], 2, ".", ",") . "</td>
							 <td>" . number_format($row['subtot'], 2, ".", ",") . "</td>
							 <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item1('" . $row['id'] . "','" . $row['mealtype'] . "','" . $row['menu'] . "')\"> <span class='fa fa-remove'></span></a></td>
							 </tr>";


        if ($icode == $row['itemcode']) {
            $h = $row['amount'];
        } else {
            $h = $h + $row['amount'];
        }

        $h1 = $menqty * $h;
        $i = $i + 1;
    }


    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "<gtot><![CDATA[" . $h . "]]></gtot>";
    $ResponseXML .= "<gtot1><![CDATA[" . $h1 . "]]></gtot1>";
    $ResponseXML .= "<stat><![CDATA[" . $stat . "]]></stat>";
    $ResponseXML .= "<id><![CDATA[" . $_GET['id'] . "]]></id>";
    $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}
?>
