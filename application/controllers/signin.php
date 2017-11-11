<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct()
    {
        parent::__construct();
   	    $this->load->model(array('pegawai_model'));
        $this->load->library(array('pagination','form_validation','session'));
    }
    
    public function index()
	{
		$web_sesi=$this->session->userdata('web_sesi');
		if($web_sesi==false)
        {
            redirect('signin/signin');
		}
        else
        {
            redirect('pegawai/home'); 
        }          
	}
    
    public function signin()
	{
		$this->load->view('signin');
	}
    
    function signinAction()
	{
		$nip = trim(strip_tags($this->input->post('nip')));
		$password = trim(strip_tags($this->input->post('password')));
		$hasil = $this->pegawai_model->signin($nip,$password);
		if ($hasil->num_rows()==1)
		{   
            $query_level=$this->pegawai_model->getLevel($nip);
            $arraysesi = array('nip' => $nip, 'level' => $query_level, 'web_sesi' => true);
            $this->session->set_userdata($arraysesi);
            redirect(base_url('pegawai/home'),'refresh');
		}
		else 
		{
			$this->session->set_userdata('web_sesi',false);
		?>
			<script type="text/javascript">
			alert("NIP atau Password Salah!");			
			</script>
		<?php
			redirect(base_url('signin'),'refresh');
		}
	}
    
    function signoutAction()
	{
		$this->session->sess_destroy();
		?>
			<script type="text/javascript">
			alert("Sign Out Berhasil!");			
			</script>
		<?php
		redirect(base_url('signin'),'refresh');
	}
}    
?>