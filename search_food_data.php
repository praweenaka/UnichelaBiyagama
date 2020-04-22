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


        $ResponseXML .= "<id><![CDATA[" . $row['itemCode'] . "]]></id>";
        $ResponseXML .= "<str_description><![CDATA[" . $row['description'] . "]]></str_description>";
        $ResponseXML .= "<str_amount><![CDATA[" . $row['amount'] . "]]></str_amount>";
    }

    $ResponseXML .= "</salesdetails>";
    echo $ResponseXML;
}

//function cal($dateto, $datefrom, $rate) {
//
//    $diffDays = abs(strtotime($dateto) - strtotime($datefrom));
//    $days = floor($diffDays / (60 * 60 * 24));
////    echo $dateto;
//    $ans = ($rate * $days);
//
//    return $ans;
//}

if ($_GET["Command"] == "mm") {


    $ResponseXML = "";

    if ($_SESSION['menutype'] == "MENU1") {
        $sql = "select * from menu1";
    }



    echo $ResponseXML;
}

if ($_GET["Command"] == "search_custom") {


    $ResponseXML = "";

    $ResponseXML .= "<table class = \"table table-bordered\">
                <tr>
                    <th>Item Code</th>
                    <th>Description</th>
                    <th>Amount</th>
                  
                   

                </tr>";
    if ($_SESSION['mealType'] == BreakFast) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);

            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where breakFast = 'Y' and itemCode  like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where breakFast = 'Y' and description  like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where breakFast = 'Y' and amount  like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Dinner) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where dinner = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where dinner = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where dinner = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Lunch) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where lunch = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where lunch = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where lunch = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Tea / PlainTea / Coffee) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Tea_PlainTea_Coffee = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Tea_PlainTea_Coffee = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Tea_PlainTea_Coffee = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Special_Dishes) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Special_Dishes = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Special_Dishes = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Special_Dishes = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Sandwiches) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Sandwiches = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Sandwiches = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Sandwiches = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Cake_Pcs) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Cake_Pcs = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Cake_Pcs = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Cake_Pcs = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Snacks) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Snacks = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Snacks = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Snacks = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Dessert) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Dessert = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Dessert = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Dessert = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Juices) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Juices = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Juices = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Juices = 'Y' and amount like '%$letters%' ";
        }
    } elseif ($_SESSION['mealType'] == Other) {
        if ($_GET["mstatus"] == "cusno") {
            $letters = $_GET['cusno'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Other = 'Y' and itemCode like '%$letters%' ";
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Other = 'Y' and description like '%$letters%' ";
        } else {

            $letters = $_GET['customernic'];
            //$letters = preg_replace("/[^a-z0-9 ]/si","",$letters);
            $sql = "select itemCode,description,amount,breakFast,dinner,lunch,Tea_PlainTea_Coffee,Special_Dishes,Sandwiches,Cake_Pcs,Snacks,Dessert,Juices,Other from food_menu_master where Other = 'Y' and amount like '%$letters%' ";
        }
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


if ($_GET["Command"] == "search_inv") {

    $ResponseXML .= "";
    $ResponseXML .= "<table width=\"735\" border=\"0\" class=\"form-matrix-table\">
                            <tr>
                              <td width=\"121\"  background=\"images/headingbg.gif\" ><font color=\"#FFFFFF\">Order No</font></td>
                              <td width=\"424\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Customer</font></td>
                             <td width=\"176\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Order Date</font></td>
							 <td width=\"176\"  background=\"images/headingbg.gif\"><font color=\"#FFFFFF\">Grand Total</font></td>
   							</tr>";

    if ($_GET["Option1"] == "true") {
        if ($_GET["mstatus"] == "invno") {
            $letters = $_GET['invno'];

            $sql = mysql_query("SELECT * from s_admas where REF_NO like  '$letters%' and  INVNO='0'  and CANCELL='0'  order by SDATE desc limit 50") or die(mysql_error());
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];

            $sql = mysql_query("SELECT * from s_admas where CUS_NAME like  '$letters%' and  INVNO='0'  and CANCELL='0'  order by SDATE desc limit 50") or die(mysql_error()) or die(mysql_error());
        } else {
            $letters = $_GET['customername'];

            $sql = mysql_query("SELECT * from s_admas where CUS_NAME like  '$letters%' and  INVNO='0' and CANCELL='0'  order by SDATE desc limit 50") or die(mysql_error()) or die(mysql_error());
        }
    }


    if ($_GET["Option2"] == "true") {
        if ($_GET["mstatus"] == "invno") {
            $letters = $_GET['invno'];
            $sql = mysql_query("SELECT * from s_admas where REF_NO like  '$letters%' and  INVNO!='0' and CANCELL='0'  order by SDATE desc limit 50") or die(mysql_error());
        } else if ($_GET["mstatus"] == "customername") {
            $letters = $_GET['customername'];

            $sql = mysql_query("SELECT * from s_admas where CUS_NAME like  '$letters%' and  INVNO!='0' and CANCELL='0'  order by SDATE desc limit 50") or die(mysql_error()) or die(mysql_error());
        } else {
            $letters = $_GET['customername'];

            $sql = mysql_query("SELECT * from s_admas where CUS_NAME like  '$letters%' and  INVNO!='0' and CANCELL='0'  order by SDATE desc limit 50") or die(mysql_error()) or die(mysql_error());
        }
    }





    while ($row = mysql_fetch_array($sql)) {
        $REF_NO = $row['REF_NO'];
        $stname = $_SESSION["stname"];
        $ResponseXML .= "<tr>
                           	  <td onclick=\"invno('$REF_NO', '$stname');\">" . $row['REF_NO'] . "</a></td>
                              <td onclick=\"invno('$REF_NO', '$stname');\">" . $row['CUS_NAME'] . "</a></td>
                              <td onclick=\"invno('$REF_NO', '$stname');\">" . $row['SDATE'] . "</a></td>
							  <td onclick=\"invno('$REF_NO', '$stname');\">" . $row['GRAND_TOT'] . "</a></td>
                                                        	
                            </tr>";
    }

    $ResponseXML .= "   </table>";


    echo $ResponseXML;
}
?>
