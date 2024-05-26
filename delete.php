<?php   
include 'dbConnection.php';  
if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $query = "DELETE FROM `reviews` WHERE ID = '$id'";  
    $run = mysqli_query($conn,$query);  
    if ($run) {  
        header('location:viewreview.php');  
    }else{  
        echo "Error: ".mysqli_error($conn);  
    }  
}  
?>   