<?php
ini_set('soap.wsdl_cache_enabled', 0);

//On doit passer le fichier WSDL du Service en paramètre de l'objet SoapClient()
$wsdl = "http://localhost/rss/flux.wsdl";
$service = new SoapClient($wsdl);

//À partir de là, on peut déjà faire appel aux méthodes du service décrites dans le WSDL
$taballservices = $service->getRss();

//On renvoie le résutat de notre méthode, pour voir....

echo $taballservices;

?>
