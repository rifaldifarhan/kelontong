<?php
class Admin_model extends CI_Model
{
  public function select_all_kelontong()
  {
    $data = $this->db->get("form");
    return $data;
  }
  function input_data($data, $table)
  {
    $this->db->insert($table, $data);
  }

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
}
