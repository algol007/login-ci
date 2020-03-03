<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('tb_user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function access($id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get_where('tb_user_role', ['id' => $id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/access', $data);
        $this->load->view('templates/footer');
    }

    public function changeAccess()
    {
        $menuId = $this->input->post('menuId');
        $roleId = $this->input->post('roleId');

        $data = [
            'role_id' => $roleId,
            'menu_id' => $menuId
        ];

        $result = $this->db->get_where('tb_user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('tb_user_access_menu', $data);
        } else {
            $this->db->delete('tb_user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access changed!
        </div>');
    }
}
