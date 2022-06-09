<?php
class Admin_model extends CI_Model
{
    public function select_all_kelontong()
    {
        $data = $this->db->get("form");
        return $data;
    }
    function input_data($data,$table){
		$this->db->insert($table,$data);
    }
}

