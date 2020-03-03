<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model');
        $this->load->model('Submenu_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->Menu_model->getAllMenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->Menu_model->getAllMenu();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->addMenu();
            $this->session->set_flashdata('message', 'New menu added!');
            redirect('menu');
        }
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->Menu_model->getAllMenu();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->editMenu();
            $this->session->set_flashdata('message', 'Menu has been edited!');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->Menu_model->deleteMenu($id);
        $this->session->set_flashdata('message', 'Menu has been deleted!');
        redirect('menu');
    }

    public function subMenu()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Submenu Management';
        $data['submenu'] = $this->Submenu_model->getAllSubmenu();
        $data['menu'] = $this->db->get('tb_user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    public function addSubmenu()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Submenu Management';
        $data['submenu'] = $this->Submenu_model->getAllSubmenu();
        $this->form_validation->set_rules('title', 'Title', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Submenu_model->addSubmenu();
            $this->session->set_flashdata('message', 'New submenu added!');
            redirect('menu/submenu');
        }
    }

    public function editSubmenu()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Submenu Management';
        $data['submenu'] = $this->Submenu_model->getAllSubmenu();
        $this->form_validation->set_rules('title', 'Title', 'required');
        $data['menu'] = $this->Menu_model->getAllMenu();


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Submenu_model->editSubmenu();
            $this->session->set_flashdata('message', 'Submenu has been edited!');
            redirect('menu/submenu');
        }
    }

    public function deleteSubmenu($id)
    {
        $this->Submenu_model->deleteSubmenu($id);
        $this->session->set_flashdata('message', 'Submenu has been deleted!');
        redirect('menu/submenu');
    }
}
