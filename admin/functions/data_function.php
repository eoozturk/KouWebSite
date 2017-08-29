<?php
header('Content-Type: text/html; charset=utf-8');


		
		function Say($par){
			return @mysql_num_rows($par);
		}
		
		function Yaz($par){
			return @mysql_fetch_array($par);
		}
		
		function oturum_kontrol($par,$par2)
		{
			if($par!="" AND $par2!=""){
				$Kontrol=@mysql_query("SELECT username,password FROM admin WHERE username='{$par}' AND password='{$par2}'");
				if(Say($Kontrol)>0){
					$Yaz=Yaz($Kontrol);
					if($_SESSION["user"]==$Yaz["username"] AND $_SESSION["oturum"]==md5($Yaz["password"].$_SERVER["REMOTE_ADDR"])){
						return true;
					}
					else{
					 return false;
					}							
				}
				else{
					return false;
				}
			}
			else{
				return false;
			}
		
		} 

?>