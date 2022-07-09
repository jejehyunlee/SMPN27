<?php 
        session_start();
        error_reporting(0);
        include "config/koneksi.php"; 
        include "config/fungsi_indotgl.php"; 
        $frt = mysql_fetch_array(mysql_query("SELECT * FROM rb_header_print ORDER BY id_header_print DESC LIMIT 1")); 
        ?>
        <head>
        <title>Data Guru </title>
        <link rel="stylesheet" href="bootstrap/css/printer.css">
        </head>
        <body onload="window.print()">

                <h2><center>Laporan Data Guru </center></h2>
                <table width='100%' id='tablemodul1'>
                <!-- <table id="example1" class="table table-bordered table-striped"> -->
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>No Telpon</th>
                        <th>Status Pegawai</th>
                        <th>Jenis PTK</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                    $tampil = mysql_query("SELECT * FROM rb_guru a 
                                          LEFT JOIN rb_jenis_kelamin b ON a.id_jenis_kelamin=b.id_jenis_kelamin 
                                            LEFT JOIN rb_status_kepegawaian c ON a.id_status_kepegawaian=c.id_status_kepegawaian 
                                              LEFT JOIN rb_jenis_ptk d ON a.id_jenis_ptk=d.id_jenis_ptk
                                              ORDER BY a.nip DESC");
                    $no = 1;
                    while($r=mysql_fetch_array($tampil)){
                    $tanggal = tgl_indo($r[tgl_posting]);
                    echo "<tr><td>$no</td>
                              <td>$r[nip]</td>
                              <td>$r[nama_guru]</td>
                              <td>$r[jenis_kelamin]</td>
                              <td>$r[hp]</td>
                              <td>$r[status_kepegawaian]</td>
                              <td>$r[jenis_ptk]</td>";
                      }

                  ?>
                    </tbody>
                  </table>

  <table border=0 width=100%>
  <tr>
    <td style='margin-right:5px' width="400" align="right">Jakarta, <?php echo tgl_raport(date("Y-m-d")); ?> <br>Mengetahui <br> Kepala SMP Negeri 275 Jakarta</td>
  </tr>
  <tr>

    <td style='margin-right:5px' align="right" valign="top"><br /><br /><br /><br /><br />
      <b>DRS. AMRI JUNA, M.Pd<br>
      NIP : 196209051987031007</b>
    </td>
  </tr>
</table> 
</body>       