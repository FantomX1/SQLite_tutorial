<?php


require 'vendor/autoload.php';


use App\SQLiteConnection;
use App\SQLiteInsert;


error_reporting(E_ALL);
ini_set('display_errors', true);

$pdo = (new SQLiteConnection())->connect();
$sqlite = new SQLiteInsert($pdo);



$projectId = $sqlite->insertProject("PHP SQLite Demo");


$sqlite->insertTask("Prepare the sample database schema","2020-08-01","2020-08-01", 1, $projectId);
$sqlite->insertTask("Create new tables","2020-08-01",null, 0, $projectId);
$sqlite->insertTask("Insert some sample data","2020-08-01","2020-08-01", 1, $projectId);



$projectId = $sqlite->insertProject("Mastering SQLite");

$sqlite->insertTask("Go to sqlitetutorial.net","2020-08-01",null, 0, $projectId);
$sqlite->insertTask("Read all the tutorials.","2020-08-01",null, 0, $projectId);
$sqlite->insertTask("Use Try It page to practice the SQLite commands.","2020-08-01",null, 0, $projectId);
$sqlite->insertTask("Develop a simpleSQLite-based application.","2020-08-01",null, 0, $projectId);






