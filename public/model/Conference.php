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
    private $themesArray;
    private $speakerArray;


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
                                string $location, array $dailyTimeslots, array $themes, array $speakers)
    {
        $this->name = $name;
        $this->welcomeText = $welcomeText;
        $this->days = $days;
        $this->city = $city;
        $this->location = $location;
        $this->dailyTimeslots = $dailyTimeslots;
        $this->dailySessionList = array();
        $this->themesArray = $themes;
        $this->speakerArray = $speakers;
        $this->createOrLoadDailySessionList();

    }

    public function createOrLoadDailySessionList()
    {
        $dailySlotCount = count($this->dailyTimeslots);

        if(count($this->themesArray)==0 && count($this->speakerArray)==0)
        {
            foreach ($this->days as $day)
            {
                $dailySessions = new DailySessions($day);
                $dailySessions->createSessionList($this->dailyTimeslots);
                array_push($this->dailySessionList, $dailySessions);
            }
        }else{
            for ($i=0; $i< count($this->days); $i++)
            {
                $dailySessions = new DailySessions($this->days[$i]);
                $dailySessions->loadSessionList($this->dailyTimeslots, $this->themesArray,
                    $this->speakerArray, $i*$dailySlotCount);
                array_push($this->dailySessionList, $dailySessions);
            }
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
    public function getDailyTimeslots(): array
    {
        return $this->dailyTimeslots;
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