

function loadDoc() {


    var managerId = document.getElementById('manager_id').value;
    var password = document.getElementById('password').value;

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {
      if (xhttp.readyState == 4 && xhttp.status == 200) {
        document.getElementById("error_message").innerHTML =
        xhttp.responseText;
        console.log(xhttp.responseText);
        if(xhttp.responseText.includes("success")){

            document.getElementById('links').style.display = 'block';
            document.getElementById('loginForm').style.display = 'none';
        }
        else if (!xhttp.responseText.includes("invalid")){
            document.getElementById('links').style.display = 'block';
            document.getElementById('loginForm').style.display = 'none';
        }



      }
    };
    xhttp.open("GET", "mlogin.php?manager_id=" + managerId +"&password=" +password + "&id=" + Number(new Date), true);
    xhttp.send(null);
}













