<?php

test('Send a message to the user through the WhatsApp channel', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $idProspect = "611ece4f7b7ca40008e979ad";
    $chanel = "whatsapp";
    $content = "Hola Ana es un placer enviar un menssaje conversacional";
    $urlsendMessage = "https://api.getsirena.com/v1/prospect/".$idProspect."/messaging/".$chanel."?api-key=".$apiKey;

    $sirenasdk = new lic\sirenasdk\Sirenasdk();
    $result = $sirenasdk->sendMessage($urlsendMessage, $content);
    
    $this->assertTrue(is_array($result));

});
