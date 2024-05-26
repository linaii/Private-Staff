<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8"> 
    <title> Admin Login</title> 
    <link rel="stylesheet" href="cssFiles\style1.css" type="text/css"/>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <style> 
        </style>
</head>
<body id="page_admin">
    <div class="container-admin">
    <img src="images/logo-with-border.png" id="logo-admin" alt="" >
            <form id="login-admin" name="login" class="input-groupAdmin" action="login.php" method="POST">
                <h2 class="tit">ADMIN LOGIN</h2>
                <?php if (isset($_GET['error'])) { ?>
        		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
                <input tabindex="0" type="text" class="admin-field" placeholder="User Name"  name="uname">

                <span class="eye-admin"  onclick= "myFunction5()" >
                    <i tabindex="0" id="hide5"  class="fa fa-eye" \ aria-hidden="true"></i>
                   <i tabindex="0" id="hide6" class="fa fa-eye-slash" aria-hidden="true"></i>
                </span>

                <input type="password" name="password" class="admin-field" placeholder="Password" id="pas-log" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
                tabindex="0">
                    <button type="submit" class="submit-admin" tabindex="0" name="login" >Log In</button>
            </form>
          
            <script>
        function myFunction5(){
            var x = document.getElementById("pas-log");
            var y = document.getElementById("hide5");
            var z = document.getElementById("hide6");

            if(x.type === 'password'){
                x.type = "text";
                y.style.display = "block";
                z.style.display = "none";
            }
            else{
                x.type = "password";
                y.style.display = "none";
                z.style.display = "block";
            }
        }
    </script>
   

        </div>

    </div> 
 

</body>
</html>