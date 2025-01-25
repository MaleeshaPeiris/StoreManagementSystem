<?php
// Name:Maleesha Peiris
// Student ID:104081177
// enter new customer details to the customer.xml file

header('Content-Type: text/xml');


  
if (isset($_GET['firstname'],$_GET['email'],$_GET['password'], $_GET['retypepassword'],  $_GET['phone'],$_GET['lastname'])) {


	$firstname = $_GET["firstname"];
	$email = $_GET["email"];
	$password = $_GET["password"];
	$retypepassword = $_GET["retypepassword"];
	$phone = $_GET["phone"];
    $lastname = $_GET["lastname"];
	$errMsg = "";
    $phonepattern = "/^\(0\d\)\d{8}$|^0\d \d{8}$/"; 
   
	if (empty($firstname)||empty($email)||empty($phone)|| empty($password) || empty($retypepassword)||empty($lastname)) {
			$errMsg .= "You must input all the values. <br />";
	}

	else if (!preg_match($phonepattern,$phone)) {
		$errMsg .= "Enter a valid phone number <br />";
	}
	
	else if($password != $retypepassword) {
			$errMsg .= "passwords do not match! <br />";
	}



	if ($errMsg != "") {
			echo $errMsg;
	}
	else {
	
	$xmlfile = '../../data/customer.xml';
	
	$doc = new DomDocument();
    $doc->preserveWhiteSpace = FALSE;
    if(file_exists($xmlfile))
    {

        $doc->load($xmlfile);  
        $emails = $doc->getElementsByTagName('email');
        foreach ($emails as $emailNode) {
            if ($emailNode->nodeValue == $email) {
                // Email already exists
                echo "Error: The email address you entered, $email is already registered.";
                exit();  
            }
        }
    }
	
	if (!file_exists($xmlfile)){ // if the xml file does not exist, create a root node $customers
		//echo "inside !file_exists(xmlfile)";
		$customers = $doc->createElement('customers');
		$doc->appendChild($customers);
        $newCustomerId = 1;
	}
	else { // load the existing xml file
        $customers = $doc->getElementsByTagName('customer');

        $lastCustomer = $customers->item($customers->length - 1);
        if ($lastCustomer) 
        {
            $lastCustomerId = $lastCustomer->getElementsByTagName('id')->item(0)->nodeValue;
            $newCustomerId = (int) $lastCustomerId + 1;  // Increment the last ID
        }
        else // no customer information in the file
        {
            $newCustomerId = 1;
        }
	}
	
	//create a customer node under customers node
	$customers = $doc->getElementsByTagName('customers')->item(0);
	$customer = $doc->createElement('customer');
	$customers->appendChild($customer);

    // create a Name node ....
	$IDElement = $doc->createElement('id');
	$customer->appendChild($IDElement);
	$idValue = $doc->createTextNode($newCustomerId);
	$IDElement->appendChild($idValue);

	// create a FirstName node ....
	$firstName = $doc->createElement('firstname');
	$customer->appendChild($firstName);
	$firstNameValue = $doc->createTextNode($firstname);
	$firstName->appendChild($firstNameValue);

    $lastName = $doc->createElement('lastname');
	$customer->appendChild($lastName);
	$lastNameValue = $doc->createTextNode($lastname);
	$lastName->appendChild($lastNameValue);
	
	//create a Email node ....
	$Email = $doc->createElement('email');
	$customer->appendChild($Email);
	$emailValue = $doc->createTextNode($email);
	$Email->appendChild($emailValue);

	//create a phone node ....
	$Phone = $doc->createElement('phone');
	$customer->appendChild($Phone);
	$phoneValue = $doc->createTextNode($phone);
	$Phone->appendChild($phoneValue);
	
	//create a pwd node ....
	$pwd = $doc->createElement('password');
	$customer->appendChild($pwd);
	$pwdValue = $doc->createTextNode($password);
	$pwd->appendChild($pwdValue);
	
	//save the xml file
	$doc->formatOutput = true;
	$doc->save($xmlfile);  
	echo "Dear $firstname you have sccessfully registered, your customer ID is $newCustomerId. " ;
	} 


}
?>