<?php

namespace App\Controllers;

class Index extends BaseController
{
      public function __construct()
    {
        //   helper('cookie');

        // set_cookie('my_cookie', 'nilai_cookie', 3600, '', '', false, true);
   
    }
    public function index()
    { 
        return view('landingPage/index.php');
    }
}
