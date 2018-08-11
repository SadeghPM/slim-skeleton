<?php

namespace App\Kernel\View;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class CsrfError
{
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        logger()->error('csrf validation error', ['request' => $request->getParsedBody()]);

        return view($response->withStatus(406), "errors/406.twig");
    }
}