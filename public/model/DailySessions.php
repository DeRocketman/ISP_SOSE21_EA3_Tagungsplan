<?php


class DailySessions
{
    private $date;
    private $sessionList;

    /**
     * DailySessions constructor.
     * @param $date
     */
    public function __construct($date)
    {
        $this->date = $date;
        $this->sessionList = array();
    }

    public function createSessionList(array $dailyTimeslots)
    {
        foreach ($dailyTimeslots as $timeslot)
        {
            $session = new Session($timeslot, "", "");
            array_push($this->sessionList, $session);
        }
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getSessionList(): array
    {
        return $this->sessionList;
    }

    /**
     * @param array $sessionList
     */
    public function setSessionList(array $sessionList)
    {
        $this->sessionList = $sessionList;
    }
}