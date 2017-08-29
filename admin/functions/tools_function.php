<?php
	
	function sYap($par)
	{
		if($par!="")
		{
			foreach ($par as $p => $v){
				$_SESSION[$p]=$v;
				}
			return true;
		}
		else
		return false;
	}
	
	function sGet($par)
	{
		if($_SESSION[$par])
			return $_SESSION[$par];
		else
			return false;
	}
	




?>