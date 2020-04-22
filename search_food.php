<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Customer</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">


            <script language="JavaScript" src="js/search_food.js"></script>



    </head>

    <body>

        <?php if (isset($_GET['cur'])) { ?>
            <input type="hidden" value="<?php echo $_GET['cur']; ?>" id="cur" />
            <?php
        } else {
            ?>
            <input type="hidden" value="" id="cur" />
            <?php
        }
        ?>
        <table width="735"   class="table table-bordered">

            <tr>
                <?php
                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }
                ?>
                <td width="122" ><input  type="text" size="20" name="cusno" id="cusno" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="300" ><input type="text" size="70" name="customername" id="customername" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="124" ><input type="text" size="70" name="customernic" id="customernic" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
            </tr>
            <tr>
                <?php
                if ($_SESSION['mealType'] == "VIP") {
                    echo"<td width = \"124\"><select id = \"menuCombo\" class = \"input-sm\">";
                    echo"<option value = \"MENU1\" onload=\"<?php echo \"mm()\";?\">MENU1</option>";
                    echo"<option value = \"MENU2\" onload=\"<?php echo \"mm()\";?\">MENU2</option>";
                    echo"<option value = \"MENU3\" onload=\"<?php echo \"mm()\";?\">MENU3</option>";
                    echo"<option value = \"MENU4\" onload=\"<?php echo \"mm()\";?\">MENU4</option>";
                    echo"</select></td>";
                }
                ?>

            </tr>
<!--            <tr>
                <td  background="" ><input type="radio" name="radio" id="Option1" value="Option1" checked="checked" onclick="update_list('$stname');" />
                    Pending Order</td>
                <td width="179"  background="" >&nbsp;</td>
                <td width="258"  background="" ><input type="radio" name="radio" id="Option2" value="Option2" onclick="update_list('$stname');"/>
                    Invoiced</td>
                <td  background="" >&nbsp;</td>
            </tr>-->
        </table>    
        <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                <tr>
                    <th>Item Code</th>
                    <th>Description</th>
                    <th>Amount</th>

                </tr>
                <?php
                if ($_SESSION['mealType'] == "BreakFast") {
                    $sql = "SELECT * from food_menu_master where breakFast = 'Y' ";
                } else if ($_SESSION['mealType'] == "Dinner") {
                    $sql = "SELECT * from food_menu_master where dinner = 'Y' ";
                } else if ($_SESSION['mealType'] == "Lunch") {
                    $sql = "SELECT * from food_menu_master where lunch = 'Y' ";
                } else if ($_SESSION['mealType'] == "Tea/PlainTea/Coffee") {
                    $sql = "SELECT * from food_menu_master where Tea_PlainTea_Coffee = 'Y' ";
                } else if ($_SESSION['mealType'] == "Special_Dishes") {
                    $sql = "SELECT * from food_menu_master where Special_Dishes = 'Y' ";
                } else if ($_SESSION['mealType'] == "Sandwiches") {
                    $sql = "SELECT * from food_menu_master where Sandwiches = 'Y' ";
                } else if ($_SESSION['mealType'] == "Cake_Pcs") {
                    $sql = "SELECT * from food_menu_master where Cake_Pcs = 'Y' ";
                } else if ($_SESSION['mealType'] == "Snacks") {
                    $sql = "SELECT * from food_menu_master where Snacks = 'Y' ";
                } else if ($_SESSION['mealType'] == "Dessert") {
                    $sql = "SELECT * from food_menu_master where Dessert = 'Y' ";
                } else if ($_SESSION['mealType'] == "Juices") {
                    $sql = "SELECT * from food_menu_master where Juices = 'Y' ";
                } else if ($_SESSION['mealType'] == "Other") {
                    $sql = "SELECT * from food_menu_master where Other = 'Y' ";
                } else {
                    $sql = "SELECT * from food_menu_master where breakFast = 'Y' ";
                }

                $sql = $sql . " order by itemCode limit 50";


                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }

                foreach ($conn->query($sql) as $row) {
                    $cuscode = $row['itemCode'];
                    echo "<tr>               
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['itemCode'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['description'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['amount'] . "</a></td>
                             
                                                                                  
                            </tr>";
                }
                ?>
            </table>
        </div>

    </body>
</html>
