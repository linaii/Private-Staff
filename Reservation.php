<?php
require 'dbConnection.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="shortcut icon" href="images/logo-without-text.png"/>
    <link rel="stylesheet" href="cssFiles/style1.css">
    <script src="https://kit.fontawesome.com/3db309a688.js" crossorigin="anonymous"></script>

</head>

<body>
    <div  class="Reservation">
    <h2 >Reservation</h2>
    </div>
<div class="container">

    <form id="form" action="" method="POST">
        
        <div class="row">
            
            <div class="col">

                <h3 class="title">Details</h3>

                <div class="inputBox">
                    <label>Full Name</label>
                    <input tabindex="0" id="full_name" name="full_Name" class="tt" type="text" placeholder="Enter your name..." pattern="[a-zA-Z ]{5,}" title="Enter your full name, only letters, At least 5-letters.">
                </div>
                <div class="inputBox">
                    <label>Email</label>
                    <input tabindex="0" id="email" name="email" class="tt"  type="email" placeholder="example@example.com">
                </div>
                <div class="inputBox">
                    <label>Address</label>
                    <input tabindex="0" id="address" name="address1" class="tt" type="text" placeholder="number - street"  pattern="[a-zA-Z0-9- ]{5,}" title="Enter your address, letters/numbers or both, At least 5 .">
                </div>  
                <div class="inputBox">
                    <label>City</label>
                    <input tabindex="0" id="city" name="city" class="tt" type="text" placeholder="Enter your city..." pattern="[a-zA-Z ]{3,}" title="Enter your city, only letters, At least 3-letters.">
                </div>
                
                <div class="inputBox">
                    <span>Hours & Price :</span>
                    <div class="inputBox">
                        <div class="inputBox" >
                            <select id="menuu" class="tt" name='price'> 
                                    <option value="0" selected>select</option>
                                    <option value="20">4 Hours</option>
                                    <option value="40">6 Hours</option>
                                    <option value="60">8 Hours</option>
                            </select>
                        </div>
                        <span id="price"></span>
                    </div>

                
                    <label>Date & Time :</label>
                    <input tabindex="0" id="date" name="date_timee"class="tt" class='form-control' type="datetime-local">
                </div>
                
            </div>

            
            <div class="col">
                <h3 class="title">Payment</h3>
                <div class="inputBox" id="myForm">
                    <span>Cards accepted </span>
                    <img src="images/card_img.png" alt="payment methods">
                </div>
                <div class="inputBox">
                    <label>Name on card</label>
                    <input tabindex="0" id="name_on_card" name="name_on_card" class="tt" type="text" placeholder="Enter your name.." pattern="[a-zA-Z ]{5,}" title="Enter your name on card at least 5-Letters."> 
                </div>
                <div class="inputBox">
                    <label>Credit card number</label>
                    <input tabindex="0" id="credit" name="credit" class="tt" type="tel"  placeholder="1112223333" pattern="[0-9]{10}" title="please enter the 10-digits of Credit card number.">
                </div>
                <div class="inputBox">
                    <label>Exp month</label>
                    <input tabindex="0" id="exp_month" name="exp_month" class="tt" type="number" placeholder="Enter Month" min="1" max="12" title="Enter Exp month number.">
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <label>Exp year</label>
                        <input tabindex="0" id="exp_year" name="exp_year" class="tt" type="number" placeholder="2022" min="2022" max="2042" title="Enter Exp year number between 2022 /2042 .">
                    </div>
                    <div class="inputBox">
                        <label>CVV</label>
                        <input tabindex="0" id="cvv" name="cvv" class="tt" type="tel" placeholder="123" pattern="[0-9]{3}"  title="please enter 3-digit on the back of your card.">
                    </div>
                </div>
                <div class="inputBox">
                    <span>Notes :</span>
                    <input tabindex="0" type="text" name="note" placeholder="Write something..">
                </div>
            </div>

        </div>
            <button tabindex="0" onclick="checkout()" id="submit" name="submit" type="submit" value="submit" class="submit--btn" >proceed to checkout</button>
    </form>
</div>

<!--date & time-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"> </script>
<script>
    /* time = price */
    var drop = document.getElementById("menuu");
    var price = document.getElementById("price");
    drop.onchange = function() {
    price.innerHTML = "$" + drop.value;
    }
    
    /* date & time */
    config= {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        altInput:true,
        altFormat: "F j, Y (h:i K)",
    } 
    
    flatpickr("input[type=datetime-local]",config );
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <?php
    if (isset($_GET['assistantName']) && isset($_GET['category'])) {
        $assistant = $_GET['assistantName'];
        $service = $_GET['category'];
        
        if (isset($_POST['submit'])) {
            $full_Name = $_POST['full_Name'];
            $email = $_POST['email'];
            $address1 = $_POST['address1'];
            $city = $_POST['city'];
            $price = $_POST['price'];
            $date_timee = $_POST['date_timee'];
            $name_on_card = $_POST['name_on_card'];
            $credit = $_POST['credit'];
            $exp_month = $_POST['exp_month'];
            $exp_year = $_POST['exp_year'];
            $cvv = $_POST['cvv'];
            $note = $_POST['note'];

            $errors = array();

            $e="SELECT email FROM users WHERE email='$email'";
            $ee= mysqli_query($conn,$e);

            if (empty($email)) {
                $errors['e'] = ( "Email not matching Please register first");
            }else if(mysqli_num_rows($ee) == 0){
                $errors['e'] ="Email exist";
            }
            
            if(empty($full_Name) || empty($email) || empty($address1) || empty($city) || empty($price) || empty($date_timee) || empty($name_on_card) || empty($credit)|| empty($exp_month) || empty($exp_year) || empty($cvv)){
                $errors[''] = ( "check all fields");
            }
            
            if (count($errors) == 0) {
                $query = "INSERT INTO reservation(full_Name, email,AssistantName,ServiceType, address1, city, price, date_timee, name_on_card, credit, exp_month, exp_year, cvv, note) VALUES ('$full_Name','$email','$assistant','$service','$address1','$city', '$price', '$date_timee', '$name_on_card','$credit','$exp_month','$exp_year','$cvv','$note')";
                    if(mysqli_query($conn,$query)){
                        echo "<script>
                                swal({
                                title: 'Success!',
                                text: 'We would like to thank you for choosing our services, and we are glad to have a customer like you.',
                                icon: 'success',
                                button: false,
                                })
                            </script>";
                        };
            }else{
                echo "<script>
                        swal({
                        title: 'Fields Empty!',
                        text: 'please enter all fields & dont forget register before and use the same email.',
                        icon: 'error',
                        button: 'OK',
                        })
                    </script>";
                        };
        };
    };
    ?>
</body>
</html>
