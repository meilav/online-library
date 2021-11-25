<?php

session_start();
if(empty($_SESSION["admin"])){
	header('location:signin.php');
} else {

$admin = "$_SESSION[admin]";
include "connect.php";


	$judul="$_POST[judul]";
	$jumlah="$_POST[jumlah]";
	$kode="$_POST[kode]";
	$penulis="$_POST[penulis]";
	$penerbit="$_POST[penerbit]";
	$tahun="$_POST[tahun]";
	$kota="$_POST[kota]";
	$jumhal="$_POST[jumhal]";
	$kategori="$_POST[kategori]";
	$deskripsi="$_POST[deskripsi]";

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

$namfot = "$kode-$target";
$alamatfile=$uploaddir.$namfot;

$query = mysql_query("UPDATE books SET cover='$namfot', judul='$judul', jumlah='$jumlah', penulis='$penulis', penerbit='$penerbit', `tahun terbit`='$tahun', `kota terbit`='$kota', 
						`jumlah halaman`='$jumhal', kategori='$kategori', deskripsi='$deskripsi' WHERE kode='$kode'");

	move_uploaded_file($sumber, $alamatfile);
	if ($query)
	{
	echo "<script>alert('Buku $judul Berhasil di-Update')
		document.location.href='book.php?id=$kode';</script>";
	 }
	else   {
		echo "<script>alert('Buku Gagal di-Update')
		document.location.href='book.php?id=$kode';</script>";
	 }

}
	 
	 
	 

?>