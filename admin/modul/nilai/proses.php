
<?php 

if (isset($_POST['saveNilai'])) {
							
  $id_siswa   = $_POST['id_siswa'];
  $id_mapel	      = $_POST['id_mapel'];
  $nilai_harian1	  = $_POST['nilai_harian1'];
  $nilai_harian2  = $_POST['nilai_harian2'];
  $nilai_harian3   = $_POST['nilai_harian3'];
  $nilai_harian4   = $_POST['nilai_harian4'];
  $nilai_harian5   = $_POST['nilai_harian5'];
  $rph = ($nilai_harian1+$nilai_harian2+$nilai_harian3+$nilai_harian4+$nilai_harian5)/5;
  $nilai_pts      = $_POST['nilai_pts'];
  $nilai_pas      = $_POST['nilai_pas'];
  $nilai_akhir  = (0.4*$rph)+(0.3*$nilai_pts)+(0.3*$nilai_pas);
  if ($nilai_akhir >=81 && $nilai_akhir<=100) {
                    echo $predikat = 'A';
                }
                elseif ($nilai_akhir >=61 && $nilai_akhir <=80) {
                    echo $predikat = 'B';
                } 
                elseif ($nilai_akhir >=41 && $nilai_akhir <= 60) {
                    echo $predikat = 'C';
                }
                elseif ($nilai_akhir >=21 && $nilai_akhir <= 40) {
                    echo $predikat = 'D';
                }
                elseif ($nilai_akhir >= 11 && $nilai_akhir <= 20) {
                    echo $predikat = 'E';
                }
                else {
                    echo $predikat = 'F';
                }

    $query = mysqli_query($con,"INSERT INTO  tb_nilai(id_siswa, id_mapel, nilai_harian1, nilai_harian2, nilai_harian3, nilai_harian4, nilai_harian5, rph, nilai_pts, nilai_pas, nilai_akhir, predikat )
     VALUES('$id_siswa','$id_mapel','$nilai_harian1','$nilai_harian2','$nilai_harian3','$nilai_harian4','$nilai_harian5','$rph','$nilai_pts','$nilai_pas','$nilai_akhir','$predikat')");
    if ($query){
      echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[nama]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=nilai');
				} ,3000);   
				</script>"; 
    }else{
     ?>
     <script>
      swal({
        title: 'Data Gagal disimpan!',
        text: "Terjadi kesalahan proses penyimpanan",
        icon: 'error',
      }).then(function (result) {
        if (true) {
          window.location = "?page=nilai";
        }
      })
    </script>
    <?php 
  }	
	

		}elseif (isset($_POST['editNilai'])) 
    
 ?>