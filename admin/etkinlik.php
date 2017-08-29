<div class="row"><a name="haber"></a>
<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-success">
				 <div class="panel-heading">
					<h3 class="panel-title">Haber ve Etkinlik Ekle</h3>
				 </div>
				 <?php
require_once 'functions/data_function.php';
require_once 'functions/tools_function.php';
include ("functions/baglanti.php");
		if(isset($_POST["hgonder"])){
			$baslik =$_POST["hbaslik"];
			$icerik =$_POST["hicerik"];
			$level =sGet('name');
			$tarih =date("d-m-Y");
			$dosya=$_FILES["hfile"]["name"];
			$yeni_ad="../files/".$dosya;
			if($baslik=="" || $icerik==""){
					echo '<div class="alert alert-warning">Tüm alanları doldurun</div>';		
			}
			else{
			if (move_uploaded_file($_FILES["hfile"]["tmp_name"],$yeni_ad)){
			$kontrol=@mysql_query("insert into haber(baslik,icerik,tarih,unvan,dosya) values('$baslik','$icerik','$tarih','$level','$yeni_ad');");
				if($kontrol)
					echo '<div class="alert alert-success">Kayıt Başarılı</div>';
				else
					echo '<div class="alert alert-danger">Kayıt Başarısız</div>';
			}
			else{
			$kontrol2=@mysql_query("insert into haber(baslik,icerik,tarih,unvan) values('$baslik','$icerik','$tarih','$level');");
				if($kontrol2)
					echo '<div class="alert alert-success">Kayıt Başarılı</div>';
				else
					echo '<div class="alert alert-danger">Kayıt Başarısız</div>';
			}
		}
	}
	?>
				<div class="panel-body">

					<form name="hduyuruekle" method="post" action="index.php" enctype="multipart/form-data">
						  <div class="form-group">
							<label for="baslik">Konu Başlığı</label>
							<input type="text" class="form-control" name="hbaslik" >
						  </div>
						  <div class="form-group">
							<label for="icerik">İçerik</label>
							<textarea type="text" class="form-control" name="hicerik"></textarea>
						  </div>
						  <div class="form-group">
							<label for="dosya">Dosya Ekle</label>
							<input type="file" name="hfile">
						  </div>
						  <button type="submit" name="hgonder" class="btn btn-default">Yayınla</button>
					</form>
				</div>
				
				 <div class="panel-heading" >
					<h3 class="panel-title">Haber Etkinlik Duyurusu Sil-Güncelle</h3>
				 </div>
				<div class="panel-body" >
					<form name="hsil" method="post" action="index.php" enctype="multipart/form-data">
						  <div class="form-group">
						  <div class="table-responsive">
						  	<table class="table table-hover">
										<thead>
										<tr>
										<th></th>
										<th>Başlık</th>
										<th>İçerik</th>
										<th>Tarih</th>
										</tr>
										</thead>
										<tbody>
<?php

				if(isset($_POST["hsill"])){
				if(isset($_POST["hcheck"])){
				$idd=$_POST["hcheck"];
					foreach($idd as $hdel){
						$temizle=mysql_query("delete from haber where ID='$hdel'");}
						if($temizle)
						echo '<div class="alert alert-success">İşlem Başarılı</div>';
						else
						echo '<div class="alert alert-danger">işlem Başarısız</div>';
					
				}
				else{
					echo '<div class="alert alert-danger">Lütfen Seçim Yapınız</div>';
					}
				
			}
			
			
			if(isset($_POST["hguncelle"])){
				$hguncelbaslik=$_POST["hguncelbaslik"];
				$hguncelicerik=$_POST["hguncelicerik"];
				$hguncelfile=$_FILES["hguncelfile"]["name"];
				$hguncelad="../files/".$hguncelfile;
				$hgtarih=date("d-m-Y");
				move_uploaded_file($_FILES["hguncelfile"]["tmp_name"],$hguncelad);
				if(isset($_POST["hcheck"])){
				$idd=$_POST["hcheck"];
				foreach($idd as $guncelh){}
					$guncelle=mysql_query("update haber set baslik='$hguncelbaslik',icerik='$hguncelicerik',tarih='$hgtarih',dosya='$hguncelad' where ID='$guncelh'");
					if($guncelle)
					echo '<div class="alert alert-success">İşlem Başarılı</div>';
					else
					echo '<div class="alert alert-danger">işlem Başarısız</div>';
					
				}
				else{
					echo '<div class="alert alert-danger">Lütfen Seçim Yapınız</div>';
					}
			}

						if(isset($_POST["hlistele"])){
									 $sorgu=@mysql_query("select * from haber where unvan='".sGet('name')."' ORDER BY id DESC");
							
									while($row=@mysql_fetch_array($sorgu))
									{
										$id		=$row["ID"];
										$baslik =$row["baslik"];
										$icerik =$row["icerik"];
										$level =$row["unvan"];
										$tarih =$row["tarih"];
?>				  		                 <tr>
										    <td><input type="checkbox" name="hcheck[]" value="<?php echo $id;?>"></td>
											<td><?php echo $baslik;?></td>
											<td><?php echo $icerik;?></td>
											<td><?php echo $tarih;?></td>
										  </tr>

				<?php		} 
				echo "Size ait olan tüm duyurular listelenmiştir <br><br>";}?> 
										</tbody>
									</table>
									</div>
						  </div>
						  <button type="submit" name="hlistele" class="btn btn-default">Listele</button>
						  <button type="submit" name="hsill" class="btn btn-default">Sil</button>
						  <hr>
						  <div class="form-group">
							<label for="baslik">Konu Başlığı Güncelle</label>
							<input type="text" class="form-control" name="hguncelbaslik" >
						  </div>
						  <div class="form-group">
							<label for="icerik">İçerik Güncelle</label>
							<textarea type="text" class="form-control" name="hguncelicerik"></textarea>
						  </div>
						  <div class="form-group">
							<label for="dosya">Dosya Eki Güncelle</label>
							<input type="file" name="hguncelfile">
						  </div>
						  <button type="submit" name="hguncelle" class="btn btn-default">Güncelle</button>
					</form>

				</div>
				
	</div>
	</div>
	</div>