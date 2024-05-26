<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Sitemap</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cssFiles/style1.css" type="text/css">
        <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
        <style>
            #sitemap-bar a{
                text-decoration: underline; 
                text-decoration-color: #d2252d; 
                }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            function searchBarNav() {
                const input = document.getElementById('searchBar').value.toUpperCase();
                let content =  ['home','services','reviews','about us','contact','register','sitemap']
                const allContent = document.getElementById('sitemap');
                const redBorder = document.getElementById("searchBar");
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
                        message[0].innerHTML = "No result found";
                        messageC[0].innerHTML = "We couldn't find what you're looking for";
                        redBorder.style.borderColor = "red";
                        allContent.style.display='none'
                    }
                }
            } 
        </script>
    </head>
    <body>
        <!--nav bar-->
        <input type="checkbox" id="check">
        <nav>
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
                <input tabindex="0" aria-label="Search" type="search" id="searchBar"  placeholder="Page name">
                <button aria-label="Search" tabindex="0"><span class="fa fa-search"  onclick="searchBarNav()" ></span></button>
            </div>          
        </nav>
        <header>
            <div class="heading-title">
                <h1>Map</h1>
                <span>Site Overview</span>
            </div> 
        </header> 

        <div class="sitemap" id="sitemap">
            <img class='img1' src="images/sitemap.png" usemap="#image-map" alt="Sitmap">
            <map name="image-map">
                <area tabindex="0" target="_blank" alt="Home page" title="Home page" href="index.php" coords="216,6,269,74" shape="rect">
                <area tabindex="0" target="_blank" alt="Register page" title="Register page" href="Register.php" coords="8,122,51,177" shape="rect">
                <area tabindex="0" target="_blank" alt="Services page" title="Services page" href="Services.php" coords="91,122,136,178" shape="rect">
                <area tabindex="0" target="_blank" alt="Contact page" title="Contact page" href="Contact.php" coords="170,122,215,177" shape="rect">
                <area tabindex="0" target="_blank" alt="About us page" title="About us page" href="Aboutus.php" coords="268,122,312,177" shape="rect">
                <area tabindex="0" target="_blank" alt="Reviews page" title="Reviews page" href="Reviews.php" coords="344,122,388,176" shape="rect">
                <area tabindex="0" target="_blank" alt="All services " title="All services " href="Services.php" coords="90,215,136,270" shape="rect">
                <area tabindex="0" target="_blank" alt="Nannies section" title="Nannies section" href="Services.php#Nannies" coords="92,292,136,346" shape="rect">
                <area tabindex="0" target="_blank" alt="Drivers section" title="Drivers section" href="Services.php#Drivers" coords="91,372,137,428" shape="rect">
                <area tabindex="0" target="_blank" alt="Housekeepers section" title="Housekeepers section" href="Services.php#Housekeepers" coords="90,450,136,507" shape="rect">
                <area tabindex="0" target="_blank" alt="Chefs section" title="Chefs section" href="Services.php#Chefs" coords="90,534,134,591" shape="rect">
            </map>
        </div>
    <div class="messageA" id="messageAS"> 
        <p class="message"></p>
        <p class="message-c"></p>
    </div> 
    
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>
    $(document).ready(function(e) {
	$('img[usemap]').rwdImageMaps();
	
    });
    </script>
    <script src="JS/sitemap.js"></script>
    </body>
</html>