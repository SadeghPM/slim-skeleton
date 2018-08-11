<?php
namespace App\Controller;


use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Csrf extends BaseController
{

    public function __invoke(Request $request, Response $response, $args): ResponseInterface
    {
        return view($response, 'csrf.twig');
    }
}