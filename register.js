/*
	Student Name: Maleesha Peiris
	Student ID: 104081177
*/
var xhr = false;
if (window.XMLHttpRequest) {
	xhr = new XMLHttpRequest();
}
else if (window.ActiveXObject) {
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
}


// access user inputs from customer page and pass them
// to custRegister.php
function testGet() {
	
	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var email = document.getElementById('email').value;     
	var phone = document.getElementById('phone').value;
	var password = document.getElementById('password').value;
	var retypepassword = document.getElementById('retypepassword').value;
	
	xhr.open("GET", "register.php?firstname=" + firstname + "&lastname=" + lastname + "&email=" + encodeURIComponent(email) + "&phone="+ encodeURIComponent(phone) +"&password=" +password + "&retypepassword=" +retypepassword + "&id=" + Number(new Date), true);

	xhr.onreadystatechange = testInput;
	xhr.send(null);
	
}

function testInput() {
	
	if ((xhr.readyState == 4) && (xhr.status == 200)) {
		document.getElementById('msg').innerHTML = xhr.responseText;
	}
	
}




