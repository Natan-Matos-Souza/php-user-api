<?php

namespace Model;

class Model
{
    public static function connectToDatabase()
    {
        $databaseConfig = getDatabaseConfig();

        $databaseConnection = new \mysqli(
            $databaseConfig['databaseHost'],
            $databaseConfig['databaseUser'],
            $databaseConfig['databasePass'],
            $databaseConfig['databaseName']
        );

        return $databaseConnection;
    }

    public static function endConnection()
    {

    }
}

function getDatabaseConfig()
{
    return require "databaseConfig.php";
}