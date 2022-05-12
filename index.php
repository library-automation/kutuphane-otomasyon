<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-3 mr-0 px-3 my-2 text-center " href="index.php"> <big> <strong> Akademi </strong> Kütüphane </big> </a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"> </span>
		</button>

		<nav class="nav mr-3">

			<a  class="nav-link text-white ml-4 " href="index.php"> <big>Anasayfa</big></a>
			<a  class="nav-link text-white " href="hakkimizda.php"><big>Hakkımızda</big> </a>
			<a  class="nav-link text-white " href="iletisim.php"><big>İletişim</big></a>
			<a  class="nav-link  text-white  " href="misyon.php"><big>Misyon & Vizyon</big></a>	

		</nav>
	</nav>




<?php 

$link = mysqli_connect("localhost","root","","kutuphane");
$link -> set_charset("utf8");

/*if (empty($_SESSION["adminyetki"])) {
	include ("alertler/girisyapmadinizalert.php");
	die();
}*/

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
	if ($_POST["kitapadi"] =="") {
		
	}
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

	 <br>
	<div class="container">

		<div class="row ">

			<div class="col-1 "></div>

			<div class="col-10">

				<div class="row jumbotron">
					<div class="col-4">	</div>
					<div class="col-8 " >
						<h2 class=" mb-4  px-5  "> <strong> Kitap Arama </strong></h2>
					</div>
				
				<br>
					<div class="col-4 "></div>
					<div class="col-md-8">
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


						</form>
						<br>
						<br>
						<br>
					</div>




				
</div>

			</div>
			<div class="col-1"></div>
		</div>

  
	

	<?php
	if (isset($_POST["ara"])) {
		if (isset($result["id"])) {
			?>

			<div class="row">
				<div class="col-1"></div>
				<div class="col-10 ml-1	">
					<br/>
					<h3 class="ml-3 text-warning" >Kayıtlı Kitap</h3>
					<br/>
					<table class="table table-hover ">
						<thead>
							<tr class="text-info" style="font-size: 120%">
								<th>Kitap Numarası</th>
								<th>Kategori</th>
								<th>Kitap İsmi</th>
								<th>Adet</th>
								<th>Adres</th>

							</tr>
						</thead>
						<tbody>
							<tr style="font-size: 120%">
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
				<div class="col-1"></div>
				<div class="col-10 ml-1	">
					<br/>
					<h3 class="ml-3 text-warning">Kayıtlı Kitap</h3>
					<br/>
					<table class="table table-hover ">
						<thead>
							<tr class="text-info" style="font-size: 120%">
								<th>Kitap Numarası</th>
								<th>Kategori</th>
								<th>Kitap İsmi</th>
								<th>Adet</th>
								<th>Adres</th>

							</tr>
						</thead>
						<tbody>
							<tr style="font-size: 120%">
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
	<hr>
	<div class = "altsol ml-5 px-5" style="font-size: 13px">
  Copyright © Hatice Designs <br/>
	Powered by Hatice Designs and Vadmin 3.0 CMS 

  </div>


</div>


	
</body>
</html>

