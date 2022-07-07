<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class User extends Dbconnect
{

    public function is_admin($name, $password)
    {
        $SqlReadUsers = "SELECT * FROM user WHERE `name`='$name' AND `password`='$password'";
        $conn = $this->dbconnect();
        if ($ResultReadUsers = $conn->query($SqlReadUsers)) {
            foreach ($ResultReadUsers as $user) {
            }
        }
        return $ResultReadUsers;
    }

    public function create_user($name, $email, $password)
    {
        $SqlCreateUser = "INSERT INTO user SET `name` = '$name', email = '$email', `password`='$password'";
        $conn = $this->dbconnect();
        $ResultCreateUser = $conn->query($SqlCreateUser);
        return "success";
    }

    public function read_last_user()
    {
        $SqlReadLastUser = "SELECT * FROM user ORDER BY `user`.`id` DESC LIMIT 1";
        $conn = $this->dbconnect();
        if ($ResultReadLastUser = $conn->query($SqlReadLastUser)) {
            foreach ($ResultReadLastUser as $user) {
            }
        }
        return $ResultReadLastUser;
    }

    public function read_user_by_id($id)
    {
        $SqlReadUserById = "SELECT * FROM user WHERE `id`='$id'";
        $conn = $this->dbconnect();
        if ($ResultReadUserById = $conn->query($SqlReadUserById)) {
            foreach ($ResultReadUserById as $user) {
            }
        }
        return $ResultReadUserById;
    }

    public function read_users()
    {
        $SqlReadUsers = "SELECT * FROM user";
        $conn = $this->dbconnect();
        if ($ResultReadUsers = $conn->query($SqlReadUsers)) {
            foreach ($ResultReadUsers as $user) {
            }
        }
        return $ResultReadUsers;
    }

    public function update_uchyotnaya_zapis_by_id($id, $name, $sirname, $display_name, $email, $password)
    {
        $SqlUpdateUchyotnayaZapisById = "UPDATE user SET `name` = $name, sirname = '$sirname', display_name = $display_name, email = '$email', `password` = $password WHERE id = $id";
        $conn = $this->dbconnect();
        $ResultUpdateUchyotnayaZapisById = $conn->query($SqlUpdateUchyotnayaZapisById);
        return $SqlUpdateUchyotnayaZapisById;
    }
}
