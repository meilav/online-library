<?php
	session_start();
	if((empty($_SESSION["member"]))&&(empty($_SESSION["admin"]))){
		header('location:signin.php');
	} else {
	
	$a=(mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='$_SESSION[member]'")));
	while($a){
		$nama=$a['fullname'];
	}
	?>
html>
<body>
<div id="rug">
<form action="commentpro.php" method="POST">
<table>
	<tr>
		<td>Email</td><td>: <input type="email" name="email" id="input1">
							<input type="hidden" name="name" value="<?php echo$nama; ?>"></td>
	</tr>
	<tr>
		<td>Komentar</td><td>: <textarea name="komen" id="texta1"><textarea>
								<input type="hidden" name="kode" value="<?php echo$kode; ?>"></td>
	</tr>
	<tr>
		<td colspan="2"><input type="submit" value="Submit" id="button3"></td>
	</tr>
</table>
</form>
</div>
</body>
</html>