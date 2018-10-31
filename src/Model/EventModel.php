<?php

namespace App\Model;

class EventModel
{
    /** @var \DateTime */
    private $date;

    /** @var string */
    private $movieBookingUrl;

    /** @var null|boolean */
    private $isSoldOut;

    /**
     * EventModel constructor.
     * @param \DateTime $date
     * @param string $movieBookingUrl
     */
    public function __construct(\DateTime $date, $movieBookingUrl, $isSoldOut)
    {
        $this->date = $date;
        $this->movieBookingUrl = $movieBookingUrl;
        $this->isSoldOut = $isSoldOut;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getMovieBookingUrl()
    {
        return $this->movieBookingUrl;
    }

    /**
     * @return bool|null
     */
    public function isSoldOut()
    {
        return $this->isSoldOut;
    }
}