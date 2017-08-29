
<div class="row">
	<div class="col-md-10 col-md-offset-1 ">
	<div class="panel panel-success">
				 <div class="panel-heading">
					<h3 class="panel-title">Admin/Kullanıcı Ekle</h3>
				 </div>
	<?php
				include("functions/baglanti.php");
				
				if(isset($_POST["ugonder"])){
				$user =$_POST["username"];
				$pass =$_POST["password"];
				$level =$_POST["unvan"];				
				if($user=="" || $pass=="" || $level==""){
					echo '<div class="alert alert-warning">Tüm alanları doldurun</div>';		
				}
				else{
					 $varmı=@mysql_query("select * from admin");	
					 $flag=false;
					while($row=@mysql_fetch_array($varmı))
					{
					$username=$row['username'];
					$password=$row['password'];
					if($user==$username || $pass==$password)
					{echo '<div class="alert alert-danger">Kullanıcı adı ya da şifre zaten var !</div>'; 
					$flag=true;break;}
					}

					if($flag==false){
				$kontrol=@mysql_query("insert into admin(username,password,name) values('$user','$pass','$level');");
					if($kontrol)
						echo '<div class="alert alert-success">Kayıt Başarılı</div>';
					else
						echo '<div class="alert alert-danger">Kayıt Başarısız</div>';
				}}
}
	
	?>
				<div class="panel-body">
					<form name="userekle" method="post" action="index.php?sayfa=ekle">
						  <div class="form-group">
							<label for="user">Kullanıcı Adı</label>
							<input type="text" class="form-control" name="username" placeholder="Kullanıcı Adı Girin">
						  </div>
						  <div class="form-group">
							<label for="pass">Şifre</label>
							<input type="password" class="form-control" name="password" placeholder="Şifre Girin">
						  </div>
						  <div class="form-group">
							<label for="user">Ünvan Ad-Soyad</label>
							<input type="text" class="form-control" name="unvan" placeholder="Yrd.Doç.Dr isim soyisim gibi">
						  </div>
						  <button type="submit" name="ugonder" class="btn btn-default">Kaydet</button>
					</form>
				
				</div>


				 <div class="panel-heading">
					<h3 class="panel-title">Admin/Kullanıcı Sil</h3>
				 </div>

				<div class="panel-body">
					<form name="usersil" method="post" action="index.php?sayfa=ekle">
						  <div class="form-group">
						  	<table class="table table-hover">
										<thead>
										<tr>
										<th></th>
										<th>Kullanıcı Adı</th>
										<th>Şifre</th>
										<th>Ünvan</th>
										</tr>
										</thead>
										<tbody>
<?php

				if(isset($_POST["sil"])){
				if(isset($_POST["check"])){
				$idd=$_POST["check"];
					foreach($idd as $sil){
						$temizle=mysql_query("delete from admin where ID='$sil'");
					}
					if($temizle)
						echo '<div class="alert alert-success">İşlem Başarılı</div>';
						else
						echo '<div class="alert alert-danger">işlem Başarısız</div>';
				}
				else{
					echo '<div class="alert alert-danger">Lütfen Seçim Yapınız</div>';
					}
			}


						if(isset($_POST["listele"])){
									 $sorgu=@mysql_query("select * from admin ORDER BY id DESC");

									while($row=@mysql_fetch_array($sorgu))
									{
									$id=$row['ID'];
									$username=$row['username'];
									$pass=$row['password'];
									$name=$row['name'];     
?>				  		                 <tr>
										    <td><input type="checkbox" name="check[]" value="<?php echo $id;?>"></td>
											<td><?php echo $username?></td>
											<td><?php echo $pass?></td>
											<td><?php echo $name?></td>
										  </tr>

				<?php		} 
				}?>
										</tbody>
									</table>
						  </div>
						  <button type="submit" name="listele" class="btn btn-default">Listele</button>
						  <button type="submit" name="sil" class="btn btn-default">Sil</button>
					</form>
					
	
				
				</div>
	</div>
</div>

</div>
