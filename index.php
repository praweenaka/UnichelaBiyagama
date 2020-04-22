<?php
include './CheckCookie.php';
$cookie_name = "user";
if (isset($_COOKIE[$cookie_name])) {

    $mo = chk_cookie($_COOKIE[$cookie_name]);

    if ($mo == "ok") {
        header('Location: ' . "home.php");
        exit();
    }
}
?> 
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Page</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link  href="css/login.css" rel="stylesheet">    

        <link rel="stylesheet" href="css/ionicons/css/ionicons.min.css">
        <link rel="icon" type="image/png" sizes="16x16" href="andpic.png">
        <script src="js/user.js"></script>
    </head>
    <body>


        <div class="container">
            <div  class="form-signin form-group mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div>
                    <!--<img style="align-content: center" class="img-responsive" src="img/Mas_Holdings_Logo.png">-->
                    <div class="form-group">
                        <h1 style="color: red"><center>KOT SYSTEM</center></h1>
                    </div>
                </div>
                <!--<h3><center>MAS HOLDINGS</center></h3>-->
                <div class="form-group"></div>
                
                <strong>Username:</strong>

                <input class="form-control"  name="UserName" type="text" id="txtUserName" onkeypress="keyset('txtPassword', event)"  />



                <strong>Password:</strong>

                <input class="form-control" name="Password" type="password" id="txtPassword" onkeypress="keyset('lbtn', event)"/>
                <div id="txterror" class="login_error">

                </div>


                <button class="btn btn-primary" id="lbtn"  name="lbtn" onclick="IsValiedData();">Sign in</button>

            </div>
        </div>

        <!--        <div class="container">  
                    <div class="overlay">
                        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
                            <div class="panel panel-info" >
                                <div class="panel-heading">
                                    <div class="panel-title">Log In</div>
                                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                                </div>     
        
                                <div style="padding-top:30px" class="panel-body" >
        
                                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
        
                                    <form id="loginform" class="form-horizontal" role="form">
        
                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="txtUserName" type="text" class="form-control" name="txtUserName" value="" placeholder="username or email">                                        
                                        </div>
        
                                        <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="txtPassword" type="password" class="form-control" name="txtPassword" placeholder="password">
                                        </div>
                                        <div style="margin-top:10px" class="form-group">
                                             Button 
        
                                            <div class="col-sm-12 controls">
                                                <a id="btn-login" href="#" onclick="IsValiedData();" class="btn btn-success">Login  </a>
        
                                            </div>
                                        </div>
                                    </form>     
                                </div>                     
                            </div>  
                        </div>
                    </div>
                </div>-->
    </body>    
</html>     


<script>
    var elem = document.getElementById("txtPassword");
    elem.onkeyup = function (e) {
        if (e.keyCode == 13) {
            IsValiedData();
        }
    }


</script>


<script src="js/jquery-2.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>