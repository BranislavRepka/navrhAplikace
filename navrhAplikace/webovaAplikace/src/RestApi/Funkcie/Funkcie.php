<?php

namespace RestApi\Funkcie;


class Funkcie {

    /** @var array $funkcie */
    private $funkcie = [["id" => 0, "name" => "Noise" ],
        ["id" => 1, "name" => "Hamming" ],
        ["id" => 2, "name" => "Rectangle" ],
        ["id" => 3, "name" => "Bartlett" ],
        ["id" => 4, "name" => "Blackman" ],
        ["id" => 5, "name" => "Bartlett-Hann" ],
        ["id" => 6, "name" => "Blackman-Nuttall" ],
        ["id" => 7, "name" => "Cosinus" ],
        ["id" => 8, "name" => "Flat-Top" ],
        ["id" => 9, "name" => "Hann" ],
        ["id" => 10, "name" => "Lanczos" ],
        ["id" => 11, "name" => "Welch" ],
        ["id" => 12, "name" => "Blackman-Harris" ],
        ["id" => 13, "name" => "Minus" ],
        ["id" => 14, "name" => "Plus" ]];

    /**
     * @return array
     */
    public function getFunkcie(){
        return $this->funkcie;
    }

    /**
     * @param array $funkcie
     */
    public function setFunkcie($funkcie) {
        $this->funkcie = $funkcie;
    }


}