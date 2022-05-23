<?php 
include ("header.php");
include ("fonksiyon.php");
include ("baslik.php"); 
if (empty($_SESSION["adminyetki"])) {
	include ("alertler/girisyapmadinizalert.php");
	
	die();
}
if (isset($_POST["kaydet"])) {
	if ($_POST["kitapnumarasi"] !="" && $_POST["ogrencinumarasi"] != "" && $_POST["verilistarihi"]!="" ){
		$kitapnumarasi = $_POST["kitapnumarasi"];
		$kitapno=$_POST["kitapnumarasi"];
		$ogrenci =$_POST["ogrencinumarasi"];
		$verilis =$_POST["verilistarihi"];
		$sayi = kitapnumarasikontrol($kitapnumarasi); 
		$ver = ogrencinokontrol($ogrenci)	;
		if ($sayi == 1 ) {
			if ($ver==0) {
				$query2 = "SELECT * FROM kitaplar WHERE id = ".$kitapnumarasi ;
				$row=  mysqli_query($link , $query2);
				$result = mysqli_fetch_assoc($row);
				
				if ($result["adet"]>0) {

					$query = "INSERT INTO gidenkitaplar (id,ogrencinumarasi,verilistarihi) 
					VALUES ('".$kitapno."' , '".$ogrenci."' , '".$verilis."') ";

					mysqli_query($link , $query);


					$gunceladet= $result["adet"]-1;
	        		//echo $günceladet;
					$query3 = "UPDATE kitaplar SET  adet  = '".$gunceladet."'  WHERE id =".$kitapnumarasi ;
					if(mysqli_query($link,  $query3)){
						include ("alertler/islembasarili.php");

					}
				}
			}
			else{
				include ("alertler/ogrenciyekitapverilmis.php");

			}
		}
		else{
			
			include ("alertler/kitapnumarasibulunamadi.php");
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
	<title>Admin Girişi</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> 
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>


	<div class="container ">
		<div class="row ">
			<div class="col-4 ">
				<?php include ("menu.php"); ?>
			</div>

			<div class="col-8 float-right ">
				<form method="post">
					<h2 class="mt-4 mb-3"> <strong> Kitap Verme Sayfası </strong></h2>
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
					<div class ="form-row ">
						<div class ="form-group">
							<label>Veriliş Tarihi</label>
							<input type="text" class="form-control" name="verilistarihi" placeholder="Veriliş Tarihi">
						</div>

					</div>

					<button class="btn  px-5 py-2  "style="background-color:#87cefa "type="submit" name="kaydet">Kaydet   
					</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>
