
<?php

// Name:Maleesha Peiris
// Student ID:104081177
// adds the items details entered by the manager to the goods.xml file

header('Content-Type: text/xml');
session_start();

if (isset($_SESSION['manager_id']) ){
     
    if (isset($_GET['itemname'],$_GET['itemprice'],$_GET['itemquantity'], $_GET['itemdescription'])) {

        $itemName = $_GET["itemname"];
        $itemPrice = $_GET["itemprice"];
        $itemQuantity = $_GET["itemquantity"];
        $itemDescription = $_GET["itemdescription"];
        $errMsg = "";

        if (empty($itemName)||empty($itemPrice)||empty($itemQuantity)|| empty($itemDescription)) {
            $errMsg .= "You must input all the values. <br />";
        }

        else if (!is_numeric($itemQuantity) || !is_numeric($itemPrice)) {
            $errMsg .= "Enter numeric values to Item quantity and Item Price<br />";
        }


        if ($errMsg != "") {
                echo $errMsg;
        }
        else {
        
        $xmlfile = '../../data/goods.xml';
        $doc = new DomDocument();
        $doc->preserveWhiteSpace = FALSE;
        
        if (!file_exists($xmlfile)){ // if the xml file does not exist, create a root node $customers
            $items = $doc->createElement('items');
            $doc->appendChild($items);
            $newItemId = 1;
        }
        else { // load the existing xml file
            
            $doc->load($xmlfile);
            $items = $doc->getElementsByTagName('item');
            $lastItem = $items->item($items->length - 1);// extract information of the last item on the list
            if ($lastItem) // item information exists in the data file
            {
                $lastItemId = $lastItem->getElementsByTagName('id')->item(0)->nodeValue;
                $newItemId = (int) $lastItemId + 1;  // Increment the last ID
            }
            else // no item information in the file
            {
                $newItemId = 1;
            }
            
        }

        //create an item node under items node
        $items = $doc->getElementsByTagName('items')->item(0);
        $item = $doc->createElement('item');
        $items->appendChild($item);

        // create an ID node ....
        $IDElement = $doc->createElement('id');
        $item->appendChild($IDElement);
        $idValue = $doc->createTextNode($newItemId);
        $IDElement->appendChild($idValue);

        // create a item name node ....
        $itemNameElement = $doc->createElement('itemname');
        $item->appendChild($itemNameElement);
        $itemNameValue = $doc->createTextNode($itemName);
        $itemNameElement->appendChild($itemNameValue);

        //create a price node ....
        $itemPriceElement = $doc->createElement('itemprice');
        $item->appendChild($itemPriceElement);
        $itemPriceValue = $doc->createTextNode($itemPrice);
        $itemPriceElement->appendChild($itemPriceValue);
        
        //create a quantity node ....
        $itemQuantityElement = $doc->createElement('itemquantity');
        $item->appendChild($itemQuantityElement);
        $itemQuantityValue = $doc->createTextNode($itemQuantity);
        $itemQuantityElement->appendChild($itemQuantityValue);

        //create a description node ....
        $itemDescriptionElement = $doc->createElement('itemdescription');
        $item->appendChild($itemDescriptionElement);
        $itemDescriptionValue = $doc->createTextNode($itemDescription);
        $itemDescriptionElement->appendChild($itemDescriptionValue);

            //create a quantity on hold node ....
        $itemQuantityOnHoldElement = $doc->createElement('item-quantity-on-hold');
        $item->appendChild($itemQuantityOnHoldElement);
        $itemQuantityOnHoldValue = $doc->createTextNode("0");
        $itemQuantityOnHoldElement->appendChild($itemQuantityOnHoldValue);

        //create a items sold node ....
        $itemsSoldElement = $doc->createElement('items-sold');
        $item->appendChild($itemsSoldElement);
        $itemsSoldValue = $doc->createTextNode("0");
        $itemsSoldElement->appendChild($itemsSoldValue);
        
        //save the xml file
        $doc->formatOutput = true;
        $doc->save($xmlfile);  
        echo "The item has been listed in the system, the item number is $newItemId" ;
        
        } 

        //https://mercury.swin.edu.au/cos80021/s104081177/lab09/register.htm
    }


}

?>