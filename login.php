<?php
// Name:Maleesha Peiris
// Student ID:104081177
// checks the user entered login data with the customer.xml file

session_start();

if (isset($_GET['customer_email']) && isset($_GET['password'])) {
    $email = $_GET['customer_email'];
    $password = $_GET['password'];

    // Load the XML file
    $xml = simplexml_load_file('../../data/customer.xml');
    $login_success = false;

    foreach ($xml->customer as $customer) {
        if ($customer->email == $email && $customer->password == $password) {
            $_SESSION['customer_id'] = (string)$customer->id; // Store customer ID in session
            $login_success = true;
            break;
        }
    }

    if ($login_success) {
        echo "success";
   
    } else {
        echo "Invalid email or password.";
    }
} else {
    echo "Email and password must be provided.";
}
?>
