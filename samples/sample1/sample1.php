<?php
/*
 * Exemple d'utilisation du SDK PHP Zibase
 * Auteur : Benjamin GAREL
 * Mars 2011
 */
 
 require_once("../../lib/ZiBase.php");
   
?>

<html>
<head>
<title>SDK Zibase - Sample 1</title>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
<?php
# On récupère les valeurs ON / OFF et les protocols en javascript
?>
var ON = <?php echo ZbAction::ON ?>;
var OFF = <?php echo ZbAction::OFF ?>;

var X10 = <?php echo ZbProtocol::X10 ?>;
var CHACON = <?php echo ZbProtocol::CHACON ?>;


// Remplacer ici par votre code maison
var codeMaison = "H";
// Remplacer ici par le protocol que vous voulez utiliser avec la télécommande
// Pour le protocole Chacon, mettre CHACON à la place de X10
var prc = X10;


function sendCmd(addr, action, protocol) {
	// Changement de l'image
	$("#kr22").attr("src", "img/kr22on.jpg");
	
	// Envoi en ajax vers sample1.process.php la commande
	$.post("sample1.process.php", {addr: addr, action: action, protocol: protocol},
		function(data) {
			// Remise de l'image initiale
			$("#kr22").attr("src", "img/kr22.jpg");
		});
}


</script>

<style>
body
{
	background-color:white;
}

</style>
</head>
<body>
<div align="center">
<br/><br/><br/><br/>
<div style="text-align:center; width:196px; margin-left:auto; margin-right:auto;">

<img id="kr22" src="img/kr22.jpg" usemap="#mapKr22" border="0" width="196" height="400" alt="" />

<map id="mapKr22" name="mapKr22">

<area shape="poly" coords="54,60,68,65,75,78,69,89,54,96,40,91,32,77,39,65," 
	href="javascript:sendCmd(codeMaison + '1', ON, prc);" title=""   />

<area shape="poly" coords="139,59,156,65,162,78,155,90,140,95,125,90,118,77,125,64," 
	href="javascript:sendCmd(codeMaison + '1', OFF, prc);" title=""   />

<area shape="poly" coords="52,104,70,109,76,123,70,135,52,138,37,132,32,122,37,109," 
	href="javascript:sendCmd(codeMaison + '2', ON, prc);" title=""   />

<area shape="poly" coords="141,104,155,110,164,122,156,135,142,140,126,136,120,121,126,108," 
	href="javascript:sendCmd(codeMaison + '2', OFF, prc);" title=""   />

<area shape="poly" coords="53,148,68,153,76,167,69,181,53,184,38,178,32,168,38,154," 
	href="javascript:sendCmd(codeMaison + '3', ON, prc);" title=""   />

<area shape="poly" coords="140,148,155,154,163,167,156,180,139,185,125,179,119,166,126,152," 
	href="javascript:sendCmd(codeMaison + '3', OFF, prc);" title=""   />

<area shape="poly" coords="52,192,66,197,76,211,69,223,53,228,38,224,32,211,39,197," 
	href="javascript:sendCmd(codeMaison + '4', ON, prc);" title=""   />

<area shape="poly" coords="139,193,156,198,162,213,157,224,139,228,124,224,119,209,127,197," 
	href="javascript:sendCmd(codeMaison + '4', OFF, prc);" title=""   />
<!--
<area shape="poly" coords="53,236,69,241,75,256,65,269,53,273,37,268,31,254,38,241," 
	href="" alt="Bright" title=""   />

<area shape="poly" coords="140,237,155,242,164,256,158,269,142,272,124,268,118,254,125,241," 
	href="" alt="Dim" title=""   />
-->
</map>

 

</div>

           

</div>
</body>
</html>