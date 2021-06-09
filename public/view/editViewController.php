<?php
/**
 * this file ist the controller for editView.php
 */

include __DIR__ . "/../mainProgram.php";

/**
 * for the header
 * @param $firstDate
 * @param $lastDate
 */
function buildEditHeadline($firstDate, $lastDate)
{
    echo "<h1>Hier kann das Tagungsprogramm angelegt und editiert werden</h1>
          <h2>Folgende Zeitslots stehen vom $firstDate bis $lastDate zur Auswahl</h2>";
}

/**
 * Build the header part of the form
 */
function buildFormHead()
{
    echo "<form method=\"post\" action=\"index.php\">";
}

/**
 * build head of the schedule
 * @param $date
 */
function buildScheduleEditHead($date)
{
    echo "<div><b>Tagungsprogramm am $date</b>";
}

/**
 * build schedule parts
 * @param $timeslot
 * @param $theme
 * @param $speaker
 * @param $number
 */
function buildScheduleEdit($timeslot, $theme, $speaker, $number)
{
    echo "<p>
            <label for=\"$timeslot\">$timeslot: </label>
            <label for=\"theme\">Thema:</label>
            <input type=\"text\" name=\"theme$number\" id=\"theme$number\" VALUE=\"$theme\">
            <label for=\"speaker\">Votragende:</label>
            <input type=\"text\" name=\"speaker$number\" id=\"speaker$number\" VALUE=\"$speaker\">
          </p>";
}

/**
 * Build the button and bottom of a form
 */
function buildFormButton()
{
    echo "<input type=\"submit\" value=\"Änderungen speichern\">
          </form></div>";
}

/**
 * function the build the edit site
 */
function buildEditPage(){
    $conf = buildConference();
    $datesCount = count($conf->getDays());
    $startDate = $conf->getDays()[0];
    $endDate = $conf->getDays()[$datesCount - 1];

    buildEditHeadline($startDate, $endDate);
    buildFormHead();

    $listCount = count($conf->getDailySessionList());
    $dayList = $conf->getDailySessionList();

    for ($i = 0; $i < $listCount; $i++) {
        $daySchedule = $dayList[$i]->getSessionList();
        $scheduleCounter = count($daySchedule);
        buildScheduleEditHead($dayList[$i]->getDate());
        for ($j = 0; $j < $scheduleCounter; $j++) {
            buildScheduleEdit($daySchedule[$j]->getTimeslot(), $daySchedule[$j]->getTheme(), $daySchedule[$j]->getSpeakers(),$i.$j );
        }
    }
    buildFormButton();
}