<div class="page-header">
    <h1>Daftar Pengguna</h1>
</div>

<p>Daftar pengguna Knowledge Management System Pengadilan Agama Baturaja</p>
<table id="table_id" class="display">
    <thead>
        <tr>
            <th><center>Nama</center></th>
            <th><center>NIP</center></th>
            <th><center>Bagian</center></th>
            <th><center>Jabatan</center></th>
            <?php if($this->session->userdata('level') == 'Admin'){ ?>
            <th><center>Hapus</center></th>
            <th><center>Sunting</center></th>
            <?php
            }
            ?> 
        </tr>
    </thead>
    <tbody>
    <?php 
        $no=1;
        foreach($daftar_pengguna->result() as $row)
        {
    ?>
        <tr>
        <td><a href="<?php echo base_url();?>pegawai/profiluser/<?php echo $row->nip;?>" title=""><?php echo $row->nama;?></a></td>
        <td><?php echo $row->nip;?></td>
        <td><?php echo $row->bagian;?></td>
        <td><?php echo $row->jabatan;?></td>
        <?php if($this->session->userdata('level') == 'Admin'){ ?>
        <td><center><a href="<?php echo base_url();?>pegawai/hapus_user/<?php echo $row->nip;?>"><img src="<?php echo base_url();?>asset/img/delete.png" width="20px" height="20px"  title="Hapus"/></center></td>
        <td><center><a href="<?php echo base_url();?>pegawai/edit_user/<?php echo $row->nip;?>"><img src="<?php echo base_url();?>asset/img/edit.png" width="20px" height="20px"  title="Suntings"/></center></td>
        <?php
        }
        ?> 
    </tr>
        </tr>
    <?php
        $no++;
        }
    ?>
    </tbody>
</table>

<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>