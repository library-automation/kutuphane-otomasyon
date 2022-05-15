


<?php 
include("header.php");
if (isset($_POST["buton"])) {
	$sifre = mysqli_real_escape_string ($link, $_POST["sifre"]);
	$kullaniciadi1 = mysqli_real_escape_string ($link, $_POST["kullanici-adi"]);
	$sql="SELECT * FROM kullanicilar ";

	if ($result=mysqli_query($link, $sql)) {
		$row=mysqli_fetch_assoc($result);
		if ($row["sifre"]==$sifre && $row["kullaniciadi"] == $kullaniciadi1) {
			$_SESSION['adminyetki']=  $row["adminyetki"];
			header("Location: adminpanel.php");
		}

		else {
			include("alertler/sifrehatalialert.php"); 
		}
	}
} 
?>
<div class="container">
	<div class="row">
		<div class= "col-12 " >
			<div class="col-12 mt-4">
				<h1 class="text-center "><strong>Gurbet Güngören </strong>  Kütüphanesine</h1>
				<h1 class="text-center">  Hoşgeldiniz  </h1>
				<br>
				<br>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div style="border-radius: 0px;">
				<h3 class="panel-title">
					Giriş Yap 
				</h3>
				<form method="post">
					<fieldset>
						<div class="form-group">
							<div class="input-group">
								<input
								class="form-control" type="text" name="kullanici-adi"
								placeholder="Kullanıcı Adı">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<input
								class="form-control" name="sifre" type="password"
								placeholder="Şifre">
							</div>
						</div>

						<button type="submit" name="buton" style="border-radius: 0px"
						class="btn btn-lg btn-info btn-block">Giriş Yap</button>
					</fieldset>
				</form>

			</div>
			<hr>
		<!-- <div class="col-4"></div>
		<div class="col-8">





			<form method="post">

				<div class ="form-row ">
					<div class ="form-group">
						
						<input type="text" class="form-control pr-5" name="kullanici-adi" placeholder="E-mail">
					</div>
				</div>
				<div class ="form-row ">
					<div class ="form-group">
						
						<input type="text" class="form-control pr-5" name="sifre" placeholder="şifre">
					</div>
					
				</div>
				
				
				<button class="btn btn-primary px-5 py-2 text-white " type="submit" name="buton"><strong>Giriş Yap  
				</strong>  </button>
			</form>
		</div>
	</div> -->
			<!-- <form  method="post">
				<input class="p-1" type="text" name="kullanici-adi"placeholder="e-mail"required />
				<br> <br>
				<input class="p-1" type="password" name="sifre"placeholder="şifre" required  />
				<button class="btn btn-primary my-1 pt-1" name="buton">Giriş</button>
			</form> -->
			<br>

			<center>

				<div class="alert alert-info">
					<strong style="color: #cb2033;">Sisteme giriş problemlerinizi</strong><br>gurbet.gungoren@gmail.com
					adresine e-posta ile bildirebilirsiniz.
				</div>
			</center>
		</div>

	</body>
	</html>