

function getResults(){
    var xhr = new XMLHttpRequest(); // Create the XMLHttpRequest object
    xhr.open("POST", "getData.php", true); // Use POST protocol (this fulfills requirement 3)
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
        getData(xhr); // Call the function to handle the response
        }
    };
    xhr.send(null); // Send the request (can modify this if data needs to be sent)
    }

function getData(xhr) {
    if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('error_message').innerHTML = xhr.responseText;
    }
}


function addToCart(itemId) {
    // Send request to update item availability and add to cart

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "addToCart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = xhr.responseText;
            alert(response); // Display message from server
            //alert(document.getElementById('cartTable').style.display)
            location.reload(); // Reload the page to reflect the updated item list
        }
    };
    xhr.send("itemId=" + encodeURIComponent(itemId));
}



function removeFromCart(itemId) {
    // Send request to update item availability and add to cart

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "removeFromCart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = xhr.responseText;
            alert(response); // Display message from server
            location.reload(); // Reload the page to reflect the updated item list
        }
    };
    xhr.send("itemId=" + encodeURIComponent(itemId));
}

function confirmPurchase(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "confirmPurchase.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            let response = xhr.responseText;
            alert(response);
            location.reload(); // Reload the page to reflect the updated content
        }
    };
    xhr.send();
}


function cancelPurchase(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "cancelPurchase.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            location.reload(); // Reload the page to reflect the updated content
        }
    };
    xhr.send();
}



getResults();
setInterval(getResults, 5000);







