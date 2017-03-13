<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;


$request = Request::createFromGlobals();//根据全局变量创建Request对象
$routes = include __DIR__.'/../src/app.php';

$context = new Routing\RequestContext();
$context->fromRequest($request);
//print_r($routes);
$matcher = new Routing\Matcher\UrlMatcher($routes,$context);


//$input = isset($_GET['name'])?$_GET['name']:'ttg';
//$input = $request->get('name','World');


//printf('hello %s', htmlspecialchars($input,ENT_QUOTES,'UTF-8'));
//$response = new Response(sprintf('hello %s',htmlspecialchars($input,ENT_QUOTES,'UTF-8')));
//$response = new Response();
//$response->send();


//路由集合
// $map = array(
//   '/hello' => 'hello',
//   '/bye'   => 'bye'
// );

//利用front controller 实现路由分发

// $path = $request->getPathInfo();
// if(isset($map[$path])){
//   ob_start();
//   //require $map[$path];
//   //include $map[$path];
//   extract($request->query->all(),EXTR_SKIP);
//   include sprintf(__DIR__.'/../src/pages/%s.php',$map[$path]);
//   $response= new Response(ob_get_clean());
// }else{
//   $response= new Response('Not Found',404);
// }

//利用routing实现路由转发

try{
  extract($matcher->match($request->getPathInfo()),EXTR_SKIP);
  ob_start();

  include sprintf(__DIR__.'/../src/pages/%s.php',$_route);

  $response = new Response(ob_get_clean());
}catch(Routing\Exception\ResourceNotFoundException $e){
  $response = new Response('Not Found',404);
}catch(Exception $e){
  $response = new Response('An error occurred',500);
}

$response->send();
