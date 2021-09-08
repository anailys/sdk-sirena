<?php
include __DIR__ . "/../vendor/autoload.php";

$sirenasdk = new lic\sirenasdk\Sirenasdk();

$apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
$idProspect = "611ece4f7b7ca40008e979ad";
$chanel = "whatsapp";
$key = "c57095d8-0b86-443c-a3a0-48aaf3b923b8";
$content = "Hola Ana es un placer enviar un menssaje conversacional";
$contentNota = "Contenido de la nota";
$urlProspect = "https://api.getsirena.com/v1/prospects/".$idProspect."?api-key=".$apiKey;
$urlProspects = "https://api.getsirena.com/v1/prospects?api-key=".$apiKey;
$urlChannels = "https://api.getsirena.com/v1/messaging/channels?api-key=".$apiKey;
$urlSendTemplante = "https://api.getsirena.com/v1/prospect/".$idProspect."/messaging/".$chanel."/notification?api-key=".$apiKey;
$urlsendMessage = "https://api.getsirena.com/v1/prospect/".$idProspect."/messaging/".$chanel."?api-key=".$apiKey;
$urlsendNote = "https://api.getsirena.com/v1/prospect/".$idProspect."/interactions/?api-key=".$apiKey;

///echo $urlSendTemplante;

//echo $sirenasdk->getProspects($urlProspects);

//echo $sirenasdk->getProspect($urlProspects,$idProspect);

//echo $sirenasdk->getChannels($urlChannels);
//echo $sirenasdk->getChannelsByProspectId($urlChannels,$idProspect);

 
 //echo $sirenasdk->sendMessageTemplate($urlSendTemplante,$key);
 //echo $sirenasdk->sendMessage($urlsendMessage,$content);
 echo $sirenasdk->createInteractionByProspectId($urlsendNote,$idProspect,$contentNota);