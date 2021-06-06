<?php

/**
 * ISP SoSe21 EA3 - OOP
 * Filename: mainProgram.php
 * @author Dirk Stricker dirk.stricker@stud.th-lubeck.de
 * @date 18.05.2021
 * @version 1.20210518.1016
 */
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "Speaker.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "Session.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "DailySessions.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . "Conference.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "view"  . DIRECTORY_SEPARATOR . "indexViewController.php";
require_once __DIR__ . DIRECTORY_SEPARATOR . "view"  . DIRECTORY_SEPARATOR . "Title.php";

session_start();

function readJSON()
{
    $jsonFile = file_get_contents('data/conference.json', true);
    return json_decode($jsonFile);
}

function writeConferenceJSON()
{

}

function buildConference(): Conference
{
    $jsonArray = readJSON();

    $confName = $jsonArray->confName;
    $confWelcomeText = $jsonArray->welcomeText;
    $confDates = $jsonArray->dates;
    $confCity = $jsonArray->city;
    $confLocation = $jsonArray->location;
    $confDailySlots = $jsonArray->dailyTimeslots;

    return new Conference($confName, $confWelcomeText, $confDates, $confCity, $confLocation, $confDailySlots);
}

function loadConference(): Conference
{
    return buildConference();

}



//session_destroy();
