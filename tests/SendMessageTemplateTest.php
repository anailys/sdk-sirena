<?php

test('Send a message to the user through the WhatsApp channel', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $idProspect = "611ece4f7b7ca40008e979ad";
    $chanel = "whatsapp";
    $key = "c57095d8-0b86-443c-a3a0-48aaf3b923b8";
    $urlSendTemplante = "https://api.getsirena.com/v1/prospect/".$idProspect."/messaging/".$chanel."/notification?api-key=".$apiKey;


    $sirena = new Sirena\Sirena();
    $result = $sirena->sendMessageTemplate($urlSendTemplante, $key);
    
    $this->assertTrue(is_array($result));

});
