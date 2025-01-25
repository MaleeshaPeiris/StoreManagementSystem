

<?php

// Name:Maleesha Peiris
// Student ID:104081177
// checks the manager log in details with the manager.txt file 

session_start();
header('Content-Type: text/xml');
 
if (isset($_GET['manager_id'],$_GET['password'])) {

	$managerID = $_GET["manager_id"];
	$password = $_GET["password"];

	$errMsg = "";

	if ($errMsg != "") {
			echo $errMsg;
	}
	else {
	
	$textfile = '../../data/manager.txt';
	
	
	if (!file_exists($textfile)){ // if the xml file does not exist, create a root node $customers
		echo "no manager.txt file found";
	}
	else { // load the existing xml file
        
        $file_contents = file($textfile, FILE_IGNORE_NEW_LINES);
        $login_success = false;
        
        foreach ($file_contents as $line) {
            list($id, $pass) = explode(',', $line);
            if (trim($id) == $managerID && trim($pass) == $password) {
                // Credentials are valid, start a session for the manager_id
                $_SESSION['manager_id'] = $managerID;
                $login_success = true;
                break;
            }
        }
        if($login_success){
            echo "success" ;
        }
        else
        {
            echo "invalid manager id or password";
        }
	}	
	} 

}
?>