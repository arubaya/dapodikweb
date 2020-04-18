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
    <link rel="stylesheet" href="detail-page.css" type="text/css">
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
    <?php 
      $npsn = $_GET["id"];
    
      $sql = "SELECT `t_identitas`.`NPSN`, `t_identitas`.`NAMA_SEKOLAH`, `t_identitas`.`JENJANG`, `t_identitas`.`STATUS_SEKOLAH`, `t_identitas`.`AKREDITASI`, `t_alamat`.`ALAMAT`, `t_alamat`.`RT`, `t_alamat`.`RW`, `t_alamat`.`KODE_POS`, `t_alamat`.`KELURAHAN`, `t_alamat`.`KECAMATAN`, `t_alamat`.`KABUPATEN`, `t_alamat`.`PROVINSI`, `t_alamat`.`GEO_LINTANG`, `t_alamat`.`GEO_BUJUR`, `t_perizinan`.`SK_PENDIRIAN`, `t_perizinan`.`KEPEMILIKAN`, `t_perizinan`.`TGL_PENDIRIAN`, `t_perizinan`.`SK_OPERASIONAL`, `t_perizinan`.`TGL_OPERASIONAL`, `t_perizinan`.`NPWP`, `t_perizinan`.`NAMA_PAJAK`, `t_pelengkap`.`LAYANAN_DIFABEL`, `t_pelengkap`.`MBS`, `t_pelengkap`.`IURAN`, `t_pelengkap`.`NOMINAL`, `t_dataperiodik`.`PENYELENGARAAN`, `t_dataperiodik`.`BOS`, `t_dataperiodik`.`ISO`, `t_dataperiodik`.`SUMBER_LISTRIK`, `t_dataperiodik`.`DAYA_LISTRIK`, `t_dataperiodik`.`INTERNET`, `t_dataperiodik`.`INTERNET_ALTER`, `t_jmlsiswa`.`LAKI`, `t_jmlsiswa`.`PEREMPUAN`, `t_sanitasi`.`KECUKUPAN`, `t_sanitasi`.`AIR_MANDIRI`, `t_sanitasi`.`MINUM_SISWA`, `t_sanitasi`.`BAWA_AIR`, `t_sanitasi`.`TOILET_DIFABEL`, `t_sanitasi`.`SUMBER_AIR`, `t_sanitasi`.`AIR_LINGKUNGAN`, `t_sanitasi`.`TIPE_JAMBAN`, `t_sanitasi`.`JML_WASTAFEL`, `t_sanitasi`.`SABUN_WASTAFEL`, `t_sanitasi`.`JAMBAN_BAGUS`, `t_sanitasi`.`JAMBAN_RUSAK`, `t_kontak`.`TELP`, `t_kontak`.`FAX`, `t_kontak`.`EMAIL`, `t_kontak`.`WEB`, `t_kontak`.`NO_REK`, `t_kontak`.`BANK`, `t_kontak`.`CABANG`, `t_kontak`.`NAMA_REK`
      FROM `t_identitas` 
        LEFT JOIN `t_alamat` ON `t_alamat`.`NPSN` = `t_identitas`.`NPSN` 
        LEFT JOIN `t_perizinan` ON `t_perizinan`.`NPSN` = `t_identitas`.`NPSN` 
        LEFT JOIN `t_pelengkap` ON `t_pelengkap`.`NPSN` = `t_identitas`.`NPSN` 
        LEFT JOIN `t_dataperiodik` ON `t_dataperiodik`.`NPSN` = `t_identitas`.`NPSN` 
        LEFT JOIN `t_jmlsiswa` ON `t_jmlsiswa`.`NPSN` = `t_identitas`.`NPSN` 
        LEFT JOIN `t_sanitasi` ON `t_sanitasi`.`NPSN` = `t_identitas`.`NPSN` 
        LEFT JOIN `t_kontak` ON `t_kontak`.`NPSN` = `t_identitas`.`NPSN` 
      WHERE `t_identitas`.`NPSN` = $npsn;";
      $query = mysqli_query($db, $sql);
      $data = mysqli_fetch_assoc($query);
    ?>

    <!-- Detail Start -->
    <div class="detailContent">
      <div class="detail-header-container">
        <div class="headerName">
        <h2 style="margin-bottom: 0; margin-top: 15px; font-size: 30px; font-weight: 600;"><?= $data["NAMA_SEKOLAH"] ?></h2>
        <h3 style="margin-top: 5px; font-size: 16px; font-style: italic; font-weight: 400;" >NPSN : <?= $data["NPSN"] ?></h3>
        </div>
        <div class="tabBar">
          <button class="tablinks" onclick="openRegion(event,'Profile')" >Profile</button>
          <button class="tablinks" onclick="openRegion(event,'Sanitasi')" >Sanitasi</button>
          <button class="tablinks" onclick="openRegion(event,'Kontak')" >Kontak</button>
        </div>
      </div>
      <!-- Profile Content -->
      <div class="tabcontent" id="Profile">
        <div class="tabcontent-container">
          <div class="card-container">
            <div class="card-header">
              <p>Identitas Sekolah</p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Status: </p>
              <p><?= $data["STATUS_SEKOLAH"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Bentuk Pendidikan: </p>
              <p><?= $data["JENJANG"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Akreditasi: </p>
              <p><?= $data["AKREDITASI"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Status Kepemilikan: </p>
              <p><?= $data["KEPEMILIKAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">SK Pendirian: </p>
              <p><?= $data["SK_PENDIRIAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Tanggal SK Pendirian: </p>
              <p><?= $data["TGL_PENDIRIAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">SK Izin Operasional: </p>
              <p><?= $data["SK_OPERASIONAL"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Tanggal SK Izin Operasional: </p>
              <p><?= $data["TGL_OPERASIONAL"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Jumlah Siswa Laki-laki: </p>
              <p><?= $data["LAKI"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Jumlah Siswa Perempuan: </p>
              <p><?= $data["PEREMPUAN"] ?></p>
            </div>
          </div>

          <div class="card-container">
            <div class="card-header">
              <p>Alamat Sekolah</p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Alamat: </p>
              <p><?= $data["ALAMAT"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">RT: </p>
              <p><?= $data["RT"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">RW: </p>
              <p><?= $data["RW"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Kode Pos: </p>
              <p><?= $data["KODE_POS"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Kelurahan: </p>
              <p><?= $data["KELURAHAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Kecamatan: </p>
              <p><?= $data["KECAMATAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Kabupaten: </p>
              <p><?= $data["KABUPATEN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Provinsi: </p>
              <p><?= $data["PROVINSI"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Lintang: </p>
              <p><?= $data["GEO_LINTANG"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Bujur: </p>
              <p><?= $data["GEO_BUJUR"] ?></p>
            </div>
          </div>

          <div class="card-container">
            <div class="card-header">
              <p>Data Pelengkap</p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Pelayanan Difabel: </p>
              <p><?= $data["LAYANAN_DIFABEL"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">MBS: </p>
              <p><?= $data["MBS"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Memungut Iuran: </p>
              <p><?= $data["IURAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Nominal per-Siswa: </p>
              <p><?= $data["NOMINAL"] ?></p>
            </div>
          </div>

          <div class="card-container">
            <div class="card-header">
              <p>Data Rinci</p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Waktu Penyelenggaraan: </p>
              <p><?= $data["PENYELENGARAAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Menerima BOS: </p>
              <p><?= $data["BOS"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Sertifikasi ISO: </p>
              <p><?= $data["ISO"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Sumber Listrik: </p>
              <p><?= $data["SUMBER_LISTRIK"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Daya Listrik: </p>
              <p><?= $data["DAYA_LISTRIK"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Internet: </p>
              <p><?= $data["INTERNET"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Internet (alternatif): </p>
              <p><?= $data["INTERNET_ALTER"] ?></p>
            </div>
          </div>

        </div>
      </div>

      <!-- Sanitasi Content -->
      <div class="tabcontent" id="Sanitasi">
        <div class="tabcontent-container">
          <div class="card-container">
            <div class="card-header">
              <p>Data Sanitasi Sekolah</p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Kecukupan Air: </p>
              <p><?= $data["KECUKUPAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Sekolah Memproses Air Sendiri: </p>
              <p><?= $data["AIR_MANDIRI"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Air Minum untuk Siswa: </p>
              <p><?= $data["MINUM_SISWA"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Mayoritas Membawa Air Minum: </p>
              <p><?= $data["BAWA_AIR"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Jumlah Toilet Difabel: </p>
              <p><?= $data["TOILET_DIFABEL"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Sumber Air Sanitasi: </p>
              <p><?= $data["SUMBER_AIR"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Ketersediaan Air di Lingkungan Sekolah: </p>
              <p><?= $data["AIR_LINGKUNGAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Tipe Jamban: </p>
              <p><?= $data["TIPE_JAMBAN"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Jumlah Wastafel: </p>
              <p><?= $data["JML_WASTAFEL"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Terdapat Sabun pada Wastafel: </p>
              <p><?= $data["SABUN_WASTAFEL"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Jamban Dapat Digunakan: </p>
              <p><?= $data["JAMBAN_BAGUS"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Jamban Tidak Dapat Digunakan: </p>
              <p><?= $data["JAMBAN_RUSAK"] ?></p>
            </div>
          </div>

        </div>
      </div>

      <!-- Kontak Content -->
      <div class="tabcontent" id="Kontak">
        <div class="tabcontent-container">
          <div class="card-container">
            <div class="card-header">
              <p>Kontak Sekolah</p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Telepon: </p>
              <p><?= $data["TELP"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Fax: </p>
              <p><?= $data["FAX"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Email: </p>
              <p><?= $data["EMAIL"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Website: </p>
              <p><?= $data["WEB"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Nomor Rekening: </p>
              <p><?= $data["NO_REK"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Nama Bank: </p>
              <p><?= $data["BANK"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Cabang Unit: </p>
              <p><?= $data["CABANG"] ?></p>
            </div>
            <div class="dataOutput">
              <p style="margin-right: 6px; font-weight: bold;">Rekening Atas Nama: </p>
              <p><?= $data["NAMA_REK"] ?></p>
            </div>
          </div>

        </div>
      </div>



    </div>
    <!-- Detail End -->

    <!-- Footer Start -->
    <div class="footer-section">
      <p>Copyright 2020. Dapodik. Design by Si Tupi</p>
    </div>
    <!-- Footer End -->

    <!-- Script Start -->
    
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
        document.getElementById(regionName).style.display = "flex";
        evt.currentTarget.className += " active";
      }
    
    </script>
</body>
</html>