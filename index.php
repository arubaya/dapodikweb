<?php 
  require 'config.php'; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapodik</title>
    <link rel="stylesheet" href="home-page.css" type="text/css">
    <link rel="stylesheet" href="default-style.css" type="text/css">
</head>
<body>
    <!-- Header start -->
    <nav class="header">
      <div class="container-header">
        <p class="tittle-web" >Dapodik DIY</p>
        <div class="navbar">
          <a href="index.php">Beranda</a>
          <a href="alamat-page.php">Alamat</a>
          <div class="dropdown">
            <button class="dropbtn">Identitas</button>
            <div class="dropdown-content">
              <a href="jenjang-page.php">Jenjang Sekolah</a>
              <a href="status-page.php">Status Sekolah</a>
              <a href="akreditasi-page.php">Akreditasi</a>
              <a href="siswa-page.php">Jumlah Siswa</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Perizinan</button>
            <div class="dropdown-content">
              <a href="pendirian-page.php">Pendirian Sekolah</a>
              <a href="operasional-page.php">Operasional Sekolah</a>
              <a href="npwp-page.php">NPWP Sekolah</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Sanitasi</button>
            <div class="dropdown-content">
              <a href="air-page.php">Air</a>
              <a href="toilet-page.php">Toilet</a>
              <a href="wastafel-page.php">Wastafel</a>
            </div>
          </div>
          <a href="difabel-page.php">Layanan Difabel</a>
          <a href="hubungi-page.php">Hubungi</a>
        </div>
        <a class="login-btn" href="login.php">
          <img src="" alt="">
          <p>Login</p>
        </a>
        </div>
      </div>
    </nav>
    <!-- Header End -->

    <!-- Table Start -->
    <div class="tabcontent" id="Sleman">
      <div class="tab-header-container">
        <p>Data Sekolah</p>
      </div>
      <div class="search-container">
        <input type="text" class="myInput" id="searchInput" onkeyup="searchTable()" placeholder="Cari sekolah..">
        <form action="" method="post">
          <select name="filterSelect" id="filterSelect">
            <option value="all">Seluruh Wilayah</option>
            <option value="Sleman">Sleman</option>
            <option value="Yogyakarta">Yogyakarta</option>
            <option value="Bantul">Bantul</option>
            <option value="Kulon Progo">Kulon Progo</option>
            <option value="Gunung Kidul">Gunung Kidul</option>
          </select>
          <button class="filter-btn" type="submit" name="filter-btn">Terapkan</button>
        </form>
      </div>
      <div class="table-container">
        <table id="myTable">
          <thead>
            <tr>
              <th>Nama</th>
              <th>NPSN</th>
              <th>Wilayah</th>
              <th>Jenjang</th>
              <th>Status</th>
              <th>Siswa (LK)</th>
              <th>Siswa (PR)</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $sql = "SELECT `t_identitas`.`NAMA_SEKOLAH`, `t_identitas`.`NPSN`, `t_alamat`.`KABUPATEN`, `t_identitas`.`JENJANG`, `t_identitas`.`STATUS_SEKOLAH`, `t_jmlsiswa`.`LAKI`, `t_jmlsiswa`.`PEREMPUAN`
              FROM `t_identitas` 
                LEFT JOIN `t_alamat` ON `t_alamat`.`NPSN` = `t_identitas`.`NPSN` 
                LEFT JOIN `t_jmlsiswa` ON `t_jmlsiswa`.`NPSN` = `t_identitas`.`NPSN`
                -- WHERE `t_alamat`.`KABUPATEN` = 'Sleman'";

              if (isset($_POST["filter-btn"])){
                $wilayah = $_POST["filterSelect"];               
                function filterTable($wilayah){
                  global $sql;
                  if($wilayah == "all"){
                    $sql = "SELECT `t_identitas`.`NAMA_SEKOLAH`, `t_identitas`.`NPSN`, `t_alamat`.`KABUPATEN`, `t_identitas`.`JENJANG`, `t_identitas`.`STATUS_SEKOLAH`, `t_jmlsiswa`.`LAKI`, `t_jmlsiswa`.`PEREMPUAN`
                            FROM `t_identitas` 
                              LEFT JOIN `t_alamat` ON `t_alamat`.`NPSN` = `t_identitas`.`NPSN` 
                              LEFT JOIN `t_jmlsiswa` ON `t_jmlsiswa`.`NPSN` = `t_identitas`.`NPSN`
                              -- WHERE `t_alamat`.`KABUPATEN` = '$wilayah'";
                    return $sql;
                  } else{
                    $sql = "SELECT `t_identitas`.`NAMA_SEKOLAH`, `t_identitas`.`NPSN`, `t_alamat`.`KABUPATEN`, `t_identitas`.`JENJANG`, `t_identitas`.`STATUS_SEKOLAH`, `t_jmlsiswa`.`LAKI`, `t_jmlsiswa`.`PEREMPUAN`
                            FROM `t_identitas` 
                              LEFT JOIN `t_alamat` ON `t_alamat`.`NPSN` = `t_identitas`.`NPSN` 
                              LEFT JOIN `t_jmlsiswa` ON `t_jmlsiswa`.`NPSN` = `t_identitas`.`NPSN`
                              WHERE `t_alamat`.`KABUPATEN` = '$wilayah'";
                    return $sql;
                  };
                };
                filterTable($wilayah);
              };

              $query = mysqli_query($db, $sql);

              while($sekolah = mysqli_fetch_array($query)){
                  
                  echo "<tr>";

                  echo "<td><a href='detail-page.php?id=".$sekolah['NPSN']."' style='color: #22185c';>".$sekolah['NAMA_SEKOLAH']."</a></td>";
                  echo "<td>".$sekolah['NPSN']."</td>";
                  echo "<td>".$sekolah['KABUPATEN']."</td>";
                  echo "<td>".$sekolah['JENJANG']."</td>";
                  echo "<td>".$sekolah['STATUS_SEKOLAH']."</td>";
                  echo "<td>".$sekolah['LAKI']."</td>";
                  echo "<td>".$sekolah['PEREMPUAN']."</td>";

                  echo "</tr>";
              }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <!-- Table End -->

    <!-- Footer Start -->
    <div class="footer-section">
      <p>Copyright 2020. Dapodik. Design by Si Tupi</p>
    </div>
    <!-- Footer End -->

    <!-- Script Start -->
    <script>
      function searchTable() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[0];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }
    </script>
    <script>
      function openRegion(evt, regionName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(regionName).style.display = "block";
        evt.currentTarget.className += " active";
      }
    
    </script>
</body>
</html>