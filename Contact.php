<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Contact</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cssFiles/style1.css" type="text/css"/>
        <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <style>
            #contact-bar a{
                text-decoration: underline; 
                text-decoration-color: #d2252d; 
                }
        </style>
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
        <script>
            function searchBarNav() {
                const input = document.getElementById('searchBar').value.toUpperCase();
                const cardContainer = document.getElementById('cardLists');
                const cards = cardContainer.getElementsByClassName('contact-card');
                const redBorder = document.getElementById("searchBar");
                let content =  ['phone call','what\s app','email']
                let message = document.getElementsByClassName('message');
                let messageC = document.getElementsByClassName('message-c');
                let result = []; //empty array
                for(let i = 0; i<cards.length; i++) {
            if(content[i].toUpperCase().indexOf(input) > -1)  {
                result.push(1);//if there is a result, add 1 to the array
                cards[i].style.display='';
                message[0].innerHTML = "";
                messageC[0].innerHTML = "";
                redBorder.style.borderColor = "";
            } else{
                if(result.length > 0){//if the array has any ? don't display the message
                    cards[i].style.display='none';
                    message[0].innerHTML = "";
                    messageC[0].innerHTML = "";
                    redBorder.style.borderColor = "";
                }else{//otherwise there no result, just show there is no result 
                    cards[i].style.display='none';
                    message[0].innerHTML = "No result found";
                    messageC[0].innerHTML = "We couldn't find what you're looking for";
                    redBorder.style.borderColor = "red";
                }
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
                <input tabindex="0" aria-label="Search" type="search" id="searchBar"  placeholder="Contact via">
                <button aria-label="Search" tabindex="0" onclick="searchBarNav()"> <span  class="fa fa-search"></span></button>
            </div>     
        </nav>
        <header>
            <div class="heading-title">
                <span>get in touch</span>
                <h1>We'd Love to Help</h1>
            </div> 
        </header> 

        <!--contact page-->
        <div class="contact-info" id="cardLists">
            <div class="contact-card">
                <a tabindex="0" class="card-icon" href="tel:0596267023"><img  alt="Call" src="images/phone.png"/></a>
                <p>0596267023</p>
            </div>
            <div class="contact-card" >
                <a tabindex="0" class="card-icon" href="http://wa.me/966596267023"><img  alt="Open What's app" src="images/whatsapp.png"/></a>
                <p>0596267023</p>
            </div>
            <div class="contact-card">
                <a tabindex="0" class="card-icon" href="mailto:5.privatestaff@gmail.com"><img  alt="Send Email" src="images/email.png"/></a>
                <p>5.privatestaff@gmail.com</p>
            </div> 
        </div>  
        <div class="messageA">
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
    </body>
</html>