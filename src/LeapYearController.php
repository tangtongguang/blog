<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LeapYearController{
  public function indexAction(Request $request){
    if($this->is_leap_year($request->attributes->get('year'))){
      return new Response('Yep, this is a leap year');
    }

    return new Response('Nope, this is not a leap year');
  }

    function is_leap_year($year = null) {
        if (null === $year) {
            $year = date('Y');
        }

        return 0 === $year % 400 || (0 === $year % 4 && 0 !== $year % 100);
    }
}
