<div class="row"><a name="genel"></a>
<div class="col-md-10 col-md-offset-1">
<div class="panel panel-danger">
				 <div class="panel-heading">
					<h3 class="panel-title">Bölüm Duyurusu Ekle</h3>
				 </div>
				 <?php
require_once 'functions/data_function.php';
require_once 'functions/tools_function.php';
include ("functions/baglanti.php");
		if(isset($_POST["ggonder"])){
			$baslik =$_POST["gbaslik"];
			$icerik =$_POST["gicerik"];
			$level =sGet('name');
			$tarih =date("d-m-Y");
			$dosya=$_FILES["gfile"]["name"];
			$yeni_ad="../files/".$dosya;
			if($baslik=="" || $icerik==""){
					echo '<div class="alert alert-warning">Tüm alanları doldurun</div>';		
			}
			else{
			if (move_uploaded_file($_FILES["gfile"]["tmp_name"],$yeni_ad)){ 
			$kontrol=@mysql_query("insert into gduyuru(baslik,icerik,tarih,unvan,dosya) values('$baslik','$icerik','$tarih','$level','$yeni_ad');");
				if($kontrol)
					echo '<div class="alert alert-success">Kayıt Başarılı</div>';
				else
					echo '<div class="alert alert-danger">Kayıt Başarısız</div>';
			}
			else{
			$kontrol2=@mysql_query("insert into gduyuru(baslik,icerik,tarih,unvan) values('$baslik','$icerik','$tarih','$level');");
				if($kontrol2)
					echo '<div class="alert alert-success">Kayıt Başarılı</div>';
				else
					echo '<div class="alert alert-danger">Kayıt Başarısız</div>';
			}

			}
		}
	?>
				<div class="panel-body">
					<form name="gduyuruekle" method="post" action="index.php" enctype="multipart/form-data">
						  <div class="form-group">
							<label for="baslik">Konu Başlığı</label>
							<input type="text" class="form-control" name="gbaslik" >
						  </div>
						  <div class="form-group">
							<label for="icerik">İçerik</label>
							<textarea type="text" class="form-control" name="gicerik"></textarea>
						  </div>
						  <div class="form-group">
							<label for="dosya">Dosya Ekle</label>
							<input type="file" name="gfile">
						  </div>
						  <button type="submit" name="ggonder" class="btn btn-default">Yayınla</button>
					</form>
				</div>
				
				<div class="panel-heading">
					<h3 class="panel-title">Bölüm Duyurusu Sil-Güncelle</h3>
				 </div>
				<div class="panel-body">
					<form name="dsil" method="post" action="index.php" enctype="multipart/form-data">
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

				if(isset($_POST["genelsil"])){
				if(isset($_POST["gcheck"])){
				$idd=$_POST["gcheck"];
					foreach($idd as $gsil){
						$temizle=mysql_query("delete from bduyuru where ID='$gsil'");}
						if($temizle)
						echo '<div class="alert alert-success">İşlem Başarılı</div>';
						else
						echo '<div class="alert alert-danger">işlem Başarısız</div>';
					
				}
				else{
					echo '<div class="alert alert-danger">Lütfen Seçim Yapınız</div>';
					}
				
			}
			
			
			if(isset($_POST["genelguncelle"])){
				$gguncelbaslik=$_POST["gguncelbaslik"];
				$gguncelicerik=$_POST["gguncelicerik"];
				$gguncelfile=$_FILES["gguncelfile"]["name"];
				$gguncelad="../files/".$gguncelfile;
				$ggtarih=date("d-m-Y");
				move_uploaded_file($_FILES["gguncelfile"]["tmp_name"],$gguncelad);
				if(isset($_POST["gcheck"])){
				$idd=$_POST["gcheck"];
				foreach($idg as $guncelg){}
					$gguncelle=mysql_query("update gduyuru set baslik='$gguncelbaslik',icerik='$gguncelicerik',tarih='$ggtarih',dosya='$gguncelad' where ID='$guncelg'");
					if($gguncelle)
					echo '<div class="alert alert-success">İşlem Başarılı</div>';
					else
					echo '<div class="alert alert-danger">işlem Başarısız</div>';
					
				}
				else{
					echo '<div class="alert alert-danger">Lütfen Seçim Yapınız</div>';
					}
			}

						if(isset($_POST["genellistele"])){
									 $sorgu=@mysql_query("select * from gduyuru where unvan='".sGet('name')."' ORDER BY id DESC");
							
									while($row=@mysql_fetch_array($sorgu))
									{
										$id		=$row["ID"];
										$baslik =$row["baslik"];
										$icerik =$row["icerik"];
										$level =$row["unvan"];
										$tarih =$row["tarih"];
?>				  		                 <tr>
										    <td><input type="checkbox" name="gcheck[]" value="<?php echo $id;?>"></td>
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
						  <button type="submit" name="genellistele" class="btn btn-default">Listele</button>
						  <button type="submit" name="genelsil" class="btn btn-default">Sil</button>
						  <hr>
						  <div class="form-group">
							<label for="baslik">Konu Başlığı Güncelle</label>
							<input type="text" class="form-control" name="gguncelbaslik" >
						  </div>
						  <div class="form-group">
							<label for="icerik">İçerik Güncelle</label>
							<textarea type="text" class="form-control" name="gguncelicerik"></textarea>
						  </div>
						  <div class="form-group">
							<label for="dosya">Dosya Eki Güncelle</label>
							<input type="file" name="gguncelfile">
						  </div>
						  <button type="submit" name="genelguncelle" class="btn btn-default">Güncelle</button>
					</form>
					
	
				
				</div>
				
	</div>
</div>
</div>
					  <div class="bodyduyuru2">	
					
					  </div>