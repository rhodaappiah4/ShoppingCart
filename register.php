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
<head>
    <link rel="stylesheet" href="css/foundation.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-1.11.0.js" type="text/javascript"></script>
    <script src="foundation.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="app.js"></script>
    <title>Registration</title>
</head>
<body>
<nav>
    <ul>
        <li><strong><a href="./">Shopping.com</a></strong></li>

        <li><a href="./#">All items</a></li>
        <li id="shoes"><a href="?cat=3#shoes">Shoes</a></li>
        <li id="earring"><a href="?cat=2#earring">Earrings</a></li>
        <li id="necklace"><a href="?cat=1#necklace">Necklaces</a></li>
        <li id="bracelet"><a href="?cat=4#bracelet">Bracelet</a></li>
    </ul>
    <form class="right search" action="index.php">
        <label><input type="text" name="search" placeholder="Search..."><i class="icon-search"></i></label>
    </form>

</nav>
<form action="register.php" method="GET">
    <div class="row">
    <label>First Name:<input type="text" size=12 name="firstname"></label>
    <label>Last Name:<input type="text" name="lastname"></label>
    <label>Gender:<input type="text" name="gender"></label>
    <label>Date of birth:<input type="text" name="date_of_birth"></label>
    <label>Home Address:<input type="text" size=98 name="home_address"></label>
    <label>Email Address:<input type="text" name="email_address"></label>
    <label>Phone Number:<input type="text" name="phone_number"></label>
    <label>Username:<input type="text" name="username"></label>
    <label>Password:<input type="text" name="customer_password"></label>
    <input type="submit" name="register" value="Register">
    </div>
</form>
</body>

</html>

