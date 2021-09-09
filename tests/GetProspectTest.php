<?php

test('Send a message to the user through the WhatsApp channel', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $idProspect = "611ece4f7b7ca40008e979ad";
    $urlProspects = "https://api.getsirenas.com/v1/prospects?api-key=".$apiKey;
    
    $sirenasdk = new lic\SirenaSdk\SirenaSdk();
    $result = $sirenasdk->getProspect($urlProspects, $idProspect);
    print_r($result);
    
    $this->assertTrue(is_array($result));

});