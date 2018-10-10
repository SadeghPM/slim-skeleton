<?php

namespace App\Kernel\Util;


use Slim\Views\Twig;

class PaginatorTwigView
{
    /**
     * @var Twig
     */
    private $twig;
    private $view;
    private $data;

    public function __construct()
    {
        $this->twig = dependency('view');
    }

    public function make($view, $data = [])
    {
        $this->view = $view;
        $this->data = $data;

        return $this;
    }

    public function render()
    {
        return $this->twig->fetch($this->view, $this->data);
    }
}