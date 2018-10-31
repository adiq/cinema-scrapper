<?php

namespace App\Provider;

use App\Model\CinemaModel;
use App\Model\EventModel;
use App\Model\MovieModel;

class CinemaCity {
    public function getScheduleForCinema(CinemaModel $cinemaModel) {
        $dates = $this->getAvailableScheduleDays($cinemaModel->getId(), date('Y-m-d'));

        foreach ($dates['body']['dates'] as $date) {
            $schedule = $this->getDaySchedule($cinemaModel->getId(), $date);
            foreach ($schedule['body']['films'] ?? [] as $movieData) {
                $movie = $this->mapMovie($movieData);
                $this->mapEvents($movie, $schedule['body']['events'] ?? []);

                $cinemaModel->addMovie($movie);
            }
        }

        return $cinemaModel;
    }

    private function mapMovie($data) {
        return new MovieModel(
        $data['id'] ?? null,
            $data['name'] ?? null,
            $data['length'] ?? null,
            $data['posterLink'] ?? null,
            $data['videoLink'] ?? null,
            $data['link'] ?? null,
            $data['attributeIds'] ?? []
        );
    }

    private function mapEvents(MovieModel $movie, $events) {
        foreach ($events as $event) {
            if ($event['filmId'] !== $movie->getId()) {
                continue;
            }
            $movie->addEvent(new EventModel(
                new \DateTime($event['eventDateTime']),
                $event['bookingLink'] ?? null,
                $event['soldOut'] ?? null
            ));
        }
    }

    private function getDaySchedule($cinemaId, $date = null) {
        $scheduleJson = file_get_contents('https://www.cinema-city.pl/pl/data-api-service/v1/quickbook/10103/film-events/in-cinema/'.$cinemaId.'/at-date/'.$date.'?attr=&lang=pl_PL');

        return json_decode($scheduleJson, true);
    }

    private function getAvailableScheduleDays($cinemaId, $date = null) {
        $json = file_get_contents('https://www.cinema-city.pl/pl/data-api-service/v1/quickbook/10103/dates/in-cinema/'.$cinemaId.'/until/'.$date.'?attr=&lang=pl_PL');

        return json_decode($json, true);
    }
}