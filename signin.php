<html lang=''>
<head>
   <title>ONLINE LIBRARY</title>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="styles2.css">
   <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
	
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <script src="js/modernizr.js"></script> <!-- Modernizr -->
   <script src="js/jquery.js"></script>
	
   	<script> 
		$(document).ready(function(){
			$("#rug1").hide();
			
			$("#signup").click(function(){
				$("#rug3").hide("slow");
				$("#rug1").show("slow");
			});
			
			
		});
	</script>
   
</head>
<body>
<center>
	<a href="index.php"><img src="pic/logo.gif" id="img5" alt="Online Library" title="Online Library"></a>
	<div id="section">
	<center>
		<div id="rug3">
		<div id="label"> Sign In To Your Account</div>
		<br><br>
		<center>
<?php 
		echo'
		<form action="inprocess.php" method="POST">
		<table cellpadding="5" >
			<tr><td > 
				<select name="user" id="input">
					<option > - Pilih User -
					<option value="admin"> Admin
					<option value="member"> Member
				</select>
			</td></tr>
			<tr><td ><input id="input" type="text" name="name" placeholder="username"></td></tr>
			<tr><td ><input id="input" type="password" name="pass" placeholder="password"></td></tr>
			<tr><td align="right"><input id="button1" type="submit" value="Sign In"></td></tr>
			<tr><td align="center"><font color="#104a73" face="century gothic" size="2"><a href="forgotpass.php">Forgot Password?</a></font></td></tr>
			<tr><td align="center"><font color="#104a73" face="century gothic" size="2">Not a Member? <a href="#signup" id="signup"><b>Sign Up Now!</b></a>
		</table>
		</form> ';
error_reporting(0);
		$confirm = $_GET[c];
		if ($confirm == "null") {
			echo'<script>alert("Please Fill The Form"); </script>';}
		elseif($confirm=="npnull"){
			echo'<script>alert("Please Insert Your Username and Password");	</script>';}
		elseif($confirm=="nunull"){
			echo'<script>alert("Please Insert Your Username and User");	</script>';}
		elseif($confirm=="nnull"){
			echo'<script>alert("Please Insert Your Username");	</script>';}
		elseif($confirm=="punull"){
			echo'<script>alert("Please Insert Your User and Password ");	</script>';}
		elseif($confirm=="pnull"){
			echo'<script>alert("Please Insert Your Password");	</script>';}
		elseif($confirm=="usernull"){
			echo'<script>alert("Please Choose User Type");	</script>';}
		elseif($confirm=="wrong"){
			echo'<script>alert("Either Password or Username is Wrong"); </script>';}
?>
		</center>
		</div>
		<div id="rug1">
		<a name="signup"><div id="label"> New Account </div></a>
		
