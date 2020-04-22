<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "gen") {

    $ResponseXML = "";
    $ResponseXML .= "<table class='table table-hover'>";

    $sql = "SELECT * FROM kot_entryfinal where month(requireDate) = month('" . $_GET['month'] . "')";
    $sql1 = "SELECT * FROM cancel_kot_entry where month(requireDate2) = month('" . $_GET['month'] . "')";
    $sql3 = "SELECT * FROM approve_kot_entry where month(requireDate1) = month('" . $_GET['month'] . "')";


    

    $ResponseXML .= "<tr>";
    $ResponseXML .= "<th style=\"width: 120px;\">Entry Date</th>";
    $ResponseXML .= "<th style=\"width: 182px;\">Visitor Name</th>";
    $ResponseXML .= "<th style=\"width: 180px;\">Visitor Type</th>";
    $ResponseXML .= "<th style=\"width: 182px;\">Require Date</th>";
    $ResponseXML .= "<th style=\"width: 182px;\">Qty</th>";
    $ResponseXML .= "<th style=\"width: 182px;\">Amount</th>";

    $ResponseXML .= "<th style=\"width: 182px;\">Remarks</th>";
    $ResponseXML .= "<th style=\"width: 182px;\">Status</th>";

    $ResponseXML .= "</tr>";

    foreach ($conn->query($sql) as $row) {
        $ResponseXML .= "<tr  style='color:blue'>";
        $ResponseXML .= "<td>" . $row['entryDate'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorName'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorType'] . "</td>";
        $ResponseXML .= "<td>" . $row['requireDate'] . "</td>";
        $ResponseXML .= "<td>" . $row['qty'] . "</td>";
        $ResponseXML .= "<td>" . $row['amount'] . "</td>";

        $ResponseXML .= "<td>" . $row['remark'] . "</td>";
        $ResponseXML .= "<td>Pending</td>";

        $ResponseXML .= "</tr>";
    }
    
    $i = 0;
    foreach ($conn->query($sql3) as $row) {
        $ResponseXML .= "<tr  style='color:green'>";
        $ResponseXML .= "<td>" . $row['entryDate1'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorName1'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorType1'] . "</td>";
        $ResponseXML .= "<td>" . $row['requireDate1'] . "</td>";
        $ResponseXML .= "<td></td>";
        $ResponseXML .= "<td></td>";

        $ResponseXML .= "<td>" . $row['remark1'] . "</td>";
        $ResponseXML .= "<td>Approved</td>";
        
        $ResponseXML .= "</tr>";
        $i = $i + 1;
        
    }
$ResponseXML .="<i><![CDATA[$i]]></i>";
    foreach ($conn->query($sql1) as $row) {
        $ResponseXML .= "<tr  style='color:red'>";
        $ResponseXML .= "<td>" . $row['entryDate2'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorName2'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorType2'] . "</td>";
        $ResponseXML .= "<td>" . $row['requireDate2'] . "</td>";
        $ResponseXML .= "<td></td>";
        $ResponseXML .= "<td></td>";

        $ResponseXML .= "<td>" . $row['remark2'] . "</td>";
        $ResponseXML .= "<td>Cancle</td>";

        $ResponseXML .= "</tr>";
    }
    
    
    
    $ResponseXML .= "</table>";
   
    
    
    echo $ResponseXML;
    
     
}

if ($_GET["Command"] == "save") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();



        $sql = "select * from kot_final order by entry_no";
        foreach ($conn->query($sql) as $row) {

            $refno = $row['no'] . date('Ym', strtotime($_GET['month']));

            $sql = "delete from s_salma where ref_no = '$refno '";
            $result = $conn->query($sql);

            $date = date('Y-m-t', strtotime($_GET['month']));
            $sql = "Insert into s_salma (ref_no, sdate, c_code, cus_name, grand_tot, totpay)values 
               ('" . $refno . "', '" . $date . "', '" . $row['owner_code'] . "', '" . $row['owner_name'] . "', '" . $row['rate'] . "',0) ";

            $result = $conn->query($sql);
        }
        
        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
    
    
}
?>

