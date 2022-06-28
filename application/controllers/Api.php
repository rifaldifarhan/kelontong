<?php

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    //Construct the parent class
    function __construct()
    {
        parent::__construct();
    }

    public function users_get()
    {
        //Users from a data store e.g. database
        $users = [
            ['id' => 0, 'name' => 'Aldi', 'email' => 'rifaldifarhan24@gmail.com'],
            ['id' => 1, 'name' => 'Ridho', 'email' => 'ridhoroma@gmail.com'],
            ['id' => 2, 'name' => 'Rahma', 'email' => 'rahmaromadhona@gmail.com'],
            ['id' => 3, 'name' => 'Vivi', 'email' => 'nurafifah@gmail.com'],
            ['id' => 4, 'name' => 'Eka', 'email' => 'ekafahrika@gmail.com'],
        ];

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
}
