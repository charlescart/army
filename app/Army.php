<?php

/**
 * Description of Army
 * @author Ing. Charles Rodriguez.
 */

namespace army\models;

final class Army {

    private $coins;
    private $civilization;
    private $pikeman;
    private $archery;
    private $knight;
    
    /**
     * @function: __construct
     * @params: $civilization => Instancia de una civilizacion.
     * @description: Crea un ejercito segun una civilizacion dada.
     */
    public function __construct(Civilization $civilization) {
        $this->coins = 1000;
        $this->civilization = $civilization->getOrigin();
        $this->pikeman = $civilization->getInstanceOfPikeman();
        $this->archery = $civilization->getInstanceOfArchery();
        $this->knight = $civilization->getInstanceOfKnight();
    }
    
    /**
     * @function: traningPikeman
     * @description: Entrena la unidad de piqueros, tiene un costo de -10 monedas
     * de oro y un beneficio de +3 en fuerza (strenght) a la unidad.
     */
    public function traningPikeman() {
        $this->coins -= $this->pikeman->traning(10, 3);
    }
    
    /**
     * @function: traningArchery
     * @description: Entrena la unidad de arqueros, tiene un costo de -20 monedas
     * de oro y un beneficio de +7 en fuerza (strenght) a la unidad.
     */
    public function traningArchery() {
        $this->coins -= $this->archery->traning(20, 7);
    }
    
    /**
     * @function: traningKnight
     * @description: Entrena la unidad de caballeros, tiene un costo de -30 monedas
     * de oro y un beneficio de +10 en fuerza (strenght) a la unidad.
     */
    public function traningKnight() {
        $this->coins -= $this->knight->traning(30, 10);
    }
    
    /**
     * @function: transformationPikeman
     * @description: Transforma toda la unidad de piqueros en arqueros.
     */
    public function transformationPikeman() {
        $this->pikeman->transformation($this->archery);
    }
        
    /**
     * @function: transformationArchery
     * @description: Transforma toda la unidad de arqueros en caballeros.
     */
    function transformationArchery() {
        $this->archery->transformation($this->knight);
    }
            
    /**
     * @function: getPointsOfArmy
     * @description: Devuelve la cantidad de puntos por unidad del ejercito que
     * seria fuerza * cantidad de cada una de las unidades sumandolas para tener
     * el total de los puntos de ataque de un ejercito.
     */
    public function getPointsOfArmy() {
        return $this->pikeman->getPointsUnit() + $this->archery->getPointsUnit() + $this->knight->getPointsUnit();
    }
                
    /**
     * @function: getPointsForUnit
     * @description: Devuelve los puntos de de ataque de un ejercito por unidad
     * ordenados de la unidad mas fuerte a la mas debil.
     */
    public function getPointsForUnit() {
        $units = [
            'pikeman' => $this->pikeman->getPointsUnit(),
            'archery' => $this->archery->getPointsUnit(),
            'knight' => $this->knight->getPointsUnit(),
        ];
        arsort($units);
        return $units;
    }
                    
    /**
     * @function: removePikeman
     * @description: Lleva a cero la cantidad de piqueros.
     */
    public function removePikeman() {
        $this->pikeman->setQuanty(0);
    }
                        
    /**
     * @function: removeArchery
     * @description: Lleva a cero la cantidad de arqueros.
     */
    public function removeArchery() {
        $this->archery->setQuanty(0);
    }
    
    /**
     * @function: removeKnight
     * @description: Lleva a cero la cantidad de caballeros.
     */
    public function removeKnight() {
        $this->knight->setQuanty(0);
    }
        
    /**
     * @function: addCoins
     * @description: Adiciona modenas al cobre de monedas del ejercito.
     */
    public function addCoins($coins) {
        $this->coins += $coins;
    }
            
    /**
     * @function: getCivilization
     * @description: Devuelve la civilizacion del ejercito.
     */
    public function getCivilization() {
        return $this->civilization;
    }
    
    public function __toString() {
        return 'Ejercito: Civilizacion[' . $this->civilization . '] Coins['
          . $this->coins . '] Pikeman[' . $this->pikeman . '] Archery['
          . $this->archery . '] Knight[' . $this->knight . ']';
    }

}
