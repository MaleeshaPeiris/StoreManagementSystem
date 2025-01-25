<?php

// Name:Maleesha Peiris
// Student ID:104081177
// handles the procesing done by the manager on the sold item data

$xmlFile = '../../data/goods.xml';

if (file_exists($xmlFile)) {
    $doc = new DOMDocument();
    $doc->load($xmlFile);
    $items = $doc->getElementsByTagName('item');

    foreach ($items as $item) {

        $idElementHold = $item->getElementsByTagName('item-quantity-on-hold');
        $idElementsSold = $item->getElementsByTagName('items-sold');
        $idElementsQuantity = $item->getElementsByTagName('itemquantity');
        if ($idElementsSold->length > 0 ){

            $quantitySold = $idElementsSold->item(0)->textContent;
            if ((int)$quantitySold > 0) {

                $quantitySold = $item->getElementsByTagName('items-sold')->item(0);

            
                $quantitySold->nodeValue = 0;

                $doc->save($xmlFile);
                echo "Sold items cleared!";
            }
        }
        if ($idElementHold->length > 0 && $idElementsQuantity->length > 0 ){
            $quantityOnHold = $idElementHold->item(0)->textContent;
            $quantity = $idElementsQuantity->item(0)->textContent;
            if ((int)$quantitySold == 0 && (int)$quantity == 0) {
                $item->parentNode->removeChild($item);
                $doc->save($xmlFile);
                echo "Empty items removed";
            }
        }
    }
} else {
    echo "Error: Goods file not found.";
}

?>
