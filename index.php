<?php

/**
 * Description of index
 * @author Ing. Charles Rodriguez.
 */
require_once './vendor/autoload.php';

use army\models\{
    Army, Chinos, Ingleses, Bizantinos, Battle
};

$ingleses = new Ingleses();
$chinos = new Chinos();
$bizantinos = new Bizantinos();

/*
 * creando un instancia de ejercito segun un una civilization
 */
$army1 = new Army($chinos);
echo $army1;

echo '<br><br> Entrenando Pikeman...';
$army1->traningPikeman();

echo '<br> Entrenando Archery...';
$army1->traningArchery();

echo '<br> Entrenando Knight...';
$army1->traningKnigth();

echo '<br><br>';
echo $army1;

echo '<br><br> Transfomation Pikeman to Archery';
$army1->transformationPikeman();
echo '<br>'.$army1;

echo '<br><br> Transfomation Archery to Knight';
$army1->transformationArchery();
echo '<br>'.$army1;

echo '<br><br> Battle de ejercitos <br>';
$army2 = new Army($ingleses);
$battle1 = new Battle($army1, $army2);
echo $army1.'<br>'.$army2;
