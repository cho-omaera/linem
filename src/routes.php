<?php

use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->post('/add/{address}', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$app->get('/balance/{address}', function (Request $request, Response $response, array $args) {
    $address = $args['address'];

    $client

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});
