<?php
	session_start();
	if((empty($_SESSION["member"]))&&(empty($_SESSION["admin"]))){
		header('location:signin.php');
	} else {

$u = "$_SESSION[member]";

include "connect.php";
$book="$_GET[book]";

	$query=mysql_query("SELECT * FROM books WHERE kode='$book'") or die (mysql_error());
	while($row=mysql_fetch_array($query)){
		$kode=$row['kode'];
		$judul=$row['judul'];
		$status=$row['status'];
		$date=date("d/m/Y");
	}
	
	if ($status=='Available'){
		$queri=mysql_query("UPDATE books SET status='Borrowed' WHERE kode='$kode'");

		$aa=mysql_query("SELECT * FROM member WHERE username='$u'") or die (mysql_error());
		while($bb=mysql_fetch_array($aa)){
			$full=$bb['fullname'];
		}

		$cc=mysql_query("INSERT INTO borrowed VALUES('$full', '$judul', '$date', NULL, NULL, NULL)");
	
		if ($cc){
		echo "<script>alert('Buku Berhasil Dipinjam. Silahkan Ambil Buku -$judul- di Sekret ONLIB. Selamat Membaca :>')
				location.replace('book.php?id=$kode')</script>";
		}
		else {
			echo "<script>alert('Buku Gagal Dipinjam')
				location.replace('book.php?id=$kode')</script>";
		}
	}
	else if ($status=='Borrowed'){
		echo"<script>alert('Maaf, Buku $judul sedang dipinjam. Silahkan Pinjam Buku yang Lain')
			location.replace('book.php?id=$kode')</script>";
				}
	else{
		echo"gagal.";
	}

}
?>