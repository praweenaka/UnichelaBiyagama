<?php

session_start();
date_default_timezone_set('Asia/Colombo');
$Command = "";

if (isset($_GET['Command'])) {

    $Command = $_GET["Command"];
    include './connection_sql.php';
}


if ($Command == "CheckUsers") {

        $ResponseXML = "";
        $ResponseXML .= "<salesdetails>";
        $UserName = $_GET["UserName"];
        $Password = $_GET["Password"];
//    $ResponseXML .= "<action><![CDATA[" . $_GET['action'] . "]]></action>";
//    $ResponseXML .= "<form><![CDATA[" . $_GET['form'] . "]]></form>";
        $sql = "SELECT * FROM user_mast WHERE user_name =  '" . $UserName . "' and password =  '" . $Password . "' ";
        $result = $conn->query($sql);

        if ($row = $result->fetch()) {
//        if (true) {

            $sessionId = session_id();
            $_SESSION['sessionId'] = session_id();
            session_regenerate_id();
            $ip = $_SERVER['REMOTE_ADDR'];
            $_SESSION['UserName'] = $UserName;
            $_SESSION['department'] = $row["user_depart"];
            $_SESSION['User_Type'] = $row['user_type'];
           
            $action = "ok";
            $cookie_name = "user";
            $cookie_value = $UserName;
//setcookie($cookie_name, $cookie_value, time() + (43200)); // 86400 = 1 day

            $token = substr(hash('sha512', mt_rand() . microtime()), 0, 50);
            $extime = time() + 43200;


            $domain = $_SERVER['HTTP_HOST'];

// set cookie

            setcookie('user', $cookie_value, $extime, "/", $domain);


            $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
            echo $action;


            $time = mktime(date('h'), date('i'), date('s'));
            $time = date("g.i a");
            $today = date('Y-m-d');
            $ResponseXML .= "<x><![CDATA[" . 'sss' . "]]></x>";
        } else {
            $action = "not";
            $ResponseXML .= "<stat><![CDATA[" . $action . "]]></stat>";
            $ResponseXML .= "</salesdetails>";
            echo $ResponseXML;
        }
    
}

if ($_GET["Command"] == "save_inv") {


    $sql = "select * from user_mast where user_name='" . $_GET["user_name"] . "'";
    $result = $conn->query($sql);
    if ($row1 = $result->fetch()) {
        echo "User Found !!!";
    } else {
        $sql = "insert into user_mast(user_name,user_type,user_depart, password,U_email,R_email) values ('" . $_GET["user_name"] . "', '" . $_GET["user_type"] . "', '" . $_GET["user_depart"] . "', '" . $_GET["password"] . "', '" . $_GET["U_email"] . "', '" . $_GET["R_email"] . "')";
//        echo $sql;
        $result = $conn->query($sql);
//        echo "Saved";

        date_default_timezone_set('Asia/Colombo');

        require 'email/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->isSMTP();

        $mail->Host = 'mail.infodatasl.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "autoemail@infodatasl.com";
        $mail->Password = "autoemail@123";


        $sql = "select * from user_mast where user_name='" . $_GET["user_name"] . "'";
        $result = $conn->query($sql);
//        echo $sql;
        if ($row = $result->fetch()) {

            $uemail = $row["U_email"];
            $remail = $row["R_email"];

            $mail->setFrom('autoemail@infodatasl.com', 'Kot System');
            $mail->addAddress($uemail, 'hhh');
        }

        $table = "";
        $table .= "<table style = 'width: 660px;' class = 'table1'>
                    <tr>
                    <th class = 'bottom head' colspan = '3'><center>Unichela Biyagama</center></th>
                    </tr>

                    <tr>
                    <th class = 'bottom head' colspan = '3'><center>Kot System Login Details</center></th>
                    </tr>
                    <tr>
                    <th class = 'bottom head' colspan = '3'><center></center></th>
                    </tr>
                    <tr>
                    <th class = 'bottom head' colspan = '3'><center></center></th>
                    </tr>
                    <tr>
                    <th class = 'bottom head' colspan = '3'><center></center></th>
                    </tr>
                    </table>";

        $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 40px;' class = 'left'>User Name :</th>
                    <th style = 'width: 200px;' class = 'left'>" . $_GET['user_name'] . "</th>

                    </tr></table>";

        $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 40px;' class = 'left'>Password :</th>
                    <th style = 'width: 200px;' class = 'left'>" . $_GET['password'] . "</th>

                    </tr></table>";

        $table .= "<table style = 'width: 660px;' class = 'table1'><tr>
                    <th style = 'width: 20px;' class = 'left'></th>
                    <th style = 'width: 200px;' class = 'left'>Login Url :</th>
                    <a href = 'http://infodatasl.com/UnichelaBiyagama/index.php'>Login Here</a>

                    </tr></table>";


        $mail->Body = '"' . $table . '"';
        $mail->Subject = 'Kot Order';
        $mail->isHTML(true);

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Saved";
        }
    }
}

if ($Command == "logout") {

    $today = date('Y-m-d');
    $domain = $_SERVER['HTTP_HOST'];
    setcookie('user', "", 1, "/", $domain);



    session_unset();
    session_destroy();
}


if ($_GET["Command"] == "getdt") {

    $tb = "";
    $tb .= "<table class='table table-hover'>";


    $sql = "select * from user_mast order by user_name desc";




    $tb .= "<tr>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">Name</th>";
    $tb .= "<th style=\"width: 200px;\" class=\"success\">User Type</th>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">User Department</th>";
    $tb .= "<th style=\"width: 100px;\" class=\"success\">User Email</th>";
    $tb .= "<th style=\"width: 200px;\" class=\"success\">Department Head Mail</th>";

    $tb .= "</tr>";

    foreach ($conn->query($sql) as $row) {
        $tb .= "<tr>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['user_name'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['user_type'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['user_depart'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['U_email'] . "</td>";
        $tb .= "<td onclick=\"getcode('" . $row['user_name'] . "','" . $row['user_type'] . "','" . $row['user_depart'] . "','" . $row['U_email'] . "','" . $row['R_email'] . "')\">" . $row['R_email'] . "</td>";
        $tb .= "</tr>";
    }
    $tb .= "</table>";

    echo $tb;
}


if ($_GET["Command"] == "edit") {
    try {
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();

        $sql2 = "update user_mast set user_type = '" . $_GET['user_type'] . "',user_depart = '" . $_GET['user_depart'] . "',U_email = '" . $_GET['U_email'] . "',R_email = '" . $_GET['R_email'] . "' where user_name = '" . $_GET['user_name'] . "'";

        $result = $conn->query($sql2);

        $conn->commit();
        echo "EDIT";
    } catch (Exception $e) {
        $conn->rollBack();
        echo $e;
    }
}

if ($_GET["Command"] == "delete") {

    $sql = "delete from user_mast where user_name = '" . $_GET['user_name'] . "'";
    $result = $conn->query($sql);

//    $conn->commit();
    echo "Delete";
}
?>