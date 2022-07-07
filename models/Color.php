<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class Color extends Dbconnect
{

    public function read_color()
    {
        $SqlReadColor = "SELECT * FROM product_color";
        $conn = $this->dbconnect();
        if ($ResultReadColor = $conn->query($SqlReadColor)) {
            foreach ($ResultReadColor as $color) {
            }
        }
        return $ResultReadColor;
    }

    public function read_existing_color()
    {
        $SqlReadExistingColor = "SELECT * FROM existing_color";
        $conn = $this->dbconnect();
        if ($ResultReadExistingColor = $conn->query($SqlReadExistingColor)) {
            foreach ($ResultReadExistingColor as $existing_color) {
            }
        }
        return $ResultReadExistingColor;
    }
}
