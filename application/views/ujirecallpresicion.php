<div class="page-header">
    <h1>Uji Presicion-Recall</h1>
</div>
<p>Masukkan <b>kata kunci</b> untuk Mendapatkan Data Untuk Uji Precision-Recall.</p>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="<?php echo site_url('pegawai/recallpresicion');?>" method="post">
            <div id="custom-search-input">
                <label>Kata Kunci</label>
                <div class="input-group col-md-12">
                    <input type="text" class="search-query form-control" name="keyword" placeholder="Kata Kunci" />
                        <span class="input-group-btn">
                        <button class="btn btn-success" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>

<br />

<div class="row">
    <section class="col-md-12">
        <?php
        if($this->uri->segment(2) == 'ujirecallpresicion')
        {
            echo '';
        }
        else
        {
                $keyword = strtolower($keyword);
                $no=1;      
                foreach($testing->result() as $row)
                {
                    $id_explicit = $row->id_explicit;
                    if($id_explicit != 1)
                    {
                ?>
                    <article class="search-result row">
                        <div class="col-md-12">
                            <?php
                                $dokumen = $row->dokumen;
                                $a = new Decode();
                                $a->setFilename('./upload/pdf/'.$dokumen);
                                $a->decodePDF();
                                $explicit = $a->output();
                                $jumlah_karakter = strlen($explicit);
                                $ketemu_explicit = brute_force_matching($keyword, $explicit);
                                $jumlah = brute_force_hitung($keyword, $explicit);
                                if($ketemu_explicit > 0)
                                {
                                    if($ketemu_explicit > 0 && $ketemu_explicit < 50)
                                    {
                                        $awal = 0;
                                    }
                                    else
                                    {
                                        $awal = $ketemu_explicit - 20;
                                    }
                                    if($ketemu_explicit > ($jumlah_karakter - 50))
                                    {
                                        $akhir = $jumlah_karakter;
                                    }
                                    else
                                    {
                                        $akhir = $awal + 300;
                                    }
                            ?>
                                    <h3><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp;<a href="<?php echo base_url();?>pegawai/lihat_explicit/<?php echo $id_explicit;?>" title=""><?php echo $row->judul;?></a></h3>
                                    <h5><i>Oleh <b><a href="<?php echo base_url();?>pegawai/profiluser/<?php echo $row->nip;?>" title=""><?php echo $row->nama;?></a></b> pada <?php echo $row->waktu;?></i></h5>
                                    <p><?php 
                                    $explicit = strtolower($explicit);
                                    $explicit = str_replace($keyword,'<mark>'.$keyword.'</mark>',$explicit);
                                    echo substr($explicit,$awal,$akhir).'....';?></p>
                                    <p>
                                    <b>Kata <?php echo $keyword ?> ditemukan sebanyak <?php echo $jumlah ?> kata</b>
                            <?php 
                                }
                            ?>
                            </p>				
                            </div>
                        </article>
                    <?php
                    $no++;
                    }
                    }
            }
        ?>
    </section>
</div>

<div class="row">
    <center>
        <ul class="pagination">
            <?php 
            echo $this->pagination->create_links();
            ?>
        </ul>
    </center>
</div>

<?php
function brute_force_matching($pattern, $subject) 
{
    $subject = strtolower($subject);
    $pattern = strtolower($pattern);
    $pattern = implode(explode(" ",$pattern));
    
	$n = strlen($subject);
	$m = strlen($pattern);
 
	for ($i = 0; $i < $n-$m; $i++) {
		$j = 0;
		while ($j < $m && $subject[$i+$j] == $pattern[$j]) {
			$j++;
		}
		if ($j == $m) return $i;
	}
	return -1;
}
	function brute_force_hitung($pattern, $subject){
		$subject = strtolower($subject);
		$pattern = strtolower($pattern);
		$pattern = implode(explode(" ",$pattern));
		
		$ketemu = 0 ;
		
		$n = strlen($subject);
		$m = strlen($pattern);
		
		for ($i = 0; $i < $n-$m; $i++) {
			$j = 0;
			while ($j < $m && $subject[$i+$j] == $pattern[$j]) {
				$j++;            
			}
			if ($j == $m) $ketemu++;
		}
		
		return $ketemu;
	}
?>