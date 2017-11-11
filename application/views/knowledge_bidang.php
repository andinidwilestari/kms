<div class="page-header">
    <h1>Perbandingan Knowledge Per Bidang</h1>
</div>

<p>Lihat perbandingan knowledge antar bidang per bulan.</p>

<div class="row">
    <center>
        <form class="form-inline" action="<?php echo site_url('pegawai/knowledge_bidang_hasil');?>" method="post">
            <div class="form-group">
                <label>Bulan  </label>
                <select class="form-control" name="bulan">
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            <div class="form-group">
                <label>Tahun  </label>
                <select class="form-control" name="tahun">
                  <?php 
                    for($i=2016; $i<=2030; $i++)
                    {
                    
                        echo "<option value=".$i.">".$i."</option>";
                    }
                    ?> 
                </select>
            </div>
            <button type="submit" class="btn btn-success"><i class="fa fa-pie-chart fa-fw"></i> Lihat</button>
        </form>
    </center>
</div>
<br /><br />
<?php 
$t_sekre    = $tacit_sekre->num_rows();
$e_sekre    = $explicit_sekre->num_rows();
$sekre      = $t_sekre + $e_sekre;

$t_lla      = $tacit_lla->num_rows();
$e_lla      = $explicit_lla->num_rows();
$lla        = $t_lla + $e_lla;

$p = new chartphp(); 

$p->data = array(array(array('Pegawai', $sekre),array('Ketua', $lla)));
$p->chart_type = "pie"; 

// Common Options 
$p->title = "Perbandingan Jumlah Knowledge"; 

$out = $p->render('c1'); 
?> 

<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <center>
            <?php
                if($this->uri->segment(2) == 'knowledge_bidang')
                {
                    echo '';
                }
                else
                if($sekre == 0 && $lla == 0 )
                {
                    echo 'Tidak Ada Knowledge';
                }
                else
                {
                    echo $out;  
                }
            ?>
        </center>
    </div>
</div>