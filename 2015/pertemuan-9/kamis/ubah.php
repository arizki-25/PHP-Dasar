<?php 
require 'functions.php';
$conn = konek();

if( !isset($_GET["id"]) ) {
	header("location: index.php"); die;
}

$id = $_GET["id"];

$result = query($conn, "SELECT nama FROM karyawan WHERE id = $id");
// var_dump($result[0]["nama"]);

if( isset($_POST["ubah"]) ) {

	if( ubah($conn, $_POST) ) {
		echo "
			<script>
				alert('data berhasil dihapus');
				document.location.href = 'index.php';
			</script>
		";
	} else {
		echo "data gagal diubah";
	}

}
 
?>

<!doctype html>
<html>
<head>
	<title>Ubah Data Karyawan</title>
</head>
<body>

<h1>Ubah Data Karyawan</h1>

<form action="" method="post">
	
	<input type="hidden" name="id" value="<?= $id; ?>">
	<label for="nama">Nama</label>
	<input type="text" name="nama" id="nama" value="<?= $result[0]["nama"]; ?>" required>

	<input type="submit" name="ubah" value="Ubah">

</form>

</body>
</html>