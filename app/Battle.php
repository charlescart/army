<?php

/**
 * Description of Batlle
 * @author Ing. Charles Rodriguez
 */

namespace army\models;

final class Battle {

    private $winner;
    private $loser;
    private $deadHeat = false;
    private $result;


    /**
     * @function: __construct
     * @params: $army1 => Primer ejercito. $army2 => Segundo ejercito.
     * @description: Ejecuta la batalla de dos instacias de ejercitos.
     */
    public function __construct($army1, $army2) {

        if ($army1->getPointsOfArmy() > $army2->getPointsOfArmy()) {
            $this->winnerProcess($army1);
            $this->loserProcess($army2);
        } elseif ($army1->getPointsOfArmy() < $army2->getPointsOfArmy()) {
            $this->winnerProcess($army2);
            $this->loserProcess($army1);
        } else {
            $this->deadHeatProcess($army1);
            $this->deadHeatProcess($army2);
        }
    }
    
    /**
     * @function: winnerProcess
     * @description: Proceso de beneficios de haber ganado la batalla.
     * 1-. Agrega 100 monedas de oro al ejercito.
     */
    private function winnerProcess($army) {
        $army->addCoins(100); // Army winner 100 coins.
        $this->winner = $army->getCivilization();
        $this->result .= 'Ejercito '.$army->getCivilization().' ganador! \o| |o/';
    }

    /**
     * @function: loserProcess
     * @param: Instancia del ejercito $army
     * @description: Proceso de consecuencias del ejercito perdedor.
     * 1-. Remueve las dos unidades (pikeman, archery u knight) de mayor fuerza
     * de ataque del ejercito perdedor.
     */
    private function loserProcess($army, $quanty = 2) {
        $this->removeUnitForArmy($army, $quanty);
        $this->loser = $army->getCivilization();
        $this->result .= ' y Ejercito ' . $army->getCivilization() . ' perdio! T.T';
    }

    /** 
     * @function: deadHeatProcess
     * @params: $army1 => Instancia de ejercito uno. $army2 => Instancia de ejercito
     * dos.
     * @description: 
     */
    private function deadHeatProcess($army, $quanty = 1) {
        $this->removeUnitForArmy($army, $quanty);
        $this->deadHeat = true;
        $this->result = 'Los ejercitos quedaron en empate! \o||o/';
       
    }
    
    /**
     * @function: removeUnitForArmy
     * @params: $army => Instancia de un ejercito. $quanty => Cantidad de unidades
     * del ejercito a eliminar.
     * @description: elimina las unidades de mayor fuerza de un ejercito segun un
     * ejercito instanciado ($army) y un maximo de unidades a eliminar ($quanty).
     */
    private function removeUnitForArmy($army, $quanty) {
        $count = 0;
        foreach ($army->getPointsForUnit() as $key => $value) {
            if(!($count < $quanty)){
                echo 'se cumple break';
            break;
            }
            if ($value == 0) continue;
            echo '<br>'.$key.'-'.$value.' ['.$count.'/'.$quanty.']';

            switch ($key) {

                case 'pikeman':
                    $army->removePikeman();
                    break;
                case 'archery':
                    echo 'quitando archerys';
                    $army->removeArchery();
                    break;
                case 'knight':
                    echo 'quitanto caballos';
                    $army->removeKnight();
                    break;
                default:
                    break;
            }
            
            $count++;
        }
    }
    
    public function __toString() {
        return 'Resultados Finales: <br>Ganador: '.$this->winner.'. <br> Perdedor: '.$this->loser
          .'. <br>'.$this->result;
    }

}
