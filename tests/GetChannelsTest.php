<?php

test('Get whatsapp channel template', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $urlChannels = "https://api.getsirena.com/v1/messaging/channels?api-key=".$apiKey;

    $sirena = new Sirena\Sirena();
    $result = $sirena->getChannels($urlChannels) ;
    
    $this->assertTrue(is_array($result));

});


test('Error getting templates for WhatsApp channel', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $urlChannels = "https://api.getsirena.com/v1/messaging/channels?api-key=".$apiKey;

    $sirena = new Sirena\Sirena();
    
    $result = $sirena->getChannels($urlChannels) ;
    
    $this->assertTrue(is_array($result));

});