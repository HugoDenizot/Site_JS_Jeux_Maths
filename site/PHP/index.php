<?php
session_start();
require_once ("Controlleur.php");
require_once ("myDB.php");
$db = new myDB();
$c = new Controlleur($db);
?>
