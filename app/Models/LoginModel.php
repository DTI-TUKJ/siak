<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{
    protected $table      = 'user';
    // protected $table2      = 'customer';

  
    public function getUsers($username)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('employe_master', 'user.Admin_name=employe_master.id');
        // $builder->join('ms_unit', 'master_pegawai.id_unit_pgw=ms_unit.kode_unit', 'left');
        $builder->where('username', $username);
        $builder->orderBy('user.id', 'ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }
    
    public function createUser($data)
    {
        $query = $this->db->table($this->table)->insert($data);
        return $query;
    }

    
      public function getUsersAll()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
       $builder->join('employe_master', 'user.Admin_name=employe_master.id');
        // $builder->join('ms_unit', 'master_pegawai.id_unit_pgw=ms_unit.kode_unit', 'left');
       
        $builder->orderBy('user.id', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    
    }
     public function getDataAdminByIdEmp($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        // $builder->join('ms_unit', 'master_pegawai.id_unit_pgw=ms_unit.kode_unit', 'left');
        $builder->where('Admin_name', $id);
        $builder->orderBy('user.id', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    
    }
    
        public function getDataSession($username)
    {
        $builder = $this->db->table($this->table);
        $builder->select('employe_master.*, user.type');
       $builder->join('employe_master', 'user.Admin_name=employe_master.id');
        // $builder->join('ms_unit', 'master_pegawai.id_unit_pgw=ms_unit.kode_unit', 'left');
        $builder->where('username', $username);
        $builder->orderBy('user.id', 'ASC');
        $query = $builder->get();
        return $query->getRowArray();
    }

    public function Chekdata($nip)
    {
        $builder = $this->db->table('employe_master');
        $builder->select('*');

        $builder->where('nip_emp', $nip);
        $query = $builder->get();
        return $query->getResultArray();
    }

     public function getDataEmpByNip($nip)
    {
        $builder = $this->db->table('employe_master');
        $builder->select('*');

        $builder->where('nip_emp', $nip);
        $query = $builder->get();
        return $query->getRowArray();
    }

     public function addEmployee($data)
    {
        $query = $this->db->table('employe_master')->insert($data);
        return $query;
    }

    public function updateEmployee($data, $id)
    {
        $query = $this->db->table('employe_master')->update($data, array('nip_emp' => $id));
        return $query;
    }

         public function getOwner($owner)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
         $builder->join('employe_master', 'user.Admin_name=employe_master.id');
        $builder->where('type', $owner);
        $query = $builder->get();
        return $query->getResultArray();
    }

     public function deleteUser($id)
    {
        $query = $this->db->table($this->table)->delete(array('Admin_name' => $id));
        return $query;
    }    

    //  public function getUsersByUsername($username)
    // {
    //     $builder = $this->db->table($this->table);
    //     $builder->select('*');
    //     $builder->join($this->table2, $this->table.'.id ='.$this->table2.'.id_user', 'left');
    //     $builder->where('username', $username);
    //     $builder->orderBy('users.id', 'ASC');
    //     $query = $builder->get();
    //     return $query->getResultArray();
    // }

    // public function updateUser($data, $id)
    // {
    //     $query = $this->db->table($this->table)->update($data, array('id' => $id));
    //     return $query;
    // }


}
