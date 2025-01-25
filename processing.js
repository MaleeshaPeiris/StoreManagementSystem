
function getResults(){
    var xhr = new XMLHttpRequest(); 
    xhr.open("POST", "getSoldData.php", true); 
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
        getData(xhr); 
        }
    };
    xhr.send(null); 
    }

function getData(xhr) {
    if (xhr.readyState == 4 && xhr.status == 200) {
        document.getElementById('sold_items').innerHTML = xhr.responseText;
    }
}

function processGoods(){
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "processGoods.php", true);
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

getResults();
