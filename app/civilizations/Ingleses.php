<?php

/**
 * Description of Chinos
 *
 * @author Ing. Charles Rodriguez
 */

namespace army\models;

use army\models\{
    Pikeman,
    Archery,
    Knight
};

class Ingleses extends Civilization {

    public function __construct($civilization = 'Ingleses') {
        parent::__construct($civilization, new Pikeman(5, 10), new Archery(10, 10), new Knight(20, 10));
    }

}
