
var xhr = false;
if (window.XMLHttpRequest) {
	xhr = new XMLHttpRequest();
}
else if (window.ActiveXObject) {
	xhr = new ActiveXObject("Microsoft.XMLHTTP");
}


function addItem() {
	
	var itemName = document.getElementById('itemname').value;
	var itemPrice = document.getElementById('itemprice').value;
	var itemQuantity = document.getElementById('itemquantity').value;     
	var itemDescription = document.getElementById('itemdescription').value;
	
	xhr.open("GET", "listing.php?itemname=" + itemName + "&itemprice=" + itemPrice + "&itemquantity=" + itemQuantity + "&itemdescription="+ itemDescription  + "&id=" + Number(new Date), true);

	xhr.onreadystatechange = testInput;
	xhr.send(null);
	
}

function reset() {
	
	document.getElementById('itemname').value = "";
	document.getElementById('itemprice').value = "";
	document.getElementById('itemquantity').value = "";    
	document.getElementById('itemdescription').value = "";
	
}

function testInput() {
	
	if ((xhr.readyState == 4) && (xhr.status == 200)) {
		document.getElementById('msg').innerHTML = xhr.responseText;
	}
	
}