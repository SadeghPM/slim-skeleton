<?php

namespace App\Controller;


use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class Home extends BaseController
{
    public function __construct(ContainerInterface $container)
    {
        parent::__construct($container);
    }

    public function __invoke(Request $request, Response $response, $args): ResponseInterface
    {
        logger()->info('home controller');
        logger()->info('The args:', $args ?? $request->getParsedBody());
        $name = input('name',$args?$args['name']:null);

        return view($response, 'home.twig', compact('name'));
    }
}