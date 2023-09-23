<?php

//The first parameter it's URI. The second, it's the controller class and method.
$app->get('/user', '\UserController:index');

$app->get('/user/{id}', '\UserController:show');

$app->post('/user', '\UserController:create');