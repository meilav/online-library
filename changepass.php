<?php
session_start();
include"connect.php";

if(isset($_SESSION['member'])) {$u=$_SESSION['member'];}
if(isset($_SESSION['admin'])) {$u=$_SESSION['admin'];}
else { 
	if ((isset($_POST['user']))&&(isset($_POST['type']))) {
		$u=$_POST['user']; $type=$_POST['type'];
		}
	else {header('Location:signin.php');}
	}
require_once("connect.php");

if ($type=='member'){
	$sql=mysql_query("select password from member where username='$u'");
	$data=mysql_fetch_array($sql);
	$passlama=$data['password'];
}
else if ($type=='admin'){
	$sql2=mysql_query("select password from admin where username='$u'");
	$data2=mysql_fetch_array($sql2);
	$passlama2=$data2['password'];	
}


?>
<html>
	<head>
	   <title>ONLINE LIBRARY</title>
	   <meta charset='utf-8'>
	   <meta http-equiv="X-UA-Compatible" content="IE=edge">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	   <link rel="stylesheet" href="styles.css">
	   <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
		<link rel="stylesheet" href="css/style.css"> <!-- Resource style -->
		
	   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	   <script src="script.js"></script>
	   <script src="js/modernizr.js"></script> <!-- Modernizr -->
	   <script src="js/jquery.js"></script>

		<script language='Javascript'>
<?php	if ($type=='member'){ ?>
		function valpass(a){
		var pb1= a.pw1.value;
		var pb2= a.pw2.value;
		<?php 
		if (!isset($_POST['user'])){
		echo "pl= a.pw.value;
		if (pl!=\"".$passlama."\"){alert('Password Anda Salah');return false;}
		else";}?> if (pb1==pb2){return true}
		else {alert('konfirmasi Password tidak cocok');return false;}
		}
<?php } 
	else if ($type=='admin') { 
?>
		function valpass(a){
		var pb1= a.pw1.value;
		var pb2= a.pw2.value;
		<?php 
		if (!isset($_POST['user'])){
		echo "pl= a.pw.value;
		if (pl!=\"".$passlama2."\"){alert('Password Anda Salah');return false;}
		else";}?> if (pb1==pb2){return true}
		else {alert('konfirmasi Password tidak cocok');return false;}
		}
	<?php } ?>

		</script>
	</head>
<body>
<img src="pic/e.jpg" width="100%" height="250">
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.php'><span>Home</span></a></li>
   <li class='last'><a href='Bookshelf.php'><span>Bookshelf</span></a></li>
   <li class='last'><a href='ebook.php'><span>E-Book</span></a></li>
   <li class='last'><a href='about.php'><span>About Us</span></a></li>
   <li class='has-sub'><a href='#'><span>ONLIB On The Spot</span></a>
      <ul>
         <li><a href='OOTS.php'><span>About</span></a></li>
         <li class='last'><a href='GuestBook.php'><span>Guest Book</span></a></li>
      </ul>
   </li>
   <li class='last'><a href='signin.php'><span><img src="pic/user.png" width="15" height="13" > Sign in</span></a></li>
</ul>
</div>
<div id="content" style="height: 700px;">

	<center>
	<div id="section">
		<div id="rug">
		<div id="label"> Change Password </div>
		<center>
		<form action='changepro.php' method='post' onsubmit='return valpass(this)'>
		
		<?php
			if (!isset($_POST['user'])){
			echo "Password Lama : <br/><input type='password' name='pw' id='input'> <br/>";	
			}
		?>
		<table id='table' cellspacing="10">
			<tr><td>Password Baru</td><td>: <input type='password' name='pw1' id='input'></td></tr>
			<tr><td>Konfirmasi Password Baru</td><td>: <input type='password' name='pw2' id='input'></td></tr>
			<tr><td><input type='hidden' name='user' value='<?php echo $u;?>'>
					<input type='hidden' name='type' value='<?php echo $type;?>'></td>
				<td>&nbsp;&nbsp;<input type='submit' value='Change' id='button1'></td></tr>
		</table>
		</form>
		</center>
		</div>
	</div>
	</center>

	<div id="sidebar">
	
		<div id="sidecont">
		<div id="title"> Looking For Some Book? </div>
		<form action="search.php" method="GET">
		<table cellpadding="10" cellspacing="10">
			<tr><td>&nbsp;</td></tr>
			<tr><td><input id="input" type="text" name="search" placeholder="type a book title..."><input id="button" type="submit" value="Search"></td></tr>
		</table>
		</form>	
		</div>
		
		<div id="sidecont" >
		<div id="title"> Category </div>
		<table>
			<tr><td>&nbsp;&nbsp;&nbsp;</td>
			<tr><td>&nbsp;&nbsp;&nbsp;</td>
				<td>- Computer<br>
					- General<br>
					- Islamic<br>
					- Novel<br>
					- Tutorial</td></tr>
		</table>
		
		</div>
		
		<div id="sidecont" >
		<div id="title"> Book Of The Week </div>
		<img src="pic/index.jpg" id="img1" style="float: left;">
		<br>
		<h3>Hunger Games</h3>
		<i>Suzanne Collins</i><br>
		rate : 5 stars</br>
		<p align="justify">asdfghjklzxcvbnmqwertyuiopasdfghjklzx cvbnmmqwertyuioplkjhgfdsazxcv bnmpoiuytrewqasdfghjklmnbvcx asdfghjkhsdfd</p>
		</div>
		
	</div>

</div>

<div id="footer">
	<center>
	<img src="pic/logo.gif" width="220px" height="70">
	<div id="foot">
		<hr><br>
		<a href="https://www.facebook.com/pages/Online-Library/624599667620494"><div id="fb"><img src="pic/fb.png" id="logo"> Online Library </div></a>
		<div id="loc"><img src="pic/loc.png" id="logo"> Gedung S1 Ilmu Komputer USU </div>
		<div id="hp"><img src="pic/phone.png" id="logo"> 081246766815</div> </div>
	<font face="century gothic" color="#f4d8b7">&copy; Ukmi Alkhuwarizmi 2015</font>
	</center>
	<div id="quote">
			<br><hr>
			<section class="cd-intro">
			<p class="cd-headline clip is-full-width">
				<span class="cd-words-wrapper waiting">
					<b class="is-visible">A book is the only place in which you can examine a fragile thought without breaking it</b>				
					<b>Great books help you understand, and they help you feel understood</b>
					<b>Always read something that will make you look good if you die in the middle of it</b>
				</span>
				</font>
			</p>
			</section> <!-- cd-intro -->
			<script src="js/jquery-2.1.1.js"></script>
			<script src="js/main.js"></script> <!-- Resource jQuery -->

	</div>
	
</div>

</body>
<html>