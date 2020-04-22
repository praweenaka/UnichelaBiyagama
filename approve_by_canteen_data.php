<?php

session_start();


require_once ("connection_sql.php");

header('Content-Type: text/xml');

date_default_timezone_set('Asia/Colombo');

if ($_GET["Command"] == "getdt") {

    $tb = "";
    $tb .= "<table class='table table-hover'>";


    $sql = "select * from approve_by_canteen order by name desc";




    $tb .= "<tr>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">Name</th>";
    $tb .= "<th style=\"width: 200px;\" class=\"success\">Mail</th>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">Department</th>";

    $tb .= "</tr>";

    foreach ($conn->query($sql) as $row) {
        $tb .= "<tr>";
        $tb .= "<td onclick=\"getcode('" . $row['name'] . "','" . $row['mail'] . "','" . $row['department'] . "')\">" . $row['name'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['name'] . "','" . $row['mail'] . "','" . $row['department'] . "')\">" . $row['mail'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['name'] . "','" . $row['mail'] . "','" . $row['department'] . "')\">" . $row['department'] . "</td>";
        $tb .= "</tr>";
    }
    $tb .= "</table>";

    echo $tb;
}

if ($_GET["Command"] == "update_list") {
    $ResponseXML = "";
    $ResponseXML .= "<table class=\"table\">
	            <tr>
                        <th width=\"121\">Item No</th>
                        <th width=\"424\"> Item Description </th>
                        
                        <th width=\"121\">Amount</th>  
                    </tr>";


    $sql = "SELECT * from s_mas where itcode <> ''";
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


if ($_GET["Command"] == "save_item") {


    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $sql = "delete from approve_by_canteen where name = '" . $_GET['nameTxt'] . "'";
        $result = $conn->query($sql);

        $sql = "select U_email,user_depart from user_mast where user_name = '" . $_GET['nameTxt'] . "'";
        $result1 = $conn->query($sql);
//
        $row = $result1->fetch();

//        if ($row['user_name'] == $_GET['nameTxt']) {
        $sql = "Insert into approve_by_canteen (name,mail,department)values 
    ('" . $_GET['nameTxt'] . "', '" . $row['U_email'] . "','" . $row['user_depart'] . "') ";

        $result = $conn->query($sql);
        $conn->commit();
        echo "Saved";
//        } else {
//            echo 'User Not Found';
//        }
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

//if ($_GET["Command"] == "update") {
//    $sql = "update approve_by_canteen set panalti_type = '" . $_GET['panalti_type'] . "',amount = '" . $_GET['amount'] . "'  where code = '" . $_GET['code'] . "'";
//    $result = $conn->query($sql);
//}
if ($_GET["Command"] == "delete") {

    $sql = "delete from approve_by_canteen where name = '" . $_GET['nameTxt'] . "'";
    $result = $conn->query($sql);

//    $conn->commit();
    echo "Delete";
}
?>