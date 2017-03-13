<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();//根据全局变量创建Request对象

//$input = isset($_GET['name'])?$_GET['name']:'ttg';
//$input = $request->get('name','World');


//printf('hello %s', htmlspecialchars($input,ENT_QUOTES,'UTF-8'));
//$response = new Response(sprintf('hello %s',htmlspecialchars($input,ENT_QUOTES,'UTF-8')));
$response = new Response();
//$response->send();


//路由集合
$map = array(
  '/hello' => __DIR__.'/../src/pages/hello.php',
  '/bye'   => __DIR__.'/../src/pages/bye.php'
);

//利用front controller 实现路由分发

$path = $request->getPathInfo();
if(isset($map[$path])){
  ob_start();
  //require $map[$path];
  include $map[$path];
  $response->setContent(ob_get_clean());
}else{
  $response->setStatusCode(404);
  $response->setContent('Not Found');
}

$response->send();
