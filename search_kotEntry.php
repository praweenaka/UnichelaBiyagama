<?php
session_start();
include_once './connection_sql.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="style.css" rel="stylesheet" type="text/css" media="screen" />


        <title>Search Kot Entry</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">

            <script language="JavaScript" src="js/search_kotEntry.js"></script>

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
                <td width="110" ><input type="text" size="20" name="cusno" id="cusno" value=""  class="form-control" tabindex="1" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="200" ><input type="text" size="70" name="customername" id="customername" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
                <td width="200" ><input type="text" size="70" name="customername" id="customername" value=""  class="form-control" onkeyup="<?php echo "update_cust_list('$stname')"; ?>"/></td>
        </table>    
        <div id="filt_table" class="CSSTableGenerator">  <table width="735"   class="table table-bordered">
                <tr>
                    <th width="110">Entry No</th>
                    <th width="200">Date</th>
                    <th width="200">Request By</th>

                </tr>

                <?php
//                                echo $_SESSION["User_Type"];
                if (strtoupper($_SESSION["UserName"]) == "ADMIN" or strtoupper($_SESSION["UserName"]) == "USER") {
                    $sql = "SELECT * from kot_entry where cancel ='0' and ap_lvl='lvl0' and ap_step='0' group by entryNo";
                } elseif (strtoupper($_SESSION["UserName"]) == "MANAGER") {
                    $sql = "SELECT * from kot_entry where cancel ='0' and ap_lvl='lvl1' and ap_step='0' group by entryNo";
//                    echo $sql;
                } elseif (strtoupper($_SESSION["UserName"]) == "AMANAGER") {
                    $sql = "SELECT * from kot_entry where cancel ='0' and ap_lvl='lvl2'  and ap_step='0' group by entryNo";
                }

//                elseif (strtoupper($_SESSION["UserName"]) == "DHEAD" or strtoupper($_SESSION["UserName"]) == "MANAGER" or strtoupper($_SESSION["UserName"]) == "MANAGER1") {
//                    $sql = "SELECT * from kot_entry where cancel ='0' and ap_lvl='lvl1' and ap_step='0' group by entryNo";
//                }

                $sql = $sql . " order by entryNo limit 50";

                $stname = "";
                if (isset($_GET['stname'])) {
                    $stname = $_GET["stname"];
                }

                foreach ($conn->query($sql) as $row) {
                    $cuscode = $row['entryNo'];
                    echo "<tr>               
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['entryNo'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['entryDate'] . "</a></td>
                              <td onclick=\"custno('$cuscode', '$stname');\">" . $row['requestby'] . "</a></td>
                                  
                             
                            </tr>";
                }
                ?>
            </table>
        </div>

    </body>
</html>
