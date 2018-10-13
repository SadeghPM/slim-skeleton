<?php
/**
 * Created by PhpStorm.
 * User: sadeghpm
 * Date: 10/11/18
 * Time: 3:52 PM
 */

namespace App\Kernel\Util;


use Dopesong\Slim\Error\Whoops;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Error extends \Slim\Handlers\Error
{
    /**
     * @var Whoops
     */
    private $whoops;

    public function __construct(Whoops $whoops)
    {
        $this->whoops = $whoops;
    }

    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        \Exception $exception
    ) {
        return $this->whoops->__invoke($request, $response, $exception);
    }
}