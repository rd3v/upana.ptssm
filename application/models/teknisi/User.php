<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function userAuth($user)
    {
        $this->db->select('id,name,email,remember_token,accesstype,no_telp');
        $this->db->from('users');
        $this->db->where('name',$user['username']);
        $this->db->where('password',md5($user['password']));
        
        $result = $this->db->get()->result_array();

        if($result == []) {
            return false;
        }else{
            if($result[0]['accesstype'] != "teknisi") {
                return false;
            }
            return $result;
        }
    }

    public function checkAuth($id,$token)
    {
        $this->db->select('id');
        $this->db->where('token',$token);
        $this->db->where('id',$id);
        $this->db->from("users");
        $result = $this->db->get()->result_array();

        if($result == []) {
            return false;
        }

        return true;
    }

    public function checkAuthMitra($id_mitra,$token) {
        $this->db->select("id");
        $this->db->where("id_mitra",$id_mitra);
        $this->db->where("token",$token);
        $this->db->from("mitra");
        $result = $this->db->get()->result_array();

        if($result == []) {
            return false;
        }

        return true;
    }

    public function isEmailExist($email)
    {
        $this->db->select('email');
        $this->db->from('users');
        $this->db->where('email',$email);

        $result = $this->db->get()->result_array();
        if($result == []){
            return false;
        }

        return true;
    }

    public function addUser($user)
    {
       return $this->db->insert('users',$user);
    }

    public function userInfo($id,$type = "*")
    {
        $this->db->select($type);
        $this->db->where('id',$id);
        $this->db->from('users');

        $result = $this->db->get()->result_array();

        return $result[0];
    }

}