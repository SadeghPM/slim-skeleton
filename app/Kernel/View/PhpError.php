<?php

namespace App\Kernel\View;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class PhpError
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, \Throwable $exception)
    {
        logger()->error($exception->getMessage(), ['exception' => $exception]);

        return view($response->withStatus(500), "errors/500.twig");
    }
}