<?php
require '../config.php';
if(isset($_GET["hapus"])){
    $npsn = $_GET["hapus"];

    $sql = "DELETE FROM `t_identitas` WHERE `NPSN` = $npsn";
    $query = mysqli_query($db, $sql);
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: proses.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: proses.php?status=gagal');
    } 
};
if(isset($_GET['status'])){
        if($_GET['status'] == 'sukses'){
            echo"
            <script>
              alert('Data berhasil dihapus!');
              document.location.href = 'admin.php';
            </script>";
        } else {
            echo "
            <script>
              alert('Data gagal dihapus!');
              document.location.href = 'admin.php';
            </script>";
        }
};
if(isset($_GET['ubah'])){
    if($_GET['ubah'] == 'sukses'){
        echo"
        <script>
          alert('Data berhasil diubah!');
          document.location.href = 'admin.php';
        </script>";
    } else {
        echo "
        <script>
          alert('Data gagal diubah! Periksa kembali input-an!');
          document.location.href = 'admin.php';
        </script>";
    }
};
if(isset($_POST["ubah"])){
    // ambil data dari formulir
    $npsn = $_POST["npsn"];
    $nama_sekolah = $_POST["nama_sekolah"];
    $jenjang = $_POST["jenjang"];
    $status_sekolah = $_POST["status_sekolah"];
    $akreditasi = $_POST["akreditasi"];
    $jml_lk = $_POST["jml_lk"];
    $jml_pr = $_POST["jml_pr"];
    $alamat = $_POST["alamat"];
    $rt = $_POST["rt"];
    $rw = $_POST["rw"];
    $kodepos = $_POST["kodepos"];
    $kelurahan = $_POST["kelurahan"];
    $kecamatan = $_POST["kecamatan"];
    $kabupaten = $_POST["kabupaten"];
    $provinsi = $_POST["provinsi"];
    $lintang = $_POST["lintang"];
    $bujur = $_POST["bujur"];
    $sk_pen = $_POST["sk_pen"];
    $kepemilikan = $_POST["kepemilikan"];
    $tgl_pen = $_POST["tgl_pen"];
    $sk_op = $_POST["sk_op"];
    $tgl_op = $_POST["tgl_op"];
    $npwp = $_POST["npwp"];
    $nm_pajak = $_POST["nm_pajak"];
    $penyelenggaraan = $_POST["penyelenggaraan"];
    $bos = $_POST["bos"];
    $iso = $_POST["iso"];
    $sbr_listrik = $_POST["sbr_listrik"];
    $dy_listrik = $_POST["dy_listrik"];
    $internet = $_POST["internet"];
    $internet_alter = $_POST["internet_alter"];
    $layan_difabel = $_POST["layan_difabel"];
    $mbs = $_POST["mbs"];
    $iuran = $_POST["iuran"];
    $nominal = $_POST["nominal"];
    $kecukupan = $_POST["kecukupan"];
    $air_mandiri = $_POST["air_mandiri"];
    $minum_siswa = $_POST["minum_siswa"];
    $bawa_air = $_POST["bawa_air"];
    $toilet_difabel = $_POST["toilet_difabel"];
    $sbr_air = $_POST["sbr_air"];
    $air_lingkungan = $_POST["air_lingkungan"];
    $tipe_jamban = $_POST["tipe_jamban"];
    $jml_wastafel = $_POST["jml_wastafel"];
    $sabun_wastafel = $_POST["sabun_wastafel"];
    $jamban_bagus = $_POST["jamban_bagus"];
    $jamban_rusak = $_POST["jamban_rusak"];
    $telp = $_POST["telp"];
    $fax = $_POST["fax"];
    $email = $_POST["email"];
    $web = $_POST["web"];
    $no_rek = $_POST["no_rek"];
    $bank = $_POST["bank"];
    $cabang = $_POST["cabang"];
    $nm_rek = $_POST["nm_rek"];




    // buat query
    $sql = "UPDATE t_identitas SET `NAMA_SEKOLAH`= '$nama_sekolah',`JENJANG`='$jenjang',`STATUS_SEKOLAH`='$status_sekolah',`AKREDITASI`= '$akreditasi' WHERE `NPSN` = $npsn;";
    $sql .= "UPDATE t_jmlsiswa SET `LAKI`='$jml_lk',`PEREMPUAN`= '$jml_pr' WHERE `NPSN` = $npsn;";
    $sql .= "UPDATE t_alamat SET `ALAMAT`='$alamat',`RT`='$rt',`RW`='$rw',`KODE_POS`='$kodepos',`KELURAHAN`='$kelurahan',`KECAMATAN`='$kecamatan',`KABUPATEN`='$kabupaten',`PROVINSI`='$provinsi',`GEO_LINTANG`='$lintang',`GEO_BUJUR`='$bujur' WHERE `NPSN` = $npsn;";
    $sql .= "UPDATE t_perizinan SET `SK_PENDIRIAN`='$sk_pen',`KEPEMILIKAN`='$kepemilikan',`TGL_PENDIRIAN`='$tgl_pen',`SK_OPERASIONAL`='$sk_op',`TGL_OPERASIONAL`='$tgl_op',`NPWP`='$npwp',`NAMA_PAJAK`='$nm_pajak' WHERE `NPSN` = $npsn;";
    $sql .= "UPDATE t_dataperiodik SET `PENYELENGARAAN`='$penyelenggaraan',`BOS`='$bos',`ISO`='$iso',`SUMBER_LISTRIK`='$sbr_listrik',`DAYA_LISTRIK`='$dy_listrik',`INTERNET`='$internet',`INTERNET_ALTER`='$internet_alter' WHERE `NPSN` = $npsn;";
    $sql .= "UPDATE t_pelengkap SET `LAYANAN_DIFABEL`='$layan_difabel',`MBS`='$mbs',`IURAN`='$iuran',`NOMINAL`='$nominal' WHERE `NPSN` = $npsn;";
    $sql .= "UPDATE t_kontak SET `TELP`='$telp',`FAX`='$fax',`EMAIL`='$email',`WEB`='$web',`NO_REK`='$no_rek',`BANK`='$bank',`CABANG`='$cabang',`NAMA_REK`='$nm_rek' WHERE `NPSN` = $npsn;";
    $sql .= "UPDATE t_sanitasi SET `KECUKUPAN`='$kecukupan',`AIR_MANDIRI`='$air_mandiri',`MINUM_SISWA`='$minum_siswa',`BAWA_AIR`='$bawa_air',`TOILET_DIFABEL`='$toilet_difabel',`SUMBER_AIR`='$sbr_air',`AIR_LINGKUNGAN`='$air_lingkungan',`TIPE_JAMBAN`='$tipe_jamban',`JML_WASTAFEL`='$jml_wastafel',`SABUN_WASTAFEL`='$sabun_wastafel',`JAMBAN_BAGUS`='$jamban_bagus',`JAMBAN_RUSAK`='$jamban_rusak' WHERE `NPSN` = $npsn;";
    
    
    $query = mysqli_multi_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: proses.php?ubah=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: proses.php?ubah=gagal');
    } 
};

