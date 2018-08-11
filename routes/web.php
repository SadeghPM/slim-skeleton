<?php
// app routes

app()->get('/[{name}]', \App\Controller\Home::class)->setName('home');
app()->get('/csrf/test', \App\Controller\Csrf::class)->setName('csrf');
