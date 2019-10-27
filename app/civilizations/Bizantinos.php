<?php

/**
 * Description of Chinos
 *
 * @author Charles Rodriguez
 */

namespace army\models;

use army\models\{
    Pikeman,
    Archery,
    Knight
};

class Bizantinos extends Civilization {

    public function __construct($civilization = 'Bizantinos') {
        parent::__construct(
                $civilization,
                new Pikeman(5, 5),
                new Archery(10, 8),
                new Knight(20, 15)
        );
    }

}
