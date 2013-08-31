<?php

namespace HackerNews\Classes;

class Provider
{
	public $id;

	public $name;

	public $bio;

	public $title;

	public $uri;

	public $rssUri;

	public $logoUri;

	public $providerCategoryId;

	public function __construct() {
	
	}

	public function getId() {
		return $this->id;
	}

	protected function setId($id) {
		$this->id = $id;
	}

	public function getName() {
		return $this->name;
	}

	protected function setName($name) {
		$this->name = $name;
	}

	public function getBio() {
		return $this->bio;
	}

	protected function setBio($bio) {
		$this->bio = $bio;
	}

	public function getTitle() {
		return $this->title;
	}

	protected function setTitle($title) {
		$this->title = $title;
	}

	public function getUri() {
		return $this->uri;
	}

	public function setUri($uri) {
		$this->uri = $uri;
	}

	public function getRssUri() {
		return $this->rssUri;
	}

	public function setRssUri($rssUri) {
		$this->rssUri = $rssUri;
	}

	public function getLogoUri() {
		return $this->logoUri;
	}

	protected function setLogoUri($logoUri) {
		$this->logoUri = $logoUri;
	}

	public function getProviderCategoryId() {
		return $this->providerCategoryId;
	}

	private function setProviderCategoryId($providerCategoryId) {
		$this->providerCategoryId = $providerCategoryId;
	}

	public function createInstanceFromRow($row) {
		$this->setId($row['id']);
		$this->setName($row['name']);
		$this->setBio($row['bio']);
		$this->setTitle($row['title']);
		$this->setUri($row['uri']);
		$this->setLogoUri($row['logo_uri']);
		$this->setProviderCategoryId($row['provider_catgory']);

		return $this
	}

}