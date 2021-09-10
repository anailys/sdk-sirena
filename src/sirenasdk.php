<?php 

namespace lic\SirenaSdk;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class SirenaSdk
{

    private const GET = "GET";
    private const POST = "POST";
    
    /**
     * clientHttp 
     *
     * @param string $method
     * @param string $url
     * @param array $body
     * @return json
     */
    public function clientHttp( string $method, string $url,  $body = null) 
    {
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        try {
            if ($method == self::GET) {
                if ($body==null) {
                    $response = $client->get($url);
                } else {
                    $response = $client->get($url, $body);
                }
            } else {
                if ($body==null) {
                    $response = $client->post($url);
                } else {
                    $response = $client->post($url, $body);
                }
            }
            
            if ($response->getStatusCode()=='404') {
                throw new Exception("Error, dirección no encontrada! - ".$response->getStatusCode());
            }
            if ($response->getStatusCode()=='500') {
                throw new Exception("Error del servidor! - ".$response->getStatusCode());
            }

            $response = ['status_code' => $response->getStatusCode(),
                                     'data' => $response->getBody()->getContents()];
            dd($response);
            return $response;

        }catch(RequestException $e){
         
          
            // $response = $e->getResponse()->getStatusCode();
            $response = json_encode(['status_code' => $e->getResponse()->getStatusCode(),
                                     'data' => $e->getMessage()
                        ]);
           dd($response);
            //return ['message'=>$e->getResponse()->getStatusCode()];
        }

        
    }

    /**
     * Get List of Prospects 
     *
     * @param string $url
     * @return json
     */

    public function getProspects(string $url)  
    {
        $response = $this->clientHttp(self::GET, $url); 

        return $response;  
    }

    /**
     * Get Prospect
     *
     * @param string $url
     * @param string $prospectId
     * @return json
     */
    public function getProspect(string $url, string $prospectId) 
    {
        $body = ['body' => json_encode(
                [
                    'prospectId' => $prospectId
                ]
            )];

        $response = $this->clientHttp(self::GET, $url, $body); 

        return $response;  
    }

    /**
     * Get Prospectus
     *
     * @param string $url
     * @return json
     */
    public function getChannels( string $url)  :array
    { 
        $response = $this->clientHttp(self::GET, $url); 

        return $response;  
    }

    /**
     * Get Prospectus
     *
     * @param string $url
     * @param string $prospectId
     * @return json
     */
    public function getChannelsByProspectId(string $url, string $prospectId) :array
    {
        $body = ['body' => json_encode(
            [
                'prospectId' => $prospectId
            ]
        )];

        $response = $this->clientHttp(self::GET, $url, $body); 

        return $response;  
    }

    /**
     * Post sendMessageTemplate
     *
     * @param string $url
     * @param string $key
     * @return json
     */
    public function sendMessageTemplate( string $url, string $key) :array
    {
        
        $body = ['body' => json_encode(
                    [
                        'key' => $key
                    ]
                )];

        $response = $this->clientHttp(self::POST, $url, $body); 

        return $response;  
      
    }

    /**
     * Post sendMessage
     *
     * @param string $url
     * @param string $content
     * @return json
     */
    public function sendMessage( string $url, string $content)  :array
    {

        $body = ['body' => json_encode(
            [
                'content' => $content
            ]
        )];

        $response = $this->clientHttp(self::POST, $url, $body); 

        return $response;      
      
    }

    /**
     * Post sendMessage
     *
     * @param string $url
     * @param string $providerId
     * @return json
     */
    public function createInteractionByProspectId(string $url, string $providerId, string $content)  :array
    {

        $body = ['body' => json_encode(
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
        )];

        $response = $this->clientHttp(self::POST, $url, $body); 
        

        return $response;       
      
    }
    
}