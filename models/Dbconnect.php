<?php

namespace Models;

class Dbconnect
{

    public function dbconnect()
    {
        $servername = "127.0.0.1";
        $database = "illife_shopingo";
        $username = "root";
        $serverpassword = "";
        // Создаем соединение
        $conn = mysqli_connect($servername, $username, $serverpassword, $database);
        // Проверяем соединение
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
}
