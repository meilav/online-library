<?php
session_start();

	if(empty($_SESSION["admin"])){
		header('location:signin.php');
	} else {
 
include"connect.php";

$urut="$_GET[urut]";
$date=date("d/m/Y");
$adm="$_SESSION[admin]";

$hm=mysql_query("SELECT * FROM borrowed WHERE urut='$urut'");
while($hmm=mysql_fetch_array($hm)){
	$judul=$hmm['judul'];
}
$la=mysql_query("UPDATE books SET status='Available' where judul='$judul'");

$query=mysql_query("UPDATE borrowed SET tanggal_kembali='$date', admin='$adm' WHERE urut=$urut");
	if($query)
	{
		echo "<script>alert('Buku Sudah Dikembalikan')
		location.replace('borrowed.php')</script>";
	}
	else
	{
		echo "<script>alert('Buku Belum Dikembalikan')
		location.replace('borrowed.php')</script>";
	}


	}
?>