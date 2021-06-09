<?php
/**
 * Class DailySessions generate the session objects and manage they into
 * arrays
 */

class DailySessions
{
    private $date;
    private $sessionList;

    /**
     * DailySessions constructor.
     * @param string $date
     */
    public function __construct(string $date)
    {
        $this->date = $date;
        $this->sessionList = array();
    }


    /**
     * create initial session objects and add they to an array
     * @param array $dailyTimeslots
     */
    public function createSessionList(array $dailyTimeslots)
    {
        foreach ($dailyTimeslots as $timeslot)
        {
            $session = new Session($timeslot, "", "");
            array_push($this->sessionList, $session);
        }
    }

    /**
     * create session object with values from json file and add they to
     * an array
     * @param array $dailyTimeslots
     * @param array $themes
     * @param array $speakers
     * @param int $startIndex
     */
    public function loadSessionList(array $dailyTimeslots, array $themes, array $speakers, int $startIndex)
    {
        $j = $startIndex;
        $slotCount= count($dailyTimeslots);
        for ($i = 0; $i < $slotCount; $i++, $j++)
        {
            $session = new Session($dailyTimeslots[$i], $themes[$j], $speakers[$j]);
            array_push($this->sessionList, $session);
        }
    }

    /**
     * @return string date for the DailySession
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return array for the DailySession
     */
    public function getSessionList(): array
    {
        return $this->sessionList;
    }

    /**
     * @param array $sessionList for the DailySession
     */
    public function setSessionList(array $sessionList)
    {
        $this->sessionList = $sessionList;
    }
}