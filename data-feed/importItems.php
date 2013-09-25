#!/usr/bin/php
<?php

$DBH = new PDO("mysql:host=127.0.0.1;dbname=HackerNews", 'root', 'O1211990!');
$STH = $DBH->query("SELECT * FROM hacker_news_providers WHERE state = 1");
$STH->setFetchMode(PDO::FETCH_OBJ);

$providers = $STH->fetchAll();

include '../src/HackerNews/Classes/Feed.php';

$feed = new \HackerNews\Classes\Feed();

foreach($providers as $provider) {	
	$feed->setUri($provider->rss_uri);

	echo $provider->id;

	$feedItems = $feed->getItem();

	$foo = $DBH->prepare("INSERT INTO hacker_news_providers_items 
		(title, link, pub_date, provider_id, provider_category)
		values
		(:title, :link, :pub_date, :provider_id, :provider_category)");  

	foreach($feedItems as $feedItem) {	
		$foo->bindParam(':title', $feedItem['title']);
		$foo->bindParam(':link', $feedItem['link']);
		$foo->bindParam(':pub_date', $feedItem['pub_date']);
		$foo->bindParam(':provider_id', $provider->id);
		$foo->bindParam(':provider_category', $provider->provider_category);

		$foo->execute();
		print_r($foo->errorInfo());
	}

}