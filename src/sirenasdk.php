<?php 

namespace lic\sirenasdk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7;

class Sirenasdk
{
    /**
     * Get List of Prospects 
     *
     * @param string $url
     * @return json
     */
    public function getProspects($url){
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $response = $client->get($url);

        if ($response->getStatusCode() == '200') //Verifico que me retorne 200 = OK
        {
           // return $response->getBody()->getContents();
        }else{
            //return "Algo salió mal";
        }

        return $response->getBody()->getContents();  
    }

    /**
     * Get Prospectus
     *
     * @param string $url
     * @param string $prospectId
     * @return json
     */
    public function getProspect($url,$prospectId){
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $response = $client->get($url,
            ['body' => json_encode(
                [
                    'prospectId' => $prospectId
                ]
            )]
        );

        if ($response->getStatusCode() == '200') //Verifico que me retorne 200 = OK
        {
           // return $response->getBody()->getContents();
        }else{
            //return "Algo salió mal";
        }

        return $response->getBody()->getContents();  
    }

    /**
     * Get Prospectus
     *
     * @param string $url
     * @return json
     */
    public function getChannels($url){
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $response = $client->get($url);

        if ($response->getStatusCode() == '200') //Verifico que me retorne 200 = OK
        {
           // return $response->getBody()->getContents();
        }else{
            //return "Algo salió mal";
        }

        return $response->getBody()->getContents();  
    }

    /**
     * Get Prospectus
     *
     * @param string $url
     * @param string $prospectId
     * @return json
     */
    public function getChannelsByProspectId($url,$prospectId){

        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $response = $client->get($url,
            ['body' => json_encode(
                [
                    'prospectId' => $prospectId
                ]
            )]
        );

        if ($response->getStatusCode() == '200') //Verifico que me retorne 200 = OK
        {
           // return $response->getBody()->getContents();
        }else{
            //return "Algo salió mal";
        }

        return $response->getBody()->getContents();  
    }

    /**
     * Post sendMessageTemplate
     *
     * @param string $url
     * @param string $key
     * @return json
     */
    public function sendMessageTemplate($url,$key){

        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $response = $client->post($url,
            ['body' => json_encode(
                [
                    'key' => $key
                ]
            )]
        );

        if ($response->getStatusCode() == '200') //Verifico que me retorne 200 = OK
        {
           // return $response->getBody()->getContents();
        }else{
            //return "Algo salió mal";
        }

        return $response->getBody()->getContents();      
      
    }

    /**
     * Post sendMessage
     *
     * @param string $url
     * @param string $content
     * @return json
     */
    public function sendMessage($url,$content){

        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $response = $client->post($url,
            ['body' => json_encode(
                [
                    'content' => $content
                ]
            )]
        );

        if ($response->getStatusCode() == '200') //Verifico que me retorne 200 = OK
        {
           // return $response->getBody()->getContents();
        }else{
            //return "Algo salió mal";
        }

        return $response->getBody()->getContents();      
      
    }

    /**
     * Post sendMessage
     *
     * @param string $url
     * @param string $providerId
     * @return json
     */
    public function createInteractionByProspectId($url,$providerId,$content){

        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        
        $response = $client->post($url,
            ['body' => json_encode(
                [
                    'type' => "note",
                    'providerId' => $providerId,
                    'threadTitle' => "Prueba",
                    'threadUrl' => "threadUrl",
                    'question' => "Probando Nota",
                    'answer' => "answer",
                    'delivered' => true,
                    'cancelReason' => "cancelReason",
                    'utmSource' => "google, newsletter4, billboard, ford, bmw",
                    'startedAt' => "2019-08-24T14:15:22Z",
                    'duration' => 30000,
                    'recordingUrl' => "https://s3.amazonaws.com/recordings_2013/d38b5ff0-5752-4cc1-82ba-e1210232c8d5.mp3",
                    'content' => $content,
                    'sender' => "sender"
                ]
            )]
        );

        if ($response->getStatusCode() == '200') //Verifico que me retorne 200 = OK
        {
           // return $response->getBody()->getContents();
        }else{
            //return "Algo salió mal";
        }

        return $response->getBody()->getContents();      
      
    }
    
}