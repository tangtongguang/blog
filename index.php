<?php
require_once __DIR__.'/vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();

//$input = isset($_GET['name'])?$_GET['name']:'ttg';
//$input = $request->get('')
$input = $request->get('name','World');

$response = new Response();
//printf('hello %s', htmlspecialchars($input,ENT_QUOTES,'UTF-8'));
$response->setContent(sprintf('hello %s',htmlspecialchars($input,ENT_QUOTES,'UTF-8')));
//$response->setContent(sprintf('hello %s',$input));
$response->send();
