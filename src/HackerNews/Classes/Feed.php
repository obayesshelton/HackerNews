<?php

namespace HackerNews\Classes;

class Feed
{
	public $uri;

	public function __construct() {
		
	}

	public function setUri($value) {
		$this->uri = $value;
	}

	public function getUri() {
		return $this->uri;
	}

	public function getItem() {
		$xmlDoc = new \DOMDocument();
		$xmlDoc->load($this->uri);

		$itemsRaw = $xmlDoc->getElementsByTagName('item');

		$i = 0;

		while($i <= 10) {
		  
		  $items[$i]['title'] 			 = $itemsRaw->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
		  $items[$i]['link'] 			 = $itemsRaw->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
		  $items[$i]['pub_date'] 		 = $itemsRaw->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
		  $items[$i]['provider_id'] = 4;
		  $items[$i]['provider_id'] = 4;

		  $i++;

		}

		return $items;
	}

}