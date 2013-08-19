<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {

    return $app['twig']->render('index.twig', array());

})->bind('homepage');

$app->get('/items', function () use ($app) {

	$hackerNewsItems  = new HackerNews\Classes\GetFeed('https://', 'www.hnsearch.com', '/rss');

    return $app['twig']->render('items.twig', array(
    	'items' => $hackerNewsItems->getItems()
    ));

});

$app->get('/items-engadget', function () use ($app) {

    
/**
*
* From http://www.w3schools.com/php/php_ajax_rss_reader.asp
* edited by repat <repat[at]repat[dot]de>, Nov2012
*
*/

// Set Feed URL, e.g. heise.de 
$xml = ("http://www.engadget.com/rss.xml");

// --- Don't change anything after this to line 23 --- //
$xmlDoc = new DOMDocument();
$xmlDoc->load($xml);

//get and output "<item>" elements
$x = $xmlDoc->getElementsByTagName('item');

$i = 0;

while($i <= 10) {
  
  $items[$i]['title'] = $x->item($i)->getElementsByTagName('title')->item(0)->childNodes->item(0)->nodeValue;
  $items[$i]['link'] = $x->item($i)->getElementsByTagName('link')->item(0)->childNodes->item(0)->nodeValue;

  $i++;

}

    return $app['twig']->render('items-engadget.twig', array(
        'items' => $items
    ));

});

$app->get('/remote/{idDirty}', function ($idDirty) use ($app) {

	$idClean = explode('-' , $idDirty);

	$commentsUrl = 'http://node-hnapi.herokuapp.com/item/' . $idClean[0];

	$comments = json_decode(file_get_contents($commentsUrl), TRUE);

    $nestComments = new HackerNews\Classes\NestComments();

    $rtn['html'] =  $nestComments->makeList($comments['comments']);
    $rtn['success'] = true;

    return $app->json($rtn, 201);

});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
