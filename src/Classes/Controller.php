<?php
namespace App\Classes;

use Slim\Http\Request;
use Slim\Http\Response;

class Controller extends Client
{
    /**
     * heart beat request.
     * @param Request $request
     * @param Response $response
     * @param array|null $args
     * @return static
     */
    public function heartbeat(Request $request, Response $response, $args)
    {
        $retArray = $this->get('/heartbeat');
        return $response->withJson($retArray);
    }
}