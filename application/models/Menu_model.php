<?php

class Menu_model extends CI_Model
{
    public function getAllMenu()
    {
        return $this->db->get('tb_user_menu')->result_array();
    }

    public function addMenu()
    {
        $data = [
            'menu' => $this->input->post('menu')
        ];

        $this->db->insert('tb_user_menu', $data);
    }

    public function getMenuById($id)
    {
        $this->db->get_where('tb_user_menu', ['id' => $id])->row_array();
    }

    public function editMenu()
    {
        $data = [
            'menu' => $this->input->post('menu')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_user_menu', $data);
    }

    public function deleteMenu($id)
    {
        $this->db->delete('tb_user_menu', ['id' => $id]);
    }
}
