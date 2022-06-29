<?php

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    //Construct the parent class
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    // menampilkan data user
    public function users_get()
    {
        //Users from a data store e.g. database
        $users = $this->db->get("daftar")->result();
        $id = $this->get('id');

        if ($id == null) {
            //Check if the users data store contains users
            if ($users) {
                //Set the response and exit
                $this->response($users, 200);
            } else {
                //Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No users were found'
                ], 404);
            }
        } else {
            if (array_key_exists($id, $users)) {
                $this->response($users[$id], 200);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'No such user found'
                ], 404);
            }
        }
    }

    // menampilkan data kategori
    public function index_get($id = 0)
    {
        if (!empty($id)) {
            $data = $this->db->get_where("kategori", ['id' => $id])->row_array();
        } else {
            $data = $this->db->get("kategori")->result();
        }
        $this->response($data, RestController::HTTP_OK);
    }

    // mengirim dan menambah data kategori baru
    public function index_post()
    {
        $data = [
            'id' => $this->post('id'),
            'kategori' => $this->post('Kategori')
        ];
        $insert = $this->db->insert('kategori', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'gagal menambah data!', 502));
        }
    }

    // memperbarui data kategori yang sudah ada
    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'id' => $this->put('id'),
            'kategori' => $this->put('Kategori')
        ];
        $this->db->where('id', $id);
        $update = $this->db->update('kategori', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'gagal menambah data!', 502));
        }
    }

    // menghapus data kategori
    function index_delete()
    {
        $id = $this->delete('id');
        $this->db->where('id', $id);
        $delete = $this->db->delete('kategori');
        if ($delete) {
            $this->response(array('status' => 'sukses menghapus data!'), 201);
        } else {
            $this->response(array('status' => 'gagal menghapus data!', 502));
        }
    }
}
