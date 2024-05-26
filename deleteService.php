<?php   
include 'dbConnection.php';  
if (isset($_GET['id'])) {  
    $id = $_GET['id'];  
    $category = $_GET['category']; 
    if($category=='Nanny'){
        $query = "DELETE FROM `nanny` WHERE id = '$id'";  
        $run = mysqli_query($conn,$query);  
        if ($run) {  
            header('location:viewservices.php');  
        }else{  
            echo "Error: ".mysqli_error($conn);  
        } 
    } 
    if($category=='Chef'){
        $query = "DELETE FROM `chef` WHERE id = '$id'";  
        $run = mysqli_query($conn,$query);  
        if ($run) {  
            header('location:viewservices.php');  
        }else{  
            echo "Error: ".mysqli_error($conn);  
        } 
    }
    if($category=='Driver'){
        $query = "DELETE FROM `driver` WHERE id = '$id'";  
        $run = mysqli_query($conn,$query);  
        if ($run) {  
            header('location:viewservices.php');  
        }else{  
            echo "Error: ".mysqli_error($conn);  
        } 
    }
    if($category=='HouseKeeper'){
        $query = "DELETE FROM `housekeeper` WHERE id = '$id'";  
        $run = mysqli_query($conn,$query);  
        if ($run) {  
            header('location:viewservices.php');  
        }else{  
            echo "Error: ".mysqli_error($conn);  
        } 
    }
}  
?>  