if(isset($_POST["tambah"])){
    // ambil data dari formulir
    $npsn = $_POST["npsn"];
    $nama_sekolah = $_POST["nama_sekolah"];
    $jenjang = $_POST["jenjang"];
    $status_sekolah = $_POST["status_sekolah"];
    $akreditasi = $_POST["akreditasi"];
    $jml_lk = $_POST["jml_lk"];
    $jml_pr = $_POST["jml_pr"];
    $alamat = $_POST["alamat"];
    $rt = $_POST["rt"];
    $rw = $_POST["rw"];
    $kodepos = $_POST["kodepos"];
    $kelurahan = $_POST["kelurahan"];
    $kecamatan = $_POST["kecamatan"];
    $kabupaten = $_POST["kabupaten"];
    $provinsi = $_POST["provinsi"];
    $lintang = $_POST["lintang"];
    $bujur = $_POST["bujur"];
    $sk_pen = $_POST["sk_pen"];
    $kepemilikan = $_POST["kepemilikan"];
    $tgl_pen = $_POST["tgl_pen"];
    $sk_op = $_POST["sk_op"];
    $tgl_op = $_POST["tgl_op"];
    $npwp = $_POST["npwp"];
    $nm_pajak = $_POST["nm_pajak"];
    $penyelenggaraan = $_POST["penyelenggaraan"];
    $bos = $_POST["bos"];
    $iso = $_POST["iso"];
    $sbr_listrik = $_POST["sbr_listrik"];
    $dy_listrik = $_POST["dy_listrik"];
    $internet = $_POST["internet"];
    $internet_alter = $_POST["internet_alter"];
    $layan_difabel = $_POST["layan_difabel"];
    $mbs = $_POST["mbs"];
    $iuran = $_POST["iuran"];
    $nominal = $_POST["nominal"];
    $kecukupan = $_POST["kecukupan"];
    $air_mandiri = $_POST["air_mandiri"];
    $minum_siswa = $_POST["minum_siswa"];
    $bawa_air = $_POST["bawa_air"];
    $toilet_difabel = $_POST["toilet_difabel"];
    $sbr_air = $_POST["sbr_air"];
    $air_lingkungan = $_POST["air_lingkungan"];
    $tipe_jamban = $_POST["tipe_jamban"];
    $jml_wastafel = $_POST["jml_wastafel"];
    $sabun_wastafel = $_POST["sabun_wastafel"];
    $jamban_bagus = $_POST["jamban_bagus"];
    $jamban_rusak = $_POST["jamban_rusak"];
    $telp = $_POST["telp"];
    $fax = $_POST["fax"];
    $email = $_POST["email"];
    $web = $_POST["web"];
    $no_rek = $_POST["no_rek"];
    $bank = $_POST["bank"];
    $cabang = $_POST["cabang"];
    $nm_rek = $_POST["nm_rek"];




    // buat query
    $sql = "INSERT INTO t_identitas VALUES ('$npsn', '$nama_sekolah','$jenjang', '$status_sekolah', '$akreditasi');";
    $sql .= "INSERT INTO t_jmlsiswa VALUES ('', '$npsn','$jml_lk', '$jml_pr');";
    $sql .= "INSERT INTO t_alamat VALUES ('', '$npsn','$alamat', '$rt', '$rw', '$kodepos', '$kelurahan', '$kecamatan', '$kabupaten', '$provinsi', '$lintang', '$bujur');";
    $sql .= "INSERT INTO t_perizinan VALUES ('', '$npsn','$sk_pen', '$kepemilikan', '$tgl_pen', '$sk_op', '$tgl_op', '$npwp', '$nm_pajak');";
    $sql .= "INSERT INTO t_dataperiodik VALUES ('', '$npsn','$penyelenggaraan', '$bos', '$iso', '$sbr_listrik', '$dy_listrik', '$internet', '$internet_alter');";
    $sql .= "INSERT INTO t_pelengkap VALUES ('', '$npsn','$layan_difabel', '$mbs', '$iuran', '$nominal');";
    $sql .= "INSERT INTO t_kontak VALUES ('', '$npsn','$telp', '$fax', '$email', '$web', '$no_rek', '$bank','$cabang', '$nm_rek');";
    $sql .= "INSERT INTO t_sanitasi VALUES ('', '$npsn','$kecukupan', '$air_mandiri', '$minum_siswa', '$bawa_air', '$toilet_difabel', '$sbr_air', '$air_lingkungan', '$tipe_jamban', '$jml_wastafel', '$sabun_wastafel', '$jamban_bagus', '$jamban_rusak');";
    
    
    $query = mysqli_multi_query($db, $sql);

    // apakah query simpan berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: profile-input.php?status=sukses');
    } else {
        // kalau gagal alihkan ke halaman indek.php dengan status=gagal
        header('Location: profile-input.php?status=gagal');
    }


} else {
    die("Akses dilarang...");
};
?>