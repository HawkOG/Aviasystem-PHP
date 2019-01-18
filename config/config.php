<?php 

$theme = 'air_theme';

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'flights';
$dsn = "mysql:host=$host;dbname=$dbname";
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
);