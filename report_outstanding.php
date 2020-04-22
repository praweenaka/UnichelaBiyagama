<?php session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Report</title>


    <style>
        @media print {
            a[href]:after {
                content: none !important;
            }
        }
        a:link, a:visited {

            text-decoration: none;
            color:#000000;
        }


        a:hover {
            text-decoration: underline;
        }
        body {
            color: #333;
            font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 10px;
            line-height: 1.32857;
        }
        .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            border-top:1px solid #DDDDDD;
            line-height:1.2857;
            padding:1.5px;

            vertical-align:top;
        }
        .right {
            text-align: right;
        }
        .left {
            text-align: left;
        }
        .center {
            text-align: center;
        }
        .table1 {
            border-collapse: collapse;
            border: 1px;
        }
        .table1, td, th {

            font-family: Arial, Helvetica, sans-serif;
            padding: 5px;

        }
        .table1 th {
            font-weight: bold;
            font-size: 12px;
        }
        .table1 td {
            font-size: 12px;
            border-bottom: none;
            border-top: none;
        }
    </style>
</head>

<body>
    <?php
    require_once ("./connection_sql.php");

    date_default_timezone_set("Asia/Colombo");

    if ($_GET['optionsRadios'] == "breakfast") {

        $table = "";
        $table .= "<table   style='width: 1200px;' class='table1'>
            <tr>
                <th class='bottom head' colspan = '6'><center>Unichela Biyagama</center></th>

            </tr>
            <tr>
              <th colspan='6' ><center>Break Fast Menu Report</center></th>

            </tr>
             <tr>
              <th colspan='6' ><center></center></th>

            </tr>
            <tr>
                <th colspan='6' ><center></center></th>
             </tr>
            <tr>


            </tr></table>";

        $table .= "<table   style='width: 660px;' class='table1'>
            <tr>
                <th style='width: 8px;' class='left'>Date :</th>
                <th style='width: 80px;' class='left'>" . date("Y-m-d") . "</th>
                <th style='width: 8px;' class='left'>Time :</th>
                <th style='width: 80px;' class='left'>" . date("h-i-sa") . "</th>
            </tr></table>";


        $sql = "select * from food_menu_master where breakFast='y'";



        $table .= "<table class='table' >
      	<tr>
        <th class='center' style='width: 180px;'>Item Code</th>
        <th class='center' style='width: 180px;'>Description</th>
        <th class='center' style='width: 180px;'>Amount</th>

        </tr>";

        foreach ($conn->query($sql) as $row) {
//            $prop = $row['approve'];
//            if ($prop == '0') {
            $table .= "<tr>";
            $table .= "<td>" . $row['itemCode'] . "</td>";
            $table .= "<td>" . $row['description'] . "</td>";
            $table .= "<td>" . $row['amount'] . "</td>";

            $table .= "</tr>";
//            }
        }

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";
    }



    if ($_GET['optionsRadios'] == "kotentry") {

        if ($_GET['datecheck'] == "datecheck") {
            $sql .= "select * from kot_entry where (ap_step='0' and cancel ='0' and ap_lvl='lvl1') and requireDate BETWEEN ('" . $_GET['from'] . "') AND ('" . $_GET['to'] . "') ";
        } else {
            $sql = "select * from kot_entry where ap_step='0' and cancel ='0' and ap_lvl='lvl1'";
        }

        if ($_GET['department'] != "All") {
            $sql .= " and department='" . $_GET['department'] . "'";
        }

        $table = "";
        $table .= "<table   style='width: 1200px;' class='table1'>
            <tr>
                <th class='bottom head' colspan = '6'><center>Unichela Biyagama</center></th>

            </tr>
            <tr>
              <th colspan='6' ><center>Pending Kot Entries &nbsp; " . $_GET['department'] . "</th>

            </tr>
             <tr>
              <th colspan='6' ><center></center></th>

            </tr>
            <tr>
                <th colspan='6' ><center></center></th>
             </tr>
            <tr>


            </tr></table>";

        $table .= "<table   style='width: 660px;' class='table1'>
            <tr>
                <th style='width: 8px;' class='left'>Date :</th>
                <th style='width: 80px;' class='left'>" . date("Y-m-d") . "</th>
                <th style='width: 8px;' class='left'>Time :</th>
                <th style='width: 80px;' class='left'>" . date("h-i-sa") . "</th>
            </tr></table>";

        $gtot = 0;


        foreach ($conn->query($sql) as $row) {

            $table .= "<table class='table' >
      	<tr>
        <th class='center' style='width: 180px;'>Entry No</th>
        <th class='center' style='width: 180px;'>Visitor Type</th>
        <th class='center' style='width: 180px;'>Organization Name</th>
        <th class='center' style='width: 180px;'>No Of Visitors</th>
        <th class='center' style='width: 180px;'>Department</th>
        <th class='center' style='width: 180px;'>No Of Persons</th>
        <th class='center' style='width: 180px;'>Entry Date</th>
        <th class='center' style='width: 180px;'>Requre Date</th>
        <th class='center' style='width: 180px;'>Remark</th>
        <th class='center' style='width: 180px;'>Grand Total</th>


        </tr>";
            $table .= "<tr>";
            $table .= "<tr class='center'>";
            $table .= "<td class='center'>" . $row['entryNo'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorType'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorName'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorNo'] . "</td>";
            $table .= "<td class='center'>" . $row['department'] . "</td>";
            $table .= "<td class='center'>" . $row['personNo'] . "</td>";
            $table .= "<td class='center'>" . $row['entryDate'] . "</td>";
            $table .= "<td class='center'>" . $row['requireDate'] . "</td>";
            $table .= "<td class='center'>" . $row['remark'] . "</td>";
            $table .= "<td class='center'>" . $row['grandTot'] . "</td>";


            $table .= "</tr>";


            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";

            $gtot = $gtot + $row['grandTot'];

            $i = 0;
            $sql3 = "select * from kot_itemdetail  where entryNo = '" . $row['entryNo'] . "'";


            $table .= "<table class='table1' >
      	<tr>
                       <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'>No</th>
                        <th style='width: 100px;' class='left'>Item Code</th>
                        <th style='width: 100px;' class='left'>Item Description</th>
                        <th style='width: 100px;' class='left'>QTY</th>
                        <th style='width: 100px;' class='left'>Meal Type</th>

        </tr>";
            foreach ($conn->query($sql3) as $row) {
                $i = $i + 1;


                $table .= "<tr>";
                $table .= "<td></td>";
                $table .= "<td>" . $i . "</td>";
                $table .= "<td>" . $row['itemcode'] . "</td>";
                $table .= "<td>" . $row['itemdesc'] . "</td>";
                $table .= "<td>" . $row['qty'] . "</td>";
                $table .= "<td>" . $row['mealtype'] . "</td>";
                $table .= "</tr>";
            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";
        }

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1350px;' class='table1'>
            <tr>

        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'>Total :</th>

        <th class='center' style='width: 180px;'>$gtot</th>
            </tr></table>";
    }

    if ($_GET['optionsRadios'] == "kotentrycancel") {

        if ($_GET['datecheck'] == "datecheck") {
            $sql .= "select * from kot_entry where (ap_step='0' and cancel ='1' and ap_lvl='lvl1') and requireDate BETWEEN ('" . $_GET['from'] . "') AND ('" . $_GET['to'] . "') ";
        } else {
            $sql = "select * from kot_entry where ap_step='0' and cancel ='1' and ap_lvl='lvl1'";
        }

        if ($_GET['department'] != "All") {
            $sql .= " and department='" . $_GET['department'] . "'";
        }

        $table = "";
        $table .= "<table   style='width: 1200px;' class='table1'>
            <tr>
                <th class='bottom head' colspan = '6'><center>Unichela Biyagama</center></th>

            </tr>
            <tr>
              <th colspan='6' ><center>Canceled  Kot Entries&nbsp; " . $_GET['department'] . "</center></th>

            </tr>
             <tr>
              <th colspan='6' ><center></center></th>

            </tr>
            <tr>
                <th colspan='6' ><center></center></th>
             </tr>
            <tr>


            </tr></table>";

        $table .= "<table   style='width: 660px;' class='table1'>
            <tr>
                <th style='width: 8px;' class='left'>Date :</th>
                <th style='width: 80px;' class='left'>" . date("Y-m-d") . "</th>
                <th style='width: 8px;' class='left'>Time :</th>
                <th style='width: 80px;' class='left'>" . date("h-i-sa") . "</th>
            </tr></table>";

        $gtot = 0;


        foreach ($conn->query($sql) as $row) {

            $table .= "<table class='table' >
      	<tr>
        <th class='center' style='width: 180px;'>Entry No</th>
        <th class='center' style='width: 180px;'>Visitor Type</th>
        <th class='center' style='width: 180px;'>Organization Name</th>
        <th class='center' style='width: 180px;'>No Of Visitors</th>
        <th class='center' style='width: 180px;'>Department</th>
        <th class='center' style='width: 180px;'>No Of Persons</th>
        <th class='center' style='width: 180px;'>Entry Date</th>
        <th class='center' style='width: 180px;'>Requre Date</th>
        <th class='center' style='width: 180px;'>Remark</th>
        <th class='center' style='width: 180px;'>Grand Total</th>


       </tr>";

            $table .= "<tr>";
            $table .= "<tr class='center'>";
            $table .= "<td class='center'>" . $row['entryNo'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorType'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorName'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorNo'] . "</td>";
            $table .= "<td class='center'>" . $row['department'] . "</td>";
            $table .= "<td class='center'>" . $row['personNo'] . "</td>";
            $table .= "<td class='center'>" . $row['entryDate'] . "</td>";
            $table .= "<td class='center'>" . $row['requireDate'] . "</td>";
            $table .= "<td class='center'>" . $row['remark'] . "</td>";
            $table .= "<td class='center'>" . $row['grandTot'] . "</td>";

            $table .= "</tr>";


            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";

            $gtot = $gtot + $row['grandTot'];

            $i = 0;
            $sql3 = "select * from kot_itemdetail  where entryNo = '" . $row['entryNo'] . "'";


            $table .= "<table class='table1' >
      	<tr>
                       <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'>No</th>
                        <th style='width: 100px;' class='left'>Item Code</th>
                        <th style='width: 100px;' class='left'>Item Description</th>
                        <th style='width: 100px;' class='left'>QTY</th>
                        <th style='width: 100px;' class='left'>Meal Type</th>

        </tr>";

            foreach ($conn->query($sql3) as $row) {
                $i = $i + 1;


                $table .= "<tr>";
                $table .= "<td></td>";
                $table .= "<td>" . $i . "</td>";
                $table .= "<td>" . $row['itemcode'] . "</td>";
                $table .= "<td>" . $row['itemdesc'] . "</td>";
                $table .= "<td>" . $row['qty'] . "</td>";
                $table .= "<td>" . $row['mealtype'] . "</td>";
                $table .= "</tr>";
            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";
        }

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1350px;' class='table1'>
            <tr>

        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'>Total :</th>

        <th class='center' style='width: 180px;'>$gtot</th>
            </tr></table>";
    }


    if ($_GET['optionsRadios'] == "kotentrycanteencancel") {

        if ($_GET['datecheck'] == "datecheck") {
            $sql .= "select * from kot_entry where (ap_step='0' and cancel ='1' and ap_lvl='lvl2') and requireDate BETWEEN ('" . $_GET['from'] . "') AND ('" . $_GET['to'] . "') ";
        } else {
            $sql = "select * from kot_entry where ap_step='0' and cancel ='1' and ap_lvl='lvl2'";
        }

        if ($_GET['department'] != "All") {
            $sql .= " and department='" . $_GET['department'] . "'";
        }

        $table = "";
        $table .= "<table   style='width: 1200px;' class='table1'>
            <tr>
                <th class='bottom head' colspan = '6'><center>Unichela Biyagama</center></th>

            </tr>
            <tr>
              <th colspan='6' ><center>Canteen Canceled Kot Entries &nbsp; " . $_GET['department'] . "</center></th>

            </tr>
             <tr>
              <th colspan='6' ><center></center></th>

            </tr>
            <tr>
                <th colspan='6' ><center></center></th>
             </tr>
            <tr>


            </tr></table>";

        $table .= "<table   style='width: 660px;' class='table1'>
            <tr>
                <th style='width: 8px;' class='left'>Date :</th>
                <th style='width: 80px;' class='left'>" . date("Y-m-d") . "</th>
                <th style='width: 8px;' class='left'>Time :</th>
                <th style='width: 80px;' class='left'>" . date("h-i-sa") . "</th>
            </tr></table>";

        $gtot = 0;



        foreach ($conn->query($sql) as $row) {
//            $prop = $row['approve']

            $table .= "<table class='table' >
      	<tr>
        <th class='center' style='width: 180px;'>Entry No</th>
        <th class='center' style='width: 180px;'>Visitor Type</th>
        <th class='center' style='width: 180px;'>Organization Name</th>
        <th class='center' style='width: 180px;'>No Of Visitors</th>
        <th class='center' style='width: 180px;'>Department</th>
        <th class='center' style='width: 180px;'>No Of Persons</th>
        <th class='center' style='width: 180px;'>Entry Date</th>
        <th class='center' style='width: 180px;'>Requre Date</th>
        <th class='center' style='width: 180px;'>Remark</th>
        <th class='center' style='width: 180px;'>Grand Total</th>




        </tr>";

            $table .= "<tr>";
            $table .= "<tr class='center'>";
            $table .= "<td class='center'>" . $row['entryNo'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorType'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorName'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorNo'] . "</td>";
            $table .= "<td class='center'>" . $row['department'] . "</td>";
            $table .= "<td class='center'>" . $row['personNo'] . "</td>";
            $table .= "<td class='center'>" . $row['entryDate'] . "</td>";
            $table .= "<td class='center'>" . $row['requireDate'] . "</td>";
            $table .= "<td class='center'>" . $row['remark'] . "</td>";
            $table .= "<td class='center'>" . $row['grandTot'] . "</td>";


            $table .= "</tr>";
//            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";

            $gtot = $gtot + $row['grandTot'];

            $i = 0;
            $sql3 = "select * from kot_itemdetail  where entryNo = '" . $row['entryNo'] . "'";


            $table .= "<table class='table1' >
      	<tr>
                       <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'>No</th>
                        <th style='width: 100px;' class='left'>Item Code</th>
                        <th style='width: 100px;' class='left'>Item Description</th>
                        <th style='width: 100px;' class='left'>QTY</th>
                        <th style='width: 100px;' class='left'>Meal Type</th>

        </tr>";

            foreach ($conn->query($sql3) as $row) {
                $i = $i + 1;


                $table .= "<tr>";
                $table .= "<td></td>";
                $table .= "<td>" . $i . "</td>";
                $table .= "<td>" . $row['itemcode'] . "</td>";
                $table .= "<td>" . $row['itemdesc'] . "</td>";
                $table .= "<td>" . $row['qty'] . "</td>";
                $table .= "<td>" . $row['mealtype'] . "</td>";
                $table .= "</tr>";
            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";
        }

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1350px;' class='table1'>
            <tr>

        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'>Total :</th>

        <th class='center' style='width: 180px;'>$gtot</th>
            </tr></table>";
    }
    if ($_GET['optionsRadios'] == "finishentry") {

        if ($_GET['datecheck'] == "datecheck") {
            $sql .= "select * from kot_entry where (ap_step='0' and cancel ='0' and ap_lvl='lvl2') and requireDate BETWEEN ('" . $_GET['from'] . "') AND ('" . $_GET['to'] . "') ";
        } else {
            $sql = "select * from kot_entry where ap_step='0' and cancel ='0' and ap_lvl='lvl2'";
        }

        if ($_GET['department'] != "All") {
            $sql .= " and department='" . $_GET['department'] . "'";
        }

        $table = "";
        $table .= "<table   style='width: 1200px;' class='table1'>
            <tr>
                <th class='bottom head' colspan = '6'><center>Unichela Biyagama</center></th>

            </tr>
            <tr>
              <th colspan='6' ><center>Approved Kot Entries &nbsp; " . $_GET['department'] . "</center></th>

            </tr>
             <tr>
              <th colspan='6' ><center></center></th>

            </tr>
            <tr>
                <th colspan='6' ><center></center></th>
             </tr>
            <tr>


            </tr></table>";

        $table .= "<table   style='width: 660px;' class='table1'>
            <tr>
                <th style='width: 8px;' class='left'>Date :</th>
                <th style='width: 80px;' class='left'>" . date("Y-m-d") . "</th>
                <th style='width: 8px;' class='left'>Time :</th>
                <th style='width: 80px;' class='left'>" . date("h-i-sa") . "</th>
            </tr></table>";

        $gtot = 0;



        foreach ($conn->query($sql) as $row) {
//            $prop = $row['approve']

            $table .= "<table class='table' >
      	<tr>
        <th class='center' style='width: 180px;'>Entry No</th>
        <th class='center' style='width: 180px;'>Visitor Type</th>
        <th class='center' style='width: 180px;'>Organization Name</th>
        <th class='center' style='width: 180px;'>No Of Visitors</th>
        <th class='center' style='width: 180px;'>Department</th>
        <th class='center' style='width: 180px;'>No Of Persons</th>
        <th class='center' style='width: 180px;'>Entry Date</th>
        <th class='center' style='width: 180px;'>Requre Date</th>
        <th class='center' style='width: 180px;'>Remark</th>
        <th class='center' style='width: 180px;'>Grand Total</th>


        </tr>";

            $table .= "<tr>";
            $table .= "<tr class='center'>";
            $table .= "<td class='center'>" . $row['entryNo'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorType'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorName'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorNo'] . "</td>";
            $table .= "<td class='center'>" . $row['department'] . "</td>";
            $table .= "<td class='center'>" . $row['personNo'] . "</td>";
            $table .= "<td class='center'>" . $row['entryDate'] . "</td>";
            $table .= "<td class='center'>" . $row['requireDate'] . "</td>";
            $table .= "<td class='center'>" . $row['remark'] . "</td>";
            $table .= "<td class='center'>" . $row['grandTot'] . "</td>";

            $table .= "</tr>";
//            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";

            $gtot = $gtot + $row['grandTot'];

            $i = 0;
            $sql3 = "select * from kot_itemdetail  where entryNo = '" . $row['entryNo'] . "'";


            $table .= "<table class='table1' >
      	<tr>
                       <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'>No</th>
                        <th style='width: 100px;' class='left'>Item Code</th>
                        <th style='width: 100px;' class='left'>Item Description</th>
                        <th style='width: 100px;' class='left'>QTY</th>
                        <th style='width: 100px;' class='left'>Meal Type</th>

        </tr>";

            foreach ($conn->query($sql3) as $row) {
                $i = $i + 1;


                $table .= "<tr>";
                $table .= "<td></td>";
                $table .= "<td>" . $i . "</td>";
                $table .= "<td>" . $row['itemcode'] . "</td>";
                $table .= "<td>" . $row['itemdesc'] . "</td>";
                $table .= "<td>" . $row['qty'] . "</td>";
                $table .= "<td>" . $row['mealtype'] . "</td>";
                $table .= "</tr>";
            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";
        }

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1350px;' class='table1'>
            <tr>

        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'>Total :</th>

        <th class='center' style='width: 180px;'>$gtot</th>
            </tr></table>";
    }


    if ($_GET['optionsRadios'] == "Canteenfinishentry") {

        if ($_GET['datecheck'] == "datecheck") {
            $sql .= "select * from kot_entry where (ap_step='1' and cancel ='0' and ap_lvl='lvl2') and requireDate BETWEEN ('" . $_GET['from'] . "') AND ('" . $_GET['to'] . "') ";
        } else {
            $sql = "select * from kot_entry where ap_step='1' and cancel ='0' and ap_lvl='lvl2'";
        }

        if ($_GET['department'] != "All") {
            $sql .= " and department='" . $_GET['department'] . "'";
        }

        $table = "";
        $table .= "<table   style='width: 1200px;' class='table1'>
            <tr>
                <th class='bottom head' colspan = '6'><center>Unichela Biyagama</center></th>

            </tr>
            <tr>
              <th colspan='6' ><center>Canteen Approved Kot Entries &nbsp; " . $_GET['department'] . "</center></th>

            </tr>
             <tr>
              <th colspan='6' ><center></center></th>

            </tr>
            <tr>
                <th colspan='6' ><center></center></th>
             </tr>
            <tr>


            </tr></table>";

        $table .= "<table   style='width: 660px;' class='table1'>
            <tr>
                <th style='width: 8px;' class='left'>Date :</th>
                <th style='width: 80px;' class='left'>" . date("Y-m-d") . "</th>
                <th style='width: 8px;' class='left'>Time :</th>
                <th style='width: 80px;' class='left'>" . date("h-i-sa") . "</th>
            </tr></table>";

        $gtot = 0;



        foreach ($conn->query($sql) as $row) {
//            $prop = $row['approve']

            $table .= "<table class='table' >
      	<tr>
        <th class='center' style='width: 180px;'>Entry No</th>
        <th class='center' style='width: 180px;'>Visitor Type</th>
        <th class='center' style='width: 180px;'>Organization Name</th>
        <th class='center' style='width: 180px;'>No Of Visitors</th>
        <th class='center' style='width: 180px;'>Department</th>
        <th class='center' style='width: 180px;'>No Of Persons</th>
        <th class='center' style='width: 180px;'>Entry Date</th>
        <th class='center' style='width: 180px;'>Requre Date</th>
        <th class='center' style='width: 180px;'>Remark</th>
        <th class='center' style='width: 180px;'>Grand Total</th>


        </tr>";

            $table .= "<tr>";
            $table .= "<tr class='center'>";
            $table .= "<td class='center'>" . $row['entryNo'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorType'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorName'] . "</td>";
            $table .= "<td class='center'>" . $row['visitorNo'] . "</td>";
            $table .= "<td class='center'>" . $row['department'] . "</td>";
            $table .= "<td class='center'>" . $row['personNo'] . "</td>";
            $table .= "<td class='center'>" . $row['entryDate'] . "</td>";
            $table .= "<td class='center'>" . $row['requireDate'] . "</td>";
            $table .= "<td class='center'>" . $row['remark'] . "</td>";
            $table .= "<td class='center'>" . $row['grandTot'] . "</td>";

            $table .= "</tr>";
//            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";

            $gtot = $gtot + $row['grandTot'];

            $i = 0;
            $sql3 = "select * from kot_itemdetail  where entryNo = '" . $row['entryNo'] . "'";


            $table .= "<table class='table1' >
      	<tr>
                       <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'>No</th>
                        <th style='width: 100px;' class='left'>Item Code</th>
                        <th style='width: 100px;' class='left'>Item Description</th>
                        <th style='width: 100px;' class='left'>QTY</th>
                        <th style='width: 100px;' class='left'>Meal Type</th>

        </tr>";

            foreach ($conn->query($sql3) as $row) {
                $i = $i + 1;


                $table .= "<tr>";
                $table .= "<td></td>";
                $table .= "<td>" . $i . "</td>";
                $table .= "<td>" . $row['itemcode'] . "</td>";
                $table .= "<td>" . $row['itemdesc'] . "</td>";
                $table .= "<td>" . $row['qty'] . "</td>";
                $table .= "<td>" . $row['mealtype'] . "</td>";
                $table .= "</tr>";
            }

            $table .= "<table   style='width: 1350px;' class='table1'>
                <tr>
                    <th class='center' style='height: 10px;'></th>
                </tr>
            </table>";
        }

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1060px;' class='table1'>
            <tr>
                <th style='width: 50px;' colspan = '4' class='left'></th>
                <th style='width: 50px;' colspan = '4' class='left'></th>

                <th style='width: 50px;' colspan = '4' class='left'></th>
            </tr></table>";

        $table .= "<table   style='width: 1350px;' class='table1'>
            <tr>

        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'></th>
        <th class='center' style='width: 180px;'>Total :</th>

        <th class='center' style='width: 180px;'>$gtot</th>
            </tr></table>";
    }

    echo $table;
    