<?php

namespace Models;

require_once __DIR__ . '/Dbconnect.php';

class Slider extends Dbconnect
{

    public function read_slides()
    {
        $SqlReadSlides = "SELECT * FROM glavnaya_karusel";
        $conn = $this->dbconnect();
        if ($ResultReadSlides = $conn->query($SqlReadSlides)) {
            foreach ($ResultReadSlides as $slides) {
            }
        }
        return $ResultReadSlides;
    }


    public function read_slide_by_id($id)
    {
        $SqlReadSlide = "SELECT * FROM glavnaya_karusel WHERE id = $id";
        $conn = $this->dbconnect();
        if ($ResultReadSlide = $conn->query($SqlReadSlide)) {
            foreach ($ResultReadSlide as $slide) {
            }
        }
        return $ResultReadSlide;
    }

    public function update_slide($id, $title, $subtitle, $text, $btn, $img)
    {
        $SqlUpdateSlide = "UPDATE glavnaya_karusel SET title = '$title', subtitle = '$subtitle', text = '$text', btn = '$btn', img = '$img' WHERE id = $id";
        $conn = $this->dbconnect();
        $ResultUpdateSlide = $conn->query($SqlUpdateSlide);
    }

    public function create_slide($title, $subtitle, $text, $btn, $img)
    {
        $SqlCreateSlide = "INSERT INTO glavnaya_karusel SET title = '$title', subtitle = '$subtitle', text = '$text', btn = '$btn', img = '$img'";
        $conn = $this->dbconnect();
        $ResultCreateSlide = $conn->query($SqlCreateSlide);
    }

    public function slajd_delete($id)
    {
        $SqlCreateSlide = "DELETE FROM glavnaya_karusel WHERE id = '$id'";
        $conn = $this->dbconnect();
        $ResultCreateSlide = $conn->query($SqlCreateSlide);
    }
}
