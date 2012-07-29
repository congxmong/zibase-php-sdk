<?php
/*
 * Exemples d'utilisation de l'API PHP Zibase 
 * Auteur : Benjamin GAREL
 * Juin 2011
 */
 
 require_once("../lib/ZiBase.php");
 
 # Adresse IP de la zibase est nécessaire pour utiliser cette classe
 $zibase = new ZiBase("192.168.0.20");
 
 ?>
 
 <html>
 <body>
 <h1>Exemples d'utilisation de l'API PHP Zibase</h1>
  
 <?php
 # Envoi de la commande H3 ON en RF X10
 $zibase->sendCommand("H3", ZbAction::ON, ZbProtocol::X10);
 
 # Envoi de la commande F12 OFF en RF Chacon
 $zibase->sendCommand("F12", ZbAction::OFF, ZbProtocol::CHACON);
  
 ?>
 <?php 
 # Lancement du scenario 1 (le numéro du scenario est affiché entre parenthèses dans le suivi d'activité)
 $zibase->runScenario(1);
 
 # Exécution de scripts (Nouveautés V1.6)
 # Ex: Lance le scenario "Alarme OFF"
 $zibase->execScript("lm [Alarme OFF]");
 # Autres possibilités : 
 # lm 2 (lance le scenario 2)
 # lm 3 aft 60 (lance le scenario 3 dans 60s)
 # lm 2.lm [autre] (lance le scenario 2 puis le scenario "autre")
 
 
 ?>
 <?php
 # Lit la variable 2 de la zibase
 $var2 = $zibase->getVariable(2);
 echo "var2=".$var2;
 
 ?>
 <br/>
 <?php
 # Met à jour la variable 14 de la zibase en lui mettant la valeur 44
 $zibase->setVariable(14, 44);
  
 ?>
 <?php
 # Lit une variable calendrier
 $cal = $zibase->getCalendar(12);
 echo "00h00=".$cal->hour[0]."<br/>";
 echo "04h00=".$cal->hour[4]."<br/>";
 echo "Mardi=".$cal->day["mardi"]."<br/>";
 echo "Dimanche=".$cal->day["dimanche"]."<br/>";
 ?>
 <br/>
 <?php
 # Met à jour le calendrier 12 de la zibase
 # Par défaut, tout est à 0 (= tout décoché)
 $cal = new ZbCalendar();
 # On met 05h00 à actif (= coché)
 $cal->hour[5] = 1;
 # On met le jeudi à actif (=coché)
 $cal->day["jeudi"] = 1;
 
 $zibase->setCalendar(12, $cal); 
 
 ?>
 <br/>
 <?php
 # Lit l'état d'un actionneur
 $etat = $zibase->getState("H3");
 echo "Etat de H3 : ".$etat;
 
 ?>
 <br/>
 <br/>
 <?php
 # Lit les valeurs d'une sonde
 $info = $zibase->getSensorInfo("OS439191042");
 echo "Heure du relevé : ". $info[0]->format("d/m/Y H:i:s") . "<br/>";
 echo "Température : ". $info[1]/10 . "°C<br/>";
 echo "Humidité : ". $info[2] . "%<br/>";
 ?>
 
 
 <?php
 # Lit les valeurs d'une sonde à partir du site zibase ou xxx-zb.net
 # Idem méthode getSensorInfo() mais la récupération se fait sur internet.
 # A remplacer par le site sur lequel votre zibase est connecté (ex: planete-zb.net)
 $info = $zibase->getSensorInfoFromInternet("http://zibase.net/m/get_xml_sensors.php?device=ZiBASExxxx&token=yyyyyy", "OS439191042");
 echo "Heure du relevé : ". $info[0]->format("d/m/Y H:i:s") . "<br/>";
 echo "Température : ". $info[1]/10 . "°C<br/>";
 echo "Humidité : ". $info[2] . "%<br/>";
  
 ?>
 
 
 <?php
 # Lit la date d'un détecteur X10Secure
 # Date du dernier déclenchement de présence
 $info = $zibase->getSensorInfo("XS1904323558");
 echo "Heure du dernier déclenchement : ". $info[0]->format("d/m/Y H:i:s") . "<br/>";
 
 # Date de la derniere remise à zéro (identifiant de présence + 1)
 $info = $zibase->getSensorInfo("XS1904323559");
 echo "Heure de la remise à zéro : ". $info[0]->format("d/m/Y H:i:s") . "<br/>";
 
 ?>
 
 
 <?php
 # Pour les détecteur X10 (MS13)
 # Date du dernier déclenchement de présence
 $dateInfo = $zibase->getX10SensorInfo("D3", "ON");
 echo "Heure du dernier déclenchement : ". $dateInfo->format("d/m/Y H:i:s") . "<br/>";
 
 # Date de la derniere remise à zéro
 $dateInfo = $zibase->getX10SensorInfo("D3", "OFF");
 echo "Heure de la remise à zéro : ". $dateInfo->format("d/m/Y H:i:s") . "<br/>";
   
 ?>
  
  
  
 <?php
 # Simulation d'une sonde virtuelle
 # Envoie les valeurs (17.0°C / 30% Hum) d'un capteur virtuel d'identifiant 439191040
 $zibase->sendVirtualProbeValues(439191040, 170, 30);
  
?>


</body>
</html>
