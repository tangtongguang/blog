<?php
require_once __DIR__.'/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();//根据全局变量创建Request对象

//$input = isset($_GET['name'])?$_GET['name']:'ttg';
//$input = $request->get('name','World');


//printf('hello %s', htmlspecialchars($input,ENT_QUOTES,'UTF-8'));
//$response = new Response(sprintf('hello %s',htmlspecialchars($input,ENT_QUOTES,'UTF-8')));
$response = new Response();
//$response->send();
