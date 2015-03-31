<?php
/**
 * Created by PhpStorm.
 * User: Rhoda
 * Date: 3/30/15
 * Time: 1:07 AM
 */


$database="shopping_cart";
$username="root";
$password="";
$server="localhost";

$connect = mysql_connect($server,$username,$password);
if (!$connect){
    echo "error";
    echo mysql_error();
}else{
    echo "connected";
}
$db_conn = mysql_select_db($database,$connect);

$num_records_per_page=2;
$start=0;
$page="";
$page=$_REQUEST['page'];
if ($page="" || $page=="1"){
    $start=0;
}
else{
    $start=($page*2)-2;
}

$res = mysql_query("select * from product limit $start,$num_records_per_page");

while($row=mysql_fetch_assoc($res)) {
    echo $row['product_name'];
}

$count = mysql_num_rows($res);

$a=ceil($count/$num_records_per_page);

for($b=1;$b<$a;$b++){
    echo "<a href='page.php?page='.$b></a>";
    echo $b;
}