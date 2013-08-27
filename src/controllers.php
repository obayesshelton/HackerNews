<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {

    return $app['twig']->render('index.twig', array());

})->bind('homepage');

$app->get('/items/provider/', function(Request $request) use ($app) {

}

$app->get('/items/all/', function(Request $request) use ($app) {

	$hackerNewsItems = new HackerNews\Classes\Feed('http://', 'hackernews.local', '/rss.xml');

    $itemArray = $hackerNewsItems->getItem();

    $item = new HackerNews\Classes\Item();
    
    $itemsCleanArray = array();

    foreach($itemArray as $itemRaw) {
        $itemsCleanArray[] = $item->createInstanceFromRow($itemRaw);
    }

    $rtn['success'] = true;
    $rtn['items_count'] = count($itemsCleanArray);
    $rtn['items'] = $itemsCleanArray;

    return new Response(
        json_encode($rtn),
        200,
        ['Content-Type' => 'application/json']
    );
});


$app->get('/contentproviders/all', function(Request $request) use ($app) {

    $rtn['success'] = true;
    $rtn['items'] = array(
        1 => array(
            'id' => '1',
            'name' => 'wired',
            'bio' => 'foo bar',
            'title' => 'wired',
            'uri' => 'www.wired.com',
            'rssUri' => 'www.wired.com/rss.xml',
            'logoUri' => 'foo.jpg',
        ),
        2 => array(
            'id' => '2',
            'name' => 'enadget',
            'bio' => 'bar foo',
            'title' => 'engadget',
            'uri' => 'www.engadget.com',
            'rssUri' => 'www.engadget.com/rss.xml',
            'logoUri' => 'foo.jpg',
        )
    );

    return new Response(
        json_encode($rtn),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->error(function (\Exception $e, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    $page = 404 == $code ? '404.html' : '500.html';

    return new Response($app['twig']->render($page, array('code' => $code)), $code);
});
