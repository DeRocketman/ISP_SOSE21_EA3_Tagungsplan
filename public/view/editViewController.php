<?php
/**
 *
 */

include __DIR__ . "/../mainProgram.php";

function buildEditHeadline($firstDate, $lastDate)
{
    echo "<h1>Hier kann das Tagungsprogramm angelegt und editiert werden</h1>
          <h2>Folgende Zeitslots stehen vom $firstDate bis $lastDate zur Auswahl</h2>";
}

/**
 * Build the headerpart of the form
 */
function buildFormHead()
{
    echo "<form method=\"post\" action=\"index.php\">";
}

function buildScheduleEditHead($date)
{
    echo "<div><b>Tagungsprogramm am $date</b>";
}

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

function buildEditPage(){
    $conf = loadConference();
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
    $_SESSION["ConfBuild"]=true;
}