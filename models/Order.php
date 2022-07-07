<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class Order extends Dbconnect
{

    public function read_regions()
    {
        $SqlReadRegions = "SELECT * FROM regions";
        $conn = $this->dbconnect();
        if ($ResultReadRegions = $conn->query($SqlReadRegions)) {
            foreach ($ResultReadRegions as $region) {
            }
        }
        return $ResultReadRegions;
    }
}
