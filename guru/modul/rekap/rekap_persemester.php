 <?php
$time = time();
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
?>
 <?php 
include '../../../app/database/db.php';
 ?>
 <style>
td.rotate {
    transform:
        /*nomor magic*/
        translate(1px, 1px) rotate(270deg);
    /*width: 3px;*/
    padding: 0px;
    word-spacing: none;
    white-space: nowrap;
}
 </style>
 <?php 
// tampilkan data mengajar
$kelasMengajar = mysqli_query($con,"SELECT * FROM tb_mengajar 
	INNER JOIN tb_guru ON tb_mengajar.id_guru=tb_guru.id_guru

INNER JOIN tb_master_mapel ON tb_mengajar.id_mapel=tb_master_mapel.id_mapel
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1  ");

foreach ($kelasMengajar as $d) 

// tampilkan data absen

$qry = mysqli_query($con,"SELECT * FROM tb_presensi 
INNER JOIN tb_siswa ON tb_presensi.id_siswa=tb_siswa.id_siswa
INNER JOIN tb_mengajar ON tb_presensi.id_mengajar=tb_mengajar.id_mengajar
INNER JOIN tb_mkelas ON tb_mengajar.id_mkelas=tb_mkelas.id_mkelas

INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
WHERE tb_mengajar.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1
	 GROUP BY tb_presensi.id_siswa  ORDER BY tb_presensi.id_siswa ASC  ");


	// tampilkan data walikelas
$walikelas = mysqli_query($con,"SELECT * FROM tb_walikelas INNER JOIN tb_guru ON tb_walikelas.id_guru=tb_guru.id_guru WHERE tb_walikelas.id_mkelas='$_GET[kelas]' ");
foreach ($walikelas as $walas) 


// $tglTerakhir = date('t',strtotime($tglBulan));
$tglTerakhir = 25;


 ?>
 <style>
body {
    font-family: arial;
}
 </style>
 <table width="100%">
     <tr>
         <td>
             <img src="../../../img/logo.png" width="130">
         </td>
         <td>
             <center>

                 <h1>
                     ABSESNSI SISWA <br>
                     <small> SD Negeri Cipari 02</small>
                 </h1>
                 <hr>
                 <em>
                     Jl. Banyupanas No. 07, Cipari, Kec. Cipari, Kab<br> Cilacap, Jawa Tengah, dengan kode pos
                     (53262).<br>
                     <b>Email : sdnegericipari02@gmail.com</b>
                 </em>

             </center>
         </td>
         <td>

             <table width="100%">
                 <tr>
                     <td colspan="2"><b style="border: 2px solid;padding: 7px;">
                             KELAS ( <?=strtoupper($d['nama_kelas']) ?> )
                         </b> </td>
                     <td>
                         <b style="border: 2px solid;padding: 7px;">
                             <?=$d['semester'] ?> |
                             <?=$d['tahun_ajaran'] ?>
                         </b>
                     </td>
                     <td rowspan="4">
                         <ul>
                             <li>H= Hadir</li>
                             <li>S = Sakit</li>
                             <li>I = Izin</li>
                             <li>A = Absen</li>
                         </ul>
                     </td>
                 </tr>
                 <tr>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                     <td>&nbsp;</td>
                 </tr>
                 <tr>
                     <td>Nama Guru </td>
                     <td>:</td>
                     <td><?=$d['nama_guru'] ?></td>
                 </tr>
                 <tr>
                     <td>Bidang Studi </td>
                     <td>:</td>
                     <td><?=$d['mapel'] ?></td>
                 </tr>
                 <tr>
                     <td>Wali Kelas </td>
                     <td>:</td>
                     <td><?=$walas['nama_guru'] ?></td>
                 </tr>
             </table>
         </td>
     </tr>
 </table>

 <hr style="height: 3px;border: 1px solid;">


 <table width="100%" border="1" cellpadding="2" style="border-collapse: collapse;">
     <tr>
         <td rowspan="2" bgcolor="#EFEBE9" align="center">NO</td>
         <td rowspan="2" bgcolor="#EFEBE9">NAMA SISWA</td>
         <td rowspan="2" bgcolor="#EFEBE9" align="center">L/P</td>
         <td colspan="<?=$tglTerakhir;?>" style="padding: 8px;"><b>Pertemuan Ke -</b></td>
         <td colspan="4" align="center" bgcolor="#EFEBE9">JUMLAH</td>
     </tr>
     <tr>
         <?php 
	for ($i = 1; $i <=$tglTerakhir ; $i++) {
	echo "<td bgcolor='#EFEBE9' align='center'>".$i."</td>";
	}
	?>
         <td bgcolor="#4CAF50" align="center">I</td>
         <td bgcolor="#FFC107" align="center">S</td>
         <td bgcolor="#D50000" align="center">A</td>

     </tr>
     <?php 
			// tampilkan absen siswa
			$no=1;
			foreach ($qry as $ds) {
				 $warna = ($no % 2 == 1) ? "#ffffff" : "#f0f0f0";

				?>
     <tr>

     <tr bgcolor="<?=$warna; ?>">
         <td align="center"><?=$no++; ?></td>
         <td><?=$ds['nama_siswa'];?></td>
         <td align="center"><?=$ds['jenis_kelamin'];?></td>
         <?php 
		for ($i = 1; $i <=$tglTerakhir ; $i++) {
		?>
         <td align="center" bgcolor="white">
             <?php 
			$ket = mysqli_query($con,"SELECT * FROM tb_presensi
			INNER JOIN tb_mengajar ON tb_presensi.id_mengajar=tb_mengajar.id_mengajar
			INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
			INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
			WHERE tb_presensi.pertemuan_ke='$i' AND tb_presensi.id_siswa='$ds[id_siswa]' AND tb_presensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 GROUP BY pertemuan_ke ");
			foreach ($ket as $h)
			
			if ($h['ket']=='H') {
				echo "<b style='color:#2196F3;'>H</b>";				
			}elseif ($h['ket']=='I') {
				echo "<b style='color:#4CAF50;'>I</b>";
			}elseif ($h['ket']=='S') {
				echo "<b style='color:#FFC107;'>S</b>";
			}elseif($h['ket']=='A'){
				echo "<b style='color:#D50000;'>A</b>";
			}
		 ?>
         </td>

         <?php
		}

		?>
         <td align="center" style="font-weight: bold;">
             <?php 
$sakit = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS sakit FROM tb_presensi
	INNER JOIN tb_mengajar ON tb_presensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE tb_presensi.id_siswa='$ds[id_siswa]' and tb_presensi.ket='S' and tb_presensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $sakit['sakit'];

?>
         </td>
         <td align="center" style="font-weight: bold;">
             <?php 
$izin = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS izin FROM tb_presensi
	INNER JOIN tb_mengajar ON tb_presensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE tb_presensi.id_siswa='$ds[id_siswa]' and tb_presensi.ket='I' and tb_presensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $izin['izin'];

?>
         </td align="center" style="font-weight: bold;">

         </td>
         <td align="center" style="font-weight: bold;">
             <?php 
$alfa = mysqli_fetch_array(mysqli_query($con,"SELECT COUNT(ket) AS alfa FROM tb_presensi
	INNER JOIN tb_mengajar ON tb_presensi.id_mengajar=tb_mengajar.id_mengajar
		INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
		INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
 WHERE tb_presensi.id_siswa='$ds[id_siswa]' and tb_presensi.ket='A' and tb_presensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 "));
echo $alfa['alfa'];

?>
         </td>

     </tr>

     <?php } ?>
     <tr>
         <!-- style="height: 150px;" -->
         <td colspan="3" align="right">Tanggal Pertemuan</td>
         <?php 
	for ($i = 1; $i <=$tglTerakhir ; $i++) { ?>
         <td align="center">
             <em style="font: 11px;">
                 <?php 
	$ket = mysqli_query($con,"SELECT * FROM tb_presensi
	INNER JOIN tb_mengajar ON tb_presensi.id_mengajar=tb_mengajar.id_mengajar
	INNER JOIN tb_semester ON tb_mengajar.id_semester=tb_semester.id_semester
	INNER JOIN tb_thajaran ON tb_mengajar.id_thajaran=tb_thajaran.id_thajaran
	WHERE tb_presensi.pertemuan_ke='$i' AND tb_presensi.id_siswa='$ds[id_siswa]' AND tb_presensi.id_mengajar='$_GET[pelajaran]' AND tb_mengajar.id_mkelas='$_GET[kelas]'  AND tb_thajaran.status=1 AND tb_semester.status=1 GROUP BY pertemuan_ke ");
	foreach ($ket as $h)
	$tgl= date('d m Y',strtotime($h['tgl_absen']));
	// echo "".namahari($tgl).",";
	 echo $tgl;

	?>
             </em>

         </td>

         <?php } ?>
     </tr>

 </table>

 <p></p>
 <table width="100%">
     <tr>
         <td align="right">
             <p>
                 Cilacap, <?php echo date('d-F-Y'); ?>
             </p>
             <p>
                 Kepala Sekolah
                 <br>
                 <br>
                 <br>
                 <br>
                 Suryanto HP,S.Pd <br>
                 ----------------------<br>
                 NIP.196206021985081004
             </p>
         </td>
     </tr>
 </table>

 <script>
window.print();
 </script>