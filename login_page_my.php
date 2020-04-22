
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login Page</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="css/ionicons/css/ionicons.min.css">
        <script src="js/user.js"></script>
        <style>
            body, html{height:100%;margin:0;}
            .bg{background-image:url("dist/login.jpg");height:100%;background-position:center;background-repeat: no-repeat;background-size: cover;}
        </style>
    </head>
    <body>
        <div class="bg">
            <form id="loginform" class="form-horizontal" role="form">
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <label class="col-sm-4"></label>
                <div style="margin-bottom: 25px" class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="txtUserName" type="text" class="form-control" name="txtUserName" value="" placeholder="username or email">                                        
                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <label class="col-sm-4"></label>
                <div style="margin-bottom: 25px" class="input-group col-sm-4">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="txtPassword" type="password" class="form-control" name="txtPassword" placeholder="password">
                </div>
                <div class="form-group"></div>
                <div class="form-group"></div>
                <label class="col-sm-5"></label>
                <div class="form-group">
                    <!-- Button -->

                    <div class="col-sm-2">
                        <button class="btn btn-lg btn-block">LOGIN</button>
                    </div>
                </div>
            </form> 
        </div>
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