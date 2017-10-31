<?php

$cinemas = [
    'Bytom' => 1092,
    'Bielsko-Biala' => 1088
];

function getDaySchedule($cinemaId, $date = null) {

    $scheduleJson = file_get_contents('https://www.cinema-city.pl/pl/data-api-service/v1/quickbook/10103/film-events/in-cinema/'.$cinemaId.'/at-date/'.$date.'?attr=&lang=pl_PL');

    return json_decode($scheduleJson, true);
}

foreach ($cinemas as $cinema) {
    var_dump(getDaySchedule($cinema, date('Y-m-d')));
}