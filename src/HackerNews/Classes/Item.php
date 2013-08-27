<?php

namespace HackerNews\Classes;

class Item
{
	public $title;

	public $link;

	public $pubDate;

	public $contentOwnerId;

	public function __construct() {
	
	}

	public function getTitle() {
		return $this->title;
	}

	private function setTitle($title) {
		$this->title = $title;
	}

	public function getLink() {
		return $this->link;
	}

	private function setLink($link) {
		$this->link = $link;
	}

	public function getPubDate() {
		return $this->pubDate;
	}

	private function setPubDate($pubDate) {
		$this->pubDate = $pubDate;
	}

	public function getContentOwnerId() {
		return $this->contentOwnerId;
	}

	private function setContentOwnerId($contentOwnerId) {
		$this->contentOwnerId = $contentOwnerId;
	}

	public function createInstanceFromRow($row) {
		$this->setTitle($row['title']);
		$this->setLink($row['link']);
		$this->setPubDate($row['pub_date']);
		$this->setContentOwnerId($row['content_owner_id']);

		return $this;
	}

}