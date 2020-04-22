<?php session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Approval Report</title>


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
            border-top:2px solid #DDDDDD;
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
        .left {
            text-align: left;
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
        }
    </style>
</head>



<body> 
    <?php
    require_once ("./connection_sql.php");

    date_default_timezone_set("Asia/Colombo");

    if ($_GET["Command"] == "app") {

        $table = "";



        $sql = "select * from tmp_bom where ref_no = ('" . $_GET['tmpno'] . "')";
        foreach ($conn->query($sql) as $row) {


            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'><hr></th>   
                 
            </tr></table>";


            $table .= "<table   style='width: 660px;' class='table1'>
            <tr><th class='bottom head' colspan='3'>BILL OF MATERIALS</th></tr>
            <tr>
                 <th class='bottom head' colspan='3'>ANODS COCOA PVT(LTD)</th> 
            </tr>
    
            <tr>               
               <th align='center' colspan='3'>HANWELLA</th> 
            </tr>

           </table>";


            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'><hr></th>   
                 
            </tr></table>";





            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>  
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";
            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 40px;' class='left'>Approvale Status :</th>
                <th style='width: 40px;' class='left'>" . $_GET['lvl'] . "</th>  
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";





            $table .= "<tr>
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr>";

            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='center'>&nbsp;</th>   
                 
            </tr></table>";

            $table .= "<tr>
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr>";

            $table .= "<table style='width: 660px;' class='table'><tr>
                <th style='width: 80px;' class='center'><u>Bom No</u></th>
                <th style='width: 80px;' class='center'><u>Approved Level</u></th>
                <th style='width: 80px;' class='center'><u>Date/Time</u></th>
                <th style='width: 80px;' class='center'><u>Approved By</u></th>
                 
            </tr></table>";

//        $qty = $row['qty'];

            $sql = "select * from approve_tab where approved_level1 = '" . $_GET['lvl'] . "'";
            foreach ($conn->query($sql) as $row) {

//            $val3 = round(($row['qty']*$qty)/100,2);



                $table .= "<table style='width: 660px;' class='table'><tr>
                <th style='width: 80px;' class='center'>" . $row['ref_no'] . "</th>
                <th style='width: 80px;' class='center'>" . $row['approved_level1'] . "</th>
                <th style='width: 80px;' class='center'>" . $row['ap_date_time'] . "</th>
                <th style='width: 80px;' class='center'>" . $row['user'] . "</th> 
            </tr></table>";
            }

            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";

            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>  
              
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";

//        $val2 = round($qty/10);
//        
            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>  
                
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";

            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'><hr></th>   
                 
            </tr></table>";
        }
        echo $table;
    }

    if ($_GET["Command"] == "rep") {

        $table = "";



        $sql = "select * from tmp_bom where ref_no = ('" . $_GET['tmpno'] . "')";
        foreach ($conn->query($sql) as $row) {


            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'><hr></th>   
                 
            </tr></table>";


            $table .= "<table   style='width: 660px;' class='table1'>
            <tr><th class='bottom head' colspan='3'>APPROVAL REPORT</th></tr>
            <tr>
                 <th class='bottom head' colspan='3'>ANODS COCOA PVT(LTD)</th> 
            </tr>
    
            <tr>               
               <th align='center' colspan='3'>HANWELLA</th> 
            </tr>

           </table>";


            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'><hr></th>   
                 
            </tr></table>";





            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>  
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";
            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 40px;' class='left'></th>
                <th style='width: 40px;' class='left'></th>  
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";





            $table .= "<tr>
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr>";

            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='center'>&nbsp;</th>   
                 
            </tr></table>";

            $table .= "<tr>
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr>";

            $table .= "<table style='width: 660px;' class='table'><tr>
                <th style='width: 80px;' class='center'><u>Bom No</u></th>
                <th style='width: 80px;' class='center'><u>Approved Level</u></th>
                <th style='width: 80px;' class='center'><u>Date/Time</u></th>
                <th style='width: 80px;' class='center'><u>Approved By</u></th>
                 
            </tr></table>";

//        $qty = $row['qty'];

            $sql = "select * from approve_tab where  approved_level1 = ('" . $_GET['lvl'] . "') and ap_date_time BETWEEN ('" . $_GET['dtfrom'] . "') AND ('" . $_GET['dtto'] . "')  ";
            foreach ($conn->query($sql) as $row) {

//            $val3 = round(($row['qty']*$qty)/100,2);



                $table .= "<table style='width: 660px;' class='table'><tr>
                <th style='width: 80px;' class='center'>" . $row['ref_no'] . "</th>
                <th style='width: 80px;' class='center'>" . $row['approved_level1'] . "</th>
                <th style='width: 80px;' class='center'>" . $row['ap_date_time'] . "</th>
                <th style='width: 80px;' class='center'>" . $row['user'] . "</th> 
            </tr></table>";
            }

            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";

            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>  
              
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";

//        $val2 = round($qty/10);
//        
            $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 80px;' class='left'></th>
                <th style='width: 80px;' class='left'></th>  
                
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";

            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'><hr></th>   
                 
            </tr></table>";
        }
        echo $table;
    }