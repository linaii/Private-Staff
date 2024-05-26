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
            #addservice{
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
                <div  class="Reservation">
                    <h2 >Add Service</h2>
                    </div>
                <div class="container">
                
                <form action=""  method="post"  enctype="multipart/form-data" id="form">
                        
                        <div class="row">
                            
                            <div class="col">
                
                                <h3 class="title">Details</h3>
                                
                                <div class="inputBox">
                                    <label>Name</label>
                                    <input tabindex="0" id="name" type="text" placeholder="Enter name..."  name="name1" >
                                </div>
                                <div class="inputBox">
                                <label>Add image</label>
                                <input type="file" name="addimg" id="image" >
                                
                                
                                </div>
                                <div class="inputBox">
                                    <span>Category</span>
                                    <div class="inputBox">
                                        <div class="inputBox" >
                                            <select name="category" id="menuu"> 
                                                    <option value="Nanny"  selected>Nanny</option>
                                                    <option value="HouseKeeper" >HouseKeeper</option>
                                                    <option value="Driver" >Driver</option>
                                                    <option value="Chef" >Chef</option>
                                            </select>
                                            <div class="inputBox">
                                                <span>Skills</span>
                                                <input tabindex="0" id="skills" type="text" placeholder="Write Skills.." name="skills">
                                            </div>
                                            <div class="inputBox">
                                                <span>More detailes</span>
                                                <input tabindex="0" id="details" type="text" placeholder="Write more.." name="detailes">
                                            </div>
                                        </div>
                            
                                    </div>
                                        <button tabindex="0" id="submit"  type="submit" value="add" name="submit" class="submit--btn" >Submit the new staff</button>
                            
                            
                                </form>
                                <?php
                                    require 'dbConnection.php';

                                    if(isset($_POST['submit']))
                                    {
                                        $addimg= addslashes(file_get_contents($_FILES["addimg"]["tmp_name"]));
                                        $name1 = $_POST['name1'];
                                        $category = $_POST['category'];
                                        $skills = $_POST['skills'];
                                        $detailes = $_POST['detailes'];

                                        // $query ="INSERT INTO adds (name1,addimg, category,skills,detailes) VALUES ('$name1','$addimg','$category','$skills','$detailes')";
                                        // $query_run = mysqli_query($connection,$query);
                                        if ($category=='Nanny'){
                                            $sql1 = "INSERT INTO nanny(name1,addimg, category,skills,detailes) VALUES ('$name1','$addimg','$category','$skills','$detailes')";
                                            if (mysqli_query($conn,$sql1))
                                            {
                                                echo 'Assistant added';
                                            }else{
                                            echo '';
                                            }
                                        }elseif($category=='Chef'){
                                            $sql3 = "INSERT INTO chef(name1,addimg, category,skills,detailes) VALUES ('$name1','$addimg','$category','$skills','$detailes')";
                                            if (mysqli_query($conn,$sql3))
                                            {
                                                echo 'Assistant added';
                                            }else{
                                                echo '';
                                            }
                                        }elseif($category=='Driver'){
                                            $sql4 = "INSERT INTO driver(name1,addimg, category,skills,detailes) VALUES ('$name1','$addimg','$category','$skills','$detailes')";
                                            if (mysqli_query($conn,$sql4))
                                            {
                                                echo 'Assistant added';
                                            }else{
                                                echo '';
                                            }
                                        }elseif($category=='HouseKeeper'){
                                            $sql5 = "INSERT INTO housekeeper(name1,addimg, category,skills,detailes) VALUES ('$name1','$addimg','$category','$skills','$detailes')";
                                            if (mysqli_query($conn,$sql5))
                                            {
                                                echo 'Assistant added';
                                            }else{
                                                echo '';
                                            }
                                        }

                                    }
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
