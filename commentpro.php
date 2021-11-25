<?php
session_start();

include"connect.php";

$nama=$_POST['name'];
$kode=$_POST['kode'];
$komen=$_POST['komentar'];
$email=$_POST['email'];

if ($nama=="" && $email=="" && $komen=="")
		{ header ("location:book.php?id=$kode&c=null#comment"); }
elseif ($nama=="" && $email!="" && $komen!="")
	{ header ("location:book.php?id=$kode&c=nnull#comment"); }
elseif ($nama!="" && $email=="" && $komen!="")
	{ header ("location:book.php?id=$kode&c=enull#comment"); }
elseif ($nama!="" && $email!="" && $komen=="")
	{ header ("location: book.php?id=$kode&c=knull#comment"); }
else {
	$query=mysql_query("INSERT INTO comment VALUES(now(), '$kode', '$nama', '$email', '$komen', NULL)");
	if ($query)
	{
		echo "<script language=javascript>alert('Terima Kasih Atas Komentarnya :>');
		document.location.href='book.php?id=$kode';</script>"; 	
	}
	else
	{
		echo "<script language=javascript>alert('Komentar Gagal Di-input');
		document.location.href='book.php?id=$kode';</script>"; 
	}	
}
?>