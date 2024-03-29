<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LoginModel;

class User extends BaseController
{
    protected $LoginModel;
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->LM = new LoginModel();
    }

    public function index()
    {
          if (session()->nip_emp==null){
                return redirect()->to(base_url('Siak/Signin'));
            }
         if (session()->type!='superadmin'){
                return redirect()->to(base_url('Siak'));
            }

        $data = [
            'title' => 'Users',
            'data' => $this->LM->getUsersAll(),
            'total' => $this->LM->countAll()
        ];
        return view('main/User/index', $data);
    }

  public function simpanData()
    {
          if (session()->nip_emp==null){
                return redirect()->to(base_url('Siak/Signin'));
            }

        $validation = \Config\Services::validation();
        $valid = $this->validate([
            'nip' => [
                'label' => 'Nama Admin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'userType' => [
                'label' => 'Type',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ]);

        $adminName  = $this->request->getPost('nip');
        $username   = $this->request->getPost('username');
        $password   = md5(md5($this->request->getPost('password')));
        $userType   = $this->request->getPost('userType');
        // dd($adminName,$username,$password,$userType);

        if (!$valid) {
            // dd('fail');
            $pesan = [
                'errorAdminName'=> '<div class="validate text-danger"><strong>' . $validation->getError('nip') . '</strong></div>',
                'errorUsername' => '<div class="validate text-danger"><strong>' . $validation->getError('username') . '</strong></div>',
                'errorPassword' => '<div class="validate text-danger"><strong>' . $validation->getError('password') . '</strong></div>',
                'errorUserType' => '<div class="validate text-danger"><strong>' . $validation->getError('userType') . '</strong></div>',
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Siak/User');
        }else {
            // dd('success');
            $this->LM->createUser(array(
                'username'  => $username,
                'password'  => $password,
                'type'      => $userType,
                'Admin_name'=> $adminName,
            ));
            $pesan = [
                'sukses' => '<div class="alert alert-primary">User berhasil ditambahkan...</div>'
            ];
            session()->setFlashdata($pesan);
            return redirect()->to('Siak/User');
        }
    }

       public function deleteUser()
    {

         if (session()->id==null){
            return false;
        }
     
        $id = $this->request->getPost('id_user');
        $this->LM->deleteUser($id);

        echo json_encode(array('status' => 'ok;', 'text' => ''));

    }
}
