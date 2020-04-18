<?php 
  require '../config.php'; 
  session_start();
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
  }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapodik - Admin</title>
    <link rel="stylesheet" href="../home-page.css" type="text/css">
    <link rel="stylesheet" href="../default-style.css" type="text/css">
    <style>
      .logout-btn{
        display: flex;
        align-items: center;
        margin-left: 50px;
        color: #707070;
        font-size: 15px;
        font-weight: 600;
      }
      .logout-btn:hover{
        color: #f44336;
      }
      .tambahdata-btn{
        color: #fff;
        width: 125px;
        height: 40px;
        background-color: #4CAF50;
        margin-right: 100px;
        display: flex;
        align-items: center;
        justify-content: center; 
      }
      .form-filter{
        display: flex;
        flex-direction: row;
        height: 30px;
        margin-left: auto;
        margin-right: 20px;
        margin-bottom: 12px;
      }
      .edit-btn{
        color: #4CAF50;
      }
      .edit-btn:hover{
        color: #fff;
        background-color: #4CAF50;
      }
      .delete-btn{
        color: #f44336;
      }
      .delete-btn:hover{
        color: #fff;
        background-color: #f44336;}

    </style>
</head>
<body>
    <!-- Header start -->
    <nav class="header">
      <div class="container-header">
        <p class="tittle-web" >Dapodik DIY - Admin</p>
        <a class="logout-btn" href="logout.php">
          <img src="" alt="">
          <p>Logout</p>
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
        <form class="form-filter" action="" method="post">
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
        <a class="tambahdata-btn" href="profile-input.php">+ Tambah Data</a>
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
              <th>Aksi</th>
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
            ?>

            <?php while($sekolah = mysqli_fetch_array($query)): ?>
                  
                  <tr>

                  <td><a href="detail-page-admin.php?id=<?= $sekolah['NPSN'] ?>" style="color: #22185c;"><?= $sekolah['NAMA_SEKOLAH'] ?></a></td>
                  <td><?= $sekolah['NPSN'] ?></td>
                  <td><?= $sekolah['KABUPATEN'] ?></td>
                  <td><?= $sekolah['JENJANG'] ?></td>
                  <td><?= $sekolah['STATUS_SEKOLAH'] ?></td>
                  <td><?= $sekolah['LAKI'] ?></td>
                  <td><?= $sekolah['PEREMPUAN'] ?></td>
                  <td>
                    <a href="profile-edit.php?id=<?= $sekolah['NPSN'] ?>" class="edit-btn">Ubah</a>
                    <a href="proses.php?hapus=<?= $sekolah['NPSN'] ?>" class="delete-btn" onclick="return confirm('Data sekolah <?= $sekolah['NAMA_SEKOLAH'] ?> akan dihapus. Apakah Anda yakin akan menghapusnya?')">Hapus</a>
                  </td>

                  </tr>
            <?php endwhile; ?>
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