<?php

/**
 * Description of Pikeman
 *
 * @author Ing. Charles Rodriguez
 */

namespace army\models;

class Pikeman extends Unit {

    public function __construct($strength, $quanty) {
        parent::__construct($strength, $quanty);
    }

}
