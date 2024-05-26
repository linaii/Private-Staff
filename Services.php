<?php 
require 'dbConnection.php';
$sqlN = 'SELECT * FROM nanny';
$resultN = $conn->query($sqlN); 
$sqlC = 'SELECT * FROM chef';
$resultC = $conn->query($sqlC);
$sqlH = 'SELECT * FROM housekeeper';
$resultH = $conn->query($sqlH);
$sqlD = 'SELECT * FROM driver';
$resultD = $conn->query($sqlD);
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>Services</title>
        <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cssFiles/style1.css" type="text/css">
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
        <style>
          #services-bar a{ 
              text-decoration: underline; 
              text-decoration-color: #d2252d; 
              } 
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
          function searchBarNav() {
            const input = document.getElementById('searchBar').value.toUpperCase();
            const cardContainer = document.getElementById('card-lists');
            const cards = cardContainer.getElementsByClassName('card');
            const menu = document.getElementById('ll');
            const redBorder = document.getElementById("searchBar");
            let message = document.getElementsByClassName('message');
            let messageC = document.getElementsByClassName('message-c');
            let result = []; //empty array
            for(let i = 0; i<cards.length; i++) {
              let content = cards[i].querySelector('.card-contents');
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
              menu.style.display='none';
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
            <img src="images/logo.png" class="icon" alt="logo">
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
              <input tabindex="0" aria-label="Search" type="search" id="searchBar"  placeholder="Assistant name/ Feature">
              <button aria-label="Search" tabindex="0"><span class="fa fa-search"  onclick="searchBarNav()" ></span></button>
            </div>   
        </nav>
        <header>
            <div class="heading-title">
                <span>we are here to</span>
                <h1>Make Your Life Easier</h1>
            </div> 
        </header>

        <!--menu-->
      <div class="ll" id="ll">
        <h3>Category</h3>
        <ul>
          <li class="list active" tabindex="0" data-filter="all">All</li>
          <li class="list" tabindex="0" data-filter="nanny">Nannies</li>
          <li class="list" tabindex="0" data-filter="housekeeper">Housekeepers</li>
          <li class="list" tabindex="0" data-filter="chef">Chefs</li>
          <li class="list" tabindex="0" data-filter="driver">Drivers</li>
        </ul>
      </div>
    <div class="card-holder" id="card-lists">
      <form action=""  method="post"  enctype="multipart/form-data">
        <?php 
        if ($resultN->num_rows > 0) {
          while($row = $resultN->fetch_assoc()) {
            echo'<div class="card nanny" id="Nannies">
                  <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="nanny" class="card__img">
                  <div class="card-contents">
                    <h1 class="card__name">'.$row['name1'].'</h1>
                      <ul>'.$row['skills'].'</ul>
                    <br/>
                      <span class="card__read-more">'.$row['detailes'].'</span>
                    <p tabindex="0" class="read-more-btn">Read more...</p>
                    <a tabindex="0" href="Reservation.php?assistantName=' . $row["name1"].'&category= '.$row["category"].'" class="add">Reservation</a>
                  </div>
                </div>';}
        }
        if ($resultH->num_rows > 0) {
          while($row = $resultH->fetch_assoc()) {
            echo'<div class="card housekeeper" id="Housekeepers">
                  <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="housekeeper" class="card__img">
                  <div class="card-contents">
                    <h1 class="card__name">'.$row['name1'].'</h1>
                      <ul>'.$row['skills'].'</ul>
                    <br/>
                      <span class="card__read-more">'.$row['detailes'].'</span>
                    <p tabindex="0" class="read-more-btn">Read more...</p>
                    <a tabindex="0" href="Reservation.php?assistantName=' . $row["name1"].'&category= '.$row["category"].'" class="add">Reservation</a>
                </div>
              </div>';}
        }
        if ($resultC->num_rows > 0) {
          while($row = $resultC->fetch_assoc()) {
            echo'<div class="card chef" id="Chefs">
                  <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="chef" class="card__img">
                  <div class="card-contents">
                    <h1 class="card__name">'.$row['name1'].'</h1>
                      <ul>'.$row['skills'].'</ul>
                    <br/>
                      <span class="card__read-more">'.$row['detailes'].'</span>
                    <p tabindex="0" class="read-more-btn">Read more...</p>
                    <a tabindex="0" href="Reservation.php?assistantName=' . $row["name1"].'&category= '.$row["category"].'" class="add">Reservation</a>
                </div>
              </div>';}
        }
        if ($resultD->num_rows > 0) {
          while($row = $resultD->fetch_assoc()) {
            echo'<div class="card driver" id="Drivers">
                  <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="driver" class="card__img">
                  <div class="card-contents">
                    <h1 class="card__name">'.$row['name1'].'</h1>
                      <ul>'.$row['skills'].'</ul>
                    <br/>
                      <span class="card__read-more">'.$row['detailes'].'</span>
                    <p tabindex="0" class="read-more-btn">Read more...</p>
                    <a tabindex="0" href="Reservation.php?assistantName=' . $row["name1"].'&category= '.$row["category"].'" class="add">Reservation</a>
                </div>
              </div>';}
        }
        ?>
      </form>
    </div>
    <!-- No result message -->
    <div class="messageA">
      <p class="message"></p>
      <p class="message-c"></p>
    </div>
    <!--read more & read less-->
    <script src="JS/script.js"></script>
    <!--select from menu-->  
      <script>
        $(document).ready(function(){
          $('.list').click(function(){
            const value = $(this).attr('data-filter');
            if (value == 'all'){
              $('.card').show('1000');
            }
            else{
              $('.card').not('.'+value).hide('1000');
              $('.card').filter('.'+value).show('1000');
            }
          })
        })
        $('.list').click(function(){
          $(this).addClass('active').siblings().removeClass('active');
        })
      </script>
      

    <script>
      function openForm() {
        document.getElementById("myForm").style.display = "block";
      }
      
      function closeForm() {
        document.getElementById("myForm").style.display = "none";
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