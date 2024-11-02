<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }
    public function index()
    {
        $data['users'] = $this->user_model->getUsers();
        $this->load->view('user/list_all', $data);
    }
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone_no = $this->input->post('phone_no');
            $address = $this->input->post('address');
            $data = array(
                'name' => $name,
                'email' => $email,
                'phone_no' => $phone_no,
                'address' => $address,
            );
            $status = $this->user_model->insertUser($data);
            if ($status == true) {
                $this->session->set_flashdata('success', 'successfully inserted');
                redirect(base_url('user/index'));
            } else {
                $this->session->set_flashdata('error', 'error');
                $this->load->view('user/form');
            }
        } else {
            $this->load->view('user/form');
        }
    }
    public function edit($id)
    {
        // Fetch the user data based on the ID
        $data['user'] = $this->user_model->getUser($id);

        // Check if the user exists
        if (empty($data['user'])) {
            // If user not found, you might want to redirect or show an error
            $this->session->set_flashdata('error', 'User not found');
            redirect(base_url('user/index'));
            return; // Stop further execution
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $phone_no = $this->input->post('phone_no');
            $address = $this->input->post('address');

            $updateData = array(
                'name' => $name,
                'email' => $email,
                'phone_no' => $phone_no,
                'address' => $address,
            );

            // Update the user in the database
            $status = $this->user_model->updateUser($id, $updateData); // Pass $id to updateUser

            if ($status) {
                $this->session->set_flashdata('success', 'User data updated successfully');
                redirect(base_url('user/index')); // Redirect to user index after successful update
            } else {
                $this->session->set_flashdata('error', 'Error updating user');
                // Re-load the edit view with the user data to show the current information
                $this->load->view('user/edit', $data);
            }
        } else {
            // Load the view for editing the user with the retrieved user data
            $this->load->view('user/edit', $data);
        }
    }


    public function delete($id)
    {
        $status = $this->user_model->deleteUser($id);

        if ($status) {
            $this->session->set_flashdata('success', 'User data deleted successfully');
        } else {
            $this->session->set_flashdata('error', 'Error deleting user');
        }

        redirect(base_url('user/index'));
    }
}
