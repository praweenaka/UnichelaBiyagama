<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "getdt") {

    $tb = "";
    $tb .= "<table class='table table-hover'>";


    $sql = "select * from kot_entry where cancel ='0' and ap_step = '0' and ap_lvl='lvl2' order by entryNo desc ";


    $tb .= "<tr>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">Entry No</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">Entry Date</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">Visitor Type</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">Department</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">Visit Details</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">No of Visitors</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">No Of Employees</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">Contact No</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\">Required Date</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\"> Request By</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\"> Grand Total</th>";
    $tb .= "<th class=\"danger\" style=\"width: 350px;text-align:center;\"></th>";


    $tb .= "</tr>";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row["entryNo"];
        $tb .= "<tr>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['entryNo'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['entryDate'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['visitorType'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['department'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['visitorName'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['visitorNo'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['personNo'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['contact'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['requireDate'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['requestby'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['entryNo'] . "','" . $row['entryDate'] . "','" . $row['visitorType'] . "','" . $row['department'] . "','" . $row['visitorName'] . "','" . $row['visitorNo'] . "','" . $row['personNo'] . "','" . $row['contact'] . "','" . $row['requireDate'] . "','" . $row['requestby'] . "','" . $row['grandTot'] . "')\">" . $row['grandTot'] . "</td>";
        //        echo $tot1;
        $tb .= "<td><a href='approve_kotEntry.php?var=" . $row['entryNo'] . "&var1=" . $row['visitorType'] . "&var2=" . $row['department'] . "&var3=" . $row['visitorName'] . "&var4=" . $row['visitorNo'] . "&var5=" . $row['personNo'] . "&var7=" . $row['requireDate'] . "&var8=" . $row['remark'] . "&var10=" . $row['contact'] . "&var12=" . $row['creditCombo'] . "&var13=" . $row['requestby'] . "&var15=" . $row['grandTot'] . "&var16=" . $row['tmp_entryNo'] . "&var17=" . $row['entryDate'] . "' onclick='approveKot($cuscode)' class='btn btn-success btn-sm' >View</a></td>";

        $tb .= "</tr>";
    }
    $tb .= "</table>";
    echo $tb;
}


if ($_GET["Command"] == "kkk") {




    $_SESSION["custno"] = $_GET['custno'];

    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<salesdetails>";

    $cuscode = $_GET["custno"];

    $sql = "Select * from kot_entry where entryNo='" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {


        $ResponseXML .= "<id><![CDATA[" . $row['approved'] . "]]></id>";
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "update_list") {
    $ResponseXML = "";
    $ResponseXML .= "<table class=\"table\">
	            <tr>
                        <th width=\"121\">Item No</th>
                        <th width=\"424\">Description </th>
                        
                        <th width=\"121\">Amount</th>  
                    </tr>";


//    $sql = "SELECT * from ass_vender where itcode <> ''";
//    if ($_GET['refno'] != "") {
//        $sql .= " and itcode like '%" . $_GET['refno'] . "%'";
//    }
//    if ($_GET['cusname'] != "") {
//        $sql .= " and itname like '%" . $_GET['cusname'] . "%'";
//    }
//    $stname = $_GET['stname'];

    $sql .= " select * from kot_itemdetail";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row["entryNo"];


        $ResponseXML .= "<tr>               
                              <td onclick=\"approveKot('$cuscode', '$stname');\">" . $row['entryNo'] . "</a></td>
                            </tr>";
    }
    $ResponseXML .= "</table>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "delete from mis_income_master_fie where code = '" . $_GET['code'] . "'";
        $result = $conn->query($sql);



        $sql = "Insert into mis_income_master_fie(code,property_name,type,rate,unit,down_payment)values 
    ('" . $_GET['code'] . "', '" . $_GET['propertyname'] . "','" . $_GET['type'] . "','" . $_GET['rate'] . "','" . $_GET['unit'] . "','" . $_GET['downpayment'] . "') ";

        $result = $conn->query($sql);
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}
?>