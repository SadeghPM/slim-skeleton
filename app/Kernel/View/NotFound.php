<?php

namespace App\Kernel\View;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class NotFound
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        return view($response->withStatus(404), "errors/404.twig");
    }
}