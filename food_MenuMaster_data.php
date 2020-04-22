<?php

session_start();


require_once ("connection_sql.php");


date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "getdt") {
    header('Content-Type: text/xml');
    echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";

    $ResponseXML = "";
    $ResponseXML .= "<new>";

    $sql = "SELECT itemcode FROM food_menu_master_gen";
    $result = $conn->query($sql);
    $row = $result->fetch();
    $no = $row['itemcode'];
    $ResponseXML .= "<id><![CDATA[$no]]></id>";
    $ResponseXML .= "</new>";

    echo $ResponseXML;
}


if ($_GET["Command"] == "update_list") {
    $ResponseXML = "";
    $ResponseXML .= "<table class=\"table\">
	            <tr>
                        <th width=\"121\">Item No</th>
                        <th width=\"424\"> Item Description </th>
                        
                        <th width=\"121\">Amount</th>  
                    </tr>";


    $sql = "SELECT * from ass_vender where itcode <> ''";
    if ($_GET['refno'] != "") {
        $sql .= " and itcode like '%" . $_GET['refno'] . "%'";
    }
    if ($_GET['cusname'] != "") {
        $sql .= " and itname like '%" . $_GET['cusname'] . "%'";
    }
    $stname = $_GET['stname'];

    $sql .= " ORDER BY itcode limit 50";

    foreach ($conn->query($sql) as $row) {
        $cuscode = $row["itcode"];


        $ResponseXML .= "<tr>               
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['itcode'] . "</a></td>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['itname'] . "</a></td>
                              <td onclick=\"itno_undeliver('$cuscode', '$stname');\">" . $row['price'] . "</a></td>
                            </tr>";
    }
    $ResponseXML .= "</table>";
    echo $ResponseXML;
}




if ($_POST["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "delete from food_menu_master where itemCode = '" . $_POST['itemCode'] . "'";
        $result = $conn->query($sql);


        $sql = "Insert into food_menu_master(itemCode,description,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Sandwiches,Special_Dishes,Cake_Pcs,Snacks,Dessert,Juices,Other,Standard_BreakFast,Standard_Dinner,Standard_Lunch,amount)values 
        ('" . $_POST['itemCode'] . "','" . $_POST['description'] . "', '" . $_POST['lockitemBreak'] . "','" . $_POST['lockitemDinner'] . "','" . $_POST['lockitemLunch'] . "','" . $_POST['lockitemtPCCheck'] . "'" . ",'" . $_POST['lockitemsandwhicsCheck'] . "','" . $_POST['lockitemSpecial_Dishes'] . "','" . $_POST['lockitemcakepcsCheck'] . "','" . $_POST['lockitemsnackCheck'] . "','" . $_POST['lockitemdessertCheck'] . "','" . $_POST['lockitemjuiceCheck'] . "','" . $_POST['lockitemotherCheck'] . "','" . $_POST['lockitemStandard_BreakFast'] . "','" . $_POST['lockitemStandard_Dinner'] . "','" . $_POST['lockitemStandard_Lunch'] . "','" . $_POST['amount'] . "') ";

        $result = $conn->query($sql);
        $sql = "SELECT itemcode FROM food_menu_master_gen";
        $resul = $conn->query($sql);
        $row = $resul->fetch();
        $no = $row['itemcode'];
        $no2 = $no + 1;
        $sql = "update food_menu_master_gen set itemcode = $no2 where itemcode = $no";
        $result = $conn->query($sql);

        $conn->commit();
        echo "Saved";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}


if ($_GET["Command"] == "edit") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql2 = "update food_menu_master set description = '" . $_GET['itemdesc'] . "',amount = '" . $_GET['amount'] . "' where itemCode = '" . $_GET['itemcode'] . "'";

        $result = $conn->query($sql2);

        $conn->commit();
        echo "EDIT";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delete") {

    $sql = "delete from food_menu_master where itemCode = '" . $_GET['itemcode'] . "'";
    $result = $conn->query($sql);

//    $conn->commit();
    echo "Delete";
}
?>