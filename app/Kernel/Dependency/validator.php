<?php
container()['validator'] = function ($c) {
    /** @var Illuminate\Database\Capsule\Manager $capsule */
    $capsule = dependency('db');
    $presence = new \Illuminate\Validation\DatabasePresenceVerifier($capsule->getDatabaseManager());
    $translator = dependency(\Illuminate\Translation\Translator::class);
    $validation = new \Illuminate\Validation\Factory($translator, new \Illuminate\Container\Container());
    $validation->setPresenceVerifier($presence);

    return $validation;
};