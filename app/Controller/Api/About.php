<?php

namespace App\Controller\Api;

use App\Controller\BaseController;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class About extends BaseController
{

    public function __invoke(Request $request, Response $response, $args): ResponseInterface
    {
        return $response->withJson(['ok' => true, 'message' => 'slim-app api route sample']);
    }
}