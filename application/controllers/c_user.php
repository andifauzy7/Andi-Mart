<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class c_user extends CI_Controller
{
	
	public function __construct()
	{	
		parent::__construct(); 
		$this->load->model(array('m_user'));
		$this->load->library(array('form_validation', 'template', 'encrypt'));
	}

	public function register()
	{
		$this->load->view('v_daftar');
	}

	public function pendaftaran()
	{
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) { 
            redirect('c_user/register');
        }
        else {
            $email      = $this->input->post('email');
            $password   = $this->input->post('password');
            $nama       = $this->input->post('nama_lengkap');
            $no_hp      = null;
            $alamat     = null;
            $kota       = null;

            $check = $this->m_user->getUserWhere(array('email_user' => $email));

            if (!$check){
           	$key = 'andimart2021';
            $encrypted_password = $this->encrypt->encode($password, $key);

            $rand = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($rand), 0, 12);

            $user = array(
                    'email_user'    => $email,
                    'password'      => $encrypted_password,
                    'nama_user'     => $nama,
                    'no_hp_user'    => $no_hp,
                    'alamat_user'   => $alamat,
                    'kota_user'     => $kota,
                    'code'          => $code,
                    'status'        => 0
                );
            $id = $this->m_user->insert($user);

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.gmail.com', //Ubah sesuai dengan host anda
                'smtp_port' => 465,
                'smtp_user' => 'daszitat.id@gmail.com', // Ubah sesuai dengan email yang dipakai untuk mengirim konfirmasi
                'smtp_pass' => 'masbuloh123', // ubah dengan password host anda
                'smtp_crypto' => 'ssl',
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );

            $message = "
                    <html>
                    <head>
                    <title>Verification Code</title>
                    </head>
                    <body>
                    <h2>Thank you for Registering.</h2>
                    <p>Your Account:</p>
                    <p>Email: ".$email."</p>
                    <p>Password: ".$password."</p>
                    <p>Please click the link below to activate your account.</p>
                    <h4><a href='".base_url()."c_user/verifikasiAkun/".$id."/".$code."'>Activate My Account</a></h4>
                    </body>
                    </html>
                ";

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject('Signup Verification Email');
            $this->email->message($message);

                if($this->email->send()){
                    redirect('c_user/login');
                } else {
                    redirect('c_user/register');
                }
            } else{
            		//redirect('c_user/register');
            	print_r('gagal');
            }
        }
	}

    public function verifikasiAkun()
    {
        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);

        $user = $this->m_user->getUser($id);

        if($user['code'] == $code){
      
            $data['status'] = 1;
            $query = $this->m_user->activate($data, $id);

            if($query){
                print_r('success');
                redirect('c_user/login');
            } else {
                print_r('gagal');
                //redirect
            }
        } else{
           print_r('gagal');
           //redirect
        }

    }

    public function show_profile () {
    	if( ! $this->session->userdata('logged_in')){
        	print_r('Anda harus Login terlebih dahulu'); 
        	redirect('c_user/login');
        } else {
    	$email = $this->session->get_userdata();
    	$check['user'] = $this->m_user->getUserWhere(array('email_user' => $email['email']));

    	$this->template->utama('v_edit_profile', $check);
    	}
    }

    public function edit_profile () {

    	$id = $this->uri->segment(3);
        $nama       = $this->input->post('nama_lengkap');
        $no_hp      = $this->input->post('no_hp');
        $alamat     = $this->input->post('alamat');
        $kota       = $this->input->post('kota');

        $data = array(
        		'nama_user' => $nama, 
        		'no_hp_user' => $no_hp,
        		'alamat_user' => $alamat,
        		'kota_user' => $kota
        	);
        $update = $this->m_user->update($data, $id);
        if($update){
        	print_r('success');
        	redirect('c_user/show_profile');
        } else {
        	print_r('gagal');
        	redirect('c_user/show_profile');
        }
    }

    public function login () {
    	$this->load->view('v_login');
    }

	public function login_user ()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $check = $this->m_user->getUserWhere(array('email_user' => $email));
        if(empty($check)){
           	print_r('Email Tidak Ditemukan');
        } else if ($check['status'] == 0){
        	print_r('Akun Belum Diverifikasi');
        } else {
        	$key = 'andimart2021';
            $encrypted_password = $check['password'];
            $decrypted_password = $this->encrypt->decode($encrypted_password, $key);

            if ($password == $decrypted_password){

                $session = array(
                  'logged_in' => true,
                  'email' => $check['email_user'],
                  'name' => $check['nama_user']
                );

                $this->session->set_userdata($session);
                $get_session    = $this->session->get_userdata();
                $sessionCheck  = $get_session['logged_in'];
                if ($sessionCheck){
                	if ($check['no_hp_user'] == NULL || $check['alamat_user'] == NULL || $check['kota_user'] == NULL) {
			        	redirect('c_user/show_profile');
			    	} else {
			    		redirect('c_barang');
			    	}
                } else {
                    print_r('gagal');
           			redirect('c_user/login');
                }
            } else {
            	print_r('Password Salah');
           		redirect('c_user/login');
            }
        }

    }
    
    public function logout(){
		$get_session = array('logged_in', 'email', 'name', );
		$this->cart->destroy();
		$this->session->unset_userdata($get_session);
        redirect('c_barang');
    }
}