<?php 
$del = mysqli_query($con,"DELETE FROM tb_pengumuman WHERE id_pengumuman=$_GET[id]");
if ($del) {
		echo " <script>
		alert('Data telah dihapus !');
		window.location='?page=pengumuman';
		</script>";	
}

 ?>