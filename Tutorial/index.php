<?php
error_reporting(E_ALL ^ E_NOTICE);
// include Database connection file 
include "./config/config.inc.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>:: CRUD ::</title>
<link href="./bootstrap-4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
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
				<div class="col-12">
					<a href="./add.php" class="btn btn-outline-primary float-right" role="button">Tambah Data</a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h3>Records:</h3>			
					<table class="table">
						<thead>
							<tr>
								<th>NIM</th>
								<th>Nama</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Jurusan</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<?php
						
						if (!$result = mysqli_query($con,"Select * From mahasiswa")) exit(mysqli_error());
						
						// if query results contains rows then featch those rows 
						if(mysqli_num_rows($result) > 0) {						
							while($row = mysqli_fetch_array($result)) {
						?>
							<tbody>							
								<tr>
									<td><?php echo $row['nim']; ?></td>
									<td><?php echo $row['nama']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['phone']; ?></td>
									<td><?php echo $row['jurusan']; ?></td>
									<td>
										<button type="button" class="btn btn-outline-info">
											<a href="./update.php?id=<?php echo $row['nim'] ?>">Edit</a> 
										</button>
										<button type="button" class="btn btn-outline-danger">
											<a href="./delete.php?id=<?php echo $row['nim'] ?>">Hapus</a>
										</button>
									</td>
								</tr>
							</tbody>
						<?php
							}
						} else {
							// records now found 
							echo '<tr><td colspan="6">Records not found!</td></tr>';
						}	
						?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>