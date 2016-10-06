<?php
session_start();
// Load Autoloader for being able to load all class without require command
require_once './LsfwAlpha/indexLfs.php';

$temp = new Template('Template/accueil.html');
$temp->Render();

$test = new Entity();

//include('Template/accueil.html');

?>