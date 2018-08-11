<?php
container()['csrf'] = function () {
    return new \Slim\Csrf\Guard('csrf', $storage, new \App\Kernel\View\CsrfError(), 200, 16, true);
};
app()->add(dependency('csrf'));