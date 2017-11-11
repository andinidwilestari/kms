<?php
class Pegawai_model extends CI_Model 
{
	function __construct()
    {
         parent::__construct();
    } 
    function signin($nip,$password)
	{
		$this->db->where('nip',$nip);
        $this->db->where('password',$password);
        $q=$this->db->get('pengguna');
        return $q;
	}
    function getLevel($nip){
        $this->db->where('nip',$nip);
        $sesi=$this->db->get('pengguna')->row();
        $id=$sesi->level;   
        return $id;
    }
    function pengguna($nip)
	{
		$this->db->where('nip',$nip);
		$query = $this->db->get('pengguna');
		return $query;
	}
    function daftar_pengguna()
    {
   	    $q = $this->db->get('pengguna');
		return $q;
    }
    function input_pengguna($arraydata)
	{
		$q = $this->db->insert('pengguna', $arraydata);
	}
    function update_pengguna($array_data,$array_where)
	{
		$this->db->where($array_where);
		$this->db->update('pengguna', $array_data);
    } 
    function data_pengguna_bynip($nip)   
	{
	    $this->db->where('nip', $nip);
	    $q = $this->db->get('pengguna');
		return $q;
	}
    function hapus_pengguna($nip)
	{
	    $this->db->where('nip', $nip);
        $q = $this->db->delete('pengguna'); 
		return $q;
	}
    function update_pass($array_data,$array_where)
	{
		$this->db->where($array_where);
		$this->db->update('pengguna', $array_data);
    } 
    function tacit_knowledge()
	{
		$q=$this->db->get('tacit_knowledge');
		return $q;
	}
    function tacit_knowledgebynip($nip)
	{
	    $this->db->where('nip',$nip); 
		$q=$this->db->get('tacit_knowledge');
		return $q;
	}
    function tacit_byid($id_tacit)   
	{
	    $this->db->join('pengguna','pengguna.nip = tacit_knowledge.nip');
	    $this->db->where('id_tacit', $id_tacit);
	    $q = $this->db->get('tacit_knowledge');
		return $q;
	}
    function input_tacit_knowledge($arraydata)
	{
		$q= $this->db->insert('tacit_knowledge', $arraydata);
	}
    function hapus_knowledge($id_tacit)
	{
	    $this->db->where('id_tacit', $id_tacit);
        $q = $this->db->delete('tacit_knowledge'); 
		return $q;
	}
    function edit_knowledge($id_tacit)
	{
	    $this->db->where('id_tacit', $id_tacit);
        $q = $this->db->get('tacit_knowledge'); 
		return $q;
	}
    function update_knowledge($array_data,$array_where)
	{
		$this->db->where($array_where);
		$this->db->update('tacit_knowledge', $array_data);
    } 
    function explicit_knowledgebynip($nip)
	{
	    $this->db->where('nip',$nip); 
		$q=$this->db->get('explicit_knowledge');
		return $q;
	}
    function explicit_byid($id_explicit)   
	{
        $this->db->join('pengguna','pengguna.nip = explicit_knowledge.nip');
	    $this->db->where('id_explicit', $id_explicit);
	    $q = $this->db->get('explicit_knowledge');
		return $q;
	}
    function input_explicit_knowledge($arraydata)
	{
		$q = $this->db->insert('explicit_knowledge', $arraydata);
	}
    function hapus_explicit($id_explicit)
	{
	    $this->db->where('id_explicit', $id_explicit);
        $q = $this->db->delete('explicit_knowledge'); 
		return $q;
	}
    function update_explicit($array_data,$array_where)
	{
		$this->db->where($array_where);
		$this->db->update('explicit_knowledge', $array_data);
    } 
    function sharing($kategori, $keyword)
    {
        $query = $this->db->query("SELECT pengguna.nama, tacit_knowledge.id_tacit, tacit_knowledge.nip, tacit_knowledge.judul, tacit_knowledge.kategori, tacit_knowledge.masalah, tacit_knowledge.solusi, tacit_knowledge.waktu FROM tacit_knowledge INNER JOIN pengguna ON pengguna.nip = tacit_knowledge.nip where (judul like '%$keyword%' or masalah like '%$keyword%' or solusi like '%$keyword%') and (kategori = '$kategori' and status = 'sudah')");
        
        return $query;
    }
    function sharing_count($kategori, $keyword)
    {
        $query = $this->db->query("SELECT pengguna.nama, tacit_knowledge.id_tacit, tacit_knowledge.nip, tacit_knowledge.judul, tacit_knowledge.kategori, tacit_knowledge.masalah, tacit_knowledge.solusi, tacit_knowledge.waktu FROM tacit_knowledge INNER JOIN pengguna ON pengguna.nip = tacit_knowledge.nip where (judul like '%$keyword%' or masalah like '%$keyword%' or solusi like '%$keyword%') and (kategori = '$kategori' and status = 'sudah')");
        return $query->num_rows();
    }
    function explicit_knowledge($kategori, $keyword)
	{
	    $query = $this->db->query("SELECT pengguna.nama, explicit_knowledge.id_explicit, explicit_knowledge.nip, explicit_knowledge.judul, explicit_knowledge.kategori, explicit_knowledge.keterangan, explicit_knowledge.dokumen, explicit_knowledge.waktu FROM explicit_knowledge INNER JOIN pengguna ON pengguna.nip = explicit_knowledge.nip where (kategori = '$kategori' and status = 'sudah')");
		return $query->result();
	}
    function explicit_count($kategori)
    {
        $query = $this->db->query("SELECT pengguna.nama, explicit_knowledge.id_explicit, explicit_knowledge.nip, explicit_knowledge.judul, explicit_knowledge.kategori, explicit_knowledge.keterangan, explicit_knowledge.dokumen, explicit_knowledge.waktu FROM explicit_knowledge INNER JOIN pengguna ON pengguna.nip = explicit_knowledge.nip where (kategori = '$kategori' and status = 'sudah')");
        return $query->num_rows();
    }
    function komentar_tacit($id_tacit)
	{
        $this->db->join('pengguna','pengguna.nip = komentar.nip');
	    $this->db->where('id_tacit',$id_tacit);
        $this->db->order_by('waktu','desc');
		$q=$this->db->get('komentar');
		return $q;
	}
    function komentar_explicit($id_explicit)
	{
        $this->db->join('pengguna','pengguna.nip = komentar.nip');
	    $this->db->where('id_explicit',$id_explicit);
        $this->db->order_by('waktu','desc');
		$q=$this->db->get('komentar');
		return $q;
	}
    function input_komentar($arraydata)
	{
		$q= $this->db->insert('komentar', $arraydata);
        return $q;
	}
    function hapus_komentar($id_komentar)
	{
	    $this->db->where('id_komentar', $id_komentar);
                                   
        $q = $this->db->delete('komentar'); 
	}
    function check_komentar($id_komentar)
	{
	    $this->db->where('id_komentar', $id_komentar);
        $this->db->select('id_explicit');
        $this->db->select('id_tacit');
                                   
        $q = $this->db->get('komentar');
        
        return $q; 
	}
    function tacit_bytime($kategori, $waktu)
    {
        $this->db->where('kategori', $kategori);
        $this->db->like('waktu', $waktu); 
        $q=$this->db->get('tacit_knowledge');
		return $q;
    }
    function explicit_bytime($kategori, $waktu)
    {
        $this->db->where('kategori', $kategori);
        $this->db->like('waktu', $waktu); 
        $q=$this->db->get('explicit_knowledge');
		return $q;
    }
    function chart_laporan_explicit(){
        $q = $this->db->query("select date_format(waktu, '%Y-%m') as 'bulan', count(judul) as 'jumlah_laporan' from explicit_knowledge group by date_format(waktu, '%Y-%m') limit 0,7");
        return $q;
    }
    function chart_laporan_tacit(){
        $q = $this->db->query("select date_format(waktu, '%Y-%m') as 'bulan', count(judul) as 'jumlah_laporan' from tacit_knowledge group by date_format(waktu, '%Y-%m') limit 0,7");
        return $q;
    }
    function testing()
    {
        $this->db->join('pengguna','pengguna.nip = explicit_knowledge.nip');
        $q=$this->db->get('explicit_knowledge');
		return $q;
    }
    function verifikasi_tacit($status)
    {
        $this->db->join('pengguna','pengguna.nip = tacit_knowledge.nip');
        $this->db->where('status',$status); 
		$q=$this->db->get('tacit_knowledge');
		return $q;
    }
    function verifikasi_explicit($status)
    {
        $this->db->join('pengguna','pengguna.nip = explicit_knowledge.nip');
        $this->db->where('status',$status); 
		$q=$this->db->get('explicit_knowledge');
		return $q;
    }
}
