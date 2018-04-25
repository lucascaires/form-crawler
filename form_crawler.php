<?php
	libxml_use_internal_errors(true);
	class FormCrawler extends DOMDocument {		

		private $inputs = array();
		private $attrs = array();
		private $xpath = '//';
		private $url = '';

		function __construct($url) {			
	        $this->url = $url; 
	    }
	    public function build() {
	    	$this->loadHTMLFile($this->url);		
	    	$xpath = new DOMXPath($this);
	    	$nodes = $xpath->query($this->xpath);	    	
	    	for($i = 0; $i < $nodes->length; $i++) {
	    		$node = $nodes->item($i);
	    		$input = [];
	    		$input['tag'] = $node->nodeName;
	    		foreach($this->attrs as $attr) {
	    			$input[$attr] = $node->getAttribute($attr);
	    		}	    		
	    		array_push($this->inputs, $input);
	    	}
	    	return $this;	    	
	    }

	    public function attrs($attrs) {
	    	$this->attrs = $attrs;
	    	return $this;
	    }

	    public function fields($fields) {
	    	$this->xpath = implode(" | ", preg_filter('/^/', '//', $fields));	 	
	    	return $this;
	    }

	    public function get() {
	    	return $this->build()->inputs;
	    }

	    public function getJson() {
	    	return json_encode($this->build()->inputs);
	    }
	}

	$form = new FormCrawler("http://www.henrimar.com.br/contato/");
	echo $form->fields(['input', 'select', 'textarea'])->attrs(['type', 'name', 'value'])->getJson();


?>