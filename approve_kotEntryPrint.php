<?php session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Bill Print</title>


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


    $table = "";
    $no = $_GET['entryNo'];
    $sql = "select * from kot_entry where entryNo ='" . $no . "' ";
    $result = $conn->query($sql);
    if ($row = $result->fetch()) {
        $table .= "<table   style='width: 800px;' class='table1'>
            
            <th><hr></th>
            <tr>
            
               <th class='bottom head'><center><img src='img/logo.jpg'><center></th>
                
            </tr>
            <tr>
                 <th class='bottom head' colspan='3'>UNICHELA BIYAGAMA</th> 
            </tr>
    
            <tr>               
               <th align='center' colspan='4'>KOT ORDER</th> 
            </tr>


            <tr>
                  
                 <th class='bottom head' align='center' colspan='4'>Tel  :  0112569745 / 0112365478 &nbsp; Fax  :   0112569745 / 0112365478</th>
            
            </tr>
            <th><hr></th>
           </table>";




        $table .= "<table   style='width: 660px;' class='table1'>
            <tr>
               <th style='width: 20px;'  class='left'></th>   
               <th style='width: 250px;'  class='left'></th>   
               <th style='width:12px;'  class='left'>Date : </th>
               <th style='width:20px;'  class='left'>" . date("Y-m-d") . "</th>
              
                        
            </tr>
               
            </table>";

        $table .= "<table   style='width: 660px;' class='table1'>
            
            <tr>
              <th style='width: 20px;'  class='left'></th>   
              <th style='width: 380px;'  class='left'></th>   
              <th style='width:12px;' class='left'>Time : </th>
              <th style='width:20px;' class='left'>" . date("h:i:sa") . "</th>
                    
            </tr>
              
            </table>";


        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 80px;' colspan = '4' class='left'>Entry No : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['entryNo'] . "</th>
                <th style='width: 80px;' colspan = '4' class='left'>Visitor Type : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['visitorType'] . "</th>
                
            </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
               
                <th style='width: 80px;' colspan = '4' class='left'>Visiters Details : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['visitorName'] . "</th>
                <th style='width: 80px;' colspan = '4' class='left'>No of Visitors : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['visitorNo'] . "</th>
                 
            </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 80px;' colspan = '4' class='left'>Department : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['department'] . "</th>
                <th style='width: 80px;' colspan = '4' class='left'>No Of Employers : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['personNo'] . "</th>
            </tr></table>";

        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 80px;' colspan = '4' class='left'>Remarks :</th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['remark'] . "</th>
                <th style='width: 80px;' colspan = '4' class='left'>Require Date : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['requireDate'] . "</th>
            </tr></table>";


        $table .= "<table style='width: 660px;' class='table1'><tr>
              <th style='width: 80px;' colspan = '4' class='left'>Contact No : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['contact'] . "</th>
                <th style='width: 80px;' colspan = '4' class='left'>Credit Account : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['creditCombo'] . "</th>
            </tr></table>";


        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 660px;' colspan = '4' class='left'>&nbsp;</th>   
                 
            </tr></table>";



        $table .= "<table style='width: 660px;' class='table1'><tr>
                
                <th style='width: 140px;'  class='left'></th>   
                <th style='width: 140px;'  class='left'></th>
                <th style='width: 80px;' colspan = '4' class='left'>Grand Total : </th>   
                <th style='width: 80px;' colspan = '4' class='left'>" . $row['grandTot'] . "</th>
                
                 
            </tr></table>";



        $table .= "<table style='width: 1000px;' class='table1'><tr>
                        <th style='width: 10px;' class='left'></th>
                                               
                   </tr></table>";



        $table .= "<table class='table' >	
      	<tr>
                       
                        <th style='width: 100px;' class='left'>No</th>                        
                        <th style='width: 100px;' class='left'>Item Code</th>
                        <th style='width: 100px;' class='left'>Item Description</th>
                        <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'>QTY</th>
                        <th style='width: 100px;' class='left'>Meal Type</th>
                        <th style='width: 100px;' class='left'>Require Time</th>
                        <th style='width: 100px;' class='left'>Saving Location</th>
	
        </tr>";

        $i = 0;
        $serino ="";
        
        $sql3 = "select * from kot_itemdetail  where entryNo = '" . $_GET['entryNo'] . "' order by mealtype,menu,serialno,aa";

        foreach ($conn->query($sql3) as $row) {
            $i = $i + 1;


if ($row['mealtype'] =="VIP") {
    
    if ($serino != $row['serialno']) {
        $table .= "<tr><th colspan='8'>VIP SET " . $row['serialno'] . " " . $row['menu']  . "</th></tr>" ;
        
    }
$serino=     $row['serialno'];
}


            $table .= "<tr>";
            $table .= "<td>" . $i . "</td>";
            $table .= "<td>" . $row['itemcode'] . "</td>";
            $table .= "<td>" . $row['aa'] . "</td>";
            $table .= "<td>" . $row['itemdesc'] . "</td>";
            $table .= "<td>" . $row['qty'] . "</td>";
            $table .= "<td>" . $row['mealtype'] . "</td>";
            $table .= "<td>" . $row['requiretime'] . "</td>";
            $table .= "<td>" . $row['savinglock'] . "</td>";
            $table .= "</tr>";
        }




        $table .= "<table class='table1' ><tr>
                                
                        <th style='width: 100px;' class='left'></th>                        
                        <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'></th>
                        <th style='width: 100px;' class='left'></th>
	
                    </tr></table>";

        $table .= "<table class='table1' ><tr>
                                
                        <th style='width: 100px;' class='horizontal_dotted_line'></th>                        
                        <th style='width: 100px;' class='horizontal_dotted_line'></th>
                        <th style='width: 100px;' class='horizontal_dotted_line'></th>
                        <th style='width: 100px;' class='horizontal_dotted_line'></th>
	
                    </tr></table>";

        $table .= "<table   style='width:900px;' class='table1'>
            <tr>
            <br><br>  
                  <th><hr></th>      
            </tr>
           
            </table>";
    }

    echo $table;
    ?>

    <script>
        window.print();
    </script> 