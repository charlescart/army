<?php

/**
 * Description of Unit
 * @author Ing. Charles Rodriguez.
 */

namespace army\models;

abstract class Unit {

    private $strenght;
    private $quanty;

    public function __construct($strength, $quanty) {
        $this->strenght = $strength;
        $this->quanty = $quanty;
    }
    
    public function traning($cost, $benefit) {
        $this->strenght += $benefit;
        return $cost;
    }
    
    public function transformation($instance) {
        $instance->quanty += $this->quanty;
        $this->quanty = 0;
    }
    
    public function getPointsUnit() {
        return $this->strenght * $this->quanty;
    }
    
    public function setQuanty($quanty) {
        $this->quanty = $quanty;
    }
    
    public function __toString() {
        return 'Strength: '.$this->strenght.' Quanty:'.$this->quanty;
    }

}
