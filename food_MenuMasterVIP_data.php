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

    $sql = "SELECT itemcode FROM foodmastervip_gen";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['itemcode'];
    $ResponseXML .= "<id><![CDATA[$invno]]></id>";
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}

function getno($sdate) {

    include './connection_sql.php';
    $sql = "SELECT itemcode FROM foodmastervip_gen";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $tmpinvno = "0" . $row["itemcode"];
    $lenth = strlen($tmpinvno);
    $invno = trim("VIP/") . substr($tmpinvno, $lenth - 8);

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
        $sql = "delete from tmp_po_mastervip where tmp_no='" . $_GET['tmpno'] . "' and mealname='" . $_GET['mealname'] . "' ";
        $result = $conn->query($sql);
    }
    if ($_GET["Command1"] == "add_tmp") {

        $sql = "Insert into tmp_po_mastervip (menudesc,mealname,qty,tmp_no)values 
			('" . $_GET['menudesc'] . "','" . $_GET['mealname'] . "','" . $_GET['qty'] . "','" . $_GET['tmpno'] . "') ";
        $result = $conn->query($sql);
    }

    $ResponseXML .= "<sales_table><![CDATA[<table class=\"table\">
					<tr>
						<td>Description</td>
						<td style=\"width: 10px;\"></td>
                                                <td style=\"width: 10px;\"></td>
					</tr>";

    $i = 1;

    $sql = "Select * from tmp_po_mastervip where tmp_no='" . $_GET['tmpno'] . "'";
//    $x = $_SESSION['mealType'];
    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr> 
            <td>" . $row['menudesc'] . "</td>
                             <td>" . $row['mealname'] . "</td>
                                 <td>" . $row['qty'] . "</td>
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
        $sql = "delete from food_menu_master_vip where itemCode = '" . $_GET['itemcode'] . "'";
        $result = $conn->query($sql);

        $sql = "Insert into food_menu_master_vip(itemCode,category,price)values 
    ('" . $_GET['itemcode'] . "','" . $_GET['menucombo'] . "','" . $_GET['price'] . "') ";

        $result = $conn->query($sql);

        $sql = "delete from food_menu_master_vip_item where itemCode = '" . $_GET['itemcode'] . "'";
        $result = $conn->query($sql);

        $sql = "Select * from tmp_po_mastervip where tmp_no='" . $_GET['tmpno'] . "'";
        foreach ($conn->query($sql) as $row) {

            $sql1 = "Insert into food_menu_master_vip_item(itemCode,menudesc,mealname,qty,price)values 
    ('" . $_GET['itemcode'] . "','" . $row['menudesc'] . "','" . $row['mealname'] . "','" . $row['qty'] . "','" . $_GET['price'] . "') ";

            $result1 = $conn->query($sql1);
        }


        $sql = "SELECT itemcode FROM foodmastervip_gen";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row['itemcode'];
        $no2 = $no + 1;
        $sql = "update foodmastervip_gen set itemcode = $no2 where itemcode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
?>