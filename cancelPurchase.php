
<?php
// Name:Maleesha Peiris
// Student ID:104081177
// manipulates the goods.xml data file when the user cancels the purcase
$xmlFile = '../../data/goods.xml';

if (file_exists($xmlFile)) {
    $doc = new DOMDocument();
    $doc->load($xmlFile);
    $items = $doc->getElementsByTagName('item');

    foreach ($items as $item) {

        $idElementHold = $item->getElementsByTagName('item-quantity-on-hold');
        $idElementsquantity = $item->getElementsByTagName('itemquantity');
        if ($idElementHold->length > 0 && $idElementsquantity->length > 0 ){
            $quantityOnHold = $idElementHold->item(0)->textContent;
            if ((int)$quantityOnHold > 0) {
                $quantityOnHold = $item->getElementsByTagName('item-quantity-on-hold')->item(0);
                $quantity = $item->getElementsByTagName('itemquantity')->item(0);


                $quantity->nodeValue = (int)$quantity->textContent + (int)$quantityOnHold->textContent;
                $quantityOnHold->nodeValue = 0;
                $doc->save($xmlFile);

                echo "your purchase request has been cancelled, welcome to shop next time!";


            }
        }


    }

} else {
    echo "Error: Goods file not found.";
}

?>
