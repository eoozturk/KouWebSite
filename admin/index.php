<?php
 include("functions/baglanti.php");
 require_once 'functions/data_function.php';
 require_once 'functions/tools_function.php';
 session_start();
 ob_start();
 
	if(!oturum_kontrol(sGet('user'),sGet('pass'))){
		header('Location:../login.php');
		}

	$sayfa =@$_GET["sayfa"];
		switch($sayfa){
		default;
				include("eklesilguncelle.php");
				include("yetki.php");
				include("bduyuru.php");
				include("gduyuru.php");
				include("etkinlik.php");
				include("footer.php");
				break;
				
			case "ekle";
				include("header.php");
				include("userekle.php");
				include("footer.php");
				break;
						
			
				}
			




?>