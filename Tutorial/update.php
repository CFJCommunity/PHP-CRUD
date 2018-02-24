<?php
error_reporting(E_ALL ^ E_NOTICE);
// include Database connection file 
include "./config/config.inc.php";

if(isset($_POST['update'])) {
	$nim      = $_POST['nim'];
	$nama     = $_POST['nama'];
	$email 	  = $_POST['email'];
	$phone    = $_POST['phone'];
	$jurusan  = $_POST['jurusan'];
	
	$query = "UPDATE mahasiswa SET nim = '$nim',
								   nama = '$nama',
								   email = '$email',
								   phone = '$phone',
								   jurusan = '$jurusan'";
	if (!$result = mysqli_query($con,$query)) exit(mysqli_error());
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>:: CRUD - Update Data ::</title>
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
					<?php
					$nim = $_GET['id'];
					$query = mysqli_query($con, "SELECT * FROM mahasiswa WHERE nim = '$nim'");
					$row = mysqli_fetch_array($query);
					?>
					<form action="" method="post">
						<div class="form-group">
							<label>Nim</label>
							<input type="text" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa" value="<?php echo $row['nim'] ?>" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Nama Lengkap</label>
							<input type="nama" id="nama" name="nama" placeholder="Nama Lengkap" value="<?php echo $row['nama'] ?>" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" id="email" name="email" placeholder="Alamat Email" value="<?php echo $row['email'] ?>" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="phone" id="phone" name="phone" placeholder="Nomor HandPhone" value="<?php echo $row['phone'] ?>" class="form-control"/>
						</div>
						<div class="form-group">
							<label>Jurusan</label>
							<select class="form-control" name="jurusan">
								<option value="Sistem Informasi" <?php if($row['jurusan'] == 'Sistem Informasi') echo "selected";?> >Sistem Informasi</option>
								<option value="Manajemen" <?php if($row['jurusan'] == 'Manajemen') echo "selected";?> >Manajemen</option>
								<option value="Akuntansi" <?php if($row['jurusan'] == 'Akuntansi') echo "selected";?> >Akuntansi</option>
								<option value="Komputer Akuntansi" <?php if($row['jurusan'] == 'Komputer Akuntansi') echo "selected";?> >Komputer Akuntansi</option>
							</select>
						</div>
						<div class="form-group row">
							<div class="col-sm-offset-1 col-md-9">
								<input type="submit" name="update" value="Update" class="btn btn-outline-primary">
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