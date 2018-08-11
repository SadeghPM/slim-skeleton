<?php

namespace App\Controller;


use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

abstract class BaseController
{

    public function __construct(ContainerInterface $container)
    {
        //setup your global dependencies

    }

    abstract public function __invoke(Request $request, Response $response, $args): ResponseInterface;
}