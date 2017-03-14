<?php
require_once __DIR__.'/ResponseEvent.php';

class GoogleListener{
  public function onResponse(ResponseEvent $event){
    $response = $event->getResponse();

    if ($response->isRedirection()
          || ($response->headers->has('Content-Type') && false === strpos($response->headers->get('Content-Type'), 'html'))
          || 'html' !== $event->getRequest()->getRequestFormat()
      ) {
          return;
      }

      $response->setContent($response->getContent().' GA code');
  }
}
 ?>
