<?php

namespace HackerNews\Classes;

class Item
{
	public $id;

	public $title;

	public $link;

	public $pubDate;

	public $providerId;

	public $providerCategoryId;

	public function __construct() {
	
	}

	public function getId() {
		return $this->id;
	}

	protected function setId($id) {
		$this->id = $id;
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

	public function getProviderId() {
		return $this->providerId;
	}

	private function setProviderId($providerId) {
		$this->providerId = $providerId;
	}

	public function getProviderCategoryId() {
		return $this->providerCategoryId;
	}

	private function setProviderCategoryId($providerCategoryId) {
		$this->providerCategoryId = $providerCategoryId;
	}

	public function createInstanceFromRow($row) {
		$this->setTitle($row['id']);
		$this->setTitle($row['title']);
		$this->setLink($row['link']);
		$this->setPubDate($row['pub_date']);
		$this->setProviderId($row['provider_id']);
		$this->setProviderCategoryId($row['provider_catgory']);

		return $this;
	}

}