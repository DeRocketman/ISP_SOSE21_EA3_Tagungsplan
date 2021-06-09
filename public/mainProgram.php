<?php
/**
 * ISP SoSe21 EA3 - OOP
 * Filename: mainProgram.php connect the model classes with both view-controller
 * @author Dirk Stricker dirk.stricker@stud.th-lubeck.de
 * @date 18.05.2021
 * @version 1.20210609
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "Session.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "DailySessions.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "Conference.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "view"  . DIRECTORY_SEPARATOR . "indexViewController.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "view"  . DIRECTORY_SEPARATOR . "Title.php";


/**
 * function reads a json-file and
 * @return return it as json-arrays
 */
function readJSON()
{
    $jsonFile = file_get_contents('data/conference.json', true);
    return json_decode($jsonFile);
}

/**
 * updates session values
 * @param Conference $confNow
 */
function updateDailySession(Conference $confNow)
{
    if(!empty($_POST["theme00"]))
    {
        $listCounter = count($confNow->getDailySessionList());
        $dayList = $confNow->getDailySessionList();
        for ($i = 0; $i < $listCounter; $i++) {
            $dailySession = $dayList[$i]->getSessionList();
            $scheduleCounter = count($dailySession);
            for ($j = 0; $j < $scheduleCounter; $j++) {
                $dailySession[$j]->setTheme(htmlspecialchars($_POST["theme". $i . $j]));
                $dailySession[$j]->setSpeakers(htmlspecialchars($_POST["speaker" . $i . $j]));
            }
        }
        writeToJSON($confNow);
    }
}

/**
 * this function get data from json-file and build a Conference object
 * @return Conference object
 */
function buildConference(): Conference
{
    $jsonArray = readJSON();

    $confName = $jsonArray->confName;
    $confWelcomeText = $jsonArray->welcomeText;
    $confDates = $jsonArray->dates;
    $confCity = $jsonArray->city;
    $confLocation = $jsonArray->location;
    $confDailySlots = $jsonArray->dailyTimeslots;
    $themes = $jsonArray->themes;
    $speaker = $jsonArray->speaker;

    $conf = new Conference($confName, $confWelcomeText, $confDates, $confCity, $confLocation, $confDailySlots, $themes,
        $speaker);
    writeToJSON($conf);
    return $conf;
}

/**
 * this function writes the updated Conference data, DailySessions data and Sessions data to
 * back to the json as complete overwrite.
 * @param Conference object as $conf
 */
function writeToJSON($conf)
{
    $listCounter = count($conf->getDailySessionList());
    $dayList = $conf->getDailySessionList();
    $themesArray = array();
    $speakersArray = array();
    for ($i = 0; $i < $listCounter; $i++) {

        $dailySession = $dayList[$i]->getSessionList();
        $scheduleCounter = count($dailySession);
        for ($j = 0; $j < $scheduleCounter; $j++) {

            array_push($themesArray, $dailySession[$j]->getTheme());
            array_push($speakersArray, $dailySession[$j]->getSpeakers());
        }
    }
    $session = array(
        "confName"=> $conf->getName(),
        "welcomeText"=> $conf->getWelcomeText(),
        "dates"=> $conf->getDays(),
        "city"=> $conf->getCity(),
        "location" => $conf->getLocation(),
        "dailyTimeslots" => $conf->getDailyTimeslots(),
        "themes"=> $themesArray,
        "speaker" => $speakersArray,
    );
    $toJSON = json_encode($session);
    file_put_contents("data/conference.json", $toJSON);
}


