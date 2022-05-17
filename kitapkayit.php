<?php 
include ("header.php");
include ("baslik.php"); 
if (isset($_SESSION["adminyetki"])) {
	if (isset($_POST["kaydet"])) {
		if ($_POST["yeni"] !="" && $_POST["numara"] != "" && $_POST["kategori"] != ""  && $_POST["adres"] != ""  && $_POST["adet"] != "") {
			$yenikitap= mysqli_real_escape_string($link, $_POST["yeni"]);
			$numara = mysqli_real_escape_string($link, $_POST["numara"]);
			$kategori = mysqli_real_escape_string($link, $_POST["kategori"]);
			$adres = mysqli_real_escape_string($link, $_POST["adres"]);
			$adet = mysqli_real_escape_string($link, $_POST["adet"]);

			$query = "INSERT INTO kitaplar (id,kategori,isim,adet,adres) VALUES ('".$numara."',
			'".$kategori."', '".$yenikitap."', '".$adet."','".$adres."')";

			if(mysqli_query($link, $query)){
				?>
				
					<div class="alert alert-primary alert-dismissible fade show " role="alert" style="text-align: center ; font-size:110%">
						Kitap Başarıyla Eklendi
						<a  href="kitapkayit.php" class="ml-2">Yeni Kitap Eklemek için Tıklayın</a>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php
			}
		}
		else{
			include ("alertler/tumalanlaridoldurunuz.php");

		}
	}
}
else{
	include ("alertler/girisyapmadinizalert.php");
	
	die();
}



?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<div class="container ">
		<div class="row ">
			<div class="col-4 ">
				<?php  include ("menu.php"); ?>
			</div>
			<div class="col-8 float-right ">
				<form method="post">
					<h2 class="mt-4 mb-1"> <strong> Kitap Kayıt  Sayfası </strong></h2>
						<br>
					<div class ="form-row ">
						<div class ="form-group">
							<label>Kitap Adı</label>
							<input type="text" class="form-control" name="yeni" placeholder="Kitap Adı">
						</div>
						<div class ="form-group mr-5 ml-2 ">
							<label>Numara</label>
							<input type="text" class="form-control pr-2" name="numara" 	 placeholder="Numara">
						</div>
					</div>
					<div class ="form-row ">
						<div class ="form-group">
							<label>Adet</label>
							<input type="text" class="form-control" name="adet" placeholder="Kitap Adedi">
						</div>
						<div class ="form-group mr-5 ml-2 ">
							<label>Adres</label>
							<input type="text" class="form-control pr-2" name="adres" 	 placeholder="Adres">
						</div>
					</div>
					<div class =" form-row ">
						<div class="form-group">
							<label>Kategori</label>
							<select class="form-control" name="kategori">
								<option>Bilim-Mühendislik</option>
								<option>Edebiyat</option>
								<option>Eğitim</option>
								<option>Ekonomi</option>
								<option>Felsefe </option>
								<option>Gezi ve Rehber Kitapları</option>
								<option>Hukuk</option>
								<option>İnanç Kitapları</option>
								<option>İnsan ve Toplum</option>
								<option>Politika-Siyaset</option>
								<option>Psikoloji</option>
								<option>Sosyoloji</option>
								<option>Sağlık</option>
								<option>Tarih</option>
								<option>Yemek Kitapları</option>
							</select>
						</div>
					</div>
					<!-- #b0e0e6" -->
					<button class="btn  px-5 py-2 mt-1" style="background-color:#87cefa" type="submit" name="kaydet"> <strong> Kayıt  </strong></button>
				</form>
			</div>
		</div>
	</div>
		<!-- <header>
		<nav>
			<a  class="float-left " href="index.php"  > <strong>Çıkış Yap</strong></a>
		</nav>
	</header> -->
</body>
</html>