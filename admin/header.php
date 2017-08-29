<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>YazLab</title>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../css/custom.css" rel="stylesheet" type="text/css" />
<link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script src="../js/tut.js" type="text/javascript" charset="utf-8"></script>
<?php
 require_once 'functions/data_function.php';
 require_once 'functions/tools_function.php';
?>
</head>
<body>
<html>
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
		<center><img src="../images/logo2.png"/></center><br><br>
		</div>
		<div class="col-md-12">
		<br>
		<center><span><?php echo "Hoşgeldiniz, ".sGet('name');?></span><hr>
		<div class="row">
		<div class="col-md-11 col-md-offset-1 ">
		<a class="btn btn-success" href="index.php" role="button">Anasayfa</a>
		<a class="btn btn-danger pull-right" href="cikis.php" role="button">Çıkış Yap</a></div>
		</div>
		<br>
