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

class Chinos extends Civilization {

    public function __construct($civilization = 'Chinos') {
        parent::__construct(
                $civilization,
                new Pikeman(5, 2),
                new Archery(10, 25),
                new Knight(20, 2)
        );
    }

}
