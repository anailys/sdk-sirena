<?php

test('Send a message to the user through the WhatsApp channel', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $idProspect = "611ece4f7b7ca40008e979ad";
    $contentNota = "Contenido de la nota";
    $urlsendNote = "https://api.getsirena.com/v1/prospect/".$idProspect."/interactions/?api-key=".$apiKey;
    


    $sirenasdk = new lic\sirenasdk\Sirenasdk();
    $result = $sirenasdk->createInteractionByProspectId($urlsendNote,$idProspect,$contentNota);
    
    $this->assertTrue(is_array($result));

});
