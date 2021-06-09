<?php


/**
 * Class conference to create conference objects that serve as the top model class. These objects
 * create further objects from the DailySession class and manage them in an array
 */
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
     * @param array $themes
     * @param array $speakers
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


    /**
     *function to create initial session lists or load data
     */
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
     * @return string name of conference
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string welcomeText of conference
     */
    public function getWelcomeText(): string
    {
        return $this->welcomeText;
    }

    /**
     * @return array days of conference
     */
    public function getDays(): array
    {
        return $this->days;
    }

    /**
     * @return string city where the conference takes place
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return string location where the conference takes place
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @return array with daily available timeslots
     */
    public function getDailyTimeslots(): array
    {
        return $this->dailyTimeslots;
    }

    /**
     * @return array with daily available session list
     */
    public function getDailySessionList(): array
    {
        return $this->dailySessionList;
    }

    /**
     * @param array $dailySessionList daily available session list
     */
    public function setDailySessionList(array $dailySessionList)
    {
        $this->dailySessionList = $dailySessionList;
    }
}