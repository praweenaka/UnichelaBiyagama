<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "getdt") {
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $invno = getno(date('Y-m-d'));

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT itemcode FROM food_menu_master_special_gen";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['itemcode'];
    $ResponseXML .= "<id><![CDATA[$invno]]></id>";
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

function getno($sdate) {

    include './connection_sql.php';
    $sql = "SELECT itemcode FROM food_menu_master_special_gen";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $tmpinvno = "0" . $row["itemcode"];
    $lenth = strlen($tmpinvno);
    $invno = trim("Spe/") . substr($tmpinvno, $lenth - 8);

    return $invno;
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

if ($_GET["Command"] == "setitem") {

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    if ($_GET["Command1"] == "del_item") {
        $sql = "delete from tmp_po_masterSpecial where tmp_no='" . $_GET['tmpno'] . "' and mealname='" . $_GET['mealname'] . "' ";
        $result = $conn->query($sql);
    }
    if ($_GET["Command1"] == "add_tmp") {

        $sql = "Insert into tmp_po_masterSpecial (menudesc,mealname,menudate,tmp_no,type)values 
			('" . $_GET['menudesc'] . "','" . $_GET['mealname'] . "','" . $_GET['menudate'] . "','" . $_GET['tmpno'] . "','" . $_GET['type'] . "') ";
        $result = $conn->query($sql);
    }

    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					<tr>
						<td style=\"width: 10px;\">Description</td>
						<td style=\"width: 10px;\">Menu Name</td>
                                                <td style=\"width: 10px;\">Menu Date</td>
                                                <td style=\"width: 10px;\">Type</td>
                                                <td style=\"width: 10px;\"></td>
					</tr>";

    $i = 1;

    $sql = "Select * from tmp_po_masterSpecial where tmp_no='" . $_GET['tmpno'] . "'";
//    $x = $_SESSION['mealType'];
    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr> 
            <td>" . $row['menudesc'] . "</td>
            <td>" . $row['mealname'] . "</td>
            <td>" . $row['menudate'] . "</td>
            <td>" . $row['type'] . "</td>    
            <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item('" . $row['mealname'] . "')\"> <span class='fa fa-remove'></span></a></td>
            </tr>";

        $i = $i + 1;
    }

    $ResponseXML .= "</table>]]></sales_table>";
    $ResponseXML .= "<item_count><![CDATA[" . $i . "]]></item_count>";
    $ResponseXML .= "</salesdetails>";

    echo $ResponseXML;
}




if ($_GET["Command"] == "save_item") {

    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "delete from food_menu_master_special where itemCode = '" . $_GET['itemcode'] . "'";
        $result = $conn->query($sql);

        $sql = "Insert into food_menu_master_special(itemCode,mealtype,price)values 
    ('" . $_GET['itemcode'] . "','" . $_GET['mealtype'] . "','" . $_GET['price'] . "') ";

        $result = $conn->query($sql);

        $sql = "delete from food_menu_master_special_item where itemCode = '" . $_GET['itemcode'] . "'";
        $result = $conn->query($sql);

        $sql = "Select * from tmp_po_masterSpecial where tmp_no='" . $_GET['tmpno'] . "'";
        foreach ($conn->query($sql) as $row) {

            $sql1 = "Insert into food_menu_master_special_item(itemCode,menudesc,mealname,menudate,price,type,qty)values 
    ('" . $_GET['itemcode'] . "','" . $row['menudesc'] . "','" . $row['mealname'] . "','" . $row['menudate'] . "','" . $_GET['price'] . "','" . $_GET['type'] . "','20') ";

            $result1 = $conn->query($sql1);
        }


        $sql = "SELECT itemcode FROM food_menu_master_special_gen";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row['itemcode'];
        $no2 = $no + 1;
        $sql = "update food_menu_master_special_gen set itemcode = $no2 where itemcode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "doubledata") {

    $sql = "Select * from food_menu_master_special_item where itemCode='" . $_GET['tmpno'] . "'";
//    echo $sql;
    foreach ($conn->query($sql) as $row) {
        $sql1 = "Insert into food_menu_master_special_item1(itemCode,menudesc,mealname,menudate,price,type)values 
    ('" . $_GET['itemcode'] . "','" . $row['menudesc'] . "','" . $row['mealname'] . "','" . $row['menudate'] . "','" . $row['price'] . "', 'vegi') ";

        $result1 = $conn->query($sql1);
        $sql1 = "Insert into food_menu_master_special_item1(itemCode,menudesc,mealname,menudate,price,type)values 
    ('" . $_GET['itemcode'] . "','" . $row['menudesc'] . "','" . $row['mealname'] . "','" . $row['menudate'] . "','" . $row['price'] . "', 'non vegi') ";

        $result1 = $conn->query($sql1);
    }
    echo "ok";
}
?>