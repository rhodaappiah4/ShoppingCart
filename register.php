<?php
/**
 * Created by PhpStorm.
 * User: Rhoda
 * Date: 2/16/15
 * Time: 10:31 AM
 */

include("cart_functions.php");
$c=new cart_functions();

//function add_customer($firstname,$lastname,$gender,$date_of_birth,$home_address,$email_address,$phone_number,
//                      $username,$customer_password){
//    $sql_query="INSERT INTO customer(firstname,lastname,gender,date_of_birth,home_address,email_address,
//		phone_number,username,customer_password) VALUES ('$firstname','$lastname','$gender','$date_of_birth',
//		'$home_address','$email_address','$phone_number','$username','$customer_password')";
//    if (!$this->query($sql_query)){
//        return false;
//    }
//    return true;
//}
$firstname="";
if (isset($_REQUEST['firstname'])){
    $firstname=$_REQUEST['firstname'];
}
$lastname="";
if (isset($_REQUEST['lastname'])){
    $lastname=$_REQUEST['lastname'];
}
$gender="";
if (isset($_REQUEST['gender'])){
    $gender=$_REQUEST['gender'];
}
$date_of_birth="";
if (isset($_REQUEST['date_of_birth'])){
    $date_of_birth=$_REQUEST['date_of_birth'];
}
$home_address="";
if (isset($_REQUEST['home_address'])){
    $home_address=$_REQUEST['home_address'];
}
$email_address="";
if (isset($_REQUEST['email_address'])){
    $email_address=$_REQUEST['email_address'];
}
$phone_number="";
if (isset($_REQUEST['phone_number'])){
    $phone_number=$_REQUEST['phone_number'];
}
$username="";
if (isset($_REQUEST['username'])){
    $username=$_REQUEST['username'];
}
$customer_password="";
if (isset($_REQUEST['customer_password'])){
    $customer_password=$_REQUEST['customer_password'];
}
if(isset($_REQUEST['register'])){
    $c->add_customer($firstname,$lastname,$gender,$date_of_birth,$home_address,$email_address,$phone_number,
              $username,$customer_password);
}
?>

<html>
<!--<head>-->
<!--    <link rel="stylesheet" href="css/foundation.min.css">-->
<!--    <link rel="stylesheet" href="css/style.css">-->
<!--    <script src="jquery-1.11.0.js" type="text/javascript"></script>-->
<!--    <script src="foundation.min.js" type="text/javascript"></script>-->
<!--    <script type="text/javascript" src="app.js"></script>-->
<!--    <title>Registration</title>-->
<!--</head>-->
<body>
<form action="register.php" method="GET">
    <div>First Name:<input type="text" size=12 name="firstname"></div>
    <div>Last Name:<input type="text" name="lastname"></div>
    <div>Gender:<input type="text" name="gender"></div>
    <div>Date of birth:<input type="text" name="date_of_birth"></div>
    <div>Home Address:<input type="textarea" size=98 name="home_address"></div>
    <div>Email Address:<input type="text" name="email_address"></div>
    <div>Phone Number:<input type="text" name="phone_number"></div>
    <div>Username:<input type="text" name="username"></div>
    <div>Password:<input type="text" name="customer_password"></div>
    <input type="submit" name="register" value="Register">
</form>
</body>

</html>

