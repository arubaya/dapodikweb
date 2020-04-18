<?php 
  require '../config.php'; 
  session_start();
  if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
  }
?>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapodik - Admin</title>
    <link rel="stylesheet" href="profile-input-page.css" type="text/css">
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
        color: #f44336
      }
    </style>
</head>
<body>
    <!-- Header start -->
    <nav class="header">
      <div class="container-header">
        <p class="tittle-web" >Dapodik DIY - Admin</p>
        <a class="logout-btn" href="admin.php">
          <img src="" alt="">
          <p>Cancel</p>
        </a>
        </div>
      </div>
    </nav>
    <!-- Header End -->
 
    <!-- Form Start -->
    <div class="form">
      <div class="form-tittle">
        <p>Ubah Data Profile Sekolah</p>
      </div>
      <div class="form-container">
        <form action="proses.php" method="POST">
          <!-- Identitas -->
          <div class="form-section">
            <div class="section-tittle">
              <p>Identitas Sekolah</p>
            </div>
            <p>
              <label for="npsn">NPSN: <?= $data["NPSN"] ?></label>
              <input type="hidden" value="<?= $data["NPSN"] ?>" name="npsn" id="npsn" placeholder="Masukkan NPSN" disabled()/>
            </p>
            <p>
              <label for="nama_sekolah">Nama Sekolah: </label>
              <input type="text" value="<?= $data["NAMA_SEKOLAH"] ?>" name="nama_sekolah" id="nama_sekolah" placeholder="Masukkan Nama Sekolah" />
            </p>
            <p>
              <label for="jenjang">Jenjang: </label>
              <select class="opsi-jawab" name="jenjang" id="jenjang" value="<?= $data["JENJANG"] ?>">
                <option value="" disabled()>Masukan Jenjang Sekolah..</option>
                <option value="SD">SD</option>
                <option value="SMP">SMP</option>
                <option value="SMA">SMA</option>
              </select>
            </p>
            <p>
              <label for="status_sekolah">Status Sekolah: </label>
              <select class="opsi-jawab" name="status_sekolah" id="status_sekolah" value="<?= $data["STATUS_SEKOLAH"] ?>">
                <option value="" disabled()>Masukan Status Sekolah..</option>
                <option value="Negeri">Negeri</option>
                <option value="Swasta">Swasta</option>
              </select>
            </p>
            <p>
              <label for="akreditasi">Akreditasi: </label>
              <select class="opsi-jawab" name="akreditasi" id="akreditasi" value="<?= $data["AKREDITASI"] ?>">
                <option value="" disabled()>Masukan Akreditasi..</option>
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="Belum Terakreditasi">Belum Terakreditasi</option>
              </select>
            </p>
          </div>

          <!-- Alamat -->
          <div class="form-section">
            <div class="section-tittle">
              <p>Alamat Sekolah</p>
            </div>
            <p>
              <label for="alamat">Alamat: </label>
              <input type="text" value="<?= $data["ALAMAT"] ?>" name="alamat" id="alamat" placeholder="Masukkan Alamat" />
            </p>
            <p>
              <label for="rt">Rt: </label>
              <input type="text" value="<?= $data["RT"] ?>" name="rt" id="rt" placeholder="Masukkan Rt Sekolah" />
            </p>
            <p>
              <label for="rw">Rw: </label>
              <input type="text" value="<?= $data["RW"] ?>" name="rw" id="rw" placeholder="Masukkan Rw Sekolah" />
            </p>
            <p>
              <label for="kodepos">Kodepos: </label>
              <input type="text" value="<?= $data["KODE_POS"] ?>" name="kodepos" id="kodepos" placeholder="Masukkan Kodepos" />
            </p>
            <p>
              <label for="kelurahan">Kelurahan: </label>
              <input type="text" value="<?= $data["KELURAHAN"] ?>" name="kelurahan" id="kelurahan" placeholder="Masukkan Kelurahan" />
            </p>
            <p>
              <label for="kecamatan">Kecamatan: </label>
              <input type="text" value="<?= $data["KECAMATAN"] ?>" name="kecamatan" id="kecamatan" placeholder="Masukkan Kecamatan" />
            </p>
            <p>
              <label for="kabupaten">Kabupaten: </label>
              <select class="opsi-jawab" name="kabupaten" id="kabupaten" value="<?= $data["KABUPATEN"] ?>">
                <option value="" disabled()>Masukan Kabupaten..</option>
                <option value="Sleman">Sleman</option>
                <option value="Yogyakarta">Yogyakarta</option>
                <option value="Bantul">Bantul</option>
                <option value="Gunung Kidul">Gunung Kidul</option>
                <option value="Kulon Progo">Kulon Progo</option>
              </select>
            </p>
            <p>
              <label for="provinsi">Provinsi: </label>
              <input type="text" value="<?= $data["PROVINSI"] ?>" name="provinsi" id="provinsi" placeholder="Masukkan Provinsi" />
            </p>
            <p>
              <label for="lintang">Letak Lintang: </label>
              <input type="text" value="<?= $data["GEO_LINTANG"] ?>" name="lintang" id="lintang" placeholder="Masukkan Letak Lintang" />
            </p>
            <p>
              <label for="bujur">Letak Bujur: </label>
              <input type="text" value="<?= $data["GEO_BUJUR"] ?>" name="bujur" id="bujur" placeholder="Masukkan Letak Bujur" />
            </p>
          </div>

          <!-- Perizinan -->
          <div class="form-section">
            <div class="section-tittle">
              <p>Perizinan Sekolah</p>
            </div>
            <p>
              <label for="sk_pen">SK Pendirian: </label>
              <input type="text" value="<?= $data["SK_PENDIRIAN"] ?>" name="sk_pen" id="sk_pen" placeholder="Masukkan SK Pendirian" />
            </p>
            <p>
              <label for="kepemilikan">Kepemilikan: </label>
              <input type="text" value="<?= $data["KEPEMILIKAN"] ?>" name="kepemilikan" id="kepemilikan" placeholder="Masukkan Kepemilikan" />
            </p>
            <p>
              <label for="tgl_pen">Tanggal Pendirian: </label>
              <input type="date" value="<?= $data["TGL_PENDIRIAN"] ?>" name="tgl_pen" id="tgl_pen" placeholder="Masukkan Tanggal Pendirian Sekolah" />
            </p>
            <p>
              <label for="sk_op">SK Operasional: </label>
              <input type="text" value="<?= $data["SK_OPERASIONAL"] ?>" name="sk_op" id="sk_op" placeholder="Masukkan SK Operasional" />
            </p>
            <p>
              <label for="tgl_op">Tanggal Operasional: </label>
              <input type="date" value="<?= $data["TGL_OPERASIONAL"] ?>" name="tgl_op" id="tgl_op" placeholder="Masukkan Tanggal Operasional" />
            </p>
            <p>
              <label for="npwp">NPWP: </label>
              <input type="text" value="<?= $data["NPWP"] ?>" name="npwp" id="npwp" placeholder="Masukkan NPWP" />
            </p>
            <p>
              <label for="nm_pajak">Nama Wajib Pajak: </label>
              <input type="text" value="<?= $data["NAMA_PAJAK"] ?>" name="nm_pajak" id="nm_pajak" placeholder="Masukkan Nama Wajib Pajak" />
            </p>
          </div>

          <!-- Periodik -->
          <div class="form-section">
            <div class="section-tittle">
              <p>Data Pelengkap Sekolah</p>
            </div>
            <p>
              <label for="penyelenggaraan">Waktu Penyelenggaraan: </label>
              <input type="text" value="<?= $data["PENYELENGARAAN"] ?>" name="penyelenggaraan" id="penyelenggaraan" placeholder="Masukkan Waktu Penyelenggaraan" />
            </p>
            <p>
              <label for="bos">Menerima BOS: </label>
              <input type="text" value="<?= $data["BOS"] ?>" name="bos" id="bos" placeholder="Bersedia Menerima BOS?" />
            </p>
            <p>
              <label for="iso">Sertifikat ISO: </label>
              <input type="text" value="<?= $data["ISO"] ?>" name="iso" id="iso" placeholder="Masukkan Sertifikat ISO Sekolah" />
            </p>
            <p>
              <label for="sbr_listrik">Sumber Listrik: </label>
              <input type="text" value="<?= $data["SUMBER_LISTRIK"] ?>" name="sbr_listrik" id="sbr_listrik" placeholder="Masukkan Sumber Listrik" />
            </p>
            <p>
              <label for="dy_listrik">Daya Listrik: </label>
              <input type="text" value="<?= $data["DAYA_LISTRIK"] ?>" name="dy_listrik" id="dy_listrik" placeholder="Masukkan Daya Listrik" />
            </p>
            <p>
              <label for="internet">Akses Internet: </label>
              <input type="text" value="<?= $data["INTERNET"] ?>" name="internet" id="internet" placeholder="Masukkan Akses Internet" />
            </p>
            <p>
              <label for="internet_alter">Akses Internet (alternatif): </label>
              <input type="text" value="<?= $data["INTERNET_ALTER"] ?>" name="internet_alter" id="internet_alter" placeholder="Masukkan Akses Internet (alternatif)" />
            </p>
            <p>
              <label for="layan_difabel">Pelayanan Difabel: </label>
              <input type="text" value="<?= $data["LAYANAN_DIFABEL"] ?>" name="layan_difabel" id="layan_difabel" placeholder="Masukkan Pelayanan Difabel" />
            </p>
            <p>
              <label for="mbs">MBS: </label>
              <input type="text" value="<?= $data["MBS"] ?>" name="mbs" id="mbs" placeholder="Masukkan MBS" />
            </p>
            <p>
              <label for="iuran">Memungut Iuran?: </label>
              <input type="text" value="<?= $data["IURAN"] ?>" name="iuran" id="iuran" placeholder="Masukkan Memungut Iuran?" />
            </p>
            <p>
              <label for="nominal">Nominal per-Siswa: </label>
              <input type="text" value="<?= $data["NOMINAL"] ?>" name="nominal" id="nominal" placeholder="Masukkan Nominal per-Siswa" />
            </p>
          </div>

          <!-- Jumlah Siswa -->
          <div class="form-section">
            <div class="section-tittle">
              <p>Jumlah Siswa</p>
            </div>
            <p>
                <label for="jml_lk">Siswa Laki-laki: </label>
                <input type="text" value="<?= $data["LAKI"] ?>" name="jml_lk" id="jml_lk" placeholder="Masukkan Jumlah Siswa" />
              </p>
              <p>
                <label for="jml_pr">Siswa Perempuan: </label>
                <input type="text" value="<?= $data["PEREMPUAN"] ?>" name="jml_pr" id="jml_pr" placeholder="Masukkan Jumlah Siswa" />
              </p>
          </div>

          <!-- Sanitasi -->
          <div class="form-section">
            <div class="section-tittle">
              <p>Sanitasi</p>
            </div>
            <p>
              <label for="kecukupan">Kecukupan Air: </label>
              <input type="text" value="<?= $data["KECUKUPAN"] ?>" name="kecukupan" id="kecukupan" placeholder="Masukkan Kecukupan Air" />
            </p>
            <p>
              <label for="air_mandiri">Memproses Air Sendiri: </label>
              <input type="text" value="<?= $data["AIR_MANDIRI"] ?>" name="air_mandiri" id="air_mandiri" placeholder="Masukkan Memproses Air Sendiri" />
            </p>
            <p>
              <label for="minum_siswa">Air Minum Untuk Siswa: </label>
              <input type="text" value="<?= $data["MINUM_SISWA"] ?>" name="minum_siswa" id="minum_siswa" placeholder="Masukkan Air Minum Untuk Siswa" />
            </p>
            <p>
              <label for="bawa_air">Mayoritas Siswa Membawa Air Minum: </label>
              <input type="text" value="<?= $data["BAWA_AIR"] ?>" name="bawa_air" id="bawa_air" placeholder="Masukkan Mayoritas Siswa Membawa Air Minum" />
            </p>
            <p>
              <label for="toilet_difabel">Jumlah Toilet Difabel: </label>
              <input type="text" value="<?= $data["TOILET_DIFABEL"] ?>" name="toilet_difabel" id="toilet_difabel" placeholder="Masukkan Jumlah Toilet Difabel" />
            </p>
            <p>
              <label for="sbr_air">Sumber Air Sanitasi: </label>
              <input type="text" value="<?= $data["SUMBER_AIR"] ?>" name="sbr_air" id="sbr_air" placeholder="Masukkan Sumber Air Sanitasi" />
            </p>
            <p>
              <label for="air_lingkungan">Air Disekitar Lingkungan Sekolah: </label>
              <input type="text" value="<?= $data["AIR_LINGKUNGAN"] ?>" name="air_lingkungan" id="air_lingkungan" placeholder="Masukkan Air Disekitar Lingkungan Sekolah" />
            </p>
            <p>
              <label for="tipe_jamban">Tipe Jamban: </label>
              <input type="text" value="<?= $data["TIPE_JAMBAN"] ?>" name="tipe_jamban" id="tipe_jamban" placeholder="Masukkan Tipe Jamban" />
            </p>
            <p>
              <label for="jml_wastafel">Jumlah Wastafel: </label>
              <input type="text" value="<?= $data["JML_WASTAFEL"] ?>" name="jml_wastafel" id="jml_wastafel" placeholder="Masukkan Jumlah Wastafel" />
            </p>
            <p>
              <label for="sabun_wastafel">Terdapat Sabun pada Wastafel: </label>
              <input type="text" value="<?= $data["SABUN_WASTAFEL"] ?>" name="sabun_wastafel" id="sabun_wastafel" placeholder="Masukkan Terdapat Sabun pada Wastafel" />
            </p>
            <p>
              <label for="jamban_bagus">Jumlah Jamban Bagus: </label>
              <input type="text" value="<?= $data["JAMBAN_BAGUS"] ?>" name="jamban_bagus" id="jamban_bagus" placeholder="Masukkan Jumlah Jamban Bagus" />
            </p>
            <p>
              <label for="jamban_rusak">Jumlah Jamban Rusak: </label>
              <input type="text" value="<?= $data["JAMBAN_RUSAK"] ?>" name="jamban_rusak" id="jamban_rusak" placeholder="Masukkan Jumlah Jamban Rusak" />
            </p>
          </div>

          <!-- Kontak -->
          <div class="form-section">
            <div class="section-tittle">
              <p>Kontak Sekolah</p>
            </div>
            <p>
              <label for="telp">Telepon: </label>
              <input type="text" value="<?= $data["TELP"] ?>" name="telp" id="telp" placeholder="Masukkan Telepon Sekolah" />
            </p>
            <p>
              <label for="fax">Fax: </label>
              <input type="text" value="<?= $data["FAX"] ?>" name="fax" id="fax" placeholder="Masukkan Fax Sekolah" />
            </p>
            <p>
              <label for="email">Email: </label>
              <input type="text" value="<?= $data["EMAIL"] ?>" name="email" id="email" placeholder="Masukkan Email Sekolah" />
            </p>
            <p>
              <label for="web">Website: </label>
              <input type="text" value="<?= $data["WEB"] ?>" name="web" id="web" placeholder="Masukkan Website Sekolah" />
            </p>
            <p>
              <label for="no_rek">Nomor Rekening: </label>
              <input type="text" value="<?= $data["NO_REK"] ?>" name="no_rek" id="no_rek" placeholder="Masukkan Nomor Rekening" />
            </p>
            <p>
              <label for="bank">Bank: </label>
              <input type="text" value="<?= $data["BANK"] ?>" name="bank" id="bank" placeholder="Masukkan Bank" />
            </p>
            <p>
              <label for="cabang">Cabang: </label>
              <input type="text" value="<?= $data["CABANG"] ?>" name="cabang" id="cabang" placeholder="Masukkan Cabang" />
            </p>
            <p>
              <label for="nm_rek">Rekening Atas Nama: </label>
              <input type="text" value="<?= $data["NAMA_REK"] ?>" name="nm_rek" id="nm_rek" placeholder="Masukkan Rekening Atas Nama" />
            </p>
          </div>
              
          <!-- Submit -->
          <p>
               <input type="submit" value="Edit Data" name="ubah" class="btn-tambah"/>
          </p>
        </form>
      </div>
    </div>
    <!-- Form End -->

    <!-- Footer Start -->
    <div class="footer-section">
      <p>Copyright 2020. Dapodik. Design by Si Tupi</p>
    </div>
    <!-- Footer End -->

    <!-- Script Start -->
    <!-- Script End -->
</body>
</html>