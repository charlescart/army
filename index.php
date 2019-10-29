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
echo '~> Un ejercito Chino ha sido creado<br>'.$army1;

$army2 = new Army($ingleses);
echo '<br><br>~> EUn ejercito Ingles ha sido creado<br>'.$army2;

echo '<br><br>~> Entrenando a Piqueros...';
$army1->traningPikeman();

echo '<br>~> Entrenando a Arqueros...';
$army1->traningArchery();

echo '<br>~> Entrenando a Caballeros...';
$army1->traningKnight();

echo '<br><br>';
echo ''.$army1;

echo '<br><br>~> Transformando Piqueros en Arqueros';
$army1->transformationPikeman();
echo '<br>'.$army1;

echo '<br><br>~> Transformando Arqueros en Caballeros';
$army1->transformationArchery();
echo '<br>'.$army1;

echo '<br><br>~> Batalla de estos dos ejercitos se presentara <br>';
echo $army1.'<br>'.$army2;
$battle1 = new Battle($army1, $army2);
echo '<br><br>~> Resultado de la batalla: (Ojo mirar consecuencias en las unidades de cada ejercito)<br>';
echo $army1.'<br>'.$army2;
echo '<br>'.$battle1;
