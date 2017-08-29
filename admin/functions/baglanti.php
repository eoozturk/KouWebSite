<?php

$host		="localhost";
$kullanici	="root";
$sifre		="";
$veritabani	="koubilgisayar";
$baglan		= @mysql_connect($host,$kullanici,$sifre) or die("bağlanamadı");
$baglan2	= @mysql_select_db($veritabani,$baglan)or die("veritabanı seçilemedi");

 if(!$baglan2)
 {
	echo "veritabanı bağlantısı gerçekleşmedi";	
 }
 else{
		 @mysql_query("SET CHARACTER SET utf8");
		 @mysql_query("SET character_set_connection = 'UTF8'");
		 @mysql_query("SET character_set_clients = 'UTF8'");
		 @mysql_query("SET character_set_results = 'UTF8'");
 }



?>