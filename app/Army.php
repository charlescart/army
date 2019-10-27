<?php

/**
 * Description of Army
 * @author Ing. Charles Rodriguez.
 */

namespace army\models;

final class Army {

    private $coins;
    private $civilization;
    public $pikeman;
    private $archery;
    private $knight;

    public function __construct(Civilization $civilization) {
        $this->coins = 1000;
        $this->civilization = $civilization->getOrigin();
        $this->pikeman = $civilization->getInstanceOfPikeman();
        $this->archery = $civilization->getInstanceOfArchery();
        $this->knight = $civilization->getInstanceOfKnight();
    }
    
    public function traningPikeman() {
        $this->coins -= $this->pikeman->traning(10, 3);
    }
    
    public function traningArchery() {
        $this->coins -= $this->archery->traning(20, 7);
    }
    
    public function traningKnigth() {
        $this->coins -= $this->knight->traning(30, 10);
    }
    
    public function transformationPikeman() {
        $this->pikeman->transformation($this->archery);
    }
    
    function transformationArchery() {
        $this->archery->transformation($this->knight);
    }
    
    public function getPointsOfArmy() {
        return $this->pikeman->getPointsUnit() + $this->archery->getPointsUnit()
                + $this->knight->getPointsUnit();
    }
    
    public function __toString() {
        return 'Ejercito creado: Civilizacion['.$this->civilization.'] Coins['
                .$this->coins.'] Pikeman['.$this->pikeman.'] Archery['
                .$this->archery.'] Knight['.$this->knight.']';
    }
}
