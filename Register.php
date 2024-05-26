<?php 
include("errors.php"); 

if(isset($_POST['register'])){
	$fname   = $_POST['fname'];
	$lname   = $_POST['lname'];
	$email   = $_POST['email'];
	$pass    = $_POST['password'];
	$message = false;
	
	if($fname == '' || $lname == '' || $email == '' || $pass == ''){
		$message = "You really need to enter your information before make a registration";
	}else {
		$check_email = $conn->prepare("SELECT * FROM users WHERE email = ?");
		$reg_email = [$email];
		$check_email->execute($reg_email);
		if ($check_email->rowCount() > 0) {
			$message = "This email already exists!";
		}else {
			$SQL = $conn->prepare("INSERT INTO users (fname, lname, email, password) VALUES (?,?,?,?)");
			$insert = [$fname, $lname, $email, $pass];
			if($SQL->execute($insert)){
				$message = "User successfully registered.";
			}else {
				$message = "Something went wrong!";
			}
		}
	}

	
}
if(isset($_POST['login'])){
	$email   = $_POST['email'];
	$pass    = $_POST['password'];
	$message = false;
	
	if($email == '' || $pass == ''){
		$message = "You really need to enter your information before make a login";
	}else {
		try {
			$SQL = $conn->prepare("SELECT * FROM users where email = ?");
			if ($SQL->execute([$email])) {
				if ($SQL->rowCount() > 0) {
					$row = $SQL->fetch();
					if($pass == $row['password']){
						if(!empty($_POST['Remember_me'])){
							
							$remember = $_POST['Remember_me'];
							setcookie('email', $email, time()+3600*24*7);
							setcookie('password', $pass, time()+3600*24*7);
							setcookie('Remember_me', $remember, time()+3600*24*7);
					
							header( "refresh:2;url=index.php" );
						}else {
							setcookie('email', $email, 30);
							setcookie('password', $pass, 30);
						}
						
					}else {
						$message = "Password is not correct";
					}
				}else{
					$message = "There is no email with " . $email;
				}
			}
			// $result $SQL->fetch();
		}
		catch (PDOException $e){
			echo "Select failed: " . $e->getMessage();
			exit();
		}
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8"> 
    <title>Register</title> 
    <link rel="stylesheet" href="cssFiles/style1.css" type="text/css">
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <style> 
            /* #register-bar{border-bottom: 1px solid orange;} */
            #register-bar a{
            text-decoration: underline; 
            text-decoration-color: #d2252d; 
            }
            .registerSe::-webkit-input-placeholder::-webkit-input-placeholder{
                color: black
            }
            .registerSearch::placeholder{ 
                color: black
            }
            .registerSearch:-ms-input-placeholder{
                color: black
            }
        </style>
        <script>
            function searchBarNav() {
                const input = document.getElementById('searchBar').value.toUpperCase();
                let content =  ['home','services','reviews','about us','contact','register','sitemap']
                const redBorder = document.getElementById("searchBar");
                const messageA = document.getElementById('messageA');
                let message = document.getElementsByClassName('message');
                let messageC = document.getElementsByClassName('message-c');
                for(let i = 0; i<content.length; i++) {
                    if(content[0].toUpperCase().indexOf(input) > -1)  {
                        window.location='index.php';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                    } else if(content[1].toUpperCase().indexOf(input) > -1){
                        window.location='Services.php';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                    } else if(content[2].toUpperCase().indexOf(input) > -1){
                        window.location='Reviews.php';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                    } else if(content[3].toUpperCase().indexOf(input) > -1){
                        window.location='Aboutus.php';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                    } else if(content[4].toUpperCase().indexOf(input) > -1){
                        window.location='Contact.php';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                    } else if(content[5].toUpperCase().indexOf(input) > -1){
                        window.location='Register.php';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                    } else if(content[6].toUpperCase().indexOf(input) > -1){
                        window.location='Sitemap.php';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                    } 
                    else{
                        messageA.style.display='flex';
                        message[0].innerHTML = "No result found";
                        messageC[0].innerHTML = "We couldn't find what you're looking for";
                        redBorder.style.borderColor = "red";
                    }
                }
            } 
        </script>
</head> 
<body id="page_register">
    <!--nav bar-->
    <input type="checkbox" id="check">
    <nav id="register_nav">
        <img src="images/logo.png" class="icon">
        <label for="check" class="bar" >
            <span tabindex="0" class="fa fa-bars" id="bars"></span>
            <span tabindex="0" class="fa fa-times" id="times"></span>
        </label>  
        <ul>
            <li id="home-bar" tabindex="0"><a href="index.php">Home</a></li>
            <li id="services-bar" tabindex="0"><a href="Services.php">Services</a></li>
            <li id="reviews-bar" tabindex="0"><a href="Reviews.php">Reviews</a></li>
            <li id="aboutUs-bar" tabindex="0"><a href="Aboutus.php">About Us</a></li>
            <li id="contact-bar" tabindex="0"><a href="Contact.php">Contact</a></li>
            <li id="register-bar" tabindex="0"><a href="Register.php">Register</a></li>
            <li id="sitemap-bar" tabindex="0"><a href="Sitemap.php">Sitemap</a></li> 
        </ul>   
        <!-- Search bar -->
        <div class="search_box">
            <input aria-label="Search" tabindex="0" type="search" id="searchBar"  placeholder="Page name" class="registerSearch">
            <button aria-label="Search" tabindex="0" onclick="searchBarNav()"><span class="fa fa-search"   ></span></button>
        </div>          
    </nav> 
    <!-- Navigation is finshed -->
    
    <div class="hero">
        <!-- No result message -->
        <div class="messageA" id="messageA">
            <p class="message" id="message"></p>
            <p class="message-c" id="message-c"></p>
        </div>
        <div class="form-box"> 
		<?php if(!empty($message)){
			echo '<div class="message_error">' . $message . '</div>';
		}
		?>
		
            <div class="button-box">
                <div id="btn"></div>
                <button tabindex="0" type="button" class="toggle-btn" onclick="login()"> Log In </button>
                <button tabindex="0" type="button" class="toggle-btn" onclick="register()"> Register </button>
            </div>
			
        <form id="login" class="input-group" method="post" action="Register.php">
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" title="Email field that that must be in the following order: characters@characters.domain" 
            class="input-field" placeholder="Email" tabindex="1" value="<?php if(isset($_COOKIE['email'])){ echo $_COOKIE['email'];} ?>">
            <span class="eyel"  onclick= "myFunction()" >
                <i tabindex="0" id="hide1" class="fa fa-eye" aria-hidden="true"></i>
                <i tabindex="0" id="hide2" class="fa fa-eye-slash" aria-hidden="true"></i>
            </span>
            <input type="password" name="password" class="input-field" placeholder="Password" id="pas-log" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            tabindex="0" value="<?php if(isset($_COOKIE['password'])){ echo $_COOKIE['password'];} ?>">
            <label class="checkbox" for="mycheckboxid">
                <input class="checkbox__input" <?php if(isset($_COOKIE['Remember_me'])){ echo 'checked';} ?> type="checkbox" name="Remember_me" id="mycheckboxid" tabindex="0">
                <span class="checkbox__box"></span>
                <span class="remember">Remember password</span>
            </label>
                <button type="submit" class="submit-btn" name="login" tabindex="0">Log In</button>
            

        </form>
        <form id="register" class="input-group" action="Register.php" method="POST">
            <input type="text" name="fname" class="input-field" placeholder="First Name" pattern="[A-Za-z]{2,}" title="First name must contain at least two letters" tabindex="-1">
            <input type="text" name="lname" class="input-field" placeholder="Last Name" pattern="[A-Za-z]{2,}" title="Last name must contain at least two letters" tabindex="-1">
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{3,}$" class="input-field" placeholder="Email" 
            title="Email field that that must be in the following order: characters@characters.domain" tabindex="-1">
            <span class="eyer" onclick= "myFunction2()">
                <i tabindex="-1" id="hide3" class="fa fa-eye" aria-hidden="true"></i>
                <i tabindex="-1" id="hide4" class="fa fa-eye-slash" aria-hidden="true"></i>
            </span>
            
            <input type="password" name="password" class="input-field" placeholder="Password" id="pas-reg" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            tabindex="-1">

            <button type="submit" class="submit-btn" name="register" tabindex="-2">Register</button>
        </form>
    </div>
    <!-- JS for the page -->
    <script>
        function myFunction2(){
            var x = document.getElementById("pas-reg");
            var y = document.getElementById("hide3");
            var z = document.getElementById("hide4");

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
    <script>
        function myFunction(){
            var x = document.getElementById("pas-log");
            var y = document.getElementById("hide1");
            var z = document.getElementById("hide2");

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

        <script> 
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register(){
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
        function login(){
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0px";
        }
        
        
        </script>
    <!--footer-->
    <div class="footer-basic">
        <footer>
            <div class="social">
                <img id="footer-logo" src="images/logo-with-border.png" alt="logo"><br/><a tabindex="0" href="tel:0596267023"><img src="images/phone.png" alt="Call"/></a>
                <a tabindex="0" href="http://wa.me/966596267023"><img   src="images/whatsapp.png" alt="Open What's app"/></a>
                <a tabindex="0" href="mailto:5.privatestaff@gmail.com"><img  src="images/email.png" alt="Send Email"/></a>
            </div>
            <p class="copyright">Copyright &copy; 2022 Private Staff</p>  
        </footer>
    </div>
</body>
</html>