<?php
include"connect.php";

$nama=$_GET['nama'];
$nim=$_GET['nim'];
$hp=$_GET['hp'];
$date=date('d/m/Y');

if ($nama=="" && $nim=="" && $hp=="")
	{ header ('location:guestbook.php?c=null'); }
else if ($nama=="" || $nim=="" || $hp=="")
	{ header ('location:guestbook.php?c=nnull'); }
else{
	$query=mysql_query("INSERT INTO guest VALUES('$date', '$nama', '$nim', '$hp', NULL)");
	
	if ($query)
	{
		echo "<script language=javascript>alert('Terima Kasih Sudah Mengunjungi ONLIB On The Spot :>');
		document.location.href='guestbook.php';</script>"; 
		
	}
	else
	{
		echo "<script language=javascript>alert('Coba Lagi');
		document.location.href='guestbook.php';</script>"; 
	}
}
?>