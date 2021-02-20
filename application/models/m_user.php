<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_user extends CI_Model {
    
    public function getAllUsers(){
      $query = $this->db->get('user');
      return $query->result(); 
    }

    public function insert($user){
      $this->db->insert('user', $user);
      return $this->db->insert_id(); 
    }

    public function getUser($id){
      $query = $this->db->get_where('user',array('id_user'=>$id));
      return $query->row_array();
    }

    public function getUserWhere($where){
      $query = $this->db->get_where('user',$where);
      return $query->row_array();
    }

    public function activate($data, $id){
      $this->db->where('user.id_user', $id);
      return $this->db->update('user', $data);
    }

    public function update($data, $id){
      $this->db->where('user.id_user', $id);
      return $this->db->update('user', $data);
    }
}