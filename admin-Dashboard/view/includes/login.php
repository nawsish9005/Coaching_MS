<!DOCTYPE html>
<html>

<?php
require_once('../includes/header.php');
?>

    <!-- Animate CSS only for Login form -->
    <link href="../../build/css/animate.css" rel="stylesheet">
    <!-- Custom CSS for login form -->
    <link href="../../build/css/login.css" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            	<img style="margin-left:-50px; height:400px; width:400px;" src="mowgli.png"/>
            	<h1 class="logo-name-1">MOWGLI-IT</h1>
                <h1 class="logo-name-2">SCHOOL</h1>
            </div>

            <h3>Welcome </h3>
            <p>
            	Mowgli IT School <br/>
                An Advanced IT Firm
            </p>

            <!-- Login From starts -->
            <form class="m-t" role="form" method="POST" action="login_check.php" onSubmit="return Form_Validation(this)">
                <div class="form-group">
                    <input type="text" class="form-control" id="user_id" name="user_id" placeholder="User ID">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b" name="Login">Login</button>
                <br>
                <br>
                <p><b>Help Line:</b></p>
                <p>Please Contact Mowgli Admin Department</p>
                <p>Mobile: 01729754786</p>
            </form>
            <!-- /Login From ends -->
        </div>
    </div>

    <?php
    require_once('../includes/footer.php');
    ?>

    <!-- Login from validation script -->
    <script language="javascript">
    
        function Form_Validation(whole_form)
        {
            if (whole_form.user_id.value == "")
            {
                missing_alert("user_id");
                return false;
            }
            else if (whole_form.password.value == "")
            {
                missing_alert("password");
                return false;
            }
        }

    </script>

</body>
</html>
