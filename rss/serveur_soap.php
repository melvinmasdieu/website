<?php

class FluxRss
{

    function getRss()
    {


        $xslDoc = new DOMDocument();
        $xslDoc->load("../lib/c/flux.xsl");

        $xmlDoc = new DOMDocument();
        $urlxml = file_get_contents('http://www.lemonde.fr/sante/rss_full.xml');
        $xmlDoc->loadXml($urlxml);

        $proc = new XSLTProcessor();
        $proc->importStylesheet($xslDoc);

        return $proc->transformToXML($xmlDoc);

    }
}

//Cette option du fichier php.ini permet de ne pas stocker en cache le fichier WSDL, afin de pouvoir faire nos tests
//Car le cache se renouvelle toutes les 24 heures, ce qui n'est pas idéal pour le développement
ini_set('soap.wsdl_cache_enabled', 0);

//L'instanciation du SoapServer se déroule de la même manière que pour le client : voir la doc pour plus d'informations sur les
//Différentes options disponibles
$serversoap = new SoapServer("./flux.wsdl");

//Déclaration de la classe
$serversoap->setClass("FluxRss");


//Ici, on dit très simplement que maintenant c'est à PHP de prendre la main pour servir le Service WEB : il s'occupera de l'encodage XML, des
//Enveloppes SOAP, de gérer les demandes clientes.
$serversoap->handle();

?>