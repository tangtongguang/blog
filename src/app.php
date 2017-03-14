<?php

use Symfony\Component\Routing;
use Symfony\Component\HttpFoundation\Response;

require_once __DIR__.'/LeapYearController.php';

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', array(
    'year' => null,
    //'_controller' => array(new LeapYearController(), 'indexAction'),
    '_controller' =>'LeapYearController::indexAction'
)));

return $routes;