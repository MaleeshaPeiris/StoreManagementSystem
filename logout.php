

<?php
// Name:Maleesha Peiris
// Student ID:104081177
// logs out the users from the system by destrouying the session and unsetting the session variables
session_start(); 

// Check if the session variable for manager_id is set
if (isset($_SESSION['manager_id']) ) {
    $manager_id = $_SESSION['manager_id']; // Retrieve the manager ID
    // Clear the session variable
    unset($_SESSION['manager_id']);
    // Optionally destroy the entire session
    session_destroy();
    // Display the thank you message
    echo "Thanks, $manager_id!";

} else if(isset($_SESSION['customer_id'])){

    $customer_id = $_SESSION['customer_id']; 

    unset($_SESSION['customer_id']);

    session_destroy();

    echo "Thanks, $customer_id!";
}else{
    // If no session exists, you can redirect to login or show a message
    echo "No active session found.";
}
?>