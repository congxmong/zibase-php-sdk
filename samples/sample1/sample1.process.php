<?php
/*
 * Exemple d'utilisation du SDK PHP Zibase
 * Auteur : Benjamin GAREL
 * Mars 2011
 */
 
 require_once("../../lib/ZiBase.php");
 
 # Adresse IP de la zibase (à remplacer)
 $zibaseIP = "192.168.0.20";
 
 # On récupère les valeurs du post
 if (isset($_POST["addr"]) && isset($_POST["action"]) && isset($_POST["protocol"])) {
 	$addr = $_POST["addr"];
 	$action = $_POST["action"];
 	$protocol = $_POST["protocol"]; 
 	
 	# Envoi de l'ordre à la zibase
 	$zibase = new ZiBase($zibaseIP);
 	$zibase->sendCommand($addr, $action, $protocol);
 }  
 
?>
