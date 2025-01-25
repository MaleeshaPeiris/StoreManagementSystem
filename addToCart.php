<?php
// Name:Maleesha Peiris
// Student ID:104081177
// manipulates the goods.xml data file accordingly when a user adds items to the cart
if (isset($_POST['itemId'])) {
    $itemNumber = $_POST['itemId'];
    $xmlFile = '../../data/goods.xml';
    
    if (file_exists($xmlFile)) {
        $doc = new DOMDocument();
        $doc->load($xmlFile);
        $items = $doc->getElementsByTagName('item');


        foreach ($items as $item) {
            $idElements = $item->getElementsByTagName('id');
            if ($idElements->length > 0){
                $number = $idElements->item(0)->textContent;
                if ($number == $itemNumber) {

                    $quantityAvailable = $item->getElementsByTagName('itemquantity')->item(0);
                    $quantityOnHold = $item->getElementsByTagName('item-quantity-on-hold')->item(0);

    
                    if ((int)$quantityAvailable->textContent > 0) {
                        // Decrease quantityAvailable and increase quantityOnHold
                        $quantityAvailable->nodeValue = (int)$quantityAvailable->textContent - 1;
                        $quantityOnHold->nodeValue = (int)$quantityOnHold->textContent + 1;
    

                        $doc->formatOutput = true;

                        $doc->save($xmlFile);

                        echo "Item added to cart successfully!";
                    } else {
                        echo "Sorry, this item is not available for sale.";
                    }
 
                    break;
                }
            }


        }


    } else {
        echo "Error: Goods file not found.";
    }
} else {
    echo "Invalid request.";
}
?>
