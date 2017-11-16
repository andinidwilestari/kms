<div class="page-header">
    <h1>Cari Pengetahuan</h1>
</div>
<p>Masukkan <b>kata kunci</b> dan pilih <b>kategori</b> untuk mencari pengetahuan terkait dinas.</p>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <form action="<?php echo site_url('pegawai/sharing_result');?>" method="post">
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                  <option value="tacit">Tacit</option>
                  <option value="explicit">Explicit</option>
                </select>
            </div>
            <div id="custom-search-input">
                <label>Keyword</label>
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
        if($this->uri->segment(2) == 'sharing'){
            echo '';
        }
        else{
            echo '<h1>Hasil Pencarian "'.$keyword.'"</h1>';
            $keyword = strtolower($keyword);
                $no=1;
                
                foreach($search->result() as $row)
                {
                    $id_tacit = $row->id_tacit;
                    if($id_tacit != 1)
                    {
                ?>
                    <article class="search-result row">
                        <div class="col-md-12">
                            <h3><a href="<?php echo base_url();?>pegawai/lihat_tacit/<?php echo $id_tacit;?>" title=""><?php echo $row->judul;?></a></h3>
                            <h5><i>Oleh <b><a href="<?php echo base_url();?>pegawai/profiluser/<?php echo $row->nip;?>" title=""><?php echo $row->nama;?></a></b> pada <?php echo $row->waktu;?></i></h5>
                            <p><?php 
                                    $judul = $row->judul;
                                    $masalah = $row->masalah;
                                    $solusi = $row->solusi;
                                    $tacit = ($judul.' '.$masalah.' '.$solusi);
                                    $html = new Html2Text($tacit);
                                    $ketemu_tacit = SearchString($tacit,$keyword);
									
                                    $jumlah_karak =  strlen($tacit);
                                    if($ketemu_tacit < 50)
                                    {
                                        $awal_tacit = 0;
                                    }
                                    else
                                    {
                                        $awal_tacit = ($ketemu_tacit - 20);
                                    }
                                    if($ketemu_tacit > ($jumlah_karak - 50))
                                    {
                                        $akhir_tacit = $jumlah_karak;
                                    }
                                    else
                                    {
                                        $akhir_tacit = $awal_tacit + 300;
                                    }
                                    $hasil_tacit = $html->getText();
                                    $hasil_tacit = strtolower($hasil_tacit);
                                    $hasil_tacit = str_replace($keyword,'<mark>'.$keyword.'</mark>',$hasil_tacit);
                                    echo substr($hasil_tacit,$awal_tacit,$akhir_tacit).'....';
                            ?></p>						
                        </div>
                    </article>
                <?php
                $no++;
                }
                }
            }
        ?>

        <?php
        if($this->uri->segment(2) == 'sharing')
        {
            echo '';
        }
        else
        {
                $keyword = strtolower($keyword);
                $no=1;      
                foreach($searchex as $row)
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
								//echo $explicit;exit;
                                $jumlah_karakter = strlen($explicit);
                                //$ketemu_explicit = SearchString($explicit,$keyword);
                                $ketemu_explicit = SearchString($explicit,$keyword);								
                                //$ketemu_explicit = match_rabinKarp($keyword,$explicit);
								//echo $ketemu_explicit;exit;
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



<?php
    function SearchString($A, $B)
    {
        $hasil = array();
        $hashpattern = 0;
        $hashtext = 0;
        $Q = 100007;
        $D = 256;
        $text = strlen($B);
        $pattern = strlen($A);

        for ($i = 0; $i < $text; $i++)
        {
            $hashpattern = ($hashpattern * $D + $A[$i]) % $Q;
            $hashtext = ($hashtext * $D + $B[$i]) % $Q;
        }

        // if ($hashpattern == $hashtext)
        //     return 1;

        $pow = 1;

        for ($k = 1; $k <= $text - 1; $k++)
            $pow = ($pow * $D) % $Q;

        for ($j = 1; $j <= $pattern - $text; $j++)
        {
            $hashpattern = ($hashpattern + $Q - $pow * $A[$j - 1] % $Q) % $Q;
            $hashpattern = ($hashpattern * $D + $A[$j + $text - 1]) % $Q;

            if ($hashpattern == $hashtext)
                if (substr($A, $j, $text) == $B)
                    return $j;
        }

        return -1;
    }
?>

