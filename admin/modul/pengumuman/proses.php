<?php 

if (isset($_POST['savePengumuman'])) {
							

	$id_pengumuman = $_POST['id_pengumuman'];
	$judul = $_POST['judul'];
	$isi_pengumuman = $_POST['isi_pengumuman'];
	$date = $_POST['date'];


$save = mysqli_query($con,"INSERT INTO tb_pengumuman VALUES (NULL,'$judul','$isi_pengumuman','$date') ");
			if ($save) {
				echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[judul_pengumuman]) ', 'Berhasil disimpan', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=pengumuman');
				} ,3000);   
				</script>";
			}

		}elseif (isset($_POST['editPengumuman'])) {

		$edit= mysqli_query($con,"UPDATE tb_pengumuman SET judul='$_POST[judul]',isi_pengumuman='$_POST[isi_pengumuman]',date='$_POST[date]' WHERE id_pengumuman='$_POST[id_pengumuman]' ");

		if ($edit) {
			echo "
				<script type='text/javascript'>
				setTimeout(function () { 

				swal('($_POST[judul]) ', 'Berhasil diubah', {
				icon : 'success',
				buttons: {        			
				confirm: {
				className : 'btn btn-success'
				}
				},
				});    
				},10);  
				window.setTimeout(function(){ 
				window.location.replace('?page=pengumuman');
				} ,3000);   
				</script>";
			}
		}
 ?>