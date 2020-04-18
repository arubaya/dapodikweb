<?php 
  require 'config.php'; 
  // require 'location-data.php'?>

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
        <a class="login-btn" href="login.php">
          <img src="" alt="">
          <p>Login</p>
        </a>
        </div>
      </div>
    </nav>
    <!-- Header End -->

    <!-- Navbar Start -->
    <div class="navbar">
      <button class="tablinks" onclick="openRegion(event,'Sleman')" >Sleman</button>
      <button class="tablinks" onclick="openRegion(event,'Yogyakarta')" >Yogyakarta</button>
      <button class="tablinks" onclick="openRegion(event,'Bantul')" >Bantul</button>
      <button class="tablinks" onclick="openRegion(event,'Gunung-Kidul')" >Gunung Kidul</button>
      <button class="tablinks" onclick="openRegion(event,'Kulon-Progo')" >Kulon Progo</button>
    </div>
    <!-- Navbar End -->

    <!-- Table Start -->
    <!-- Sleman Content -->
    <div class="tabcontent" id="Sleman">
      <div class="tab-header-container">
        <p>Data Sekolah</p>
        <div class="jenjang-select"></div>
      </div>
      <div class="search-container">
      <input type="text" class="myInput" id="searchSleman" onkeyup="Sleman()" placeholder="Cari sekolah..">
      </div>
      <div class="table-container">
        <table id="tableSleman">
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
                WHERE `t_alamat`.`KABUPATEN` = 'Sleman'";
              $query = mysqli_query($db, $sql);

              while($sekolah = mysqli_fetch_array($query)){
                  
                  echo "<tr>";

                  echo "<td>".$sekolah['NAMA_SEKOLAH']."</td>";
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

    <!-- Yogyakarta Content -->
    <div class="tabcontent" id="Yogyakarta">
      <div class="tab-header-container">
        <p>Data Sekolah</p>
      </div>
      <div class="search-container">
      <input type="text" class="myInput" id="searchYogyakarta" onkeyup="Yogyakarta()" placeholder="Cari sekolah..">
      </div>
      <div class="table-container">
        <table id="tableYogyakarta">
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
                WHERE `t_alamat`.`KABUPATEN` = 'Yogyakarta'";
              $query = mysqli_query($db, $sql);

              while($sekolah = mysqli_fetch_array($query)){
                  
                  echo "<tr>";

                  echo "<td>".$sekolah['NAMA_SEKOLAH']."</td>";
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

    <!-- Bantul Content -->
    <div class="tabcontent" id="Bantul">
      <div class="tab-header-container">
        <p>Data Sekolah</p>
        <div class="jenjang-select">
          <select name="jenjang" id="jenjangBantul">
            <option value="" onclick="Bantul()">Semua Jenjang</option>
            <option value="SD" onclick="Bantul()">SD</option>
            <option value="SMP" onclick="Bantul()">SMP</option>
            <option value="SMA" onclick="Bantul()">SMA</option>
          </select>
        </div>
        <div class="jenjang-select2">
          <select name="jenjang" id="wilayahBantul">
            <option value="" onclick="Bantul2()">Semua Wilayah</option>
            <option value="Sleman" onclick="Bantul2()">Sleman</option>
            <option value="Yogyakarta" onclick="Bantul2()">Yogyakarta</option>
            <option value="BAntul" onclick="Bantul2()">Bantul</option>
          </select>
        </div>
      </div>
      <div class="search-container">
      <input type="text" class="myInput" id="searchBantul" onkeyup="Bantul()" placeholder="Cari sekolah..">
      </div>
      <div class="table-container">
        <table id="tableBantul">
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
                -- WHERE `t_alamat`.`KABUPATEN` = 'Bantul'";
              $query = mysqli_query($db, $sql);

              while($sekolah = mysqli_fetch_array($query)){
                  
                  echo "<tr>";

                  echo "<td>".$sekolah['NAMA_SEKOLAH']."</td>";
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

    <!-- Gunung Kidul Content -->
    <div class="tabcontent" id="Gunung-Kidul">
      <div class="tab-header-container">
        <p>Data Sekolah</p>
      </div>
      <div class="search-container">
      <input type="text" class="myInput" id="searchGK" onkeyup="GK()" placeholder="Cari sekolah..">
      </div>
      <div class="table-container">
        <table id="tableGK">
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
                WHERE `t_alamat`.`KABUPATEN` = 'Gunung Kidul'";
              $query = mysqli_query($db, $sql);

              while($sekolah = mysqli_fetch_array($query)){
                  
                  echo "<tr>";

                  echo "<td>".$sekolah['NAMA_SEKOLAH']."</td>";
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

    <!-- Kulon Progo Content -->
    <div class="tabcontent" id="Kulon-Progo">
      <div class="tab-header-container">
        <p>Data Sekolah</p>
      </div>
      <div class="search-container">
      <input type="text" class="myInput" id="searchKP" onkeyup="KP()" placeholder="Cari sekolah..">
      </div>
      <div class="table-container">
        <table id="tableKP">
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
                WHERE `t_alamat`.`KABUPATEN` = 'Kulon Progo'";
              $query = mysqli_query($db, $sql);

              while($sekolah = mysqli_fetch_array($query)){
                  
                  echo "<tr>";

                  echo "<td>".$sekolah['NAMA_SEKOLAH']."</td>";
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
      function Sleman() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchSleman");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableSleman");
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

      function Yogyakarta() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchYogyakarta");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableYogyakarta");
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

      function Bantul() {
        // Declare variables
        var input, inputJenjang, filter, filterJenjang, table, tr, td, i, txtValue;
        input = document.getElementById("searchBantul");
        filter = input.value.toUpperCase();
        inputJenjang = document.getElementById("jenjangBantul");
        filterJenjang = inputJenjang.value.toUpperCase();
        table = document.getElementById("tableBantul");
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

        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[3];
          if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filterJenjang) > -1) {
              tr[i].style.display = "";
            } else {
              tr[i].style.display = "none";
            }
          }
        }
      }

      function Bantul2() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("wilayahBantul");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableBantul");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
          td = tr[i].getElementsByTagName("td")[2];
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

      function GK() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchGK");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableGK");
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

      function KP() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchKP");
        filter = input.value.toUpperCase();
        table = document.getElementById("tableKP");
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