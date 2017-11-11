<div class="page-header">
    <h1>Sunting Password</h1>
</div>

<?php foreach($pengguna->result() as $row){?>

<div class="row">
  <div class="col-md-8">
    <form class="form-horizontal" method="post" action="<?php echo base_url();?>pegawai/update_pass">
      <input type="hidden" name="nip" value="<?php echo $row->nip?>">
      <div class="form-group">
        <label class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-10">
          <p class="form-control-static"><?php echo $row->nip?></p>
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          <input type="text" name="password" value="<?php echo $row->password?>" class="form-control" placeholder="Password">
        </div>
      </div>
      <div class="form-group">
        <label for="inputPassword" class="col-sm-2 control-label"></label>
        <div class="col-sm-10">
           <button type="submit" class="btn btn-success"><i class="fa fa-edit fa-fw"></i> Kirim</button>
        </div>
      </div>
    </form>
  </div>
  <div class="col-md-4"></div>
</div>

  <?php
    }
    ?>  