<?php
require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\SQLiteCreateTable;


$sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());


$sqlite->createTables();

$tables = $sqlite->getTableList();



$pdo = (new SQLiteConnection())->connect();


if ($pdo != null)
    echo "connected to the SQLite database successfully!";
else
    echo "Whoops, could not connect to the SQLite database!";




