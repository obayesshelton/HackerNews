<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {

    return $app['twig']->render('index.twig', array());

})->bind('homepage');

$app->get('/read/{id}', function ($id) use ($app) {

    return $app['twig']->render('items.twig', array(
        'id' => $id
    ));

});


$app->get('/categories/all', function(Request $request) use ($app) {

    $sql = "SELECT * FROM hacker_news_provider_categories";
    $categories = $app['db']->fetchAll($sql, array());

    $rtn = new \stdClass();
    $rtn->success = true;
    $rtn->categories = $categories;

    return new Response(
        json_encode($rtn),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->get('/providers/all', function(Request $request) use ($app) {

    $sql = "SELECT * FROM hacker_news_providers";
    $providers = $app['db']->fetchAll($sql, array());

    $rtn = new \stdClass();
    $rtn->success = true;
    $rtn->providers = $providers;

    return new Response(
        json_encode($rtn),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->get('/providers/categorid/{id}', function(Request $request, $id) use ($app) {

    $sql = "SELECT * FROM hacker_news_providers WHERE provider_category = " . $id . "";
    $providers = $app['db']->fetchAll($sql, array());

    $rtn = new \stdClass();
    $rtn->success = true;
    $rtn->providers = $providers;

    return new Response(
        json_encode($rtn),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->get('/provider/id/{id}', function(Request $request, $id) use ($app) {

    $sql = "SELECT * FROM hacker_news_providers WHERE id = " . $id . "";
    $provider = $app['db']->fetchAll($sql, array());

    $rtn = new \stdClass();
    $rtn->success = true;
    $rtn->provider = $provider;

    return new Response(
        json_encode($rtn),
        200,
        ['Content-Type' => 'application/json']
    );
});

$app->get('/items/provider-id/{id}', function(Request $request, $id) use ($app) {

    $sql = "SELECT * FROM hacker_news_providers_items WHERE provider_id = " . $id . "";
    $items = $app['db']->fetchAll($sql, array());

    $rtn = new \stdClass();
    $rtn->success = true;
    $rtn->items = $items;

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
