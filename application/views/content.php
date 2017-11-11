   <!-- Begin page content -->
    <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="page-header">
                <img src="<?php echo base_url();?>asset/img/logobaru.jpg" class="img-responsive" alt="Responsive image">
            </div>

            <div class="list-group">
              <a class="list-group-item" href="<?php echo base_url();?>"><i class="fa fa-home fa-fw"></i>&nbsp; Home</a>
              <?php if($this->session->userdata('level') == 'Admin'){ ?>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/userlist"><i class="fa fa-user fa-fw"></i>&nbsp; Daftar Pegawai</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/user"><i class="fa fa-male fa-fw"></i>&nbsp; Input Pengguna</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/sharing"><i class="fa fa-search fa-fw"></i>&nbsp; Searching </a>
              <?php
              }
              ?>       
              <?php if($this->session->userdata('level') == 'Pegawai' ){ ?>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/profil"><i class="fa fa-user fa-fw"></i>&nbsp; Profil</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/capture"><i class="fa fa-upload fa-fw"></i>&nbsp; Input Masalah - Solusi</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/discovery"><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp; Input Dokumen</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/sharing"><i class="fa fa-search fa-fw"></i>&nbsp; Searching</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/my_knowledge"><i class="fa fa-book fa-fw"></i>&nbsp; Knowledge Based</a>
              <?php
              }
              ?>
              <?php if($this->session->userdata('level') == 'Pegawai Ahli' ){ ?>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/profil"><i class="fa fa-user fa-fw"></i>&nbsp; Profil</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/capture"><i class="fa fa-upload fa-fw"></i>&nbsp; Input Masalah - Solusi</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/discovery"><i class="fa fa-file-pdf-o fa-fw"></i>&nbsp; Input Dokumen</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/sharing"><i class="fa fa-search fa-fw"></i>&nbsp; Searching</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/my_knowledge"><i class="fa fa-book fa-fw"></i>&nbsp; Knowledge Based </a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/verifikasi"><i class="fa fa-book fa-fw"></i>&nbsp; Verifikasi Knowledge</a>
              <?php
              }
              ?>
              <?php if($this->session->userdata('level') == 'Sekretaris Dinas'){ ?>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/profil"><i class="fa fa-user fa-fw"></i>&nbsp; Profil</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/sharing"><i class="fa fa-search fa-fw"></i>&nbsp; Searching</a>
             
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/laporan_tacit"><i class="fa fa-bar-chart fa-fw"></i>&nbsp; Jumlah Masalah - Solusi</a>
              <a class="list-group-item" href="<?php echo site_url();?>/pegawai/laporan_explicit"><i class="fa fa-bar-chart fa-fw"></i>&nbsp;  Jumlah Dokumen</a>
              <?php
              }
              ?>
              <a class="list-group-item" href="<?php echo site_url();?>/signin/signoutAction"><i class="fa fa-sign-out fa-fw"></i>&nbsp; Sign Out</a>
            </div>
          </div>
          <div class="col-md-9">
            <?php
            if(@$content!='')
            {
            $this->load->view(@$content);
            }
            ?>        
          </div>
        </div>     
    </div>
    
    