<?php
/**
 * Class Session to generate session objects as smallest unit in
 * the project.
 */
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
     * @return string timeslot for the session
     */
    public function getTimeslot(): string
    {
        return $this->timeslot;
    }

    /**
     * @return string theme for the session
     */
    public function getTheme(): string
    {
        return $this->theme;
    }

    /**
     * @return string speaker for the session
     */
    public function getSpeakers(): string
    {
        return $this->speakers;
    }

    /**
     * @param string $theme for the session
     */
    public function setTheme(string $theme)
    {
        $this->theme = $theme;
    }

    /**
     * @param string $speakers for the session
     */
    public function setSpeakers(string $speakers)
    {
        $this->speakers = $speakers;
    }



}