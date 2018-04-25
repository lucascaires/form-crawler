<?php


	libxml_use_internal_errors(true);
	$doc = new DOMDocument();
	$doc->loadHTMLFile("http://www.henrimar.com.br/contato/");
	$items = $doc->getElementsByTagName('input');
	for ($i = 0; $i < $items->length; $i++) {
    	var_dump($items->item($i)->getAttribute('name'));
    	var_dump($items->item($i)->getAttribute('type'));
    	var_dump($items->item($i)->getAttribute('placeholder'));
	}
?>