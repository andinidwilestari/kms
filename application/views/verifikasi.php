<div class="page-header">
    <h1>Verifikasi Pengetahuan</h1>
</div>

<p>Berikut adalah knowledge yang baru masuk ke dalam sistem.</p>
</br>
<div class="row">
    <table class="display table_id">
    <thead>
        <tr>
            <th><center>Judul</center></th>
            <th><center>Waktu</center></th>
            <th><center>Lihat</center></th>
            <th><center>Verifikasi</center></th>
        </tr>
    </thead>
   
    <tbody>
     <?php 
        $no=1;
        foreach($veriftacit->result() as $row)
        {
            $id_tacit = $row->id_tacit;
            if($id_tacit != 1)
            {
    ?>
        <tr>
            <td><?php echo $row->judul;?></td>
            <td><center><?php echo $row->waktu;?></center></td>
            <td><center><a href="<?php echo base_url();?>pegawai/lihat_tacit/<?php echo $row->id_tacit;?>"><img src="<?php echo base_url();?>asset/img/open.png" width="20px" height="20px"  title="Lihat Pengetahuan"/></center></td>
            <td><center><a href="<?php echo base_url();?>pegawai/update_verifikasi_tacit/<?php echo $row->id_tacit;?>"><img src="<?php echo base_url();?>asset/img/verif.png" width="20px" height="20px"  title="Verifikasi Pengetahuan"/></center></td>
        </tr>
            <?php
            }
        $no++;
        }
        $nomor=1;
        foreach($verifexplicit->result() as $row)
        {
            $id_explicit = $row->id_explicit;
            if($id_explicit != 1)
            {
    ?>
        <tr>
            <td><?php echo $row->judul;?></td>
            <td><center><?php echo $row->waktu;?></center></td>
            <td><center><a href="<?php echo base_url();?>pegawai/lihat_explicit/<?php echo $row->id_explicit;?>"><img src="<?php echo base_url();?>asset/img/open.png" width="20px" height="20px"  title="Lihat Pengetahuan"/></center></td>
            <td><center><a href="<?php echo base_url();?>pegawai/update_verifikasi_explicit/<?php echo $row->id_explicit;?>"><img src="<?php echo base_url();?>asset/img/verif.png" width="20px" height="20px"  title="Verifikasi Pengetahuan"/></center></td>
        </tr>
            <?php
            }
        $nomor++;
        }
    ?>
    </tbody>
</table>
</div>
<br />

<script>
    $(document).ready( function () {
        $('.table_id').DataTable();
    } );
</script>