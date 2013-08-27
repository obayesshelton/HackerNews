<?php

namespace HackerNews\Classes;

class Feed
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

	public function getItem() {
		$xmlDoc = new \DOMDocument();
		$xmlDoc->load($this->uri);

		$itemsRaw = $xmlDoc->getElementsByTagName('item');

		$i = 0;

		while($i <= 10) {
		  
		  $items[$i]['title'] 			 = $itemsRaw->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
		  $items[$i]['link'] 			 = $itemsRaw->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;
		  $items[$i]['pub_date'] 		 = $itemsRaw->item($i)->getElementsByTagName('pubDate')->item(0)->childNodes->item(0)->nodeValue;
		  $items[$i]['content_owner_id'] = 1;

		  $i++;

		}

		return $items;
	}

}