<?php

use Psr\Htpp\Message\ResponseInterface as Response;
use Psr\Htpp\Message\ServerRequestInterface as Request;
use Model\Users;


class UserController
{
    public function index($request, $response)
    {

        $users = Users::getAllUsers();

        $response->getBody()->write(json_encode($users));

        return $response->withHeader('Content-type', 'application/json');
    }

    public function show($request, $response, $args)
    {

        $id = (int) $args['id'];

        if (filter_var($id, FILTER_VALIDATE_INT))
        {
            $users = Users::getUser($id);

            $response->getBody()->write(json_encode($users));

            $response->withHeader('Content-type', 'application/json');
        }

        return $response->withHeader('Content-type', 'application/json');
    }

    public function create($request, $response, $args)
    { 

        $data = json_decode($request->getBody()->getContents());


        $sanitizedData = [];

        foreach ($data as $field => $data)
        {
            if ($field == 'name')
            {
                $sanitizedData[$field] = filter_var($data, FILTER_SANITIZE_STRING);
            }

            elseif($field == 'role')
            {
                $sanitizedData[$field] = filter_var($data, FILTER_SANITIZE_STRING);
            }
        }

        Users::createUser($sanitizedData);

        $response->getBody();

        return $response->withHeader('Content-type', 'application/json')
        ->withStatus(201);
    }
}