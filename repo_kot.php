<?php session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Report KOT ENTRY</title>


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
        .horizontal_dotted_line{
            border-bottom: 1px dotted black;
            width: 100px;
        }

        p.solid {border-style: solid;}

    </style>
</head>



<body> 
    <?php
    require_once ("./connection_sql.php");

    date_default_timezone_set("Asia/Colombo");
    if ($_GET["Command"] == "rep") {

        $table = "";



        $table .= "<table   style='width: 1200px;' class='table1'>
            <tr>
                 <th class='bottom head' colspan='3'>SILUETA (PVT) LTD</th> 
            </tr>
            <tr>
                 <th class='bottom head' colspan='3'>Biyagama Export Processing Zone</th> 
            </tr>
            <tr>
                 <th class='bottom head' colspan='3'>Walagama,Malwana</th> 
            </tr>
            <tr>
                 <th class='bottom head' colspan='3'>Tel : 0114768000 Fax : 114768010</th> 
            </tr>
            <tr>
                 <th class='bottom head' colspan='3'></th> 
            </tr>
            <tr>
                 <th class='bottom head' colspan='3'>KOT ENTRY REPORT</th> 
            </tr>
              </table>";




        $table .= "<table style='width: 660px;' class='table1'><tr>
                        <th style='width: 10px;' class='left'></th>
                        <th style='width: 10px;' class='left'>Entry No :</th>
                        <th style='width: 80px;' class='left'>" . $_GET['entryNo'] . "</th>  
                       
                   </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                        <th style='width: 10px;' class='left'></th>
                        <th style='width: 10px;' class='left'>Visiter Type :</th>
                        <th style='width: 80px;' class='left p solid'>" . $_GET['visitorType'] . "</th> 
                        <th style='width: 10px;' class='left'>Organization Name :</th>
                        <th style='width: 80px;' class='left'>" . $_GET['visitorName'] . "</th> 
                   </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                        <th style='width: 10px;' class='left'></th>
                        <th style='width: 10px;' class='left'>No of Visitors :</th>
                        <th style='width: 80px;' class='left'>" . $_GET['visitorNo'] . "</th>  
                        <th style='width: 10px;' class='left'>Department :</th>
                        <th style='width: 80px;' class='left'>" . $_GET['department'] . "</th>  
               
                   </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                        <th style='width: 10px;' class='left'></th>
                        <th style='width: 10px;' class='left'>No of Persons :</th>
                        <th style='width: 80px;' class='left'>" . $_GET['personNo'] . "</th>  
                        <th style='width: 10px;' class='left'>Require Time:</th>
                        <th style='width: 80px;' class='left'>" . $_GET['requireTime'] . "</th>  
               
                   </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                        <th style='width: 10px;' class='left'></th>
                        <th style='width: 10px;' class='left'>Require Date :</th>
                        <th style='width: 80px;' class='left'>" . $_GET['requireDate'] . "</th>  
                        <th style='width: 10px;' class='left'>Remarks :</th>
                        <th style='width: 80px;' class='left'>" . $_GET['remark'] . "</th>  
                   </tr></table>";


        $table .= "<table style='width: 1000px;' class='table1'><tr>
                        <th style='width: 10px;' class='left'></th>
                                               
                   </tr></table>";



        $table .= "<table class='table' >	
      	<tr>
                        <th style='width: 100px;' class='left'>No</th>     
                        <th style='width: 100px;' class='left'>Meal Type</th>      
                        <th style='width: 100px;' class='left'>Item Code</th>                        
                        <th style='width: 100px;' class='left'>Description</th>
                        <th style='width: 100px;' class='left'>Qty</th>
                        <th style='width: 100px;' class='left'>Amount</th>
                        <th style='width: 100px;' class='left'>Sub Total</th>
	
        </tr>";

        $i = 0;
        $tot = 0;
        $sql3 = "select * from kot_itemdetail  where entryNo = '" . $_GET['entryNo'] . "'";

        foreach ($conn->query($sql3) as $row) {
            $i = $i + 1;

            $table .= "<tr>";

            $table .= "<td>" . $i . "</td>";
            $table .= "<td>" . $row['mealtype'] . "</td>";
            $table .= "<td>" . $row['itemcode'] . "</td>";
            $table .= "<td>" . $row['itemdesc'] . "</td>";
            $table .= "<td>" . $row['qty'] . "</td>";
            $table .= "<td>" . $row['amount'] . "</td>";
            $table .= "<td>" . $row['subtot'] . "</td>";

            $table .= "</tr>";
            $tot = $tot + $row['subtot'];
        }


        $table .= "<table class='table1' ><tr>
                                
                        <th style='width: 100px;' class='left'></th>                        
                        <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'></th>
	
                    </tr></table>";

        $table .= "<table style='width: 1200px;' class='table1'><tr>
                        <th style='width: 300px;' class='left'></th>
                        <th style='width: 100px;' class='left'>Total :</th>
                        <th style='width: 80px;' class='left'>" . $tot . "</th> 
                        <th style='width: 10px;' class='left'></th>
                        <th style='width: 80px;' class='left'>" . $_GET[''] . "</th>  
                        
                   </tr></table>";

        $table .= "<table class='table1' ><tr>
                                
                        <th style='width: 100px;' class='left'></th>                        
                        <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'></th>
	
                    </tr></table>";

//        $table .= "<table class='table1' ><tr>
//                                
//                        <th style='width: 100px;' class='horizontal_dotted_line'></th>                        
//                        <th style='width: 100px;' class='horizontal_dotted_line'></th>
//                        <th style='width: 100px;' class='horizontal_dotted_line'></th>
//                        <th style='width: 100px;' class='horizontal_dotted_line'></th>
//	
//                    </tr></table>";
//
//        $table .= "<table class='table1' ><tr>
//                         <th><h1></h1></th>           
//                        <th style='width: 100px;' class='left'>W/S:S/E SIG</th>                        
//                        <th style='width: 100px;' class='left'>DRIVER'S SIG</th>
//                        <th style='width: 100px;' class='left'>S/O SIG</th>
//                        <th style='width: 100px;' class='left'>O.I.C SIG</th>
//	
//                    </tr></table>";

        echo $table;
    }
    ?>