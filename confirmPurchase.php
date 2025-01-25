
<?php
// Name:Maleesha Peiris
// Student ID:104081177
// manipulates the goods.xml data file when the user confirms the purcase
$xmlFile = '../../data/goods.xml';

if (file_exists($xmlFile)) {
    $doc = new DOMDocument();
    $doc->load($xmlFile);
    $items = $doc->getElementsByTagName('item');
    $amountToPay=0;
    foreach ($items as $item) {
        
        $idElementHold = $item->getElementsByTagName('item-quantity-on-hold');
        $idElementsSold = $item->getElementsByTagName('items-sold');
        if ($idElementHold->length > 0 && $idElementsSold->length > 0 ){
            $quantityOnHold = $idElementHold->item(0)->textContent;
            if ((int)$quantityOnHold > 0) {
                $quantityOnHold = $item->getElementsByTagName('item-quantity-on-hold')->item(0);
                $itemPrice = $item->getElementsByTagName('itemprice')->item(0);
                $quantitySold = $item->getElementsByTagName('items-sold')->item(0);


                $quantitySold->nodeValue = (int)$quantitySold->textContent + (int)$quantityOnHold->textContent;
                $amountToPay = (int)$quantityOnHold->textContent* (int)$itemPrice->textContent + $amountToPay;
                $quantityOnHold->nodeValue = 0;
                $doc->save($xmlFile);

                //echo "Your purchase has been confirmed and total amount due to pay is $amountToPay!";


            }
        }


    }
    if($amountToPay > 0){
        echo "Your purchase has been confirmed and total amount due to pay is $amountToPay!";
    }


} else {
    echo "Error: Goods file not found.";
}

?>
