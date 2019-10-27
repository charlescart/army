<?php

/**
 * Description of Civilization
 *
 * @author Ing. Charles Rodriguez
 */

namespace army\models;

use army\models\{
    Pikeman,
    Archery,
    Knight
};

abstract class Civilization {

    protected $origin;
    protected $pikeman;
    protected $archery;
    protected $knight;

    public function __construct($origin, Pikeman $pikeman, Archery $archery, Knight $knight) {
        $this->origin = $origin;
        $this->pikeman = $pikeman;
        $this->archery = $archery;
        $this->knight = $knight;
    }
    
    public function getOrigin() {
        return $this->origin;
    }
    
    public function getInstanceOfPikeman() {
        return $this->pikeman;
    }
    
    public function getInstanceOfArchery() {
        return $this->archery;
    }
    
    public function getInstanceOfKnight() {
        return $this->knight;
    }

    public function __toString() {
        return '<br> Origin: ' . $this->origin . ', pikeman: ' . $this->pikeman
                . ', archery: ' . $this->archery . ', knight: ' . $this->knight;
    }

}
