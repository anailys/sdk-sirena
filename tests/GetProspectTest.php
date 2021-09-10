<?php

test('Get a prospect based on an ID', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $idProspect = "611ece4f7b7ca40008e979ad";
    $urlProspects = "https://api.getsirena.com/v1/prospects?api-key=".$apiKey;
    
    $sirenasdk = new lic\SirenaSdk\SirenaSdk();
    $result = $sirenasdk->getProspect($urlProspects, $idProspect);
    $this->assertTrue(is_array($result));

});



test('Expect get a prospect based on an ID', function () {
    
    $apiKey = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    $idProspect = "611ece4f7b7ca40008e979ad";
    $urlProspects = "https://api.getsirena.com/v1a/prospects?api-key=".$apiKey;
    
    $sirenasdk = new lic\SirenaSdk\SirenaSdk();
    $sirenasdk->getProspect($urlProspects, $idProspect);

    expect(false)->toBeFalse();
});