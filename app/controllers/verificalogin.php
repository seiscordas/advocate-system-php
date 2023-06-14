<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class VerificaLogin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->model('user','',TRUE);
 }
 function index()
 {
   //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
   $this->form_validation->set_rules('senha', 'Senha', 'trim|required|md5|xss_clean|callback_check_database');

   if($this->form_validation->run() == false)
   {
     //Field validation failed.&nbsp; User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     redirect('admin', 'refresh');
   }
 }
 function check_database($password)
 {
   //Field validation succeeded.&nbsp; Validate against database
   $username = $this->input->post('usuario');

   //query the database
   $result = $this->user->login($username, $password);

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->cd_usuario,
         'login' => $row->cd_usuario,
		 'nome' => $row->nm_usuario,
		 'perfil' => $row->cd_nivel,
       );
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return true;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Usuario ou Senha incorreto!');
     return false;
   }
 }
}
?>
