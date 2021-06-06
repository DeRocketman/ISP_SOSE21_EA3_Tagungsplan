<?php


class Speaker
{
    private $firstName;
    private $lastName;
    private $title;

    /**
     * Speaker constructor.
     * @param string $firstName
     * @param string $lastName
     * @param string $title
     */
    public function __construct(string $firstName, string $lastName, string $title)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->title = $title;
    }

    public function buildSessionSpeaker(): string
    {
        return $this->title." ".$this->firstName." ".$this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}