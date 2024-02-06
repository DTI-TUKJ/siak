<?php

namespace App\Controllers;
use App\Models\TestingModel;
use App\Models\LoginModel;

class Home extends BaseController
{
    public function __construct()
    {
        // session_start();
        // $this->validation =  \Config\Services::validation();
        $this->TM = new TestingModel();
        $this->LM = new LoginModel();
          helper('cookie');

        set_cookie('my_cookie', 'nilai_cookie', 3600, '', '', false, true);
   
    }
    public function index()
    { 
         //print_r(session()->get());
        if (session()->nip_emp==null){
                return redirect()->to(base_url('Siak/Signin'));
            }
        return view('main/dashboard/index_new');
    }
}