<?php
	echo'
		<form action="upprocess.php" method="POST">
		<table cellpadding="10" cellspacing="35">
			<tr>
				<td width="35%" align="right">
					<table cellpadding="5" >
						<tr><td><input id="input" type="text" name="fullname" placeholder="Nama Lengkap"></td></tr>
						<tr><td><input id="input" type="text" name="username" placeholder="Username"></td></tr>
						<tr><td><input id="input" type="text" name="nim" placeholder="NIM"></td></tr>
						<tr><td><input id="input" type="text" name="kelas" placeholder="Kelas"></td></tr>
						<tr><td><select id="input" name="jurusan">
								<option>- Jurusan -
								<option value="Ilmu Komputer"> Ilmu Komputer
								<option value="Teknologi Informasi"> Teknologi Informasi
								</select>
						<tr><td><input id="input" type="email" name="email" placeholder="Email"></td></tr>
						<tr><td><input id="input" type="text" name="nohp" placeholder="Nomor HP"></td></tr>
						<tr><td><input id="input" type="text" name="fb" placeholder="Facebook"></td></tr>
						<tr><td><textarea id="texta" type="text" name="alamat" placeholder="Alamat"></textarea></td></tr>
						<tr><td><textarea id="texta" type="text" name="alasan" placeholder="Alasan Jadi Anggota"></textarea></td></tr>
						<tr><td><textarea id="texta" type="text" name="pertanyaan" placeholder="Pertanyaan Keamanan"></textarea></td></tr>
						<tr><td><textarea id="texta" type="text" name="jawaban" placeholder="Jawaban"></textarea></td></tr>
					</table>
				</td>
				<td width="65%" valign="top" align="left">
					<font color="#104a73" face="century gothic" size="3">
					<b>Syarat Peminjaman Buku: </b> <br>
					<ol type="1">
						<li>Terdaftar sebagai anggota Online Library
						<li>Memiliki kartu anggota (Kartu anggota dapat diterima saat peminjaman buku pertama)
						<li>Maksimal 1 buku yang dapat dipinjam dalam satu periode peminjaman
						<li>Buku dikembalikan selambat-lambatnya seminggu setelah peminjaman 
						<li>Bila terlambat dari waktu yang ditentukan, wajib membayar denda Rp 1.000.00,- per hari pada hari pengembalian 
						<li>Bila buku yang dipinjam hilang, wajib diganti dengan buku yang sejenis 
						<li>Bila buku yang dipinjam rusak atau robek maka dikenakan denda sebesar Rp 5.000.00,-
					</ol></font>
				<font color="#104a73" face="century gothic" size="2"><br>
				<input type="checkbox" name="confirm" checked> Dengan Ini Saya Menyetujui Semua Persyaratan Dari Online Library </font>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="left">
					<font color="#104a73" face="century gothic" size="2"><i><b>*Password anda akan kami kirim melalui email yang anda cantumkan. Setelahnya anda bisa meminjam buku di Online Library sesuai ketentuan yang berlaku.<br><br>
					<input id="button1" style="width:100%;" type="submit" value="Send Request">
				</td>
			</tr>
		</table>
		</form>';
error_reporting(0);
		$confirm = $_GET[c];
		if ($confirm == "null") {
			echo'<script>alert("Silahkan Isi Formulirnya"); </script>';}
		elseif($confirm=="fnull"){
			echo'<script>alert("Silahkan Isi Nama Lengkap Anda");	</script>';}
		elseif($confirm=="nnull"){
			echo'<script>alert("Silahkan Isi Nama Panggilan Anda");	</script>';}
		elseif($confirm=="nimnull"){
			echo'<script>alert("Silahkan Isi NIM Anda");	</script>';}
		elseif($confirm=="knull"){
			echo'<script>alert("Silahkan Isi Kelas Anda ");	</script>';}
		elseif($confirm=="jnull"){
			echo'<script>alert("Silahkan Pilih Jurusan Anda ");	</script>';}
		elseif($confirm=="enull"){
			echo'<script>alert("Silahkan Isi User Anda ");	</script>';}
		elseif($confirm=="hpnull"){
			echo'<script>alert("Silahkan Isi Nomor HP Anda ");	</script>';}
		elseif($confirm=="fbnull"){
			echo'<script>alert("Silahkan Isi URL Akun Facebook Anda ");	</script>';}
		elseif($confirm=="alnull"){
			echo'<script>alert("Silahkan Isi Alamat Anda ");	</script>';}
		elseif($confirm=="alsnull"){
			echo'<script>alert("Silahkan Isi Alasan Anda Menjadi Anggota ONLIB");	</script>';}
		elseif($confirm=="pernull"){
			echo'<script>alert("Silahkan Isi Pertanyaan Keamanan Anda ");	</script>';}
		elseif($confirm=="jawnull"){
			echo'<script>alert("Silahkan Isi Jawaban Anda ");	</script>';}
		
?>
		</div>
	</center>
	</div>

	<br><br>
	Back To <a href="index.php">ONLINE LIBRARY</a>
	<br><Br><BR>
</center>
</body>
<html>