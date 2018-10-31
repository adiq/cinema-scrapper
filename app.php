<?php

require 'vendor/autoload.php';

use App\Enum\CinemaType;
use App\Model\CinemaModel;
use App\Provider\CinemaCity;

$cinemaCity = new CinemaCity();
$cinemaCityCinemas = [
    new CinemaModel(1092, 'Bytom', CinemaType::CINEMA_CITY),
    new CinemaModel(1088, 'Bielsko-Biała', CinemaType::CINEMA_CITY)
];

foreach ($cinemaCityCinemas as $cinema) {
    var_dump($cinemaCity->getScheduleForCinema($cinema));
}