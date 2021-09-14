# SirenaSdk

## Nueva instancia de la clase Sirena
$sirenasdk = new lic\SirenaSdk\SirenaSdk();

## Prospecto
- Conversasiones en el canal de WhatasApp
## Obtener prospectos
- Devuelve una lista con la información de los prospectos 
$result = $sirenasdk->getProspects($urlProspects);

## Obtener prospecto según ID
- Para obtener la información de un pospecto especifico por su ID
$result = $sirenasdk->getProspect($urlProspects, $idProspect);

## Obtener Canales
- lista los canales disponibles con sus plantillas
$result = $sirenasdk->getChannels($urlChannels);

## Obtener canas según ProspectID
- lista de canales y plantilla disponibles para un prospecto
$result = $sirenasdk->getChannelsByProspectId($urlChannels,$idProspect);

## Enviar mensaje usando plantilla
- Para enviar plantilla es requerida la key de la plantilla a enviar, funciona para iniciar una conversación o para interacción
$result = $sirenasdk->sendMessageTemplate($urlSendTemplante, $key);

## Enviar mensaje conversacional
- Para enviar plantilla es necesario que exista una interacción con el pospecto menor a 24 horas.
$result = $sirenasdk->sendMessage($urlsendMessage, $content);

## Envío de nota interna
- Para enviao de nota interna entre agentes con información relevante.
$result = $sirenasdk->createInteractionByProspectId($urlsendNote,$idProspect,$contentNota);


