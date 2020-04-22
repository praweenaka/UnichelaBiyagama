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

    $sql = "Select * from food_menu_master_special where itemCode='" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<str_type><![CDATA[" . $row['itemCode'] . "]]></str_type>";
        $ResponseXML .= "<str_rate><![CDATA[" . $row['mealtype'] . "]]></str_rate>";
        $ResponseXML .= "<str_do><![CDATA[" . $row['price'] . "]]></str_do>";
        
    }
    $i = 1;
    $ResponseXML .= "<sales_table><![CDATA[<table class = \"table\">
					<tr>
                                                <td style=\"width: 10px;\"><b>No</b></td>
						<td style=\"width: 60px;\"><b>Menu Description</b></td>
						<td style=\"width: 60px;\"><b>Menu Name</b></td>
                                                <td style=\"width: 60px;\"><b>Menu Date</b></td>
                                                 <td style=\"width: 60px;\"><b>Type</b></td>
					        <td style=\"width: 120px;\"><b></b></td>
					</tr>";


    $sql = "Select * from food_menu_master_special_item where itemCode='" . $cuscode . "'";
    foreach ($conn->query($sql) as $row) {

        $ResponseXML .= "<tr>                      
                        <td>" . $i . "</td>
                        <td>" . $row['menudesc'] . "</td>
                        <td>" . $row['mealname'] . "</td>
                        <td>" . $row['menudate'] . "</td>
                        <td>" . $row['type'] . "</td>
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
                    <th>Meal Type</th>
                    <th>Price</th>
                </tr>";

    if ($_GET["mstatus"] == "cusno") {
        $letters = $_GET['cusno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,mealtype,price from food_menu_master_special where  itemCode like '%$letters%' ";
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,mealtype,price from food_menu_master_special where  mealtype like '%$letters%' ";
    } else {

        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,mealtype,price from food_menu_master_special where  price like '%$letters%' ";
    }
    $sql .= " ORDER BY itemCode limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['itemCode'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['itemCode'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['mealtype'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['price'] . "</a></td>
                             
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
