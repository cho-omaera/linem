<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Guzzle\Client as GuzzleClient;

function __invoke(Request $request, Response $response, callable $next) {
    $client = new GuzzleClient();

    $response = $next($request, $response);

    return $response;
};
