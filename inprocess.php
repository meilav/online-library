<?php
session_start();
error_reporting(0);
include "connect.php";

	$name="$_POST[name]";
	$pass="$_POST[pass]";
	$user="$_POST[user]";

	if($name=="" && $pass=="" && $user==""){
		header('location: signin.php?c=null');
	}
	else if($name=="" && $pass=="" && $user!="") {
		header('location: signin.php?c=npnull');
	}
	else if($name=="" && $pass!="" && $user==""){
		header('location: signin.php?c=nunull');
	}
	else if($name=="" && $pass!="" && $user!=""){
		header('location: signin.php?c=nnull');
	}
	else if($name!="" && $pass=="" && $user==""){
		header('location: signin.php?c=punull');
	}
	else if($name!="" && $pass=="" && $user!=""){
		header('location: signin.php?c=pnull');
	}
	else if($name!="" && $pass!="" && $user==""){
		header('location: signin.php?c=usernull');
	}
	else{
		
		if ($user=="member") {
			$userr  = mysql_query("SELECT * FROM member WHERE username='$name' AND password='$pass'");
			$match = mysql_num_rows($userr);

			if ($match==1){
				$_SESSION["member"] = $name;
				echo "<script language=javascript>alert('Welcome, $name!');document.location.href='index2.php';</script>"; 
			}
			else {
				header('location: signin.php?c=wrong');
			}	
		}
		else if ($user=="admin"){
			$userr  = mysql_query("SELECT * FROM admin WHERE username='$name' AND password='$pass'");
			$match = mysql_num_rows($userr);

			if ($match==1){
				$_SESSION["admin"] = $name;
				echo "<script language=javascript>alert('Welcome, $name!');document.location.href='index2.php';</script>"; 
			}
			else {
				header('location: signin.php?c=wrong');
			}
		}
		else {
			header('location: signin.php?c=usernull');
		}
	}
?>