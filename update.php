<?php
	session_start();
	if(empty($_SESSION["admin"])){
		header('location:signin.php');
	} else {
		
	include"connect.php";
	$id=$_GET['id'];
	$query=mysql_query("SELECT * FROM admin WHERE username='$id'") or die (mysql_error());
	while($row=mysql_fetch_array($query)){
		$fullname=$row['name'];
		$username=$row['username'];
		$pass=$row['password'];
		$pertanyaan=$row['pertanyaan'];
		$jawaban=$row['jawaban'];
		
	}
	?>

<!doctype html>
<html lang=''>
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
</head>
<body>
<img src="pic/e.jpg" width="100%" height="250">
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index2.php'><span>Home</span></a></li>
   <li class='last'><a href='Bookshelf.php'><span>Bookshelf</span></a></li>
   <li class='last'><a href='ebook.php'><span>E-Book</span></a></li>
   <li class='last'><a href='about.php'><span>About Us</span></a></li>
   <li class='has-sub'><a href='#'><span>ONLIB On The Spot</span></a>
      <ul>
         <li><a href='OOTS.php'><span>About</span></a></li>
         <li class='last'><a href='GuestBook.php'><span>Guest Book</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='#'><span>Admin</span></a>
      <ul>
		<li><a href='member.php'><span>View Member</span></a></li>
         <li><a href='admin.php'><span>View Admin</span></a></li>
         <li class='last'><a href='addadmin.php'><span>Add Admin</span></a></li>
      </ul>
   </li>
   <li class='has-sub'><a href='about.php'><span>Notification</span></a>
      <ul>
         <li><a href='memberreq.php'><span>Member Request</span></a></li>
         <li class='last'><a href='bookreq.php'><span>Book Request</span></a></li>
      </ul>
	</li>
   <li class='has-sub'><a href='#'><span><img src="pic/user.png" width="15" height="13" > Admin <? echo"$_SESSION[admin]";?></span></a>
      <ul>
	  <li><a href='account.php'><span>My Account</span></a></li>
         <li><a href='editbook.php'><span>Upload/Edit Book</span></a></li>
         <li><a href='editbookshelf.php'><span>Edit Bookshelf</span></a></li>
         <li class='last'><a href='signout.php'><span>Sign Out</span></a></li>
      </ul>   
   </li>
</ul>
</div>
<div id="content">

	<center>
	<div id="section">
		<div id="rug">
		<div id="label"> Update Admin <?php echo "$_SESSION[admin]"; ?>'s Data </div>
		<center>

		<form action="updatepro.php" method="POST">
		<table cellpadding="10" cellspacing="10" id="table">
			<tr><td>Nama Lengkap</td><td >: <input id="input" type="text" name="fullname" value=" <?php echo $fullname ?>"></td></tr>
			<tr><td>Username</td><td >: <input id="input" type="text" name="name" value=" <?php echo $username ?> "readonly></td></tr>
			<tr><td>Password</td><td >: <input id="input" type="text" name="pass" value=" <?php echo $pass ?>"></td></tr>
			<tr><td valign="top">Pertanyaan Keamanan</td><td valign="top">: <textarea id="texta" name="pertanyaan" ><?php echo $pertanyaan ?></textarea></td></tr>
			<tr><td valign="top">Jawaban</td><td valign="top">: <textarea id="texta" name="jawaban"><?php echo $jawaban ?></textarea></td></tr>
			<tr><td>&nbsp;</td><td >&nbsp; <input id="button1" type="submit" value="Update"></td></tr>
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
				<td align="left">- Computer<br>
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
	<?php } ?>