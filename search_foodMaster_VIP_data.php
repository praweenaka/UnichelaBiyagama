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

    $sql = "Select * from food_menu_master_vip where itemCode='" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<str_type><![CDATA[" . $row['itemCode'] . "]]></str_type>";
        $ResponseXML .= "<str_rate><![CDATA[" . $row['category'] . "]]></str_rate>";
        $ResponseXML .= "<str_downpayment><![CDATA[" . $row['menudesc'] . "]]></str_downpayment>";
        $ResponseXML .= "<str_down><![CDATA[" . $row['qty'] . "]]></str_down>";
        $ResponseXML .= "<str_do><![CDATA[" . $row['price'] . "]]></str_do>";
    }
    $i = 1;
    $ResponseXML .= "<sales_table><![CDATA[<table class = \"table\">
					<tr>
                                                <td style=\"width: 10px;\"><b>No</b></td>
						<td style=\"width: 60px;\"><b>Menu Desc</b></td>
                                                <td style=\"width: 60px;\"><b>QTY</b></td>
                                                <td style=\"width: 60px;\"><b>Menu Name</b></td>
					        <td style=\"width: 120px;\"><b></b></td>
					</tr>";


    $sql = "Select * from food_menu_master_vip_item where itemCode='" . $cuscode . "'";
    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr>                      
                        <td>" . $i . "</td>
                        <td>" . $row['menudesc'] . "</td>
                        <td>" . $row['qty'] . "</td>
                        <td>" . $row['mealname'] . "</td>
                        <td><a class=\"btn btn-danger btn-xs\" onClick=\"del_item('" . $row['mealname'] . "')\"> <span class='fa fa-remove'></span></a></td>
			</tr>";
        $i = $i + 1;
    }

    $ResponseXML .= "</table>]]></sales_table>";

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";




    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>Item Code</th>
                    <th>Category</th>
                    <th>Price</th>
                </tr>";

    if ($_GET["mstatus"] == "cusno") {
        $letters = $_GET['cusno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,category,price from food_menu_master_VIP where  itemCode like '%$letters%' ";
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,category,price from food_menu_master_VIP where  category like '%$letters%' ";
    } else {

        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,category,price from food_menu_master_VIP where  price like '%$letters%' ";
    }
    $sql .= " ORDER BY itemCode limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['itemCode'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['itemCode'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['category'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['price'] . "</a></td>
                             
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
