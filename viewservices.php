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
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ِAdd service</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cssFiles\style1.css" type="text/css"/>
        <link rel="shortcut icon" href="images/logo-without-text.png"/>
        <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
        <style>
            #viewservice{
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
                <div class="card-holdera" id="card-lists">
                    <form action=""  method="post"  enctype="multipart/form-data">
                    <?php 
                        if ($resultN->num_rows > 0) {
                            while($row = $resultN->fetch_assoc()) {
                                echo'<div class="carda nanny" id="Nannies">
                                        <a href="deleteService.php?id=' . $row["id"].'&name1= '.$row["name1"].'&category='.$row["category"].'" class="deleteBtn" id=>Delete</a>
                                        <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="nanny" class="card__imga">
                                        <div class="card-contentsa">
                                            <h1 class="card__namea">'.$row['name1'].'</h1>
                                                <ul>'.$row['skills'].'</ul>
                                            <br/>
                                                <span class="card__read-morea">'.$row['detailes'].'</span>
                                        </div>
                                    </div>';}
                        }
                        if ($resultH->num_rows > 0) {
                            while($row = $resultH->fetch_assoc()) {
                                echo'<div class="carda housekeeper" id="Housekeepers">
                                        <a href="deleteService.php?id=' . $row["id"].'&name1= '.$row["name1"].'&category='.$row["category"].'" class="deleteBtn" id=>Delete</a>
                                        <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="housekeeper" class="card__imga">
                                        <div class="card-contentsa">
                                            <h1 class="card__namea">'.$row['name1'].'</h1>
                                                <ul>'.$row['skills'].'</ul>
                                            <br/>
                                                <span class="card__read-morea">'.$row['detailes'].'</span>
                                        </div>
                                    </div>';}
                        }
                        if ($resultC->num_rows > 0) {
                            while($row = $resultC->fetch_assoc()) {
                                echo'<div class="carda chef" id="Chefs">
                                        <a href="deleteService.php?id=' . $row["id"].'&name1= '.$row["name1"].'&category='.$row["category"].'" class="deleteBtn" id=>Delete</a>
                                        <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="chef" class="card__imga">
                                        <div class="card-contentsa">
                                            <h1 class="card__namea">'.$row['name1'].'</h1>
                                                <ul>'.$row['skills'].'</ul>
                                            <br/>
                                                <span class="card__read-morea">'.$row['detailes'].'</span>
                                        </div>
                                    </div>';}
                        }
                        if ($resultD->num_rows > 0) {
                            while($row = $resultD->fetch_assoc()) {
                                echo'<div class="carda driver" id="Drivers">
                                        <a href="deleteService.php?id=' . $row["id"].'&name1= '.$row["name1"].'&category='.$row["category"].'" class="deleteBtn" id=>Delete</a>
                                        <img src="data:addimg;base64,'.base64_encode($row['addimg']).'" alt="driver" class="card__imga">
                                        <div class="card-contentsa">
                                            <h1 class="card__namea">'.$row['name1'].'</h1>
                                                <ul>'.$row['skills'].'</ul>
                                            <br/>
                                                <span class="card__read-morea">'.$row['detailes'].'</span>
                                        </div>
                                    </div>';}
                        }

                    ?>
                    </form>
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