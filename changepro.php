<?php
session_start();

include "connect.php";
$user = $_POST['user'];
$type = $_POST['type'];
$pb = $_POST['pw1'];


if ($type=='member')
{
	$sql=mysql_query("update member set password='$pb' where username='$user'");

	if ($sql){
		$_SESSION['member'] = $user;		

//		header('Location:index1.php');

		echo "<script language=javascript>alert('Password Anda Berhasil Diganti. Jangan Lupa Lagi Yaa :>');
					document.location.href='index1.php';</script>";

		}
else {
		echo "<script language=javascript>alert('Password Gagal Diganti. Silahkan Coba Lagi');
					document.location.href='forgotpass.php';</script>"; 		
	
	}
	}
else if ($type=='admin')
{
	$sql2=mysql_query("update admin set password='$pb' where username='$user'");

	if ($sql2){	
		$_SESSION['admin'] = $user;		

	//		header('Location:index1.php');

			echo "<script language=javascript>alert('Password Anda Berhasil Diganti. Jangan Lupa Lagi Yaa :>');
						document.location.href='index2.php';</script>";

			}
	else {
			echo "<script language=javascript>alert('Password Gagal Diganti. Silahkan Coba Lagi');
						document.location.href='forgotpass.php';</script>"; 		
		
		}
}
?>