<div class="page-header">
    <h1>Knowledge Management System</h1>
    <p></p>
</div>

<div class="row">
    <div class="col-md-3">
        <img src="<?php echo base_url();?>asset/img/tacit.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="col-md-9">
        <h3>Tacit Knowledge </h3>
        <p> Bagikan pengetahuan dan pengalaman Anda selama bekerja di Kantor Pengadilan Agama Baturaja </br> </br>
        <?php if($this->session->userdata('level') == 'Pegawai' ){ ?>
        Sejauh ini anda telah membagikan <b><?php echo $jumlah_tacit->num_rows(); ?> masalah-solusi</b>.
        <?php
            }
        ?>
        </p>
    </div>
</div>
<br /><br />
<div class="row">
    <div class="col-md-9">
    <h3>Explicit Knowledge</h3>
    <p> Bagikan Dokumen-dokumen pengetahuan yang ada di Kantor Pengadilan Agama Baturaja</br></br> 
    <?php if($this->session->userdata('level') == 'Pegawai' ){ ?>
    Sejauh ini anda telah membagikan <b><?php echo $jumlah_explicit->num_rows();?> dokumen.</b>
    <?php
        }
    ?>
    </p>
    </div>
    <div class="col-md-3">
        <img src="<?php echo base_url();?>asset/img/dokumen.png" class="img-responsive" alt="Responsive image">
    </div>
</div>
<br /><br />
<div class="row">
    <div class="col-md-3">
        <img src="<?php echo base_url();?>asset/img/share.png" class="img-responsive" alt="Responsive image">
    </div>
    <div class="col-md-9">
    <h3>Sharing Knowledge</h3>
    <p> Bagikan Pengetahuan Anda dengan menggunakan Knowledge Management System <br/> </p>
    </div>
</div>
