<?php

namespace App\Model;

class MovieModel
{
    /** @var string */
    private $id;

    /** @var string */
    private $title;

    /** @var int */
    private $length;

    /** @var string */
    private $posterUrl;

    /** @var string */
    private $videoUrl;

    /** @var string */
    private $movieDetailsUrl;

    /** @var string[] */
    private $tags;

    /** @var EventModel */
    private $events = [];

    /**
     * MovieModel constructor.
     * @param string $id
     * @param string $title
     * @param int $length
     * @param string $posterUrl
     * @param string $videoUrl
     * @param string $movieDetailsUrl
     * @param string[] $tags
     */
    public function __construct($id, $title, $length = null, $posterUrl = null, $videoUrl = null, $movieDetailsUrl = null, array $tags = [])
    {
        $this->id = $id;
        $this->title = $title;
        $this->length = $length;
        $this->posterUrl = $posterUrl;
        $this->videoUrl = $videoUrl;
        $this->movieDetailsUrl = $movieDetailsUrl;
        $this->tags = $tags;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @return string
     */
    public function getPosterUrl()
    {
        return $this->posterUrl;
    }

    /**
     * @return string
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * @return string
     */
    public function getMovieDetailsUrl()
    {
        return $this->movieDetailsUrl;
    }

    /**
     * @return string[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @return EventModel
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @param EventModel $event
     */
    public function addEvent(EventModel $event)
    {
        $this->events[] = $event;
    }
}