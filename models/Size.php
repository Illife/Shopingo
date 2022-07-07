<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class Size extends Dbconnect
{

    public function existing_size()
    {
        $SqlReadExistingSize = "SELECT * FROM existing_size";
        $conn = $this->dbconnect();
        if ($ResultReadExistingSize = $conn->query($SqlReadExistingSize)) {
            foreach ($ResultReadExistingSize as $existing_size) {
            }
        }
        return $ResultReadExistingSize;
    }
}
