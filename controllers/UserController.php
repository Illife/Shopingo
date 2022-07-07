<?php

namespace Controllers;

require_once __DIR__ . '/../models/User.php';

class UserController
{
    public function is_admin()
    {
        require_once __DIR__ . '/../views/admin/user/is_admin.php';
    }

    public function signup()
    {
        require_once __DIR__ . '/../views/user/signup.php';
    }

    public function signin()
    {
        require_once __DIR__ . '/../views/user/signin.php';
    }

    public function lichnyj_kabinet()
    {
        require_once __DIR__ . '/../views/user/lichnyj-kabinet.php';
    }

    public function zakazy()
    {
        require_once __DIR__ . '/../views/user/zakazy.php';
    }

    public function zagruzki()
    {
        require_once __DIR__ . '/../views/user/zagruzki.php';
    }

    public function adresa()
    {
        require_once __DIR__ . '/../views/user/adresa.php';
    }

    public function sposoby_oplaty()
    {
        require_once __DIR__ . '/../views/user/sposoby-oplaty.php';
    }

    public function uchyotnaya_zapis()
    {
        require_once __DIR__ . '/../views/user/uchyotnaya-zapis.php';
    }
}
