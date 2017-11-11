<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller {

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
        date_default_timezone_set('Asia/Jakarta');
   	    $this->load->model(array('pegawai_model'));
        $this->load->library(array('pagination','form_validation','session'));
        $this->load->helper('url');
    }
    
    public function home()
    {
        $session_nip             = $this->session->userdata('nip');
		$session_level           = $this->session->userdata('level');
        $nip                     = $session_nip;
        
        $data['jumlah_tacit']    = $this->pegawai_model->tacit_knowledgebynip($nip);
        $data['jumlah_explicit'] = $this->pegawai_model->explicit_knowledgebynip($nip);
        $data['content']         = 'home';
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function capture()
	{
		$session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
       
        $data['pengguna']	 = $this->pegawai_model->pengguna($session_nip);
		$data['content']     = 'capture';
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
	}
    public function input_capture()
	{
		$nip            = $this->input->post('nip');
        $judul          = $this->input->post('judul');
		$kategori       = $this->input->post('kategori');
		$masalah        = $this->input->post('masalah');
        $solusi         = $this->input->post('solusi');
        $waktu          = date('Y-m-d H:i:s');
        
       	$this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('kategori','kategori','required');
        $this->form_validation->set_rules('masalah','masalah','required');
        $this->form_validation->set_rules('solusi','solusi','required');
        
        if($this->form_validation->run() == FALSE)
		{
		    echo "<script> alert('Knowledge gagal disimpan');</script>";
			redirect('pegawai/capture', 'refresh');
		}
        else
        {
            $arraydata = array(
			'nip'           => $nip,
			'judul'         => $judul,
			'kategori'      => $kategori,
            'masalah'       => $masalah,
			'solusi'        => $solusi,
			'waktu'         => $waktu,
			'status'		=> 'belum'
            );
            
            $this->pegawai_model->input_tacit_knowledge($arraydata);
            echo "<script> alert('Knowledge berhasil disimpan');</script>";
            redirect(base_url('pegawai/capture'), 'refresh');
        }
	}
    public function discovery()
	{
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
       
        $data['pengguna']	 = $this->pegawai_model->pengguna($session_nip);
		$data['content']     = 'discovery';
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
	}
    public function input_discovery()
    {
		$nip            = $this->input->post('nip');
        $judul          = $this->input->post('judul');
		$kategori       = $this->input->post('kategori');
		$keterangan     = $this->input->post('keterangan');
        $waktu          = date('Y-m-d H:i:s');
        
		$this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('kategori','kategori','required');
        $this->form_validation->set_rules('keterangan','keterangan','required');
        
        if($this->form_validation->run() == FALSE)
		{
		    echo "<script> alert('Explicit Knowledge gagal tersimpan');</script>";
			redirect('pegawai/discovery', 'refresh');
		}
        else
        {   
            $config['upload_path']          = './upload/pdf/';
            $config['allowed_types']        = 'pdf';
            $config['msax_size']            = 2048000;

            $this->load->library('upload', $config);

            if(!isset($_FILES['userfile']['name']))
            {
                echo "<script> alert('File gagal tersimpan');</script>";
                redirect('pegawai/discovery', 'refresh');
            }
            else
            { 
                if(!$this->upload->do_upload())
				{
					echo $config['upload_path'];
				}
                else
                {
                    $dokumen = $_FILES['userfile']['name'];
                    $dokumen = str_replace(' ', '_', $dokumen);
                    $arraydata = array(
        			'nip'             => $nip,
        			'judul'           => $judul,
        			'kategori'        => $kategori,
                    'keterangan'      => $keterangan,
                    'dokumen'         => $dokumen,
                    'waktu'           => $waktu,
					'status'		=> 'belum'
                    );
            
                    $this->pegawai_model->input_explicit_knowledge($arraydata);
                    echo "<script> alert('Explicit Knowledge berhasil disimpan');</script>";
                    redirect(base_url('pegawai/my_knowledge'), 'refresh');   
                }
            }
        }
    }
    public function sharing()
	{   
	    $this->load->library(array('decode','Html2Text'));
		$data['content'] = 'sharing';
        
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
	}
    public function sharing_result($page_number = 1)
    {
	    $this->load->library(array('Decode','Html2Text'));
		
		$kategori = $this->input->post('kategori');
		
        $keyword = $this->input->post('keyword');
		
        if(empty($kategori) || empty($keyword)){ 
            $kategori = $this->session->userdata('kategori');
            $keyword = $this->session->userdata('keyword');
        }
        else{
            $kategori        = $this->input->post('kategori');
            $keyword         = $this->input->post('keyword');
        
            $array_session_search = array(
                'kategori' => $kategori,
                'keyword' => $keyword
            );
            
            
            $this->session->set_userdata($array_session_search);
        }
        
        $data['keyword'] = $keyword;
    
        $limit = 5;
        $config = array();                                 
        $config['base_url'] = base_url(). 'pegawai/sharing_result';
        $tacit = $this->pegawai_model->sharing_count($kategori, $keyword);
        $explicit = $this->pegawai_model->explicit_count($kategori);
        
        if ($tacit > $explicit)
        {
            $total_row = $tacit;
        }
        else
        {
            $total_row = $explicit;
        }
        
        $config['total_rows'] = $total_row;
        $config['per_page'] = $limit;
        $config['use_page_numbers'] = TRUE;
        $config['num_links'] = $total_row;
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_link'] = 'Berikutnya';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = 'Sebelumnya';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['uri_segment'] = 3;
        
        $this->pagination->initialize($config);
        
        $offset = ($page_number == 1) ? 0 : ($page_number * $config['per_page']) - $config['per_page'];
        
        $data['search']  = $this->pegawai_model->sharing($kategori, $keyword);
        $data['searchex']  = $this->pegawai_model->explicit_knowledge($kategori, $keyword);
		
		$data['content'] = 'sharing';
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function userlist()
    {
		$data['daftar_pengguna'] = $this->pegawai_model->daftar_pengguna();
		$data['content'] = 'userlist';
        
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function user()
    {
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
       
        $data['pengguna']	 = $this->pegawai_model->pengguna($session_nip);
		$data['content']     = 'input_user';
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function input_user()
	{
        $level          = $this->input->post('level');
		$nip            = $this->input->post('nip');
        $password       = $this->input->post('password');
		$nama           = $this->input->post('nama');
		$golongan       = $this->input->post('golongan');
        $bagian         = $this->input->post('bagian');
        $jabatan        = $this->input->post('jabatan');
        $alamat         = $this->input->post('alamat');
		$no_hp          = $this->input->post('no_hp');
        $email          = $this->input->post('email');
        
       	$this->form_validation->set_rules('level','level','required');
		$this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('golongan','golongan','required');
		$this->form_validation->set_rules('bagian','bagian','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('no_hp','no_hp','required');
        $this->form_validation->set_rules('email','email','required');
        
        if($this->form_validation->run() == FALSE)
		{
		    echo "<script> alert('Pengguna gagal disimpan bro');</script>";
			redirect('pegawai/user', 'refresh');
		}
        else
        {   
            $config['upload_path']          = './upload/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['msax_size']             = 2048000;
            $config['max_width']            = 1920;
            $config['max_height']           = 1920;

            $this->load->library('upload', $config);

            if(!isset($_FILES['userfile']['name']))
            {
                echo "<script> alert('Foto tidak berhasil disimpan');</script>";
                redirect('pegawai/user', 'refresh');
            }
            else
            { 
                if(!$this->upload->do_upload())
				{
					echo $config['upload_path'];
				}
                else
                {
                    $arraydata = array(
                    'level'           => $level,
        			'nip'             => $nip,
        			'password'        => $password,
        			'nama'            => $nama,
                    'golongan'        => $golongan,
        			'bagian'          => $bagian,
                    'jabatan'         => $jabatan,
        			'alamat'          => $alamat,
                    'no_hp'           => $no_hp,
        			'email'           => $email,
                    'userfile'        => $_FILES['userfile']['name']
                    );
            
                    $this->pegawai_model->input_pengguna($arraydata);
                    echo "<script> alert('Pengguna berhasil disimpan');</script>";
                    redirect(base_url('pegawai/user'), 'refresh');   
                }
            }
        }
	}
    public function edit_user()
	{
		$nip					= $this->uri->segment(3);
		$data['data_pengguna']  = $this->pegawai_model->data_pengguna_bynip($nip);
		$data['content']	    = 'edit_user';

        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
	}
    public function update_user()
	{
        $level          = $this->input->post('level');
		$nip            = $this->input->post('nip');
        $password       = $this->input->post('password');
		$nama           = $this->input->post('nama');
		$golongan       = $this->input->post('golongan');
        $bagian         = $this->input->post('bagian');
        $jabatan        = $this->input->post('jabatan');
        $alamat         = $this->input->post('alamat');
		$no_hp          = $this->input->post('no_hp');
        $email          = $this->input->post('email');
        
       	$this->form_validation->set_rules('level','level','required');
		$this->form_validation->set_rules('nip','nip','required');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_rules('nama','nama','required');
        $this->form_validation->set_rules('golongan','golongan','required');
		$this->form_validation->set_rules('bagian','bagian','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('no_hp','no_hp','required');
        $this->form_validation->set_rules('email','email','required');
        
        if($this->form_validation->run() == FALSE)
		{
		    echo "<script> alert('Pengguna gagal disimpan bro');</script>";
			redirect('pegawai/userlist', 'refresh');
		}
        else
        {   
            $config['upload_path']          = './upload/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['msax_size']             = 2048000;
            $config['max_width']            = 1920;
            $config['max_height']           = 1920;

            $this->load->library('upload', $config);

            if(!isset($_FILES['userfile']['name']))
            {
                echo "<script> alert('Foto tidak berhasil disimpan');</script>";
                redirect('pegawai/userlist', 'refresh');
            }
            else
            { 
                if(!$this->upload->do_upload())
				{
					echo $config['upload_path'];
				}
                else
                {
                    $foto = $_FILES['userfile']['name'];
                    $foto = str_replace(' ', '_', $foto);
                    $array_where = array(
                        'nip' => $nip
                    );
                    $array_data = array(
                    'level'           => $level,
        			'nip'             => $nip,
        			'password'        => $password,
        			'nama'            => $nama,
                    'golongan'        => $golongan,
        			'bagian'          => $bagian,
                    'jabatan'         => $jabatan,
        			'alamat'          => $alamat,
                    'no_hp'           => $no_hp,
        			'email'           => $email,
                    'userfile'        => $foto
                    );
            
                    $this->pegawai_model->update_pengguna($array_data,$array_where);
                    echo "<script> alert('Pengguna berhasil disimpan');</script>";
                    redirect(base_url('pegawai/userlist'), 'refresh');   
                }
            }
        }	
	}
    public function profiluser()
    {
		$nip					 = $this->uri->segment(3);
        $data['jumlah_tacit']    = $this->pegawai_model->tacit_knowledgebynip($nip);
        $data['jumlah_explicit'] = $this->pegawai_model->explicit_knowledgebynip($nip);
		$data['data_pengguna']   = $this->pegawai_model->data_pengguna_bynip($nip);
		$data['content']         = 'profiluser';
        
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function profil()
	{     
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
       
        $nip = $session_nip;
        $data['jumlah_tacit']    = $this->pegawai_model->tacit_knowledgebynip($nip);
        $data['jumlah_explicit'] = $this->pegawai_model->explicit_knowledgebynip($nip);
        $data['pengguna']	 = $this->pegawai_model->pengguna($session_nip);
		$data['content']     = 'profil';
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
	}
    public function hapus_user()
	{
		$nip	= $this->uri->segment(3);
		$this->pegawai_model->hapus_pengguna($nip);
        echo "<script> alert('Pengguna berhasil dihapus');</script>";
		redirect(base_url('pegawai/userlist'), 'refresh');
	}
    public function edit_profil()
	{
		$session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
       
        $data['pengguna']	 = $this->pegawai_model->pengguna($session_nip);
		$data['content']	   = 'edit_profil';
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
	}
    public function update_profil()
	{
	    $nip            = $this->input->post('nip');
        $alamat         = $this->input->post('alamat');
		$no_hp          = $this->input->post('no_hp');
        $email          = $this->input->post('email');
        
        $this->form_validation->set_rules('alamat','alamat','required');
        $this->form_validation->set_rules('no_hp','no_hp','required');
        $this->form_validation->set_rules('email','email','required');
        
        if($this->form_validation->run() == FALSE)
		{
		    echo "<script> alert('Pengguna gagal disimpan bro');</script>";
			redirect('pegawai/profil', 'refresh');
		}
        else
        {   
            $config['upload_path']          = './upload/img/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['msax_size']             = 2048000;
            $config['max_width']            = 1920;
            $config['max_height']           = 1920;

            $this->load->library('upload', $config);

            if(!isset($_FILES['userfile']['name']))
            {
                echo "<script> alert('Foto tidak berhasil disimpan');</script>";
                redirect('pegawai/profil', 'refresh');
            }
            else
            { 
                if(!$this->upload->do_upload())
				{
					echo $config['upload_path'];
				}
                else
                {   
                    $foto = $_FILES['userfile']['name'];
                    $foto = str_replace(' ', '_', $foto);
                    $array_where = array(
                        'nip' => $nip
                    );
                    $array_data = array(
        			'alamat'          => $alamat,
                    'no_hp'           => $no_hp,
        			'email'           => $email,
                    'userfile'        => $foto
                    );
            
                    $this->pegawai_model->update_pengguna($array_data,$array_where);
                    echo "<script> alert('Pengguna berhasil disimpan');</script>";
                    redirect(base_url('pegawai/profil'), 'refresh');   
                }
            }
        }	
	}
    public function edit_pass()
	{
		$session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
       
        $data['pengguna']	 = $this->pegawai_model->pengguna($session_nip);
		$data['content']	   = 'edit_pass';
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
	}
    public function update_pass()
	{
				$nip			= $this->input->post('nip');
				$password 		= $this->input->post('password');
				$this->form_validation->set_rules('password','password','required');	
   	
                if($this->form_validation->run() == FALSE)
            		{
            		    echo "<script> alert('password gagal diubah');</script>";
            			redirect('pegawai/profil', 'refresh');
            		}
                else
                {
                    $array_where = array(
                        'nip' => $nip
                    );
                    
                    $array_data = array(
                        'password'  => $password
                    );
                    
                    $update = $this->pegawai_model->update_pass($array_data,$array_where);
                        echo '<script>alert("Data berhasil diupdate.");</script>';
                        redirect(base_url('pegawai/profil'), 'refresh');
                }
	}
    public function my_knowledge()
    {
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
		$data['tacit_knowledge'] = $this->pegawai_model->tacit_knowledgebynip($session_nip);
        $data['explicit_knowledge'] = $this->pegawai_model->explicit_knowledgebynip($session_nip);
		$data['content'] = 'my_knowledge';

        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function lihat_tacit()
    {
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
		$id_tacit				= $this->uri->segment(3);
		$data['data_tacit']     = $this->pegawai_model->tacit_byid($id_tacit);
        $data['pengguna']   	= $this->pegawai_model->pengguna($session_nip);
        $data['komentar_tacit'] = $this->pegawai_model->komentar_tacit($id_tacit);                     
		$data['content']	    = 'lihat_tacit';	 
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        } 
    }
    public function edit_knowledge()
    {
  		$id_tacit           	= $this->uri->segment(3);
		$data['data_tacit']     = $this->pegawai_model->edit_knowledge($id_tacit);
		$data['content']	    = 'edit_tacit';

        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function update_knowledge()
    {
        $id_tacit       = $this->input->post('id_tacit');
        $judul          = $this->input->post('judul');
		$kategori       = $this->input->post('kategori');
		$masalah        = $this->input->post('masalah');
        $solusi         = $this->input->post('solusi');
        $this->form_validation->set_rules('judul','judul','required');
		$this->form_validation->set_rules('kategori','kategori','required');
        $this->form_validation->set_rules('masalah','masalah','required');
        $this->form_validation->set_rules('solusi','solusi','required');
        
        if($this->form_validation->run() == FALSE)
		{
		    echo "<script> alert('Knowledge gagal disunting');</script>";
			redirect('pegawai/my_knowledge', 'refresh');
		}
        else
        {
            $array_where = array(
            'id_tacit' => $id_tacit
            );
                    
            $array_data   = array(
			'judul'         => $judul,
			'kategori'      => $kategori,
            'masalah'       => $masalah,
			'solusi'        => $solusi
            );
            
            $update = $this->pegawai_model->update_knowledge($array_data,$array_where);
            echo "<script> alert('Knowledge berhasil disunting');</script>";
            redirect(base_url('pegawai/lihat_tacit/'.$id_tacit), 'refresh');
        }
    }
    public function hapus_knowledge()
	{
		$id_tacit	= $this->uri->segment(3);
		$this->pegawai_model->hapus_knowledge($id_tacit);
        echo "<script> alert('Pengguna berhasil dihapus');</script>";
		redirect(base_url('pegawai/my_knowledge'), 'refresh');
	}
    public function lihat_explicit()
    {
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
		$id_explicit		             = $this->uri->segment(3);
		$data['data_explicit']           = $this->pegawai_model->explicit_byid($id_explicit);
        $data['pengguna']   	         = $this->pegawai_model->pengguna($session_nip); 
        $data['komentar_explicit']       = $this->pegawai_model->komentar_explicit($id_explicit);                  
		$data['content']	             = 'lihat_explicit';	 
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        } 
    }
    public function edit_explicit()
    {
  		$id_explicit           	= $this->uri->segment(3);
		$data['data_explicit']  = $this->pegawai_model->explicit_byid($id_explicit);
		$data['content']	    = 'edit_explicit';

        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function update_explicit()
	{
        $id_explicit    = $this->input->post('id_explicit');
        $judul          = $this->input->post('judul');
		$kategori       = $this->input->post('kategori');
		$keterangan     = $this->input->post('keterangan');
        
	    $this->form_validation->set_rules('judul','judul','required');
        $this->form_validation->set_rules('kategori','kategori','required');
        $this->form_validation->set_rules('keterangan','keterangan','required');
        
        if($this->form_validation->run() == FALSE)
		{
		    echo "<script> alert('Knowledge gagal disunting');</script>";
			redirect('pegawai/my_knowledge', 'refresh');
		}
        else
        {   
            $config['upload_path']          = './upload/pdf/';
            $config['allowed_types']        = 'pdf';
            $config['msax_size']            = 2048000;

            $this->load->library('upload', $config);

            if(!isset($_FILES['userfile']['name']))
            {
                echo "<script> alert('Dokumen tidak berhasil disimpan');</script>";
                redirect('pegawai/my_knowledge', 'refresh');
            }
            else
            { 
                if(!$this->upload->do_upload())
				{
					echo $config['upload_path'];
				}
                else
                {
                    $dokumen = $_FILES['userfile']['name'];
                    $dokumen = str_replace(' ', '_', $dokumen);
                    $array_where = array(
                        'id_explicit' => $id_explicit
                    );
                    $array_data = array(
        			'judul'           => $judul,
        			'kategori'        => $kategori,
                    'keterangan'      => $keterangan,
                    'dokumen'         => $dokumen
                    );
            
                    $this->pegawai_model->update_explicit($array_data,$array_where);
                    echo "<script> alert('Pengguna berhasil disimpan');</script>";
                    redirect(base_url('pegawai/lihat_explicit/'.$id_explicit), 'refresh');   
                }
            }
        }	
	}
    public function hapus_explicit()
	{
		$id_explicit	= $this->uri->segment(3);
		$this->pegawai_model->hapus_explicit($id_explicit);
        echo "<script> alert('Explicit Knowledge berhasil dihapus');</script>";
		redirect(base_url('pegawai/my_knowledge'), 'refresh');
	}
    public function komentar()
    {
        $nip         = $this->input->post('nip');
        $id_tacit    = $this->input->post('id_tacit');
        $id_explicit = $this->input->post('id_explicit');
        $komentar    = $this->input->post('komentar');
        $waktu       = $this->input->post('waktu');
                
        $arraydata = array
                    (
                        'nip'           => $nip,
                        'id_tacit'      => $id_tacit,
                        'id_explicit'   => $id_explicit,
            			'komentar'      => $komentar,
            			'waktu'         => $waktu
                    );
        $this->pegawai_model->input_komentar($arraydata);   
    }
    public function hapus_komentar_explicit()
	{
		$id_komentar = $this->uri->segment(3);
        $id_knowledge = $this->pegawai_model->check_komentar($id_komentar);
		$this->pegawai_model->hapus_komentar($id_komentar);
        
        foreach($id_knowledge->result() as $halaman)
        {
            echo "<script> alert('Komentar berhasil dihapus');</script>";
            redirect(base_url('pegawai/lihat_explicit/'.$halaman->id_explicit), 'refresh');
        }
	}
    public function hapus_komentar_tacit()
	{
		$id_komentar = $this->uri->segment(3);
        $id_knowledge = $this->pegawai_model->check_komentar($id_komentar);
		$this->pegawai_model->hapus_komentar($id_komentar);
        
        foreach($id_knowledge->result() as $halaman)
        {
            echo "<script> alert('Komentar berhasil dihapus');</script>";
            redirect(base_url('pegawai/lihat_tacit/'.$halaman->id_tacit), 'refresh');
        }
	}
    public function knowledge_bidang()
    {
        $this->load->library('chartphp');
		$data['content'] = 'knowledge_bidang';
        
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    } 
    public function knowledge_bidang_hasil()
    {
        $this->load->library('chartphp');
        $bulan           = $this->input->post('bulan');
        $tahun           = $this->input->post('tahun');
        $waktu           = $tahun.'-'.$bulan;
        
        $data['tacit_sekre']     = $this->pegawai_model->tacit_bytime($kategori='Sekretaris', $waktu);
        $data['explicit_sekre']  = $this->pegawai_model->explicit_bytime($kategori='Sekretaris', $waktu);
        $data['tacit_lla']       = $this->pegawai_model->tacit_bytime($kategori='Lalu lintas dan Angkutan', $waktu);
        $data['explicit_lla']    = $this->pegawai_model->explicit_bytime($kategori='Lalu lintas dan Angkutan', $waktu);
        $data['tacit_tsp']       = $this->pegawai_model->tacit_bytime($kategori='Teknik Sarana dan Prasarana', $waktu);
        $data['explicit_tsp']    = $this->pegawai_model->explicit_bytime($kategori='Teknik Sarana dan Prasarana', $waktu);
        $data['tacit_pok']       = $this->pegawai_model->tacit_bytime($kategori='Pengawasan, Operasional, dan Keselamatan', $waktu);
        $data['explicit_pok']    = $this->pegawai_model->explicit_bytime($kategori='Pengawasan, Operasional, dan Keselamatan', $waktu);
        $data['tacit_kominfo']   = $this->pegawai_model->tacit_bytime($kategori='Komunikasi dan Informatika', $waktu);
        $data['explicit_kominfo']= $this->pegawai_model->explicit_bytime($kategori='Komunikasi dan Informatika', $waktu);
        
		$data['content'] = 'knowledge_bidang';
        
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function laporan_tacit()
    {
		$data['content'] = 'laporan_tacit';
        
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level))
        {
            redirect(base_url('signin'));
        }
        else
        {
            $data['laporan_tacit'] = $this->pegawai_model->chart_laporan_tacit();
            $this->load->view('template', $data);    
        }
    }        
    public function laporan_explicit()
    {
		$data['content'] = 'laporan_explicit';
        
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level))
        {
            redirect(base_url('signin'));
        }
        else
        {
            $data['laporan_explicit'] = $this->pegawai_model->chart_laporan_explicit();
            $this->load->view('template', $data);    
        }
    }        
    public function ujirecallpresicion()
    {
        $this->load->library(array('decode','Html2Text'));
		$data['content'] = 'ujirecallpresicion';
        
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function recallpresicion()
    {
        $this->load->library(array('decode','Html2Text'));
        $keyword         = $this->input->post('keyword');
        $data['keyword'] = $keyword;
        $data['testing'] = $this->pegawai_model->testing();
		$data['content'] = 'ujirecallpresicion';
                
        $session_nip     = $this->session->userdata('nip');
		$session_level   = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function verifikasi()
    {
        $status = 'belum';
        $data['veriftacit'] = $this->pegawai_model->verifikasi_tacit($status);
        $data['verifexplicit'] = $this->pegawai_model->verifikasi_explicit($status);
		$data['content'] = 'verifikasi';
        
        $session_nip = $this->session->userdata('nip');
		$session_level = $this->session->userdata('level');
        
        if(!isset($session_nip) && !isset($session_level)){
            redirect(base_url('signin'));
        }
        else{
            $this->load->view('template', $data);    
        }
    }
    public function update_verifikasi_tacit()
    {
        $id_tacit	= $this->uri->segment(3);
        $status     = 'sudah';
        
        $array_where = array(
            'id_tacit' => $id_tacit
            );
                    
            $array_data   = array(
			'status'         => $status
            );
            
        $this->pegawai_model->update_knowledge($array_data,$array_where);
        
        echo "<script> alert('Pengatahuan terverifikasi');</script>";
		redirect(base_url('pegawai/verifikasi'), 'refresh');
    }
    public function update_verifikasi_explicit()
    {
        $id_explicit	= $this->uri->segment(3);
        $status         = 'sudah';
        
        $array_where = array(
            'id_explicit' => $id_explicit
            );
                    
            $array_data   = array(
			'status'         => $status
            );
            
        $this->pegawai_model->update_explicit($array_data,$array_where);
        
        echo "<script> alert('Pengatahuan terverifikasi');</script>";
		redirect(base_url('pegawai/verifikasi'), 'refresh');
    }
}
