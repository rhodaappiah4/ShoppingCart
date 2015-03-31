<?php
/**
 * Created by PhpStorm.
 * User: Rhoda
 * Date: 2/20/15
 * Time: 12:37 PM
 */


// Read and parse USSD request data as JSON.
$ussdRequest = "";
$sequence = 0;
$orderID = 0;
if(isset($_REQUEST['message'])) {
    $ussdRequest = $_REQUEST['message'];
    $previous = $_REQUEST['previous'];
    $sequence = $_REQUEST['sequence'];
}
include "cart_functions.php";
$cart = new cart_functions();


// Check if no errors occured.
    if ($ussdRequest !== NULL)
    {
        // Create a response object.
        $ussdResponse = new stdClass;

        $ussdResponse->Type = 'None';
        $ussdResponse->Message = "Invalid USSD short code";

        if ($ussdRequest == '*123#' && $sequence == 1) {
            $ussdResponse->Type = 'Initiation';
            $ussdResponse->Message = "Welcome to ShopIn.com.\n" .
                "Please enter your order ID";
        }
        else  if ($sequence == 2) {
            $orderID = $cart->get_order_by_id($ussdRequest);
            if ($orderID == 1) {
                $ussdResponse->Type = 'Response';
                $ussdResponse->Message = "Choose 1 to check order status\nChoose 2 to cancel order";
            }
        }
        else  if ($sequence == 3){
            if ($ussdRequest == 1) {
                $cart->get_order_status($previous);
                $status=$cart->fetch();
                $ussdResponse->Type = 'Release';
                $ussdResponse->Message = $status['order_status'];
            }
            else if ($ussdRequest == 2){
                $status = $cart->change_order_status($previous);
                if ($status == 1) {
                    $ussdResponse->Type = 'Release';
                    $ussdResponse->Message = "Your order status has been successfully cancelled";
                }
                else{
                    $ussdResponse->Type = 'Response';
                    $ussdResponse->Message = "Could not cancel your order";
                }
            }
            else{
                $ussdResponse->Type = 'Response';
                $ussdResponse->Message = "Invalid request";
            }
        }
        else {
            $ussdResponse->Type = 'Response';
            $ussdResponse->Message = "Sorry. The order ID does not exist.";
        }
            // Set HTTP content type for the response.
        header('Content-type: application/json; charset=utf-8');

            // Encode the response object as JSON and send.
        echo json_encode($ussdResponse);
    }














