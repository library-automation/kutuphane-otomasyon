<?php
include ("header.php");
include ("baslik.php"); 

if (empty($_SESSION["adminyetki"])) {
	include ("alertler/girisyapmadinizalert.php");
	die();
}

if (isset($_POST["ara"])) {
	if ($_POST["kitapnumarasi"] !="") {
		$kitapnumarasi= $_POST["kitapnumarasi"];
		$query1 = "SELECT * FROM kitaplar WHERE id=" .$kitapnumarasi;
		$row =mysqli_query($link , $query1);
		$result = mysqli_fetch_assoc($row) ;
		if (empty($result["id"])) {
			include ("alertler/kitapbulunamadi.php");
		}
	}
	else{
		include ("alertler/tumalanlaridoldurunuz.php");
	}
}
if (isset($_POST["adara"])) {
	if ($_POST["kitapadi"] !="" ) {
		$ad = $_POST["kitapadi"];
		$query = "SELECT * FROM kitaplar WHERE isim LIKE  '$ad%'";
		$row = mysqli_query($link , $query);
		$result = mysqli_fetch_assoc($row) ;
		if (empty($result["id"])) {
			include ("alertler/kitapbulunamadi.php");
		}
	}
	else{
		include ("alertler/tumalanlaridoldurunuz.php");
	}

}		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


</head>
<body>
<!-- 	<div class="container-fluid">
		<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
			<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3 my-2" href="#"> <big>Güngören  Kütüphanesi</big> </a>
			<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"> </span>
			</button>

			<nav class="nav ">

				<a  class="nav-link text-white ml-4 " href="index.php"> <big>Anasayfa</big></a>
				<a  class="nav-link text-white" href="hakkimizda.php"><big>Hakkımızda</big> </a>
				<a  class="nav-link text-white " href="iletisim.php"><big>İletişim</big></a>
				<a  class="nav-link  text-white" href="misyon.php"><big>Misyon & Vizyon</big></a>	
			</nav>
			<ul class="navbar-nav ">
				<li class="nav-item text-nowrap">
					<a class="btn btn-dark text-muted " href="cikis.php">Çıkış Yap </a>
				</li>
			</ul>

		</nav>
	</div>
	<br>  -->
	<div class="container">
		<div class="row ">
			<div class="col-2 mr-5">

				<?php include ("menu.php"); ?>
			</div>
			<div class="col-10">

				<div class="row">
					<div class="col-4">	</div>
					<div class="col-8">
						<h2 class="mt-4 mb-4 ml-5 px-5 "> <strong> Kitap Arama </strong></h2>
					</div>
				</div>

				<div class="row ">
					<div class="col-5 "></div>
					<div class="col-md-7">
						<form method="post">

							<div class ="form-row  ">
								<div class ="form-group col-6">
									<input type="text" class="form-control" name="kitapnumarasi" placeholder="Kitap Numarası">
								</div>
							</div>
							<div class ="form-row  ">
								<div class ="form-group col-6">
									<button class="btn  px-4 " type="submit"style="background-color:#87cefa" name="ara"> Kitabı Ara  </button>
								</div>
							</div>
							<br>

							<div class ="form-row ">
								<div class ="form-group col-6">
									<input type="text" class="form-control" name="kitapadi" placeholder="Kitap Adı">
								</div>
							</div>

							<div class ="form-row ">
								<div class ="form-group col-6">
									<button class="btn  px-3"style="background-color:#87cefa" type="submit" name="adara">İsme Göre Ara</button>
								</div>
							</div>
							<br>

						</form>
					</div>
				</div>

			</div>
		</div>
	</div>

	<?php
	if (isset($_POST["ara"])) {
		if (isset($result["id"])) {
			?>

			<div class="row">
				<div class="col-2"></div>
				<div class="col-9 ml-1	">
					<br/>
					<h3 class="ml-3">Kayıtlı Kitap</h3>
					<br/>
					<table class="table table-hover ">
						<thead>
							<tr>
								<th>Kitap Numarası</th>
								<th>Kategori</th>
								<th>Kitap İsmi</th>
								<th>Adet</th>
								<th>Adres</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $result["id"]; ?> </td>
								<td><?php echo $result["kategori"]; ?></td>
								<td><?php echo $result["isim"]; ?></td>
								<td><?php echo $result["adet"]; ?></td>
								<td><?php echo $result["adres"]; ?></td>

							</tr>

						</tbody>

					</table>
					<br>
					<br>
				</div>
			</div>



			<?php
			if ($result["adet"]==0) {
				echo "adet sıfır olduğundan bu kitap verilemez";

			}
		}
		
	}
	?>


	<?php 
	if (isset($_POST["adara"])) {
		if (isset($result["id"])) {
			?>

			<div class="row">
				<div class="col-2"></div>
				<div class="col-9 ml-1	">
					<br/>
					<h3 class="ml-3">Kayıtlı Kitap</h3>
					<br/>
					<table class="table table-hover ">
						<thead>
							<tr>
								<th>Kitap Numarası</th>
								<th>Kategori</th>
								<th>Kitap İsmi</th>
								<th>Adet</th>
								<th>Adres</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php echo $result["id"]; ?> </td>
								<td><?php echo $result["kategori"]; ?></td>
								<td><?php echo $result["isim"]; ?></td>
								<td><?php echo $result["adet"]; ?></td>
								<td><?php echo $result["adres"]; ?></td>

							</tr>

						</tbody>

					</table>
					<br>
					<br>
				</div>
			</div>



			<?php
			if ($result["adet"]==0) {
				echo "adet sıfır olduğundan bu kitap verilemez";

			}
		}
	}
	?>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>