<?php
// define your api routes
app()->group(
    '/api/v1',
    function () {
        app()->get('/', \App\Controller\Api\About::class)->setName('api.about');
        app()->post('/hello',\App\Controller\Api\Hello::class)->setName('api.hello')->add(dependency('csrf'));
    }
);
