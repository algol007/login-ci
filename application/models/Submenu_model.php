<?php

class Submenu_model extends CI_Model
{
    public function getAllSubmenu()
    {
        $query = "SELECT `tb_user_submenu`.*,`tb_user_menu`.`menu`
                    FROM `tb_user_submenu` JOIN `tb_user_menu`
                      ON `tb_user_submenu`.`menu_id` = `tb_user_menu`.`id`        
        ";
        return $this->db->query($query)->result_array();
    }

    public function addSubmenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu_id'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->insert('tb_user_submenu', $data);
    }

    public function getSubmenuById($id)
    {
        $this->db->get_where('tb_user_submenu', ['id' => $id])->row_array();
    }

    public function editSubmenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu_id'),
            'title' => $this->input->post('title'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tb_user_submenu', $data);
    }

    public function deleteSubmenu($id)
    {
        $this->db->delete('tb_user_submenu', ['id' => $id]);
    }
}
