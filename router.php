<?php

$app->group('',function () use ($app) {
    $namespace = 'App\Controller\\';
    $app->get('/home/{id:[0-9]+}', $namespace.'Home:index');
    $app->post('/home/store', $namespace.'Home:create');
	$app->post('/py/members', $namespace.'Py:members');
    $app->get('/sf/select',$namespace.'Sf:select');
    $app->get('/sf/parsenum',$namespace.'Sf:parsenum');
    $app->get('/sf/poup',$namespace.'Sf:poup');
    $app->get('/sf/insert',$namespace.'Sf:insert');
    $app->get('/sf/fast',$namespace.'Sf:fast');

})->add(function($request, $response, $next){
       // file_put_contents('d:/aaa.log','before',FILE_APPEND);
        $response = $next($request, $response);
        //file_put_contents('d:/aaa.log','after',FILE_APPEND);
        return $response;
});


$app->group('/admin',function () use ($app) {
    $namespace = 'App\Controller\\';
    $app->get('/home/{id:[0-9]+}', $namespace.'Home:index');
    $app->post('/home/store', $namespace.'Home:create');

});
