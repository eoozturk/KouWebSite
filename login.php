<?php session_start();
ob_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<title>Login</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/custom.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/tut.js" type="text/javascript" charset="utf-8"></script>
<?php require_once 'admin/functions/data_function.php';
require_once 'admin/functions/tools_function.php';
include("admin/functions/baglanti.php"); ?> 
</head>
<body>

<div class = "container">
<?php
	global $Hata;

	if(isset($_POST["formGonder"]))
	{
		$user=$_POST["kullanici"];
		$pass=$_POST["sifre"];
		if($user=="" || $pass=="")
			echo '<div class="alert alert-warning">Boş alan bırakmayınız..</div>';
		else{
			$Sor=@mysql_query("SELECT username,password,name FROM admin WHERE username='{$user}' AND password='{$pass}'");
			if(Say($Sor)>0){
			 $Yaz= Yaz($Sor);
			 $userS=sYap(array('user' => $Yaz["username"]));
			 $passS=sYap(array('pass'=> $Yaz["password"]));
			 $nameS=sYap(array('name' => $Yaz["name"]));
			 $oturum=sYap(array('oturum' => md5($Yaz["password"].$_SERVER["REMOTE_ADDR"])));
				 if($userS==true AND $passS==true AND $oturum==true){
					echo '<div class="alert alert-success">Giriş Başarılı</div>';
					header("Refresh:2; url=admin/index.php");
				 }
				 else{
					echo '<div class="alert alert-danger">Oturum Açılamadı</div>';
				 }
		}
		else{
			echo '<div class="alert alert-danger">Hatalı Giriş!</div>';
		}
	}
}

?>
	<div class="wrapper">
		<form action="" method="post" name="Login_Form" class="form-signin">       
		    <h3 class="form-signin-heading">Admin Paneli Giriş Sayfası</h3>
			  <hr class="colorgraph"><br>
			  
			  <input type="text" class="form-control"  name="kullanici" placeholder="Username" required="" autofocus="" />
			  <input type="password" class="form-control"  name="sifre" placeholder="Password" required=""/>     		  
			 
			  <button class="btn btn-lg btn-primary btn-block" name="formGonder" value="Login" type="Submit">Login</button>  			
		</form>			
	</div>
</div>
	</body>
	</html>