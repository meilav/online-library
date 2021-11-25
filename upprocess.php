<?php
include"connect.php";

	$fullname="$_POST[fullname]";
	$username="$_POST[username]";
	$nim="$_POST[nim]";
	$kelas="$_POST[kelas]";
	$jurusan="$_POST[jurusan]";
	$email="$_POST[email]";
	$nohp="$_POST[nohp]";
	$fb="$_POST[fb]";
	$alamat="$_POST[alamat]";
	$alasan="$_POST[alasan]";
	$pertanyaan="$_POST[pertanyaan]";
	$jawaban="$_POST[jawaban]";
	
if ($fullname=="" && $username=="" && $nim=="" && $kelas=="" &&
	$jurusan=="" && $email=="" && $nohp=="" && $fb=="" && $alamat=="" && $alasan=="" && $pertanyaan=="" && $jawaban=="")
	{ header ('location:signin.php?c=null'); }
elseif ($fullname=="")
	{ header ('location: signin.php?c=fnull'); }
elseif ($username=="")
	{ header ('location: signin.php?c=nnull'); }
elseif ($nim=="")
	{ header ('location: signin.php?c=nimnull'); }
elseif ($kelas=="")
	{ header ('location: signin.php?c=knull'); }
elseif ($jurusan=="")
	{ header ('location: signin.php?c=jnull'); }
elseif ($email=="")
	{ header ('location: signin.php?c=enull'); }
elseif ($nohp=="")
	{ header ('location: signin.php?c=hpnull'); }
elseif ($fb=="")
	{ header ('location: signin.php?c=fbnull'); }
elseif ($alamat=="")
	{ header ('location: signin.php?c=alnull'); }
elseif ($alasan=="")
	{ header ('location: signin.php?c=alsnull'); }
elseif ($pertanyaan=="")
	{ header ('location: signin.php?c=pernull'); }
elseif ($jawaban=="")
	{ header ('location: signin.php?c=jawnull'); }
else {
	$query= mysql_query("INSERT INTO member SET fullname='$fullname', username='$username', nim='$nim', kom='$kelas',
	jurusan='$jurusan', email='$email', nohp='$nohp', fb='$fb', alamat='$alamat', alasan='$alasan', pertanyaan='$pertanyaan', jawaban='$jawaban'");
	
	if ($query)
	{
		echo "<script language=javascript>alert('Terima Kasih Sudah Mendaftar Menjadi Anggota Online Library. Untuk Sementara Silahkan Lihat Koleksi Buku Kami :>');
		document.location.href='bookshelf.php';</script>"; 
		
	}
	else
	{
		echo "<script language=javascript>alert('Data Anda Gagal Dimasukkan Ke Dalam Database. Silahkan Mendaftar Lagi. Terima Kasih.');
		document.location.href='signin.php#signup';</script>"; 
	}
	
}

?>