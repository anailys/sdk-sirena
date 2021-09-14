<?php 

namespace Sirena;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;

class Sirena
{

    private const GET = "GET";
    private const POST = "POST";
    private const APIKEY = "Yf9EkNsI4w5NFCo5r8w3r30F6P1oi2O7";
    
    /**
     * clientHttp: Es la función encargada de instanciar el cliente de Guzzle para permitir consumir servicios.
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
           // dd($response);
            return $response;

        }catch(RequestException $e){
         
          
            // $response = $e->getResponse()->getStatusCode();
            $response = json_encode(['status_code' => $e->getResponse()->getStatusCode(),
                                     'data' => $e->getMessage()
                        ]);
           //dd($response);
            //return ['message'=>$e->getResponse()->getStatusCode()];
        }

        
    }

    /**
     * Get List of Prospects: Nos permite consumir el servicio de getProspects de Sirena y es para listar la información de todos los contantos con los que tenemos una conversación en Sierena. 
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
     * Get Prospect: Nos permite consumir el servicio de getProspect de Sirena y es para obtenerla información de tun contanto con los que tenemos una conversación en Sierena según si prospectID.
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
     * getChannels: Nos permite obtener los canales de comunicación y sus plantillas
     *
     * @param string $url
     * @return json
     */
    public function getChannels( string $url)  
    { 
        $response = $this->clientHttp(self::GET, $url); 

        return $response;  
    }

    /**
     * getChannelsByProspectId: Nos permite acceder  a los canales de comunicación disponibles para una conversación, segun el prospectID.
     *
     * @param string $url
     * @param string $prospectId
     * @return json
     */
    public function getChannelsByProspectId(string $url, string $prospectId) 
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
     * Post sendMessageTemplate: Para enviar una plantilla a un prospect
     *
     * @param string $url
     * @param string $key
     * @return json
     */
    public function sendMessageTemplate( string $url, string $key) 
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
     * Post sendMessage: Para envias un mensaje conversacional a un prospect determinado
     *
     * @param string $url
     * @param string $content
     * @return json
     */
    public function sendMessage( string $url, string $content)  
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
     * Post createInteractionByProspectId: Nos permite enviar una nota interna a una conversación determinada.
     *
     * @param string $url
     * @param string $providerId
     * @return json
     */
    public function createInteractionByProspectId(string $url, string $providerId, string $content)  
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