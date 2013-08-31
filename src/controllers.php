<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

$app->get('/', function () use ($app) {

    return $app['twig']->render('index.twig', array());

})->bind('homepage');


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
    $rtn->providers = $categories;

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
