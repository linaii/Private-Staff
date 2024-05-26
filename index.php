
<!DOCTYPE html>
<html lang="en"> 
<head> 
<link rel="stylesheet" href="cssFiles/style1.css" type="text/css"/>
<link rel="shortcut icon" href="images/logo-without-text.png"/>
<meta charset="UTF-8"/>
<script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
<title>Home</title>
<style> 
    #home-bar a{
    text-decoration: underline; 
    text-decoration-color: #d2252d; 
    } 
</style>
<script>
    function searchBarNav() {
    const input = document.getElementById('searchBar').value.toUpperCase();
    const cardContainer = document.getElementById('cards-list');
    const cards = cardContainer.getElementsByClassName('cardh');
    const redBorder = document.getElementById("searchBar");
    let message = document.getElementsByClassName('message');
    let messageC = document.getElementsByClassName('message-c');
	    let result = []; //empty array
    for(let i = 0; i<cards.length; i++) {
        let content = cards[i].querySelector('.buttonsh');
		if(content.innerText.toUpperCase().indexOf(input) > -1)  {
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
<div id="slider" >
<figure>
    <img src="images/cooking-yocuta-banner.jpg" alt="" class="mySlides fade">
    <img src="images/nanyhead.png" alt="" class="mySlides fade">
    <img src="images/housekeeperhead.png" alt="" class="mySlides fade">
    <img src="images/image-3or.png" alt="" class="mySlides fade">
</figure>
</div> 
<br>
<div style="text-align:center">
    <span class="dot"></span> 
    <span class="dot"></span> 
    <span class="dot"></span>
    <span class="dot"></span> 
</div>
<script>
    let slideIndex = 0;
    showSlides();
    
    function showSlides() {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script> 

<!--nav bar-->
<input type="checkbox" id="check">
<nav id="home">
    <img src="images/logo.png"  alt="" class="icon">
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
        <li id='logoutl' tabindex="0"><a id='logout' href="logout_user.php">Log out</a></li>
    </ul> 
<!-- Search bar -->
    <div class="search_box">
        <input aria-label="Search" tabindex="0" type="search" id="searchBar"  placeholder="Section">
        <button aria-label="Search" tabindex="0"><span class="fa fa-search"  onclick="searchBarNav()" ></span></button>
    </div>      
</nav> 

<div  class="card_holderh" id="cards-list" >
<div class="cardh">
    <div class="card-imgh">
    <img src="images/housekeeper3.jpg" alt="Housekeeper" style="width: 100%; height: 70%;"   >
    <div class="container-Home">
    <a  tabindex ="0" class="buttonsh" href="Services.php#Housekeepers" target="_blank">Housekeepers section</a>
    </div>
</div>
</div> 

<div class="cardh" >
    <div class="card-imgh">
        <img src="images/nanny4.jpg" alt="Nanny"  style="width: 100%; height: 70%;"  >
    <div class="container-Home">
    <a tabindex ="0" class="buttonsh" href="Services.php#Nannies" target="_blank">Nannies section</a>
    </div>
    </div>
</div> 

<div class="cardh" >
    <div class="card-imgh">
    <img src="images/deriver2.jpg" alt="Driver"  style="width: 100%; height: 70%;"  >
    <div class="container-Home">
    <a tabindex ="0" class="buttonsh" href="Services.php#Drivers" target="_blank">Drivers section</a>
    </div>
    </div>
</div> 

<div class="cardh">
<div class="card-imgh">
    <img src="images/Chef-g.jpg" alt="chef" style="width: 100%; height: 70%;" >
    <div class="container-Home">
    <a  tabindex ="0" class="buttonsh" href="Services.php#Chefs" target="_blank">Chefs section </a>    
</div>
</div> 
</div>
</div>
<!-- no result message -->
<div class="messageA" >
<p class="message"></p>
<p class="message-c"></p>
</div>
<div class="centre">
<iframe title="Video" width="420" height="345" src="https://www.youtube.com/embed/Q4gJZwj7Z1U?feature=share">
</iframe>
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
