<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		//proses INSERT, UPDATE, dan DELETE
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'jurusan_baru.php';
				break;
			case 'edit':
				include 'jurusan_edit.php';
				break;
			case 'hapus':
				include 'jurusan_hapus.php';
				break;
		}
	} else {
		//menampilkan isi data dalam tabel
		$sql = mysql_query("SELECT * FROM prodi ORDER BY idprodi");
		echo '<h2>Daftar jenis barang</h2><hr>';
      echo '<div class="row">';
		echo '<div class="col-md-9"><table class="table table-bordered">';
		echo '<tr class="info"><th>#</th><th width="100">Kode barang</th><th>jenis barang</th>';
		echo '<th width="200"><a href="./admin.php?hlm=master&sub=jurusan&aksi=baru" class="btn btn-default btn-xs">Tambah Data</a></th></tr>';
		
		if( mysql_num_rows($sql) > 0 ){
			$no = 1;
			while(list($idprodi,$prodi) = mysql_fetch_array($sql)){
				echo '<tr><td>'.$no.'</td>';
				echo '<td>'.$idprodi.'</td>';
				echo '<td>'.$prodi.'</td>';
				echo '<td><a href="./admin.php?hlm=master&sub=jurusan&aksi=edit&idprodi='.$idprodi.'" class="btn btn-success btn-xs">Edit</a> ';
				echo '<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&idprodi='.$idprodi.'" class="btn btn-danger btn-xs">Hapus</a></td>';
				echo '</tr>';
				$no++;
			}
		} else {
			echo '<tr><td colspan="4"><em>Belum ada data</em></td></tr>';
		}
		
		echo '</table></div></div>';
	}
}
?>