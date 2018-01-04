<?php echo form_open('mahasiswa/edit');?>
<?php echo form_hidden('nim',$mahasiswa[0]->nim);?>
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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" >Pendataan Mahasiswa</a>
    </div>
</nav>
<div class="form-group" >
  <div class="col-sm-5">
    Nim <br> <?php echo form_input(['name' => 'nim', 'id' => 'nim','value'=>$mahasiswa[0]->nim, 'class' => 'form-control',"disabled"]); ?><br>
    Nama <br> <?php echo form_input(['name' => 'nama', 'id' => 'nama','value'=>$mahasiswa[0]->nama, 'class' => 'form-control']); ?><br>
    Jurusan<br>
      <select class="form-control" id="sel1" name="jurusan">
        <option>
          <?php
            foreach ($jurusan as $j){
                echo "<option value='$j->id_jurusan' ";
                echo $mahasiswa[0]->id_jurusan==$j->id_jurusan?'selected':'';
                echo ">$j->jurusan</option>";
            }
          ?>
          </option>
      </select>
  <br>Alamat <br> <?php echo form_input(['name' => 'alamat', 'id' => 'alamat','value'=>$mahasiswa[0]->alamat, 'class' => 'form-control']); ?><br>
  
  <div class="col-sm-3" style="float: left;">    <?php echo form_submit(['name' => 'Kirim', 'id' => 'Kirim', 'class' => 'btn btn-md btn-primary btn-block','value'=>'Kirim']); ?>

  </div>
  <div class="col-sm-3" >
    <?php echo anchor('mahasiswa','Kembali',array('class' => 'btn btn-md btn-default btn-block'));?>
  </div>
    
</div>
    
<?php
echo form_close();
?>