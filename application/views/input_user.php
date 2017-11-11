<div class="page-header">
    <h1>Input Pengguna</h1>
</div>

<p>Input data pengguna Knowledge Management System Pengadilan Agama Baturaja.</p>

<div class="row">
  <div class="col-md-7">
<form action="<?php echo base_url();?>pegawai/input_user" method="post" enctype="multipart/form-data" >
  <div class="form-group">
    <label>Level Pengguna</label>
        <select class="form-control" name="level" >
            <option value="pegawai">Pegawai</option>
            <option >Admin</option>
            <option >Sekretaris Dinas</option>
        </select>
  </div>
  <div class="form-group">
    <label>NIP</label>
    <input type="text" class="form-control" name="nip" placeholder="NIP" required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password" required>
  </div>
  <div class="form-group">
    <label>Nama</label>
    <input type="text" class="form-control" name="nama" placeholder="Nama" required>
  </div>
  <div class="form-group">
    <label>Golongan</label>
        <select class="form-control" name="golongan" >
            <option>I/a (Juru Muda)</option>
            <option>I/b (Juru Muda Tingkat I)</option>
            <option>I/c (Juru)</option>
            <option>I/d (Juru Tingkat I)</option>
            <option>II/a (Pengatur Muda)</option>
            <option>II/b (Pengatur Muda Tingkat I)</option>
            <option>II/c (Pengatur)</option>
            <option>II/d (Pengatur Tingkat I)</option>
            <option>III/a (Penata Muda)</option>
            <option>III/b (Penata Muda Tingkat I)</option>
            <option>III/c (Penata)</option>
            <option>III/d (Penata Tingkat I)</option>
            <option>IV/a (Pembina)</option>
            <option>IV/b (Pembina Tingkat I)</option>
            <option>IV/c (Pembina Utama Muda)</option>
            <option>IV/d (Pembina Utama Madya)</option>
            <option>IV/e (Pembina Utama)</option>
        </select>
  </div>
  <div class="form-group">
    <label>Jabatan</label>
        <select class="form-control" name="jabatan" >
            <option>Ketua </option>
            <option>Wakil Ketua </option>
            <option>Hakim</option>
            <option>Panitera</option>
            <option>Sekretaris</option>
            <option>Staff</option>
        </select>
  </div>
  <div class="form-group">
    <label>Bagian</label>
        <select class="form-control" name="bagian" >
			<option>Pimpinan</option>
            <option>Kehakiman</option>
            <option>Kepaniteraan</option>
            <option>Kesekretariatan</option>
            <option>Kepegawaian</option>
        </select>
  </div>
  <div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control" rows="3" name="alamat" required></textarea>
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="email" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label>No. Handphone</label>
    <input type="text" class="form-control" name="no_hp" placeholder="No. Handphone" required>
  </div>
   <div class="form-group">
    <label>Foto</label>
    <input type="file" name="userfile" required>
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <button type="submit" class="btn btn-success"><i class="fa fa-male fa-fw"></i> Tambahkan</button>
</form>
  </div>
  <div class="col-md-5"></div>
</div>

