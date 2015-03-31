<?php
/**
 * Created by PhpStorm.
 * User: Rhoda
 * Date: 2/12/15
 * Time: 4:03 PM
 */
require_once "cart_functions.php";
$cart = new cart_functions();
if (isset($_REQUEST['product_id'])){
    $cart->product_details_by_id($_REQUEST['product_id']);
    echo json_encode($cart->fetch());
}
else if (isset($_REQUEST['details_id'])){
    $cart->get_order_details_by_id($_REQUEST['details_id']);
    echo json_encode($cart->fetch());
}
else if (isset($_REQUEST['order_id'])){
    $cart->get_order_id($_REQUEST['order_id']);
    $row=$cart->fetch();
    $array = Array();
    do {
        $array[]=array_map('utf8_encode',$row);
        $row =$cart->fetch();
    }while ($row);
    echo json_encode($array);
}
//else if (isset($_REQUEST['addOrder'])){
//    $_REQUEST['order_date'] = new DateTime();
////    $_REQUEST['fk_customer_id'] = 1;
//    echo json_encode($cart->add_order('Pending',$_REQUEST['order_date'],$_REQUEST['addOrder']));
//}

