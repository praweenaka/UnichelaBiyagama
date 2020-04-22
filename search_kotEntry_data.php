<?php

session_start();

include_once './connection_sql.php';

if ($_GET["Command"] == "pass_quot") {

    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "select * from kot_entry where cancel ='0' and ap_step='0' and entryNo  = '" . $_GET['custno'] . "'";

    $i = 1;
    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<idd><![CDATA[" . $row['entryNo'] . "]]></idd>";
        $ResponseXML .= "<str_seqno><![CDATA[" . $row['entryDate'] . "]]></str_seqno>";
        $ResponseXML .= "<str_o><![CDATA[" . $row['visitorType'] . "]]></str_o>";
        $ResponseXML .= "<str_1><![CDATA[" . $row['department'] . "]]></str_1>";
        $ResponseXML .= "<str_2><![CDATA[" . $row['visitorName'] . "]]></str_2>";
        $ResponseXML .= "<str_3><![CDATA[" . $row['visitorNo'] . "]]></str_3>";

        $ResponseXML .= "<str_5><![CDATA[" . $row['personNo'] . "]]></str_5>";
        $ResponseXML .= "<str_6><![CDATA[" . $row['requireTime'] . "]]></str_6>";
        $ResponseXML .= "<str_7><![CDATA[" . $row['requireDate'] . "]]></str_7>";
        $ResponseXML .= "<str_8><![CDATA[" . $row['remark'] . "]]></str_8>";

        $ResponseXML .= "<str_9><![CDATA[" . $row['contact'] . "]]></str_9>";
        $ResponseXML .= "<str_11><![CDATA[" . $row['creditCombo'] . "]]></str_11>";
        $ResponseXML .= "<str_12><![CDATA[" . $row['savinglock'] . "]]></str_12>";
        $ResponseXML .= "<str_13><![CDATA[" . $row['requestby'] . "]]></str_13>";


        $ResponseXML .= "<str_15><![CDATA[" . $row['grandTot'] . "]]></str_15>";
        $ResponseXML .= "<str_16><![CDATA[" . $row['tmp_entryNo'] . "]]></str_16>";
    }


//    $sql4 = "select * from view_kot_mealtype where cancel ='0' and entryNo  = '" . $_GET['custno'] . "'";
//
//    $sql4 = $conn->query($sql4);
//
//    if ($row = $sql4->fetch()) {
//        $ResponseXML .= "<check><![CDATA[" . $row['mealtype'] . "]]></check>";
////        echo $row['mealtype'];
//    }


    $sql = "Select * from kot_itemdetail where entryNo='" . $cuscode . "'";
    foreach ($conn->query($sql) as $row1) {
        $sql1 = "Insert into tmp_po_data(itemcode,aa,itemdesc,qty,amount,subtot,tmp_no,mealtype,serialno,user,menu,requiretime,savinglock)values
                ('" . $row1['itemcode'] . "','" . $row1['aa'] . "','" . $row1['itemdesc'] . "','" . $row1['qty'] . "','" . $row1['amount'] . "','" . $row1['amount'] . "','" . $row['tmp_entryNo'] . "','" . $row1['mealtype'] . "','" . $row1['serialno'] . "','" . $row1['user'] . "','" . $row1['menu'] . "','" . $row1['requiretime'] . "','" . $row1['savinglock'] . "')";
        $result = $conn->query($sql1);
    }
    $ResponseXML .= "<sales_table><![CDATA[<table class = \"table\">
					<tr>
						<td style=\"width: 90px;\">Item</td>
                                                <td style=\"width: 90px;\">Meal Type</td>
						<td>Description</td>
						<td style=\"width: 100px;\">Qty</td>
						<td style=\"width: 100px;\">Amount</td>
						<td style=\"width: 100px;\">Sub Total</td>
						<td style=\"width: 10px;\"></td>
					</tr>";

    $mtot = 0;
    $i = 1;
    $sql = "Select * from kot_itemdetail where entryNo='" . $cuscode . "'  group by menu, user,serialno";
    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr>
                             <td>" . $row['itemcode'] . "</td>
                                                         <td>" . $row['mealtype'] . "</td>
                                                         <td>" . $row['menu'] . "</td>
                                                         <td>" . $row['qty'] . "</td>
							<td>" . number_format($row['amount'], 2, ".", ",") . "</td>
							 <td>" . number_format($row['subtot'], 2, ".", ",") . "</td>
							 <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item1('" . $row['id'] . "')\"> <span class='fa fa-remove'></span></a></td>
							 </tr>";
        $mtot = $mtot + $row['subtot'];
        $i = $i + 1;
    }

    $ResponseXML .= "</table>]]></sales_table>";
//    $ResponseXML .= "<subtot><![CDATA[" . number_format($mtot, 2, ".", "") . "]]></subtot>";
    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>Entry NO</th>
                    <th>Entry Date</th>
                   
                </tr>";

    if (strtoupper($_SESSION["UserName"]) == ADMIN) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);

            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl0' and ap_step='0' and  entryNo like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl0' and ap_step='0' and  entryDate like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl0' and ap_step='0' and  entryNo like '%$letters%' ";
        }
    } elseif (strtoupper($_SESSION["UserName"]) == DHEAD) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl1' and ap_step='0' and  entryNo like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl1' and ap_step='0' and  entryDate like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl1' and ap_step='0' and  entryNo like '%$letters%' ";
        }
    } elseif (strtoupper($_SESSION["UserName"]) == AMANAGER) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl2' and ap_step='0' and  entryNo like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl2' and ap_step='0' and  entryDate like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select entryNo,entryDate from kot_entry where cancel ='0' and ap_lvl='lvl2' and ap_step='0' and  entryNo like '%$letters%' ";
        }
    }

    $sql .= " ORDER BY entryNo limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['entryNo'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['entryNo'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['entryDate'] . "</a></td>
                             
                              
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
