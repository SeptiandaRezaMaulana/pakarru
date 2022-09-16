<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function getData()
    {
        $query = "SELECT * from user";

        return $this->db->query($query)->result_array();
    }

    public function getById($id_user)
    {
        $query = "SELECT * from user
                    WHERE id = '$id_user'";

        return $this->db->query($query)->result_array();
    }

}
