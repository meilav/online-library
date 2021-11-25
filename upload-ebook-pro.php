<?php

session_start();
if(empty($_SESSION["admin"])){
	header('location:signin.php');
} else {

$admin = "$_SESSION[admin]";
include "connect.php";


	$judul="$_POST[judul]";
	$kategori="$_POST[kategori]";

$sumber1 = $_FILES['ebook']['tmp_name'];  
$target1 = $_FILES['ebook']['name'];

if ($kategori=="General"){
	$uploaddir1='./ebooks/general/';
}
else if ($kategori=="Islamic"){
	$uploaddir1='./ebooks/islamic/';
}
else if($kategori=="Literature"){
	$uploaddir1='./ebooks/literature/';
}
else if ($kategori=="Science and Technology"){
	$uploaddir1='./ebooks/ST/';  
}

$jdlebook = "$target1";
$alamatfile1=$uploaddir1.$jdlebook;


$sumber = $_FILES['cover']['tmp_name'];  
$target = $_FILES['cover']['name'];

if ($kategori=="General"){
	$uploaddir='./pic/books/general/';
}
else if ($kategori=="Islamic"){
	$uploaddir='./pic/books/islamic/';
}
else if($kategori=="Literature"){
	$uploaddir='./pic/books/literature/';
}
else if ($kategori=="Science and Technology"){
	$uploaddir='./pic/books/ST/';  
}

$namfot = "$target";
$alamatfile=$uploaddir.$namfot;

if($judul=="" && $kategori==""){
		header('location: upload-ebook.php?c=null');	
	}
elseif ($judul=="" && $kategori!=""){
		header('location: upload-ebook.php?c=jnull');	
}
elseif ($judul!="" && $kategori==""){
		header('location: upload-ebook.php?c=kanull');	
}
else {

	$query = mysql_query("INSERT INTO ebook VALUES ('$judul', '$jdlebook', '$namfot', '$kategori')");

	move_uploaded_file($sumber1, $alamatfile1);
	move_uploaded_file($sumber, $alamatfile);

	if ($query)
	{
	
	echo "<script>alert('Buku -$judul- Berhasil di-Upload')
		document.location.href='upload-ebook.php';</script>";
	 }
	else   {
		echo "<script>alert('Buku Gagal di-Upload ')
		document.location.href='upload-ebook.php';</script>"; 
		
	 }
}

}
?>