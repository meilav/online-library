<?php

session_start();
if(empty($_SESSION["admin"])){
	header('location:signin.php');
} else {

$admin = "$_SESSION[admin]";
include "connect.php";

	$query=mysql_query("SELECT * FROM admin WHERE username='$admin'") or die (mysql_error());
	while($row=mysql_fetch_array($query)){
		$name=$row['name'];
	}


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
	$date=date("d/m/Y");
	$time=date("h:i:sa");

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

if($judul=="" && $jumlah=="" && $kode=="" && $penulis=="" && $penerbit=="" && $tahun=="" && $kota==""
	&& $jumhal=="" && $kategori=="" && $deskripsi=="" ){
		header('location: uploadbook.php?c=null');	
	}
elseif ($judul==""){
		header('location: uploadbook.php?c=jnull');	
}
elseif ($jumlah==""){
		header('location: uploadbook.php?c=jumnull');	
}
elseif ($kode==""){
		header('location: uploadbook.php?c=knull');	
}
elseif ($penulis==""){
		header('location: uploadbook.php?c=pnull');	
}
elseif ($penerbit==""){
		header('location: uploadbook.php?c=pennull');	
}
elseif ($tahun==""){
		header('location: uploadbook.php?c=tnull');	
}
elseif ($kota==""){
		header('location: uploadbook.php?c=konull');	
}
elseif ($jumhal==""){
		header('location: uploadbook.php?c=jhnull');	
}
elseif ($kategori==""){
		header('location: uploadbook.php?c=kanull');	
}
elseif ($deskripsi==""){
		header('location: uploadbook.php?c=denull');	
}
else {
$query = mysql_query("INSERT INTO books SET cover='$namfot', judul='$judul', jumlah='$jumlah', kode='$kode', penulis='$penulis', penerbit='$penerbit', `tahun terbit`='$tahun', `kota terbit`='$kota', 
						`jumlah halaman`='$jumhal', kategori='$kategori', `posted by`='$name', date='$date', time='$time', deskripsi='$deskripsi'");

	move_uploaded_file($sumber, $alamatfile);
	if ($query)
	{
	$_SESSION["id"]=$kode;
	
	echo "<script>alert('Buku $judul Berhasil di-Upload')
		document.location.href='book.php?id=$kode';</script>";
	 }
	else   {
		echo "<script>alert('Buku Gagal di-Upload')
		document.location.href='uploadbook.php';</script>";
	 }

}
	 
	 
	 
}
?>