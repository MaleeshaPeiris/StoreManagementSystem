<?php
// Name:Maleesha Peiris
// Student ID:104081177
// Transform the XML and output the result for the item catalogue and cart

$url = '../../data/goods.xml';


// Load XML and XSL files
$xml = new DOMDocument;
$xml->load($url);

$xsl = new DOMDocument;
$xsl->load('goods.xsl');

// Configure the transformer
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); // Attach the XSL rules


echo $proc->transformToXML($xml);
?>


