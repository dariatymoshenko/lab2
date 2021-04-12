<?php
require_once __DIR__ . "/vendor/autoload.php";


function localStor($text)
{
    $script = "<script >localStorage.setItem('savedText','$text')</script>";
    echo $script;
}

function showCars()
{
    $collection = (new MongoDB\Client)->lb2->cars;

    $cursor = $collection->find();

    $text = "<table border=1>";
    $text = $text . "<tr><td><b>Марка</b></td></tr>";
    foreach ($cursor as $document) {
        $text = $text . "<tr><td>" . $document['mark'] . "</td></tr>";
    }
    $text = $text . "</table>";
    echo $text;

    localStor($text);
}

function showDistance($distance)
{
    //echo $distance;
    $filter = array("distance" => array('$lt' => floatval($distance)));
    $collection = (new MongoDB\Client)->lb2->cars;
    $cursor = $collection->find($filter);

    $text = "<table border=1>";
    $text = $text . "<tr><td>Марка</td><td>Год выпуска</td><td>Пробег</td></tr>";
    foreach ($cursor as $document) {
        $text = $text . "<tr>  <td>" . $document['mark'] . "</td><td>" . $document['year'] . "</td><td>" . $document['distance'] . "</td></tr>";
    }
    $text = $text . "</table>";
    echo $text;

    localStor($text);
}


function getIncome($date)
{

    $filter = array("dateend" => array('$lte' => strtotime($date)));
    $collection = (new MongoDB\Client)->lb2->rent;
    $cursor = $collection->find($filter);

    $iterator = 1;

    foreach ($cursor as $document) {
        $days = ($document['dateend'] - $document['datestart']) / 86400;
        echo "Аренда №$iterator, прошло дней: $days";
        $text = $text . "Аренда №$iterator, прошло дней: $days";

        $currentMoney = $document['priceforday'] * $days;
        echo ". Цена за аренду составила:$currentMoney ";
        $text = $text . ". Цена за аренду составила:$currentMoney <br>";

        $money += $currentMoney;
        echo '<br>';

        $iterator++;
    }
    echo "полученный доход со всех аренд:$money";
    $text = $text . "полученный доход со всех аренд:$money";

    localStor($text);
}

if (array_key_exists('button1', $_POST)) {
    getIncome($_POST['specifieddate']);
} else if (array_key_exists('button2', $_POST)) {
    showDistance($_POST['distance']);
} else if (array_key_exists('button3', $_POST)) {

    showCars();
}


