<?php

namespace App\Model;

class CinemaModel
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $type;

    /** @var MovieModel[] */
    private $movies = [];

    /**
     * CinemaModel constructor.
     * @param int $id
     * @param string $name
     * @param string $type
     */
    public function __construct($id, $name, $type)
    {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return MovieModel[]
     */
    public function getMovies()
    {
        return $this->movies;
    }

    /**
     * @param MovieModel[] $movie
     */
    public function addMovie($movie)
    {
        $this->movies[] = $movie;
    }
}