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
        
    /**
     * @function: traning
     * @params: $costo => costo del entrenamiento. $benefit => Beneficio en fuerza
     * del entrenamiento.
     * @description: Aumenta la fuerza de la unidad y devuelve el costo del
     * entrenamiento en oro.
     */
    public function traning($cost, $benefit) {
        $this->strenght += $benefit;
        return $cost;
    }
            
    /**
     * @function: transformation
     * @params: $instance => Instancia de la unidad a ser transformada.
     * @description: Pasa la cantidad de soldados de una unidad a otra, transformandolos.
     */
    public function transformation($instance) {
        $instance->quanty += $this->quanty;
        $this->quanty = 0;
    }
                
    /**
     * @function: getPointsUnit
     * @description: Devuelve un total de puntos por unidad multiplicando fuerza * cantidad.
     */
    public function getPointsUnit() {
        return $this->strenght * $this->quanty;
    }
                
    /**
     * @function: setQuanty
     * @params: $quanty => numero a establecer en la propiedad $this->quanty.
     * @description: setea la propiedad $quanty de la clase.
     */
    public function setQuanty($quanty) {
        $this->quanty = $quanty;
    }
    
    public function __toString() {
        return 'Strength: '.$this->strenght.' Quanty:'.$this->quanty;
    }

}
