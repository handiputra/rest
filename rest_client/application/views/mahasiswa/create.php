<?php echo form_open('mahasiswa/create');?>

<head>
<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/fontawesome-all.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/js/jquery-1.11.0.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>


</head>
<form method="post" class="form-horizontal">
      <div class="form-group">
        <label class="control-label col-sm-2">
          Nama
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama">
        </div>
      </div>
  <button name="submit" class="btn btn-primary">
          Simpan
        </button>


</form>


<table class="form_input">
    <tr>
      <td>NIM</td>
      <td><?php echo form_input('nim');?></td>
    </tr>
    <tr>
      <td>NAMA</td>
      <td><?php echo form_input('nama');?></td>
    </tr>
    <tr>
      <td>JURUSAN</td><td>
            <select name="jurusan">
            <?php
            foreach ($jurusan as $j){
                echo "<option value='$j->id_jurusan'>$j->jurusan</option>";
            }
            ?>
            </select>
        </td>
      </tr>
    <tr><td>ALAMAT</td><td><?php echo form_input('alamat');?></td></tr>
    <tr><td colspan="2">
        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('mahasiswa','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>