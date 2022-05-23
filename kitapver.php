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

