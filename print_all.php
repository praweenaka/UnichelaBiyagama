<?php session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Outstanding Report</title>


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
    if ($_GET["Command"] == "rep") {

        $table = "";

        $sql = "SELECT * FROM approve_kot_entry where month(requireDate1) = month('" . $_GET['month'] . "') ";
        




        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;<hr></th>   
                 
            </tr></table>";


        $table .= "<table   style='width: 660px;' class='table1'>
            <tr><th class='bottom head' colspan='3'><img src='govt_logo.png'></th></tr>
            <tr>
                 <th class='bottom head' colspan='3'>MAS HOLDINGS</th> 
            </tr>
    
           


       
            
           </table>";


        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;<hr></th>   
                 
            </tr></table>";


        $table .= "<tr>
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr>";



        $table .= "<table style='width: 660px;' class='table1'><tr>
                <th style='width: 80px;' class='left'>Date :</th>
                <th style='width: 80px;' class='left'>" . date("Y-m-d") . "</th>  
                    <th style='width: 80px;' class='left'>Time :</th>
                <th style='width: 80px;' class='left'>" . date("h:i:sa") . "</th>  
                 
            </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";





        $table .= "<table style='width: 330px;' class='table1'><tr>
                
                <th style='width: 80px;' colspan = '4' class='left'>Month : </th>   
                <th style='width: 80px;' colspan = '4' class='left'></th>
                 
            </tr></table>";
        
        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";


        $table .= "<table class='table' >	
      	<tr>
        <th class='center' style='width: 170px;'>Entry No</th>
        <th class='center' style='width: 180px;'>Description</th>
      
	<th class='center' style='width: 150px;'>Date</th>
        <th class='center' style='width: 150px;'>Price</th>
        </tr>";

        $sql3 = "SELECT * FROM approve_kot_entry where month(requireDate1) = month('" . $_GET['month'] . "') ";
        $amo4 = 0;
        foreach ($conn->query($sql3) as $row) {
                       
                $table .= "<tr>";
                $table .= "<td>" . $row['entryNo1'] . "</td>";
                $table .= "<td>" . $row['visitorName1'] . "</td>";
                $table .= "<td>" . $row['requireDate1'] . "</td>";
                $table .= "<td>" . $row['grandTot1'] . "</td>";

                $table .= "</tr>";
                
         $amo4 = $amo4 + $row['grandTot1'];
         
                       
        }
        
            $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";
                $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";

          $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 80px;'  class='left'></th>   
                <th style='width: 320px;' class='left'></th>
                <th style='width: 80px;' class='left'>Total : $amo4</th>   
                <th style='width: 80px;' class='left'></th>
                 
            </tr></table>";


        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";

        $table .= "<tr>
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr>";


        echo $table;
    }