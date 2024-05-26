<?php
require 'dbConnection.php';
$sql2 = 'SELECT * FROM reviews';
$result = $conn->query($sql2);?>
<!DOCTYPE html>
<html lang="en">
    <head>    
        <title>Reviews</title> 
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cssFiles/style1.css" type="text/css">
        <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ramaraja&display=swap" rel="stylesheet">
        <style>   
            #reviews-bar a{
                text-decoration: underline; 
                text-decoration-color: #d2252d; 
            }     
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $(".write").click(function(){
                    $(".review-box").slideDown();
                });
                $("#cancel").click(function(){
                    $(".review-box").slideUp();
                });
            }); 
            function searchBarNav() {
                const input = document.getElementById('searchBar').value.toUpperCase();
                const cardContainer = document.getElementById('cardLists');
                const cards = cardContainer.getElementsByClassName('testimonial-box');
                const redBorder = document.getElementById("searchBar");
                let message = document.getElementsByClassName('message');
                let messageC = document.getElementsByClassName('message-c');
	            let result = []; //empty array 
                for(let i = 0; i<cards.length; i++) {
                    let name = cards[i].querySelector('.Aname');
                    let serviceType = cards[i].querySelector('.Stype');
		    if(name.innerText.toUpperCase().indexOf(input) > -1 || serviceType.innerText.toUpperCase().indexOf(input) > -1)  {
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
                <input aria-label="Search" tabindex="0" type="search" id="searchBar"  placeholder="Assistant Name/ Service Type">
                <button aria-label="Search" tabindex="0"><span class="fa fa-search"  onclick="searchBarNav()" ></span></button>
            </div>          
        </nav>
        <header>
            <div class="heading-title">
                <span>comments</span>
                <h1>Client Says</h1>
            </div> 
        </header> 

        <!-- Reviews Page -->
        <section id="testimonials">
            <!-- Add Review -->
                <button tabindex="0" type="button" class="write">Add Review</button>
                <form action="" method='post'>
                    <div class="review-box" style='display:none'>
                        <div class="stars-container">   
                            <div class="star-widget">
                                <input type="radio" name="rate" id="rate-5" value="5">
                                <label tabindex="0" for="rate-5" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-4" value="4">
                                <label tabindex="0" for="rate-4" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-3" value="3">
                                <label tabindex="0" for="rate-3" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-2" value="2">
                                <label tabindex="0" for="rate-2" class="fas fa-star"></label>
                                <input type="radio" name="rate" id="rate-1" value="1" >
                                <label tabindex="0" for="rate-1" class="fas fa-star"></label>
                                <input type="radio" name="rate" value="0" checked="true" style="display:none">
                                <div class="text"></div> 
                                <h4>Email:</h4> 
                                <input tabindex="0" class='email' name="email" placeholder="example@gmail.com">
                                <h4>Assistant Name:</h4> 
                                <input tabindex="0" class='assistant-name' name="assistantName" placeholder="Marilen">
                                <h4>Service Type:</h4>
                                <select tabindex="0" class="service-type" name="serviceType" title="choose">
                                    <option value="nanny">Nanny</option>
                                    <option value="driver">Driver</option>
                                    <option value="chef">Chef</option>
                                    <option value="housekeeper">Housekeeper</option>
                                </select>
                                <h4>Comment:</h4>
                                <textarea tabindex="0" class="user-review" cols="30" name="comment" placeholder="Describe your experience.."></textarea>
                                <button tabindex="0" type="button" id="cancel">cancel</button> 
                                <button tabindex="0" type="submit" name="submit1" class="submitBtn">submit</button> 
                            </div>
                        </div>   
                    </div>
                </form> 
                <?php 
                if($_SERVER['REQUEST_METHOD'] == 'POST')
                {   
                    $email = $_POST['email'];
                    $rate = $_POST['rate'];
                    $assistantName = $_POST['assistantName'];
                    $serviceType = $_POST['serviceType'];
                    $comment = $_POST['comment'];

                    $sql = "INSERT INTO addreview(rate,email,assistantName,serviceType, comment) VALUES ('$rate','$email','$assistantName','$serviceType','$comment')";
                    $e="SELECT email FROM reservation WHERE email='$email'";
                    $ee= mysqli_query($conn,$e);

                    if (empty($email)) {
                        echo'Please enter email';
                    }else if(mysqli_num_rows($ee) == 0){
                        echo'You must make reservation';
                    }else{
                        if (mysqli_query($conn,$sql)){
                        echo 'Thank you for rating us';
                        }
                    }
                }
                ?>
            <div class="testimonials-box-container" id="cardLists">
                            <?php
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="testimonial-box">';
                                    echo '<div class="box-top">';
                                        echo '<div class="profile">';
                                            echo '<div class="profile-img">';
                                                echo '<img src="images/a.png"/>';
                                            echo '</div>';
                                                echo '<div class="name-user">';
                                                    echo '<strong class="Aname">' . $row['assistantName'] . '</strong>';
                                                    echo '<p class="Stype">' . $row['serviceType'] . '</p>';
                                                echo '</div>';
                                        echo '</div>';  
                                        if($row['rate'] == 5){
                                            echo '
                                            <div class="reviews">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 4){ 
                                            echo '
                                            <div class="reviews">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 3){
                                            echo '
                                            <div class="reviews">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 2){
                                            echo '
                                            <div class="reviews">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 1){ 
                                            echo '
                                            <div class="reviews">
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        else{
                                            echo '
                                            <div class="reviews">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        
                                    echo '</div>';
                                    echo '<div class="client-comment">';
                                        echo '<p>' . $row['comment'] . '</p>';
                                    echo '</div>';
                                echo '</div>';
                            }
                            } else { echo "0 results"; }
                            mysqli_close($conn);
                            ?>
            </div> 
            <div class="messageA">
                <p class="message"></p>
                <p class="message-c"></p>
            </div>
        </section>
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