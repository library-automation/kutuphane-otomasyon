<?php 
include ("header.php");
include ("baslik.php");

if (empty($_SESSION["adminyetki"])) {
	include ("alertler/girisyapmadinizalert.php");
	die();
}
if (isset($_POST["btn-kitapadınıgüncelle"])) {
	if ($_POST["kitapnumarası"]=="" ) {
		include ("alertler/tumalanlaridoldurunuz.php");}
	else {
		if ($_POST["yenikitapadı"]!="" ) {
			$yenikitap= mysqli_real_escape_string($link, $_POST["yenikitapadı"]);
			$kitapnumarası = mysqli_real_escape_string($link, $_POST["kitapnumarası"]);
			$query = "UPDATE kitaplar SET  isim  = '".$yenikitap."' WHERE id = ".$kitapnumarası ;
			//girilen kitap numarası veritabınında varmı 
			$sql = "SELECT * FROM kitaplar WHERE id =" .$kitapnumarası;
			$result=mysqli_query($link, $sql);
			$row=mysqli_fetch_assoc($result);

			if (empty($row["id"])) {
				include ("alertler/kitapnumarasibulunamadi.php");
			}
			else{
				if (mysqli_query($link,  $query)) {
					include ("alertler/kitapguncellemealert.php");
				}
			}
		}
		else{
			include ("alertler/tumalanlaridoldurunuz.php");
		}	
	}
}
if (isset($_POST["btn-kitapadetinigüncelle"])) {
	if ($_POST["kitapnumarası"]!="") {
		if ($_POST["günceladet"]!="") {
			$yeniadet= mysqli_real_escape_string($link, $_POST["günceladet"]);
			$kitapnumarası = mysqli_real_escape_string($link, $_POST["kitapnumarası"]);
			$query  = "UPDATE kitaplar SET  adet  = '".$yeniadet."' WHERE id =".$kitapnumarası ;
			//girilen kitap numarası veritabınında varmı 
			$sql = "SELECT * FROM kitaplar WHERE id =" .$kitapnumarası;
			$result=mysqli_query($link, $sql);
			$row=mysqli_fetch_assoc($result);

			if (empty($row["id"])) {
				include ("alertler/kitapnumarasibulunamadi.php");
			}
			
			else{
				if (mysqli_query($link,  $query)) {
					include ("alertler/kitapguncellemealert.php");
				}
			}
			
		}
		else{
			include ("alertler/tumalanlaridoldurunuz.php");
		}
	}
	else{
		include ("alertler/tumalanlaridoldurunuz.php");
	}
	
}

if (isset($_POST["btn-kitapadresinigüncelle"])) {
	if ($_POST["kitapnumarası"]!="") {
		if ($_POST["günceladres"]!="") {
			$yeniadres= mysqli_real_escape_string($link, $_POST["günceladres"]);
			$kitapnumarası = mysqli_real_escape_string($link, $_POST["kitapnumarası"]);
			$query = "UPDATE kitaplar SET  adres  = '".$yeniadres."' WHERE id =".$kitapnumarası ;

			//girilen kitap numarası veritabınında varmı 
			$sql = "SELECT * FROM kitaplar WHERE id =" .$kitapnumarası;
			$result=mysqli_query($link, $sql);
			$row=mysqli_fetch_assoc($result);

			if (empty($row["id"])) {
				include ("alertler/kitapnumarasibulunamadi.php");
			}
			else{
				if (mysqli_query($link,  $query)) {
					include ("alertler/kitapguncellemealert.php");
				}}

			}
			else{
				include ("alertler/tumalanlaridoldurunuz.php");
			}
		}
		else{
			include ("alertler/tumalanlaridoldurunuz.php");
		}
	}

	if (isset($_POST["btn-kitapkatogorigüncelle"])) {
		if ($_POST["kitapnumarası"]!="") {
			if ($_POST["güncelkategori"]!="") {
				$yenikategori= mysqli_real_escape_string($link, $_POST["güncelkategori"]);
				$kitapnumarası = mysqli_real_escape_string($link, $_POST["kitapnumarası"]);
				$query = "UPDATE kitaplar SET  kategori  = '".$yenikategori."' WHERE id = 	             ".$kitapnumarası ;

			    //girilen kitap numarası veritabınında varmı 
				$sql = "SELECT * FROM kitaplar WHERE id =" .$kitapnumarası;
				$result=mysqli_query($link, $sql);
				$row=mysqli_fetch_assoc($result);

				if (empty($row["id"])) {
					include ("alertler/kitapnumarasibulunamadi.php");
				}
				else{
					if (mysqli_query($link,  $query)) {
						include("alertler/kitapguncellemealert.php");
					}
				}

			}
			else{
				include ("alertler/tumalanlaridoldurunuz.php");
			}
		}
		else{
			include ("alertler/tumalanlaridoldurunuz.php");
		}
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
	</head>
	<body>
		<div class="container  ">
			<div class="row ">
				<div class="col-4 ">
					<?php include ("menu.php"); ?>
				</div>
				<div class="col-8 ">
					<form method="post">
						<h2 class="mt-4 mb-3 "> <strong> Kitap Güncelleme Sayfası </strong></h2>
						<div class="form-row">
							<div class="form-group">
								<!-- <h5>Güncellenecek Kitap Numarasını Giriniz :</h5> -->
								<label class="mt-2"><strong>Güncellenecek Kitap Numarasını Giriniz :</strong>
								</label> 
								<input type="text" class="form-control" name="kitapnumarası" placeholder="Kitap Numarası">
							</div>
						</div>

						<div class="row">
							<h5>Kitap Adını Güncelle</h5>	
						</div>
						<div class ="form-row ">
							<div class ="form-group ">
								<input type="text" class="form-control" name="yenikitapadı" placeholder="Yeni Kitaplarıap Adı">
							</div>
							<div class="form-group ml-3	">
								<button class="btn  "style="background-color:#87cefa " type="submit" name="btn-kitapadınıgüncelle">Güncelle</button>
							</div>

						</div>
						<div class="row">
							<h5>Kitap Adetini Güncelle</h5>	
						</div>
						<div class ="form-row ">
							<div class ="form-group">
								<input type="text" class="form-control" name="günceladet" placeholder="Kitap Adedi">
							</div>
							<div class ="form-group ml-3 ">
								<button class="btn "style="background-color:#87cefa "  type="submit" name="btn-kitapadetinigüncelle">Güncelle</button>
							</div>
						</div>
						<div class="row">
							<h5>Kitap Adresini Güncelle</h5>	
						</div>
						<div class ="form-row ">
							<div class ="form-group">
								<input type="text" class="form-control" name="günceladres" placeholder="Kitap Adresi">
							</div>
							<div class ="form-group ml-3 ">
								<button class="btn  "style="background-color:#87cefa "  type="submit" name="btn-kitapadresinigüncelle">Güncelle</button>
							</div>
						</div>

						<div class="row">
							<h5>Kitap Katagorisini Güncelle</h5>	
						</div>

						<div class =" form-row ">
							<div class="form-group">
								<select class="form-control " name="güncelkategori">
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
							<div class ="form-group  ">
								<button class="btn  ml-2 "style="background-color:#87cefa "  type="submit" name="btn-kitapkatogorigüncelle">Güncelle</button>
								<br><br>
								<br>
								<br>
								<br>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
<!-- 	<header>
		<nav>
			<a  class="float-right" href="index.php"  > <strong> Çıkış Yap</strong></a>
		</nav>
	</header> -->
</body>
</html>