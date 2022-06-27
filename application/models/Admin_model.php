<?php
class Admin_model extends CI_Model
{
  public function select_all_kelontong()
  {
    $data = $this->db->get("form");
    return $data;
  }

  //query untuk menu
  public function dataKategori()
  {
    $data = $this->db->get("kategori");
    return $data;
  }
  function input_datakategori($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function dataUser()
  {
    $data = $this->db->get("daftar");
    return $data;
  }

  function inputdata_user($data, $table)
  {
    $this->db->insert($table, $data);
  }

  //CRUD
  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

  public function edit_data($where, $table)
  {
    return $this->db->get_where($table, $where);
  }

  function update_data($where, $data, $table)
  {
    $this->db->where($where);
    $this->db->update($table, $data);
  }

  function hapus_data($where, $table)
  {
    $this->db->where($where);
    $this->db->delete($table);
  }

  function login($user, $pass, $table)
  {
    $this->db->select('*');
    $this->db->from('daftar');
    $this->db->where('username', $user);
    $this->db->where('password', $pass);
    $query = $this->db->get();
    return $query;
  }
}
