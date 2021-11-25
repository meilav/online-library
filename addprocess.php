<?php
session_start();
error_reporting(0);
include "connect.php";

	$username = $_POST['name'];
	$password = $_POST['pass'];
	$fullname = $_POST['fullname'];
	$pertanyaan	= $_POST['pertanyaan'];
	$jawaban	= $_POST['jawaban'];

if ($username== null && $password== null){
	header('location: addadmin.php?m=kosong');
}
elseif ($username == null && $password != null){
	header('location: addadmin.php?m=ukosong');
}
elseif($username!= null && $password== null){
	header('location: addadmin.php?m=pkosong');
}
elseif($fullname == null){
	header('location: addadmin.php?m=fkosong');
}
elseif($pertanyaan == null){
	header('location: addadmin.php?m=perkosong');
}
elseif($jawaban == null){
	header('location: addadmin.php?m=jkosong');
}
else{
	$query= mysql_query("INSERT INTO admin SET username='$username', password='$password', name='$fullname', pertanyaan='$pertanyaan', jawaban='$jawaban'");
	if ($query)
	{
		$_SESSION['fulladmin'] = $fullname;
		$_SESSION['pertanyaan'] = $pertanyaan;
		$_SESSION['jawaban'] = $jawaban;
		
		echo "<script language=javascript>alert('Admin $username has been successfully added!');
					document.location.href='index2.php';</script>"; 
	}
	else {
			echo "<script language=javascript>alert('Admin Gagal ditambahkan ke Database.');
		document.location.href='addadmin.php';</script>"; 
		
	}
}
?>