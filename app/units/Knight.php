<?php

/**
 * Description of Knight
 * @author Ing. Charles Rodriguez
 */

namespace army\models;

class Knight extends Unit {

    public function __construct($strength, $quanty) {
        parent::__construct($strength, $quanty);
    }

}
