<?php


class Session
{
    private $timeslot;
    private $theme;
    private $speakers;

    /**
     * Session constructor.
     * @param string $timeslot
     * @param string $theme
     * @param string $speakers
     */
    public function __construct(string $timeslot,string $theme,string $speakers)
    {
        $this->timeslot = $timeslot;
        $this->theme = $theme;
        $this->speakers = $speakers;
    }

    /**
     * @return string
     */
    public function getTimeslot(): string
    {
        return $this->timeslot;
    }

    /**
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @return string
     */
    public function getSpeakers(): string
    {
        return $this->speakers;
    }

    /**
     * @param string $theme
     */
    public function setTheme(string $theme)
    {
        $this->theme = $theme;
    }

    /**
     * @param array $speakers
     */
    public function setSpeakers(array $speakers)
    {
        $this->speakers = $speakers;
    }



}