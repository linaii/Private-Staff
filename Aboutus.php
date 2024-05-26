<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title> 
    <link rel="shortcut icon" href="images/logo-without-text.png"/>
    <link rel="stylesheet" href="cssFiles/style1.css" type="text/css">
    <style>#m_aboutUs-bar{border-bottom:1px solid orange}</style>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
    <style>
        #aboutUs-bar a{
            text-decoration: underline; 
            text-decoration-color: #d2252d; 
            } 
    </style>
    <script>
        function searchBarNav() {
            const input = document.getElementById('searchBar').value.toUpperCase();
            const cardContainer = document.getElementById('cardLists');
            const cards = cardContainer.getElementsByClassName('col-md-3');
            const ourServices = document.getElementById('serviceSection');
            const redBorder = document.getElementById("searchBar");
            let message = document.getElementsByClassName('message');
            let messageC = document.getElementsByClassName('message-c');
            let result = []; //empty array
            for(let i = 0; i<cards.length; i++) {
                let content = cards[i].querySelector('.team-content');
                let content2 = 'our services';
                if(content2.toUpperCase().indexOf(input) > -1)  {
                    result.push(1);//if there is a result, add 1 to the array
                    cards[i].style.display='none';
                    message[0].innerHTML = "";
                    messageC[0].innerHTML = "";
                    redBorder.style.borderColor = "";
                    ourServices.style.display=''
                }else if(content.innerText.toUpperCase().indexOf(input) > -1){
                    result.push(1);//if there is a result, add 1 to the array
                    cards[i].style.display='';
                    message[0].innerHTML = "";
                    messageC[0].innerHTML = "";
                    redBorder.style.borderColor = "";
                    ourServices.style.display='none';
                } else{
                    if(result.length > 0){//if the array has any ? don't display the message
                        cards[i].style.display='none';
                        message[0].innerHTML = "";
                        messageC[0].innerHTML = "";
                        redBorder.style.borderColor = "";
                        ourServices.style.display='none';
                    }else if(content.innerText.toUpperCase().indexOf(input) == -1){//otherwise there no result, just show there is no result 
                        cards[i].style.display='none';
                        message[0].innerHTML = "No result found";
                        messageC[0].innerHTML = "We couldn't find what you're looking for";
                        redBorder.style.borderColor = "red";
                        ourServices.style.display='none';
                    }
                }
                    }
                } 
    </script>
</head> 

<body id="page_aboutus">
    <!-- <div id="header"></div> -->
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
            <input tabindex="0" aria-label="Search" type="search" id="searchBar"  placeholder="Who are we/ Services provided">
            <button aria-label="Search" tabindex="0"><span class="fa fa-search"  onclick="searchBarNav()" ></span></button>
        </div>       
    </nav>
    <header>
    <div class="heading-title">
        <h1>Meet</h1>
        <span>our telented Team Member!</span>
    </div> 
    </header>
    <div class="team-area">
        <div class="cotantainer">
            <div class="row" id="cardLists">
                <div class="col-md-3">
                    <div class="single-team">
                        <div class="team-img">
                            <img src="images/rawaby.png" alt="Rawabi" class="img-responsive" style="width: 100%;">
                        </div>
                        <div class="team-content">
                            <div class="team-info">
                                <h3>Rawabi Al-baqami.</h3>
                                <p>Project Manager & Web Developer.</p>
                                
                            </div>
                            <p class="team-text">Oversee the development of web projects from the inception stage to the live online deployment thereof.</p>
                        </div>
                    </div>
                </div>
            <!-- 2nd -->
            <div class="col-md-3">
                <div class="single-team">
                    <div class="team-img">
                        <img src="images/lina.png" alt="Lina" class="img-responsive" style="width:100% ;" >
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Lina Al-fawzan.</h3>
                            <p>Project Manager Assistant & Web Developer.</p>
                        </div>
                        <p class="team-text"><br/>Assisting the manager as required.</p>
                    </div>
                </div>
            </div>
            <!-- 3rd -->
            <div class="col-md-3">
                <div class="single-team">
                    <div class="team-img">
                        <img src="images/reem.png" alt="Reem" class="img-responsive"  style="width:100% ;">
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Reem Al-ossimi.</h3>
                            <p class="jop">Designer & Web Developer.</p>
                        </div>
                        <p class="team-text"><br/>Prepares content style for the Web.</p>
                    </div>
                </div>
            </div>
            <!--4th-->
            <div class="col-md-3">
                <div class="single-team">
                    <div class="team-img">
                        <img src="images/raghad.png" alt="Raghad" class="img-responsive"  style="width:100% ;">
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3 class="name">Raghad Al-moqhim.</h3>
                            <p class="jop">Web Developer & Database Administrato.</p>
                        </div>
                        <p class="team-text"><br/>Oversee the creation, maintenance, and security of your databases.</p>
                    </div>
                </div>
            </div>
            <!--5th-->
            <div class="col-md-3">
                <div class="single-team">
                    <div class="team-img">
                        <img src="images/rahaf.png" alt="Rahaf" class="img-responsive"  style="width:100% ;">
                    </div>
                    <div class="team-content">
                        <div class="team-info">
                            <h3>Rahaf Al-swailem.</h3>
                            <p class="jop">Marketing Representatie & Web Developer.</p>
                        </div>
                        <p class="team-text"><br/>Advertisements, promotions, and more to control how to attract new customers.</p>
                    </div>
                </div>
        </div>
            </div>
    </div>

    
    
    
    
    <div class="service-section" id="serviceSection">
        <h1>Our Services</h1>
        <div class="first">
            <p class="para1">Confidence, confidence, confidence… The aim of our company is just simple: we want to help our clients to find the right domestic candidate reliable and dedicated and we only seek out experienced and professional candidates, as we are very strict and rigorous recruiting our candidates.
            All of them have minimum 3 years of checkable experience in a similar job position that the client needs, and 2 references from previous employers, which we have checked personally, and they have to be  e x c e l l e n t.

            Save time, money and annoyances… Avoid endless interviews, questions and phone calls. Just call us once explaining what you need and what you are looking for and we take care of the rest. Our aim is not to send you lots of candidates – it is just to send you the right one.
                
            The most important one… We want to ease your life… We can help you with all the papers and bureaucracy connected with the hiring of your employee, we are always available to answer any questions you may have and always answer those questions promptly and based in our wide experience in this field.
            </p>    

        </div>  
    
        
    </div>
    <!-- No result message -->
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
