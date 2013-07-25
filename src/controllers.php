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

$app->get('/remote/{idDirty}', function ($idDirty) use ($app) {

	$idClean = explode('-' , $idDirty);

	$commentsUrl = 'http://hndroidapi.appspot.com/nestedcomments/format/json/id/' . $idClean[0];

	$commentsJson = file_get_contents($commentsUrl);
	$comments = json_decode($commentsJson, TRUE);

	return $app['twig']->render('comments.twig', array(
    	'comments' => $comments
    ));

});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
