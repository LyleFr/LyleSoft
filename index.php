<?php
session_start();
// Load Autoloader for being able to load all class without require command
// require_once './Utility/ClassLoader.php';
require_once './LsFW_Alpha/Index.php';

$temp = new Template('Template/accueil.html');
$temp->Render();


//include('Template/accueil.html');

?>