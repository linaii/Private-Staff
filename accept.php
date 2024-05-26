<?php   
include 'dbConnection.php';  
if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $query = "INSERT INTO `reviews`(`ID`, `rate`,`email`, `assistantName`, `serviceType`, `comment`) SELECT * FROM `addreview` WHERE ID = '$id'";  
    $run = mysqli_query($conn,$query);  
    if ($run) {  
        $query3 = "DELETE FROM `addreview` WHERE ID = '$id'";  
        $run3 = mysqli_query($conn,$query3);
        header('location:addreview.php');  
    }else{  
        echo "Error: ".mysqli_error($conn);  
    }  
}  
?> 