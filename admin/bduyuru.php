
<div class="row"><a name="bolum"></a>
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-primary">
				 <div class="panel-heading">
					<h3 class="panel-title">Genel Duyuru Ekle</h3>
				 </div>
				 <?php		
require_once 'functions/data_function.php';
require_once 'functions/tools_function.php';
include("functions/baglanti.php");
		if(isset($_POST["bgonder"])){
			$baslik =$_POST["baslik"];
			$icerik =$_POST["icerik"];
			$level =sGet('name');
			$tarih =date("d-m-Y");
			$dosya=$_FILES["file"]["name"];
			$yeni_ad="../files/".$dosya;
			if($baslik=="" || $icerik==""){
					echo '<div class="alert alert-warning">Tüm alanları doldurun</div>';		
			}
			else{
			if (move_uploaded_file($_FILES["file"]["tmp_name"],$yeni_ad)){ 
			$kontrol=@mysql_query("insert into bduyuru(baslik,icerik,tarih,unvan,dosya) values('$baslik','$icerik','$tarih','$level','$yeni_ad');");
				if($kontrol)
					echo '<div class="alert alert-success">Kayıt Başarılı</div>';
				else
					echo '<div class="alert alert-danger">Kayıt Başarısızzz</div>';
			}
			else{
			$kontrol2=@mysql_query("insert into bduyuru(baslik,icerik,tarih,unvan) values('$baslik','$icerik','$tarih','$level');");
				if($kontrol2)
					echo '<div class="alert alert-success">Kayıt Başarılı</div>';
				else
					echo '<div class="alert alert-danger">Kayıt Başarısız</div>';
			}
		}
		}
	?>
				<div class="panel-body">

					<form name="duyuruekle" method="post" action="index.php" enctype="multipart/form-data">
						  <div class="form-group">
							<label for="baslik">Konu Başlığı</label>
							<input type="text" class="form-control" name="baslik" >
						  </div>
						  <div class="form-group">
							<label for="icerik">İçerik</label>
							<textarea type="text" class="form-control" name="icerik"></textarea>
						  </div> 
						  <div class="form-group">
							<label for="dosya">Dosya Ekle</label>
							<input type="file" name="file">
						  </div>
						  <button type="submit" name="bgonder" class="btn btn-default">Yayınla</button>
					</form>
				
				</div>



				 <div class="panel-heading">
					<h3 class="panel-title">Genel Duyuru Sil-Güncelle</h3>
				 </div>
				<div class="panel-body">
					<form name="bsil" method="post" action="index.php" enctype="multipart/form-data">
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

				if(isset($_POST["sil"])){
				if(isset($_POST["check"])){
				$idd=$_POST["check"];
					foreach($idd as $sil){
						$temizle=mysql_query("delete from bduyuru where ID='$sil'");}
						if($temizle)
						echo '<div class="alert alert-success">İşlem Başarılı</div>';
						else
						echo '<div class="alert alert-danger">işlem Başarısız</div>';
					
				}
				else{
					echo '<div class="alert alert-danger">Lütfen Seçim Yapınız</div>';
					}
				
			}
			
			
			if(isset($_POST["guncelle"])){
				$guncelbaslik=$_POST["guncelbaslik"];
				$guncelicerik=$_POST["guncelicerik"];
				$guncelfile=$_FILES["guncelfile"]["name"];
				$gtarih=date("d-m-Y");
				$guncelad="../files/".$guncelfile;
				move_uploaded_file($_FILES["guncelfile"]["tmp_name"],$guncelad);
				if(isset($_POST["check"])){
				$idd=$_POST["check"];
				foreach($idd as $guncel){}
					$guncelle=mysql_query("update bduyuru set baslik='$guncelbaslik',icerik='$guncelicerik',tarih='$gtarih',dosya='$guncelad' where ID='$guncel'");
					if($guncelle)
					echo '<div class="alert alert-success">İşlem Başarılı</div>';
					else
					echo '<div class="alert alert-danger">işlem Başarısız</div>';
					
				}
				else{
					echo '<div class="alert alert-danger">Lütfen Seçim Yapınız</div>';
					}
			}

						if(isset($_POST["listele"])){
									 $sorgu=@mysql_query("select * from bduyuru where unvan='".sGet('name')."' ORDER BY id DESC");
							
									while($row=@mysql_fetch_array($sorgu))
									{
										$id		=$row["ID"];
										$baslik =$row["baslik"];
										$icerik =$row["icerik"];
										$level =$row["unvan"];
										$tarih =$row["tarih"];
?>				  		                 <tr>
										    <td><input type="checkbox" name="check[]" value="<?php echo $id;?>"></td>
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
						  <button type="submit" name="listele" class="btn btn-default">Listele</button>
						  <button type="submit" name="sil" class="btn btn-default">Sil</button>
						  <hr>
						  <div class="form-group">
							<label for="baslik">Konu Başlığı Güncelle</label>
							<input type="text" class="form-control" name="guncelbaslik" >
						  </div>
						  <div class="form-group">
							<label for="icerik">İçerik Güncelle</label>
							<textarea type="text" class="form-control" name="guncelicerik"></textarea>
						  </div>
						  <div class="form-group">
							<label for="dosya">Dosya Eki Güncelle</label>
							<input type="file" name="guncelfile">
						  </div>
						  <button type="submit" name="guncelle" class="btn btn-default">Güncelle</button>
					</form>
					
	
				
				</div>
	</div>
</div>


</div>
					  <div class="bodyduyuru2">	
					
					  </div>