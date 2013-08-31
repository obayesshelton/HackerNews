<?php

namespace HackerNews\Classes;

class Category
{

	public $id;

	public $name;

	public $providerCount;

	public $userCount;

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

	public function getProviderCount() {
		return $this->providerCount;
	}

	protected function setProviderCount($providerCount) {
		$this->providerCount = $providerCount;
	}

	public function getUserCount() {
		return $this->userCount;
	}

	protected function setUserCount($userCount) {
		$this->userCount = $userCount;
	}

	public function createInstanceFromRow($row) {
		$this->setId($row['id']);
		$this->setName($row['name']);
		$this->setProviderCount($row['provider_count']);
		$this->setUserCount($row['user_count']);

		return $this
	}

}