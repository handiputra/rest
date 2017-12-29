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

<br>
<div class="form-group col-sm-5" >
  Nim <br> <?php echo form_input(['name' => 'nim', 'id' => 'nim', 'class' => 'form-control']); ?><br>
  Nama <br> <?php echo form_input(['name' => 'nama', 'id' => 'nama', 'class' => 'form-control']); ?><br>
  Jurusan<br>
      <select class="form-control" id="sel1" name="jurusan">
        <option>
          <?php
            foreach ($jurusan as $j){
                echo "<option value='$j->id_jurusan'>$j->jurusan</option>";
            }
          ?>



        </option>
      </select>
  <br>Alamat <br> <?php echo form_input(['name' => 'alamat', 'id' => 'alamat', 'class' => 'form-control']); ?><br>

  <br><br><?php echo form_submit(['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-lg btn-primary btn-block']); ?>

</div>

        <?php echo form_submit('submit','Simpan');?>
        <?php echo anchor('mahasiswa','Kembali');?></td></tr>
</table>
<?php
echo form_close();
?>