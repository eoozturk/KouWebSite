
<div class="row">
	<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-info">
				 <div class="panel-heading">
					<h3 class="panel-title">Admin/Kullanıcı Ekle-Yetkili Girişi</h3>
				 </div>
	<?php
				include("functions/baglanti.php");
				
				if(isset($_POST["yetki"])){
				$user =$_POST["username"];
				$pass =$_POST["password"];
				
				if($user=="" || $pass=="" ){
					echo '<div class="alert alert-warning">Tüm alanları doldurun</div>';		
				}
				else{
					if($user=="ibrahim" && $pass="123"){
						echo '<div class="alert alert-success">Giriş Başarslı</div>';
						header('Location:index.php?sayfa=ekle');
						}
					else
						echo '<div class="alert alert-danger">Giriş Başarısız</div>';
				}
}
	
	?>
				<div class="panel-body">
					<form name="userekle" method="post" action="index.php">
						  <div class="form-group">
							<input type="text" class="form-control" name="username" placeholder="Username">
						  </div>
						  <div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Password">
						  </div>

						  <button type="submit" name="yetki" class="btn btn-default">Giriş</button>
					</form>
				
				</div>
	</div>
</div>		
</div>
					  <div class="bodyduyuru2">	
					
					  </div>
					  <br>