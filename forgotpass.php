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
   
</head>
<body>
<center>
	<a href="index.php"><img src="pic/logo.gif" id="img5" alt="Online Library" title="Online Library"></a>
		<div id="rug3">
		<div id="label"> Forgot Password? </div>
		<center>
		<?php 

			if ((!isset($_POST['type']))&&(!isset($_POST['u'])) ) {
				echo"<form action='forgotpass.php' method='post'>
				<table id='table' cellspacing='10'>
					<tr><td>Pilih Type Pengguna</td>
						<td > 
						: <select name='type' id='input'>
							<option > - - - </option>
							<option value='admin'> Admin </option>
							<option value='member'> Member </option>
						</select>
					</td></tr>
					<tr><td>Username Anda</td>
						<td>: <input type='text' name='u' id='input'></td></tr>
					<tr><td>&nbsp;</td>
						<td>&nbsp;&nbsp;<input type='submit' value='SUBMIT' id='button1'></td></tr>
				</table>
				</form>";
				}
			else {
				if ($type=="member"){ 
				if ($j==0){
					echo" <font face='verdana' color='#591e23'> Username <i> $u </i> tidak ditemukan </font>";
					}
				else {
					echo"
					<table id='table' cellspacing='5'>
						<tr><td >Username</td><td>: <b>$u</b></td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td>Nama Lengkap </td><td>: <b> ".$fullname." </b></td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td colspan='2' align='center'>Silahkan Jawab Pertanyaan Keamanan Anda berikut: </td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td valign='top'><form action='changepass.php' method='post' onsubmit='return val(this)'>
								Pertanyaan </td><td valign='top'>: <textarea id='texta' >".$pertanyaan."</textarea></td></tr>
						<tr><td valign='top'>Jawaban </td><td valign='top'>: <textarea type='text' name='jawaban' id='texta'></textarea>
														<input type='hidden' name='user' value='".$u."'></td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;&nbsp;<input type='submit' value='SUBMIT' id='button1'></td></tr>
					</table>";
					
				}
				}
				else if ($type=="admin"){ 
				if ($j2==0){
					echo" <font face='verdana' color='#591e23'> Username <i> $u </i> tidak ditemukan </font>";
					}
				else {
					echo"
					<table id='table' cellspacing='5'>
						<tr><td >Username</td><td>: <b>$u</b></td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td>Nama Lengkap </td><td>: <b> ".$fullname." </b></td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td colspan='2' align='center'>Silahkan Jawab Pertanyaan Keamanan Anda berikut: </td></tr>
						<tr><td colspan='2'>&nbsp;</td></tr>
						<tr><td valign='top'><form action='changepass.php' method='post' onsubmit='return val(this)'>
								Pertanyaan </td><td valign='top'>: <textarea id='texta' >".$pertanyaan."</textarea></td></tr>
						<tr><td valign='top'>Jawaban </td><td valign='top'>: <textarea type='text' name='jawaban' id='texta'></textarea>
														<input type='hidden' name='user' value='".$u."'>
														<input type='hidden' name='type' value='".$type."'></td></tr>
						<tr><td>&nbsp;</td><td>&nbsp;&nbsp;<input type='submit' value='SUBMIT' id='button1'></td></tr>
					</table>";
					
				}
				}
				else {
					echo "<script language=javascript>alert('Silahkan Pilih Type Pengguna');
					document.location.href='forgotpass.php';</script>"; 
				}
				}
		?>
		</center>
		</div>

	<br><Br>
	<button id="but"><a href="signin.php">Sign In</a></button>
	<br><br>
	Back To <a href="index.php">ONLINE LIBRARY</a>
	<br><Br><BR>

</center>
</body>
</html>