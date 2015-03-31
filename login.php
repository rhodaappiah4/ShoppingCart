<?php
/**
 * Created by PhpStorm.
 * User: Rhoda
 * Date: 2/16/15
 * Time: 1:49 PM
 */
session_start();
$cart_data=$_REQUEST['cart_data'];
$_SESSION['cart_data'] = $cart_data;

//if the form has been submitted, then
// 	call login function
//	if login function return true
//		start session
//		load user profile into session
//		redirect to home page
//	else
//		set error
//		show the login form
//	end if
//else
//	show the login form
$msg="Login";
if(isset($_REQUEST['username'])){
    //the login form has been submitted
    $username=$_REQUEST['username'];
    $password=$_REQUEST['password'];

    //call login to check username and password
    if(login($username,$password)){
       	//initiate session for the current login


//        $_SESSION['session'] = $id;
        echo "ID FROM OTHER PAGE IS: ".$cart_data;
        loadUserProfile($username);	//load user information into the session
        header("location: order_view.php?cart_data=".$cart_data."&username=".$username);	//redirect to home page
        echo "<a href='order_view.php?cart_data='.$cart_data>click here</a>";	//if redirect fails, provide a link
        exit();
    }else{
        //if login returns false, then something is worng
        $msg="username or password is wrong";
    }
}


?>
    <html>
    <head>
        <link rel="stylesheet" href="css/foundation.min.css">
        <link rel="stylesheet" href="css/style.css">
        <script src="jquery-1.11.0.js" type="text/javascript"></script>
        <script src="foundation.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="app.js"></script>
        <title>Login</title>
    </head>
    <body>
    <form action="login.php" method="POST">
        <input type="hidden" name="cart_data" value='<?php print_r($cart_data) ?>' >
        <table align="center" width="80%">
            <tr>
                <td width="30%"></td>
                <td colspan="2" align="center"><span><?php echo $msg ?></span></td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td width="30%"></td>
                <td>username</td>
                <td><input type="text" name="username"></td>
                <td width="30%"></td>
            </tr>
            <tr>
                <td width="30%"></td>
                <td>password</td>
                <td><input type="password" name="password"></td>
                <td  width="30%"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="submit" value="login"></td>
                <td></td>
            </tr>
        </table>
        If you do not have an account with ShopIn.com, <a href="register.php">Register</a> now!
    </form>
    </body>
    </html>

<?php
//include_once ('adb.php');
function login($user,$pass){
    //connect to db
    //select db
    //if connection fails, return false
    //query for the $username and $password
    //if the user with the right password is found,
    //	return true
    //else
    //	return false
    $database="shopping_cart";	//this database has to exist.
    $username="root";		//the main admin user of mysql
    $password="";			//use root password of mysql
    $server="localhost";	//name of the server

    $link=mysql_connect($server,$username,$password);
    //if result is false, the connection did not open
    if(!$link){
        echo "Failed to connect to mysql.";
        //display error message from mysql
        echo mysql_error();
        return false;	//end script
    }

    //select the database to work with using the open connection
    if(!mysql_select_db($database,$link)){
        echo "Failed to select database.";
        //display error message from mysql
        echo mysql_error();
        exit();
    }

//  $query = "select username,password from customer where username='$user' and password=MD5('$pass')";
    $query = "select customer_id,username,customer_password from customer where username='$user' and customer_password='$pass'";
    $dataset= mysql_query($query,$link);
    $row=mysql_fetch_assoc($dataset);
    while($row){
        $row['customer_id'];
        $row=mysql_fetch_assoc($dataset);
    }
    $num = mysql_num_rows($dataset);

    if ($num == 0){
        return false;
    }

    else{
        return true;
    }


}

function loadUserProfile($username){
    //load username and other informaiton into the session
    //the user informaiton comes from the database
    $_SESSION['username']=$username;
    $_SESSION['usertype']=1;
    //permission
}
?>