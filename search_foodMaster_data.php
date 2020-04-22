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

    $sql = "Select * from food_menu_master where itemCode='" . $cuscode . "'";

    $sql = $conn->query($sql);
    if ($row = $sql->fetch()) {

        $ResponseXML .= "<str_type><![CDATA[" . $row['itemCode'] . "]]></str_type>";
        $ResponseXML .= "<str_rate><![CDATA[" . $row['description'] . "]]></str_rate>";
        $ResponseXML .= "<str_downpayment><![CDATA[" . $row['amount'] . "]]></str_downpayment>";

        $ResponseXML .= "<breakFastCheck><![CDATA[" . $row['breakFast'] . "]]></breakFastCheck>";
        $ResponseXML .= "<dinnerCheck><![CDATA[" . $row['dinner'] . "]]></dinnerCheck>";
        $ResponseXML .= "<lunchCheck><![CDATA[" . $row['lunch'] . "]]></lunchCheck>";
        $ResponseXML .= "<tPCCheck><![CDATA[" . $row['Tea_PlainTea_Coffee'] . "]]></tPCCheck>";

        $ResponseXML .= "<sandwhicsCheck><![CDATA[" . $row['Sandwiches'] . "]]></sandwhicsCheck>";
        $ResponseXML .= "<cakepcsCheck><![CDATA[" . $row['Cake_Pcs'] . "]]></cakepcsCheck>";
        $ResponseXML .= "<snackCheck><![CDATA[" . $row['Snacks'] . "]]></snackCheck>";
        $ResponseXML .= "<dessertCheck><![CDATA[" . $row['Dessert'] . "]]></dessertCheck>";

        $ResponseXML .= "<juiceCheck><![CDATA[" . $row['Juices'] . "]]></juiceCheck>";
        $ResponseXML .= "<otherCheck><![CDATA[" . $row['Other'] . "]]></otherCheck>";
        $ResponseXML .= "<sprcdisCheck><![CDATA[" . $row['Special_Menu'] . "]]></sprcdisCheck>";
        $ResponseXML .= "<vipcheck><![CDATA[" . $row['vip'] . "]]></vipcheck>";

//        $ResponseXML .= "<str_day><![CDATA[" . $row['daycombo'] . "]]></str_day>";
//        $ResponseXML .= "<str_menu><![CDATA[" . $row['menu'] . "]]></str_menu>";
//        $ResponseXML .= "<str_menutype><![CDATA[" . $row['menuitem'] . "]]></str_menutype>";
    }


    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}


if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";




    $ResponseXML .= "<table   class=\"table table-bordered\">
                <tr>
                    <th>Item Code</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>";

    if ($_GET["mstatus"] == "cusno") {
        $letters = $_GET['cusno'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,description,amount from food_menu_master where  itemCode like '%$letters%' ";
    } else if ($_GET["mstatus"] == "customername") {
        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,description,amount from food_menu_master where  description like '%$letters%' ";
    } else {

        $letters = $_GET['customername'];
        //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
        $sql = "select itemCode,description,amount from food_menu_master where  amount like '%$letters%' ";
    }
    $sql .= " ORDER BY itemCode limit 50";


    foreach ($conn->query($sql) as $row) {
        $cuscode = $row['itemCode'];
        $stname = $_GET["stname"];

        $ResponseXML .= "<tr>               
                               <td onclick=\"custno('$cuscode', '$stname');\">" . $row['itemCode'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['description'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['amount'] . "</a></td>
                             
                            </tr>";
    }


    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
