<?php

namespace HackerNews\Classes;

class GetFeed
{
	public $host;

	public $protocol;

	public $path;

	public $uri;

	public function __construct($protocol = null, $host = null, $path = null) {
		$this->protocol = $protocol;
		$this->host     = $host;
		$this->path     = $path;

		$this->uri = $protocol . $host . $path;

	}

	public function getItems() {
		$xml_source = file_get_contents($this->uri);
        $x = simplexml_load_string($xml_source);

        if(count($x) == 0) {
            return false;
        }

        $items = array();

        $i = 0;

        foreach($x->channel->item as $item) {
        	$items[$i] = $this->xml2array($item);
        	$i++;
       	}
       	
       	return $items;

	}

	function xml2array ( $xmlObject, $out = array ()) {
		foreach ((array) $xmlObject as $index => $node) {
			$out[$index] = (is_object($node)) ? $this->xml2array($node) : $node;
		}

		return $out;
	}

}