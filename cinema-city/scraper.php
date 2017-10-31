<?php

function getDaySchedule($cinemaId, $date = null) {

    $scheduleJson = file_get_contents('https://www.cinema-city.pl/pl/data-api-service/v1/quickbook/10103/film-events/in-cinema/'.$cinemaId.'/at-date/'.$date.'?attr=&lang=pl_PL');

    return json_decode($scheduleJson, true);
}

var_dump(getDaySchedule(1092, date('Y-m-d')));