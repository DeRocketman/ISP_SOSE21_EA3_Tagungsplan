<?php


class Conference
{
    private $name;
    private $welcomeText;
    private $days;
    private $city;
    private $location;
    private $dailyTimeslots;
    private $dailySessionList;

    /**
     * Conference constructor.
     * @param string $name
     * @param string $welcomeText
     * @param array $days
     * @param string $city
     * @param string $location
     * @param array $dailyTimeslots
     */
    public function __construct(string $name,string $welcomeText,array $days,string $city,
                                string $location,array $dailyTimeslots)
    {
        $this->name = $name;
        $this->welcomeText = $welcomeText;
        $this->days = $days;
        $this->city = $city;
        $this->location = $location;
        $this->dailyTimeslots = $dailyTimeslots;
        $this->dailySessionList = array();
        $this->createDailySessionList();
    }

    public function createDailySessionList()
    {
        foreach ($this->days as $day)
        {
            $dailySessions = new DailySessions($day);
            $dailySessions->createSessionList($this->dailyTimeslots);
            array_push($this->dailySessionList, $dailySessions);
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getWelcomeText(): string
    {
        return $this->welcomeText;
    }

    /**
     * @return array
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return array
     */
    public function getDailyTimeslot(): array
    {
        return $this->dailyTimeslot;
    }

    /**
     * @return array
     */
    public function getDailySessionList(): array
    {
        return $this->dailySessionList;
    }

    /**
     * @param array $dailySessionList
     */
    public function setDailySessionList(array $dailySessionList)
    {
        $this->dailySessionList = $dailySessionList;
    }






}