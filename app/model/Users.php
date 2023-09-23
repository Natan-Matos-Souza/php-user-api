<?php

namespace Model;

class Users extends Model
{
    public static function getAllUsers()
    {
        try {
            $databaseConnection = Users::connectToDatabase();
        } catch(Exception $e)
        {
            print $e;
        }

        $users = $databaseConnection->query("SELECT * FROM users")->fetch_all(MYSQLI_ASSOC);

        return $users;
    }

    public static function getUser(int $id)
    {
        try {
            $databaseConnection = Users::connectToDatabase();
        } catch(Exceprtion $e)
        {
            print $e;
        }

        $databaseSearch = $databaseConnection->query("SELECT * FROM users WHERE id=$id");

        ($databaseSearch->num_rows < 1) ? $users = "Usuário não encontrado" : $users = $databaseSearch->fetch_array(MYSQLI_ASSOC);

        return $users;

    }

    public static function createUser(array $data)
    {

        try {
            $databaseConnection = Users::connectToDatabase();
        } catch(Exception $e)
        {
            print $e;
        }

        if (array_key_exists('name', $data) && array_key_exists('role', $data))
        {
            $databaseConnection->query("INSERT INTO users (name, role) VALUES ('$data[name]', '$data[role]')");
        }
    }
}