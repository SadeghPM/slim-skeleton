<?php

namespace App\Kernel\View;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class MethodNotAllowed
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $method)
    {
        return view($response->withStatus(405), "errors/405.twig");
    }
}