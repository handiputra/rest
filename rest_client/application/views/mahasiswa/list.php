<!DOCTYPE html>
<html lang="en">

<style type="text/css">
  @media print
  {   
    table td:last-child {display:none}
    table th:last-child {display:none}
 
      #but1, #but2 
      {
          display: none !important;
      }
  @page { size: auto;  margin: 0mm; }

  }

</style>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Teknik Informatika UMM">
  <meta name="author" content="REST CLIENT">
<!-- core CSS -->
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/dataTables.bootstrap.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/css/fontawesome-all.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/js/jquery-1.11.0.js"></script>
  <script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url() ?>assets/datatables/dataTables.bootstrap.js"></script>
</head>
 <body>
<?php echo $this->session->flashdata('hasil'); ?>

<br><br>
<div class="container">
   <a href="<?php echo base_url() ?>index.php/mahasiswa/create/" class="btn btn-info" id="but1" role="button" style="float: right;">Tambah Mahasiswa </a>
   <button onclick="printFunc()" class="btn btn-default" id="but2" role="button" style="float: left;">Buat Laporan </button>
    <br><br><br><br>
    <table id="mahasiswa" class="table table-striped">
        <thead>
            <tr>
                <th onclick="sortTable(0)" width="10%" >NIM <span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span>
</th>
                <th width="15%">NAMA</th>
                <th width="15%">JURUSAN</th>
                <th width="15%">ALAMAT</th>
                <th width="15%">Aksi</th>
            </tr>
        </thead>


    <?php
    //echo "<td>".anchor('mahasiswa'/create/)"";

    //echo ".anchor('mahasiswa/create','Create').";
    foreach ($mahasiswa as $m){
        echo "<tr>
              <td>$m->nim</td>
              <td>$m->nama</td>
              <td>$m->jurusan</td>
              <td>$m->alamat</td>
              <td>".anchor('mahasiswa/edit/'.$m->nim,'Edit')."
                  ".anchor('mahasiswa/delete/'.$m->nim,'Delete')."</td>
              </tr>";
    }
    ?>

  <script >
  function printFunc() {
    window.print();
  }

  function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("mahasiswa");
  switching = true;
  // Set the sorting direction to ascending:
  dir = "asc"; 
  /* Make a loop that will continue until
  no switching has been done: */
  while (switching) {
    // Start by saying: no switching is done:
    switching = false;
    rows = table.getElementsByTagName("TR");
    /* Loop through all table rows (except the
    first, which contains table headers): */
    for (i = 1; i < (rows.length - 1); i++) {
      // Start by saying there should be no switching:
      shouldSwitch = false;
      /* Get the two elements you want to compare,
      one from current row and one from the next: */
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /* Check if the two rows should switch place,
      based on the direction, asc or desc: */
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          // If so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /* If a switch has been marked, make the switch
      and mark that a switch has been done: */
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      // Each time a switch is done, increase this count by 1:
      switchcount ++; 
    } else {
      /* If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again. */
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
  </script>

</body>