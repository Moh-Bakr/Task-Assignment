<?php

class database
{
    public static function GetConnection()
    {
        $host = "localhost";
        $database_name = "scandiweb";
        $username = "bakr";
        $password = "060022898";
        $conn = null;
        try {
            $conn = new PDO("mysql:host=" . $host . ";dbname=" . $database_name, $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Database could not be connected: " . $exception->getMessage();
        }
        return $conn;
    }

    public static function EXCQuery($query, $params = [])
    {
        $statement = self::GetConnection()->prepare($query);
        $check = $statement->execute($params);
        if (explode(' ', $query)[0] == "SELECT") {
            return $statement->fetchAll();
        } else {
            return $check;
        }
    }
}