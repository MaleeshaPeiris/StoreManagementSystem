var xhr = false;
if (window.XMLHttpRequest) {
	xhr = new XMLHttpRequest();
}
else if (window.ActiveXObject) {
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

function loginCustomer(){

    var email = document.getElementById('customer_email').value;
    var password = document.getElementById('password').value;

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {

        if (xhr.readyState == 4 && xhr.status == 200) {
          
          if(xhr.responseText == "success")
            {
                window.location.replace('buying.htm');
            }
          else
          {
            document.getElementById("error_message").innerHTML =
            xhr.responseText;
          }
        }
      };
      xhr.open("GET", "login.php?customer_email=" + encodeURIComponent(email) + "&password=" + encodeURIComponent(password), true);
      xhr.send(null);
}

