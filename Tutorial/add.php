<?php
error_reporting(E_ALL ^ E_NOTICE);
// include Database connection file 
include "./config/config.inc.php";

if(isset($_POST['simpan'])) {
	$nim      = $_POST['nim'];
	$nama     = $_POST['nama'];
	$email 	  = $_POST['email'];
	$phone    = $_POST['phone'];
	$jurusan  = $_POST['jurusan'];
	
	$query = "INSERT INTO mahasiswa (nim, nama, email, phone, jurusan) VALUES ('$nim', '$nama', '$email', '$phone', '$jurusan')";
	if (!$result = mysqli_query($con,$query)) exit(mysqli_error());
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>:: CRUD - Tambah Data ::</title>
<link href="./bootstrap-4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header"><small>Tutorial - CRUD (Create Read Update & Delete)</small></h1>
			<div class="row">
				<div class="col-12">
					<a href="./index.php">Dashboard</a>
				</div>
            </div> 
			<div class="row">
				<div class="col-md-6">
					<form action="" method="post">
						<div class="form-group">
							<label>Nim</label>
							<input type="text" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="nama" id="nama" name="nama" placeholder="Nama Lengkap" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email" name="email" placeholder="Alamat Email" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="phone" id="phone" name="phone" placeholder="Nomor HandPhone" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<option value="Sistem Informasi">Sistem Informasi</option>
								<option value="Manajemen">Manajemen</option>
								<option value="Akuntansi">Akuntansi</option>
								<option value="Komputer Akuntansi">Komputer Akuntansi</option>
							</select>
						</div>
						<div class="form-group row">
							<div class="col-sm-offset-1 col-md-9">
								<input type="submit" name="simpan" value="Simpan" class="btn btn-outline-primary">
								<button type="reset" value="Batal" class="btn btn-outline-danger">Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>