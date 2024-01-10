<?php
require 'PayPal-PHP-SDK/autoload.php'; // Adjust the path to the PayPal PHP SDK

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Orders;

$apiContext = new ApiContext(
    new OAuthTokenCredential(
        'AZICfPuNWtxY0Xd89pS4zDFp6Q2_CIX3gB01vfeaBjC_aLlXv0FKIAf5C0ifFncSEheFGz42LwenFVdq',     // Replace with your Client ID
        'EMlLzCFTlWrWyBXoW_3C5x05Q15czOGK5-j97lhTooUbfEPP4EKNFrKDSHfqlKIbAHVXyz66X6OdPOmL'  // Replace with your Client Secret
    )
);

// Set the mode to sandbox for testing; change to 'live' for production
$apiContext->setConfig(['mode' => 'sandbox']);

// Get the order ID from the request
$orderID = $_GET['orderID'];

try {
    // Retrieve the order by making a GET request
    $order = Orders::get($orderID, $apiContext);

    // Modify the currency code and amount in the amount section
    $order->purchase_units[0]->amount->currency_code = 'GBP';
    $order->purchase_units[0]->amount->value = '10.00';  // Set the amount in GBP

    // Process the order details as needed (e.g., update your database, fulfill the order, etc.)

    echo 'Payment processed successfully';
} catch (Exception $ex) {
    // Handle exceptions
    echo $ex->getMessage();
}
?>
