<?php

class Army { // Ejercito
    public $coins = 1000; // Monedas de oro

    public $points = [
        'pikeman' => 5,
        'archery' => 10,
        'knight' => 20,
    ];
    public $units;
    public $civilization; // Civilizacion del ejercito
    private $civilizations = [ // Civilizaciones establecidas por default
        'chinos' => ['pikeman' => 2, 'archery' => 25, 'knight' => 2],
        'ingleses' => ['pikeman' => 10, 'archery' => 10, 'knight' => 10],
        'bizandinos' => ['pikeman' => 5, 'archery' => 8, 'knight' => 15],
    ];
    private $transformationRules = [
        'pikeman' => ['to' => 'archery', 'cost' => 30],
        'archery' => ['to' => 'knight', 'cost' => 40],
    ];

    /*
    * Crea un ejercito
    */
    public function createArmy($civilization = 'chinos') {
        if(!$this->civilizations[$civilization])
            return trigger_error('La civilizacion especificada no existe!', E_USER_ERROR);

        $this->civilization = $civilization; // Estableciendo civilizacion al ejercito
        $this->units = $this->civilizations[$civilization]; // cantidades de unidades por default
    }

    /*
    * Entrenamiento de alguna unidad
    */
    public function training($unitType = 'pikeman') {
        $costsBenefit = [
            'pikeman' => ['costs' => 10, 'benefit' => 3], // Costo-Beneficio de unidad de piquero
            'archery' => ['costs' => 20, 'benefit' => 7], // Costo-Beneficio de unidad de arquero
            'knight' => ['costs' => 30, 'benefit' => 10], // Costo-Beneficio de unidad de caballero
        ];

        if(!$this->units[$unitType])
            return trigger_error('La unidad especificada no existe!', E_USER_ERROR);

        // Se verifica que posea coins suficientes para entrenar la unidad
        if(($this->coins - $costsBenefit[$unitType]['costs']) < 0)
            return trigger_error('Coins insuficientes para entrenar!', E_USER_ERROR);
        else
            $this->coins -= $costsBenefit[$unitType]['costs']; // cobrando el entrenamiento

        // aumentando fuerza de la unidad especificada
        $this->points[$unitType] += $costsBenefit[$unitType]['benefit'];
    }

    /*
    * Transformacion de unidad
    */
    public function transformation($unitType = 'pikeman') {
        if($unitType == 'knight')
            return trigger_error('Caballeros no pueden ser transformados!', E_USER_ERROR);

        if(!$this->units[$unitType])
            return trigger_error('La unidad especificada no existe!', E_USER_ERROR);
        
        // Se verifica que posea coins suficientes para transformar la unidad
        if(($this->coins - $this->transformationRules[$unitType]['cost']) < 0)
            return trigger_error('Coins insuficientes para transformar la unidad!', E_USER_ERROR);
        else
            $this->coins -= $this->transformationRules[$unitType]['cost']; // cobrando la transformacion

        $this->units[$this->transformationRules[$unitType]['to']] += $this->units[$unitType];
        $this->units[$unitType] = 0;
    }

    /*
    * Batallas de ejercito
    */

}

$army = new Army;

echo '<pre>'. var_export($army) .'</pre>';
$army->createArmy('bizandinos');
$army->training();
$army->transformation();
echo '<pre>'. var_export($army) .'</pre>';

?>