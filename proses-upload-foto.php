<?php
	session_start();
	if((empty($_SESSION["member"]))&&(empty($_SESSION["admin"]))){
		header('location:signin.php');
	} else {
$member = "$_SESSION[member]";

	include "connect.php";

	if(isset($_SESSION['admin'])){
		$query = mysql_query("SELECT * FROM `admin` Where username='$_SESSION[admin]'");
		$row = mysql_fetch_array($query);
		
		$username  = $row['username'];
		$name = $row['name'];
		$foto = $row['foto'];
	}
	else if (isset($_SESSION['member'])){
		$query = mysql_query("SELECT * FROM `member` Where username='$_SESSION[member]'");
		$row = mysql_fetch_array($query);
		
		$username  = $row['username'];
		$name = $row['fullname'];
		$foto = $row['foto'];
	}
$sumber = $_FILES['userfile']['tmp_name'];  
$target = $_FILES['userfile']['name'];  
$uploaddir='./pic/';  
$namfot = "$username-$target";
$alamatfile=$uploaddir.$namfot;
  
if(move_uploaded_file($sumber, $alamatfile))  
{
	if(isset($_SESSION['admin'])){
	$query = mysql_query("UPDATE `admin` SET `foto`='$username-$target' WHERE `username`='$_SESSION[member]'");		
	if ($query){
	echo "<script>alert('Foto Berhasil di-Upload') location.replace('account.php')</script>"; }
	else{
		echo "<script>alert('Foto Gagal di-Upload') location.replace('account.php')</script>";
		 }

	}
	else if(isset($_SESSION['member'])){
	$query = mysql_query("UPDATE `member` SET `foto`='$username-$target' WHERE `username`='$_SESSION[member]'");		
	if ($query){
	echo "<script>alert('Foto Berhasil di-Upload') location.replace('account.php')</script>"; }
	else{
		echo "<script>alert('Foto Gagal di-Upload') location.replace('account.php')</script>";
		 }

	}

}
	}
?>