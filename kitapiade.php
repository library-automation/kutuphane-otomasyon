<?php
include ("header.php");
include ("fonksiyon.php");
include ("baslik.php"); 

if (empty($_SESSION["adminyetki"])) {
	include ("alertler/girisyapmadinizalert.php");
	die() ;
}

if (isset($_POST["getir"])) {
	if ($_POST["ogrencinumarasi"] !="" && $_POST["kitapnumarasi"] !="" ) {
		$ogrencinumarasi= $_POST["ogrencinumarasi"];
		$kitapnumarasi= $_POST["kitapnumarasi"];
		$query1 = "SELECT * FROM gidenkitaplar WHERE ogrencinumarasi=" .$ogrencinumarasi ;
		$row =mysqli_query($link , $query1);
		$result = mysqli_fetch_assoc($row) ;
		$sayi = kitapnumarasikontrol($kitapnumarasi);
		$sayi1 = ogrencinokontrol($ogrencinumarasi);

		$_SESSION['ogrencinumarasi'] =$ogrencinumarasi;
		$_SESSION['kitapnumarasi'] =$kitapnumarasi  ;

		if ($sayi!=1 || $sayi1!=1) {
			include ("alertler/kitapiadealert.php"); 
		}


	}
	else{
		include ("alertler/uyarı.php"); 

	}

}
if (isset($_POST["iadeal"])) {
	if (isset($_SESSION['ogrencinumarasi']) && isset($_SESSION['kitapnumarasi'])) {
		$ogrencinumarasi2= $_SESSION['ogrencinumarasi'];
		$kitapnumarasi = $_SESSION['kitapnumarasi'];
		$query = "DELETE FROM gidenkitaplar WHERE  ogrencinumarasi =" .$ogrencinumarasi2;
		mysqli_query($link, $query);

		$query3 = "SELECT * FROM kitaplar WHERE id = ".$kitapnumarasi ;
		$row=  mysqli_query($link , $query3);
		$result = mysqli_fetch_assoc($row);

		$gunceladet= $result["adet"]+1;

		$query3 = "UPDATE kitaplar SET  adet  = '".$gunceladet."'  WHERE id =".$kitapnumarasi ;
		if (mysqli_query($link,  $query3)) {
			?>
			<!DOCTYPE html>
			<html>
			<head>
			</head>
			<body>
				<div class="alert alert-primary " role="alert" style="text-align: center ; font-size:110%"	>İade Alma Başarılı
					<a href="kitapiade.php">Yeni İade Almak İçin Tıklayın</a>
				</div>
			</body>
			</html>

			<?php  
		} 
		else{
			include ("alertler/uyarı.php");
		}
	}
	else{
		include ("alertler/uyarı.php");
	}

	
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	
</head>
<body>

	<div class="container ">
		<div class="row">
			<div class="col-4 ">
				<?php  include ("menu.php"); ?>
			</div>
			

			<div class="col-8 ">

				<form method="post">
					<h2 class="mt-4 mb-3 "> <strong> Kitap İade Sayfası </strong></h2>

					<div class ="form-row ">
						<div class ="form-group">
							<label>Kitap Numarası</label>
							<input type="text" class="form-control" name="kitapnumarasi" placeholder="Kitap Numarası">
						</div>
					</div>
					<div class ="form-row ">
						<div class ="form-group">
							<label>Öğrenci Numarası</label>
							<input type="text" class="form-control" name="ogrencinumarasi" placeholder="Öğrenci Numarası">
						</div>


					</div>
					

					<button class="btn " type="submit" name="getir" style="background-color:#87cefa"> Kitabı Görüntüle  </button>
					<button class="btn  "style="background-color:#87cefa" type="submit" name="iadeal"> İade Al</button>
					<br>
				</form>
			</div>
		</div>

		<?php
		if (isset($_POST["getir"])) {
			if ($_POST["ogrencinumarasi"] !="" && $_POST["kitapnumarasi"] !="" ) {
				if ($sayi1==1 && $sayi==1) {


					?>
					<div class="container">

						<div class="row">
							<div class="col-2"></div>
							<div class="col-10 float-left">
								<br/>
								<h3>Verilen Kitap</h3>
								<br/>
								<table class="table table-hover ">
									<thead>
										<tr>
											<th>ID</th>
											<th>Ogrenci Numarası</th>
											<th>Veriliş Tarihi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $result["id"]; ?> </td>
											<td><?php echo $result["ogrencinumarasi"]; ?></td>
											<td><?php echo $result["verilistarihi"]; ?></td>
										</tr>

									</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php
				}
			}
		}
		?>


	</div>
	<!-- <header>
		<nav>
			<a  class="float-right" href="index.php"  > <strong>Çıkış Yap</strong></a>
		</nav>
	</header> -->
</body>
</html>