<?php

/**
 * ISP SoSe21 EA3 - OOP
 * Filename: mainProgram.php
 * @author Dirk Stricker dirk.stricker@stud.th-lubeck.de
 * @date 18.05.2021
 * @version 1.20210518.1016
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "Session.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "DailySessions.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "Conference.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "view"  . DIRECTORY_SEPARATOR . "indexViewController.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "view"  . DIRECTORY_SEPARATOR . "Title.php";


function readJSON()
{
    $jsonFile = file_get_contents('data/conference.json', true);
    return json_decode($jsonFile);
}

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
                $dailySession[$j]->setSpeaker(htmlspecialchars($_POST["speaker" . $i . $j]));
            }
        }
        writeToJSON($confNow);
    }
}

function buildConference(): Conference
{
    $jsonArray = readJSON();

    $confName = $jsonArray->confName;
    $confWelcomeText = $jsonArray->welcomeText;
    $confDates = $jsonArray->dates;
    $confCity = $jsonArray->city;
    $confLocation = $jsonArray->location;
    $confDailySlots = $jsonArray->timeslots;

    $conf = new Conference($confName, $confWelcomeText, $confDates, $confCity, $confLocation, $confDailySlots);

    if (count($jsonArray->themes)==0)
    {
        $conf->createDailySessionList();
        writeToJSON($conf);
    }
    return $conf;
}
/**
function loadConference(): Conference
{
    if (empty($_SESSION["ConfBuild"]) || $_SESSION["ConfBuild"]===false){
        return buildConference();
    } else {
        $conf = buildConference();
        writeUpdateJSON($conf);
        return $conf;
    }
}
*/

function writeToJSON($conf)
{
    $listCounter = count($conf->getDailySessionList());
    $dayList = $conf->getDailySessionList();
    for ($i = 0; $i < $listCounter; $i++) {
        $timeslotsArray = array();
        $themesArray = array();
        $speakersArray = array();

        $dailySession = $dayList[$i]->getSessionList();
        $scheduleCounter = count($dailySession);
        for ($j = 0; $j < $scheduleCounter; $j++) {

            array_push($timeslotsArray,$dailySession[$j]->getTimeslot());
            array_push($themesArray, $dailySession[$j]->getTheme());
            array_push($speakersArray, $dailySession[$j]->getSpeakers());
        }
        $session = array(
            "timeslot"=> $timeslotsArray,
            "themes"=> $themesArray,
            "speaker" => $speakersArray,
        );
        $dailySessionsArray = array(
            "dailySession"=> $session
        );
        $toJSON = json_encode($session);
        file_put_contents("data/conference.json", $toJSON, 2);
    }
}


