<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class Brand extends Dbconnect
{

    public function read_brands()
    {
        $SqlReadBrands = "SELECT * FROM brand WHERE img IS NOT NULL";
        $conn = $this->dbconnect();
        if ($ResultReadBrands = $conn->query($SqlReadBrands)) {
            foreach ($ResultReadBrands as $brands) {
            }
        }
        return $ResultReadBrands;
    }

    public function read_all_brands()
    {
        $SqlReadAllBrands = "SELECT * FROM brand";
        $conn = $this->dbconnect();
        if ($ResultReadAllBrands = $conn->query($SqlReadAllBrands)) {
            foreach ($ResultReadAllBrands as $brands) {
            }
        }
        return $ResultReadAllBrands;
    }

    public function read_status()
    {
        $SqlReadStatus = "SELECT * FROM status";
        $conn = $this->dbconnect();
        if ($ResultReadStatus = $conn->query($SqlReadStatus)) {
            foreach ($ResultReadStatus as $status) {
            }
        }
        return $ResultReadStatus;
    }

    public function read_status_by_id($status_id)
    {
        $SqlReadStatusById = "SELECT * FROM `status` WHERE id=$status_id";
        $conn = $this->dbconnect();
        if ($ResultReadStatusById = $conn->query($SqlReadStatusById)) {
            foreach ($ResultReadStatusById as $status) {
            }
        }
        return $ResultReadStatusById;
    }
}
