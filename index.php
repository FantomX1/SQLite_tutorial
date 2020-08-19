<?php
require 'vendor/autoload.php';

use App\SQLiteConnection;
use App\SQLiteCreateTable;


ini_set("display_errors", 1);
error_reporting(E_ALL);

$sqlite = new SQLiteCreateTable((new SQLiteConnection())->connect());


$sqlite->createTables();

$tables = $sqlite->getTableList();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="sqlitetutorial.net">
    <title>PHP SQLite CREATE TABLE Demo</title>
    <link href="http://v4-alpha.getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="page-header">
        <h1>PHP SQLite CREATE TABLE Demo</h1>
    </div>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Tables</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tables as $table) : ?>
            <tr>

                <td><?php echo $table ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>



