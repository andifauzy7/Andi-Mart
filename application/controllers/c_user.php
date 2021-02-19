<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class c_user extends CI_Controller
{
	
	function __construct()
	{	
		$this->load->model(array('m_user'));
		$this->load->library(array('form_validation', 'encrypt'));
	}

	function pendaftaran()
	{
		$this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[7]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) { 
            $this->response(array(), 500);
        }
        else {
            $email      = $this->post('email');
            $password   = $this->post('password');
            $nama       = $this->post('nama_lengkap');
            $no_hp      = $this->post('no_hp');
            $alamat     = $this->post('alamat');
            $kota       = $this->post('kota');

            $check = $this->M_User->getUserWhere(array('email_user' => $email));

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
                    'status'        => 0,
                    'role'          => 2
                );
            $id = $this->M_User->insert($user);

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
                    print_r('success');
                    //redirect
                } else {
                    print_r('gagal');
                    //redirect
                }
            } else{
            		print_r('gagal, email sudah terdaftar');
                    //redirect
            }
        }
	}

    function verifikasiAkun()
    {
        $id =  $this->uri->segment(3);
        $code = $this->uri->segment(4);

        $user = $this->M_User->getUser($id);

        if($user['code'] == $code){
      
            $data['status'] = 1;
            $query = $this->M_User->activate($data, $id);

            if($query){
                print_r('success');
                //redirect
            } else {
                print_r('gagal');
                //redirect
            }
        } else{
           print_r('gagal');
           //redirect
        }

    }

	function login ()
    {
        $email = $this->post('email');
        $password = $this->post('password');
        $check = $this->M_User->getUserWhere(array('email_user' => $email));

        if(empty($check)){
            $this->response(array('status' => 'Email Tidak Ditemukan'));
        } else {
            $encrypted_password = $check['password'];
            $decrypted_password = $this->encrypt->decode($encrypted_password);

            if ($password == $decrypted_password){

                $session = array(
                  'logged_in' => true,
                  'email' => $check['email_user'], 
                  'role' => $check['role']
                );

                $this->session->set_userdata($session);
                $get_session    = $this->session->get_userdata();
                $sessionCheck  = $get_session['logged_in'];
                if ($sessionCheck){
                    print_r('success');
                	//redirect
                } else {
                    print_r('gagal');
           			//redirect
                }
            } else {
            	print_r('Password Salah');
           		//redirect
            }
        }

    }
    
    function logout(){
        $get_session    = $this->session->get_userdata();
        $this->session->set_userdata(array('logged_in' => false));
        $this->session->unset_userdata(array('email', 'role'));

        if ($get_session['logged_in'] == false){
            print_r('success');
            //redirect
        } else {
            print_r('gagal');
   			//redirect
        }
    }
}