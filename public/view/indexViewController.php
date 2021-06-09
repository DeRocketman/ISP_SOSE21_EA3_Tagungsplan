<?php
/**
 * this file ist the controller for index.php
 */
require_once __DIR__ . "/../mainProgram.php";

/**
 * build a headline
 * @param $welcome
 * @param $conferenceName
 * @param $city
 * @param $firstDate
 * @param $lastDate
 * @param $location
 */
function buildHeadline($welcome, $conferenceName, $city, $firstDate, $lastDate, $location)
{
    echo "<h1>$welcome <br>$conferenceName in $city</h1>
          <h2>Die Tagung findet vom $firstDate bis $lastDate in der $location statt</h2>";
}

/**
 * build a head of the schedule
 * @param $date
 */
function buildScheduleHead($date)
{
    echo "<div><b>Tagungsprogramm am $date</b>";
}

/**
 * build the main part of the schedule
 * @param $timeslot
 * @param $theme
 * @param $speaker
 */
function buildSchedulePart($timeslot, $theme, $speaker)
{
    echo "<p>$timeslot $theme $speaker<br></p>";
}

/**
 * build the bottom of schedule
 */
function buildScheduleBottom()
{
    echo "</div>";
}
/**
 * Build the link to editPage.php
 */
function buildLinkToEdit($date)
{
    echo "<a href=\"editPage.php\">Sessions für den $date anlegen/bearbeiten<a>";
}

/**
 * build the index.php
 */
function buildIndex()
{
    $conf = buildConference();
    updateDailySession($conf);
    $datesCount = count($conf->getDays());
    $startDate = $conf->getDays()[0];
    $endDate = $conf->getDays()[$datesCount - 1];

    buildHeadline($conf->getWelcomeText(), $conf->getName(), $conf->getCity(), $startDate, $endDate,
        $conf->getLocation());

    $listCount = count($conf->getDailySessionList());
    $dayList = $conf->getDailySessionList();

    for ($i = 0; $i < $listCount; $i++) {
        $daySchedule = $dayList[$i]->getSessionList();
        $scheduleCount = count($daySchedule);
        buildScheduleHead($dayList[$i]->getDate());
        $themeCounter = 0;
        for ($j = 0; $j < $scheduleCount; $j++) {
            if ($daySchedule[$j]->getTheme() !== "") {
                buildSchedulePart($daySchedule[$j]->getTimeslot(), $daySchedule[$j]->getTheme(), $daySchedule[$j]->getSpeakers());
                $themeCounter++;
            }
        }
        if ($themeCounter === 0) {
            buildSchedulePart("Noch kein Programm!", "", "");
        }
        buildLinkToEdit($dayList[$i]->getDate());
        buildScheduleBottom();
    }
}