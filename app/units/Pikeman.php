<?php

/**
 * Description of Pikeman
 *
 * @author Charles Rodriguez
 */

namespace army\models;

class Pikeman extends Unit {

    public function __construct($strength, $quanty) {
        parent::__construct($strength, $quanty);
    }

}
