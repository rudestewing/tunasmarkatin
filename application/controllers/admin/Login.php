<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
		{
			parent :: __construct();
			$this->load->library('form_validation');
			$this->load->model('login_model');
		}



		public function index()
		{
			
			$this->load->view('login_views');

		}
		public function login_action()
		{

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $myquery = $this->db->query("SELECT * FROM user WHERE username = '$username'");
        $row = $myquery->row();

        if (isset($row))
        {
            $hash = $row->password;

            if (password_verify($password, $hash)) {

               $data_session = array(
				'nama' => $username,
				'status' => "login"
				);
               
               $this->session->set_userdata( $data_session );
               redirect('admin/user','refresh');

            } else {

               $this->session->set_flashdata('gagal', '<div class="alert alert-danger">Oops... gagal silakan login ulang atau silakan register</div>');
               redirect('admin/login','refresh');
            }

		}

	}
		public function register()
		{


			if (isset($_POST['register'])) {
				
				$this->form_validation->set_rules('username', 'Username','required|min_length[5]|max_length[12]|is_unique[user.username]',
        		array(
                'required'      => 'Username Belum Terisi.',
                'is_unique'     => 'Username Sudah Digunakan.'));
				$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]',
				array(
					'required'      => 'Password Belum Terisi.'));
				$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required|matches[password]',
				 array(
				 	'required'      => 	'Password Confirmation Terisi.',
				 	'matches'		=>  'Password Tidak Sama. ' ));
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
				 array(
				 	'required'		=>	'Email Belum Terisi.',
				 	'valid_email'	=>	'Email Tidak Valid'
				 ));	


				if ($this->form_validation->run() == TRUE) {
					
					$data = array(
									'username' 		=>	$this->input->post('username'),
									'password' 		=>	password_hash($this->input->post('password'),PASSWORD_BCRYPT),
									'email' 		=>	$this->input->post('email'),
									'nama_user' 	=>	$this->input->post('name'),
									'phone' 		=>	$this->input->post('phone'),
									'level'			=>	'admin');

					$this->db->insert('user', $data);
					$this->session->set_flashdata('success', 'Registrasi Berhasil Silakan Login');
					redirect('admin/login/register','refresh');
					}
				}
				$this->load->view('register_views', FALSE);
			}
			function logout(){
			$this->session->sess_destroy();
			redirect(base_url('admin/login'));
			}

}

/* End of file Login.php */
/* Location: ./application/controllers/admin/Login.php */