<?php
require 'dbConnection.php';
$sql2 = 'SELECT * FROM reviews';
$result = $conn->query($sql2);
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>View reviews</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cssFiles\style1.css" type="text/css"/>
        <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
        <style> 
            #viewreview{
                background-color:rgb(0, 0, 0);
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h2>Admin Account</h2>
            <a href="logout.php">Log out</a>
            <h5>Hello, <?php echo $_SESSION['name']; ?></h5>
        </div>
    
        <div class="row">
            <div class="column side" >
                <ul class='adminList'>
                    <label>Services</label>
                    <li id="addservice" tabindex="0"><a href="addservice.php">Add service</a></li>
                    <li id="viewservice" tabindex="0"><a href="viewservices.php">View services</a></li>
                    <label>Reviews</label>
                    <li id="addreview" tabindex="0"><a href="addreview.php">Add review</a></li>
                    <li id="viewreview" tabindex="0"><a href="viewreview.php">View reviews</a></li>
                </ul>
            </div>
            <div class="column middle">
                <div class="testimonials-box-container" id="cardListsvr">
                        <?php                            
                            
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="testimonial-boxvr">
                                    <a href="delete.php?id=' . $row["ID"].'" class="deleteBtn">Delete</a>
                                        <div class="box-top">
                                            <div class="profile">
                                                <div class="name-uservr">
                                                    <strong class="Aname">' . $row['assistantName'] . '</strong>
                                                    <p class="Stype">' . $row['serviceType'] . '</p>
                                                </div>
                                        </div>';  
                                        if($row['rate'] == 5){
                                            echo '
                                            <div class="reviewsvr">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 4){ 
                                            echo '
                                            <div class="reviewsvr">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 3){
                                            echo '
                                            <div class="reviewsvr">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 2){
                                            echo '
                                            <div class="reviewsvr">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        elseif($row['rate'] == 1){ 
                                            echo '
                                            <div class="reviewsvr">
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        else{
                                            echo '
                                            <div class="reviewsvr">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>';}
                                        
                                    echo '</div>
                                    <div class="client-commentvr">
                                        <p>' . $row['comment'] . '</p>
                                    </div>
                                </div>';
                            }
                            } else { echo "0 results"; }
                            mysqli_close($conn);
                            
                        ?>
                </div>
            </div>
        </div>
    </body>
</html>
<?php 
}else{
    header("Location: login_admin.php");
    exit();
}
?>