
<?php
// Name:Maleesha Peiris
// Student ID:104081177
// Transform the XML and output the result for the sold data information for the manager to process

session_start();

if (isset($_SESSION['manager_id']) ){

    $url = '../../data/goods.xml';

    $xml = new DOMDocument;
    $xml->load($url);
    
    $xsl = new DOMDocument;
    $xsl->load('soldgoods.xsl');
    
    $proc = new XSLTProcessor;
    $proc->importStyleSheet($xsl); 
    
    echo $proc->transformToXML($xml);

}


?>


