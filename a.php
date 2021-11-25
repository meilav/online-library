<?php
session_start();
	if((empty($_SESSION["member"]))&&(empty($_SESSION["admin"]))){
		header('location:signin.php');
	} else {


include "connect.php";

	echo"<table cellpadding=10 cellspacing=5><tr>";

if (isset($_SESSION['admin'])){
	$query = mysql_query("SELECT * FROM admin WHERE username='$_SESSION[admin]'");
	while($row=mysql_fetch_array($query)){
		
		$uname=$row['username'];
		$name=$row['name'];
		$foto=$row['foto'];
		}
	echo"
		<td><img src=pic/$foto width=150 height=200></td>
		<td>
			<table>
				<tr><td>Nama</td><td>: $name</td></tr>
				<tr><td>Username</td><td>: $uname</td></tr>
			</table>
		</td>
	";	
}
if (isset($_SESSION['member'])){
	$query = mysql_query("SELECT * FROM member WHERE username='$_SESSION[member]'");
	while($row=mysql_fetch_array($query)){
		
		$uname=$row['username'];
		$name=$row['fullname'];
		$foto=$row['foto'];
		$nim=$row['nim'];
		$kom=$row['kom'];
		$jur=$row['jurusan'];
		$hp=$row['nohp'];
		$ala="$row[alamat]";
		
		}
	echo"
		<td><img src=pic/$foto width=150 height=200></td>
		<td>
			<table>
				<tr><td>Nama</td><td>: $name</td></tr>
				<tr><td>Username</td><td>: $uname</td></tr>
				<tr><td>NIM/KOM</td><td>: $nim/$kom</td></tr>
				<tr><td>Jurusan</td><td>: $jur</td></tr>
				<tr><td>No. HP</td><td>: $hp</td></tr>
				<tr><td>Alamat</td><td>: $ala</td></tr>
			</table>
		</td>
	";	


	echo"</tr></table>";

echo"
	<div id='rug5'>
	<div id='label'> Buku Yang Pernah Dipinjam </div>
	<br><Br>
	
	<table cellpadding='5' cellspacing='5'>
		<tr><th>Judul Buku</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th></tr>
	";
	$quero=(mysql_query("SELECT * FROM borrowed WHERE name='$name'"));
	while($row=mysql_fetch_array($quero)){
		$judul=$row['judul'];
		$tp=$row['tanggal_pinjam'];
		$tk=$row['tanggal_kembali'];

	echo"
		<td>$judul</td><td>$tp</td><td>$tk</td></tr>
		";
	}
	echo"</table>";
}	
	echo"</div>";

	}
?>