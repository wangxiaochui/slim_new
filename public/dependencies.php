<?php

$container['db'] = function ($container) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(APP_PATH.'/views', [
       // 'cache' => '../storage/cache'
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $container['router'],
        $container['request']->getUri()
    ));

    return $view;
};

$container['errorHandler'] = function ($container) {
    return function ($request, $response, $exception) use ($container) {
        return $container['response']->withStatus(500)
            ->withHeader('Content-Type', 'text/html')
            ->write($exception->getMessage());
    };
};
