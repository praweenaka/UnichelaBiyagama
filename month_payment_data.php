<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "gen") {

    $ResponseXML = "";
    $ResponseXML .= "<table class='table table-hover'>";

    $sql = "SELECT * FROM approve_kot_entry where month(requireDate1) = month('" . $_GET['month'] . "') ";

    //
    // and month(field1) = '05' 
    //   $sql = "select * from kot_final where reqdate < ('" . $_GET['month'] . "') order by entry_no";
    $ResponseXML .= "<tr>";
    $ResponseXML .= "<th style=\"width: 120px;\"></th>";
    $ResponseXML .= "<th style=\"width: 182px;\"></th>";
    $ResponseXML .= "<th style=\"width: 180px;\"></th>";
    $ResponseXML .= "<th style=\"width: 182px;\"></th>";

    $ResponseXML .= "</tr>";
    $amo3 = 0;
    $amo4 = 0;
    foreach ($conn->query($sql) as $row) {
        $ResponseXML .= "<tr>";
        $ResponseXML .= "<td>" . $row['entryNo1'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorName1'] . "</td>";
        $ResponseXML .= "<td>" . $row['requireDate1'] . "</td>";
        $ResponseXML .= "<td>" . $row['grandTot1'] . "</td>";

        $ResponseXML .= "</tr>";

        $amo3 = $amo3 + $row['grandTot1'];
    }
    $ResponseXML .= "<i><![CDATA[$amo3]]></i>";
    $ResponseXML .= "</table>";

    echo $ResponseXML;
}

if ($_GET["Command"] == "gena") {

    $ResponseXML = "";
    $ResponseXML .= "<table class='table table-hover'>";

    $sql = "SELECT * FROM approve_kot_entry where requireDate1 BETWEEN ('" . $_GET['from'] . "') AND ('" . $_GET['to'] . "') ";

    // SELECT * FROM table WHERE date_column BETWEEN >= '2014-01-10' AND '2015-01-01';
    // and month(field1) = '05' 
    //   $sql = "select * from kot_final where reqdate < ('" . $_GET['month'] . "') order by entry_no";
    $ResponseXML .= "<tr>";
    $ResponseXML .= "<th style=\"width: 120px;\"></th>";
    $ResponseXML .= "<th style=\"width: 182px;\"></th>";
    $ResponseXML .= "<th style=\"width: 180px;\"></th>";
    $ResponseXML .= "<th style=\"width: 182px;\"></th>";
    $ResponseXML .= "</tr>";
    $amo3 = 0;
    foreach ($conn->query($sql) as $row) {
        $ResponseXML .= "<tr>";
        $ResponseXML .= "<td>" . $row['entryNo1'] . "</td>";
        $ResponseXML .= "<td>" . $row['visitorName1'] . "</td>";
        $ResponseXML .= "<td>" . $row['requireDate1'] . "</td>";
        $ResponseXML .= "<td>" . $row['grandTot1'] . "</td>";
        $ResponseXML .= "</tr>";

        $amo3 = $amo3 + $row['grandTot1'];
    }
    $ResponseXML .= "<i><![CDATA[$amo3]]></i>";
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