<?php
	session_start();

//	if((empty($_SESSION["member"]))&&(empty($_SESSION["admin"]))){
//		header('location:signin.php');
//	} else {

	?>

<!doctype html>
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
		
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script src="js/modernizr.custom.17475.js"></script>
    </head>
    <body>
<img src="pic/e.jpg" width="100%" height="250">
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index2.php'><span>Home</span></a></li>
   <li class='has-sub'><a href='#'><span>Book</span></a>
	   <ul>
			<li><a href='bookshelves.php'><span>Bookshelves</span></a></li>
			<li><a href='booklist.php'><span>Book List</span></a></li>
			<li class='last'><a href='e-book.php'><span>E-Book</span></a></li>
	   </ul>
   </li>
   <li class='last'><a href='about.php'><span>About Us</span></a></li>
<?php
	if (isset($_SESSION["admin"])){
   echo "
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
         <li class='last'><a href='borrowed.php'><span>Borrowed Book</span></a></li>
      </ul>
	</li>
   <li class='has-sub'><a href='#'><span><img src='pic/user.png' width='15' height='13' > Admin $_SESSION[admin]</span></a>
      <ul>
	  <li><a href='account.php'><span>My Account</span></a></li>
         <li><a href='uploadbook.php'><span>Upload Book</span></a></li>
         <li class='last'><a href='signout.php'><span>Sign Out</span></a></li>
      </ul>
   </li> ";
}

else if (isset($_SESSION["member"])){
   echo "
   <li class='has-sub'><a href='#'><span>ONLIB On The Spot</span></a>
      <ul>
         <li class='last'><a href='OOTS.php'><span>About</span></a></li>
		</ul>
	</li>
   <li class='has-sub'><a href='#'><span><img src='pic/user.png' width='15' height='13' > $_SESSION[member]</span></a>
      <ul>
	  <li><a href='account.php'><span>My Account</span></a></li>
         <li class='last'><a href='signout.php'><span>Sign Out</span></a></li>
      </ul>
   </li> ";
	}

else if (!(((isset($_SESSION["admin"])))&&(isset($_SESSION["member"])))){
	echo"
   <li class='has-sub'><a href='#'><span>ONLIB On The Spot</span></a>
      <ul>
         <li class='last'><a href='OOTS.php'><span>About</span></a></li>
		</ul>
	</li>
	<li class='last'><a href='signin.php'><span><img src='pic/user.png' width='15' height='13' > Sign in</span></a></li>
	
	";
}
	
?>

</ul>
</div>
<div id="content">

	<center>
	<div id="section">
		<div id="rug5">
		<div id="label">Book List</div>
		<center>
<?php 
	if (!(isset($_GET['sort'])))
	{
		echo"<form action='booklist.php'>
			<select id='input'  name='sort'>
				<option value='G'>General
				<option value='L'>Literature
				<option value='I'>Islamic
				<option value='ST'>Science and Technology
			</select>
			<input type='submit' value='Lihat' id='button'>
			</form>";
	}
	else {

		include "connect.php";
		$sort = "$_GET[sort]";
		
		if ($sort == 'G'){

		echo"<form action='booklist.php'>
			<select id='input'  name='sort'>
				<option value='G'>General
				<option value='L'>Literature
				<option value='I'>Islamic
				<option value='ST'>Science and Technology
			</select>
			<input type='submit' value='Lihat' id='button'>
			</form>";

				echo"<table cellpadding='15' cellspacing='15' id='table'>";
				echo"<tr><th colspan=4><hr><br>General<br><br><hr></th></tr>";
				echo"<tr><th>No</th><th>Kode</th><th>Judul</th><th>Status</th></tr>";
				
					$query = "SELECT * FROM books where kategori='General'";
					$exe = mysql_query($query);
					$no = 1;
					while($row = mysql_fetch_array($exe))
					{
						$kode = $row['kode'];
						$judul = $row['judul'];
						$status = $row['status'];
					echo"
						<tr>
							<td>$no</td>
							<td>$kode</td>
							<td><a href='book.php?id=$kode'>$judul</a></td>
							<td>$status</td>
						</tr>
						";
						$no++;
					}
					echo"</table>";
		}
		else if ($sort == 'I'){
		
		echo"<form action='booklist.php'>
			<select id='input'  name='sort'>
				<option value='I'>Islamic
				<option value='G'>General
				<option value='L'>Literature
				<option value='ST'>Science and Technology
			</select>
			<input type='submit' value='Lihat' id='button'>
			</form>";

				echo"<table cellpadding='15' cellspacing='15' id='table'>";
				echo"<tr><th colspan='4'><hr><br>Islamic<br><br><hr></th></tr>";
				echo"<tr><th>No</th><th>Kode</th><th>Judul</th><th>Status</th></tr>";
				
					$query = "SELECT * FROM books where kategori='Islamic'";
					$exe = mysql_query($query);
					$no = 1;
					while($row = mysql_fetch_array($exe))
					{
						$kode = $row['kode'];
						$judul = $row['judul'];
						$status = $row['status'];
					echo"
						<tr>
							<td>$no</td>
							<td>$kode</td>
							<td><a href='book.php?id=$kode'>$judul</a></td>
							<td>$status</td>
						</tr>
						";
						$no++;
					}
					echo"</table>";
		}
		else if ($sort == 'L'){

		echo"<form action='booklist.php'>
			<select id='input'  name='sort'>
				<option value='L'>Literature
				<option value='G'>General
				<option value='I'>Islamic
				<option value='ST'>Science and Technology
			</select>
			<input type='submit' value='Lihat' id='button'>
			</form>";

				echo"<table cellpadding='15' cellspacing='15' id='table'>";
				echo"<tr><th colspan='4'><hr><br>Literature<br><br><hr></th></tr>";
				echo"<tr><th>No</th><th>Kode</th><th>Judul</th><th>Status</th></tr>";
				
					$query = "SELECT * FROM books where kategori='Literature'";
					$exe = mysql_query($query);
					$no = 1;
					while($row = mysql_fetch_array($exe))
					{
						$kode = $row['kode'];
						$judul = $row['judul'];
						$status = $row['status'];
					echo"
						<tr>
							<td>$no</td>
							<td>$kode</td>
							<td><a href='book.php?id=$kode'>$judul</a></td>
							<td>$status</td>
						</tr>
						";
						$no++;
					}
					echo"</table>";
		}
		else if ($sort == 'ST'){

		echo"<form action='booklist.php'>
			<select id='input'  name='sort'>
				<option value='ST'>Science and Technology
				<option value='G'>General
				<option value='L'>Literature
				<option value='I'>Islamic
			</select>
			<input type='submit' value='Lihat' id='button'>
			</form>";

				echo"<table cellpadding='15' cellspacing='15' id='table'>";
				echo"<tr><th colspan='4'><hr><br>Science and Technology<br><br><hr></th></tr>";
				echo"<tr><th>No</th><th>Kode</th><th>Judul</th><th>Status</th></tr>";
				
					$query = "SELECT * FROM books where kategori='Science and Technology'";
					$exe = mysql_query($query);
					$no = 1;
					while($row = mysql_fetch_array($exe))
					{
						$kode = $row['kode'];
						$judul = $row['judul'];
						$status = $row['status'];
					echo"
						<tr>
							<td>$no</td>
							<td>$kode</td>
							<td><a href='book.php?id=$kode'>$judul</a></td>
							<td>$status</td>
						</tr>
						";
						$no++;
					}
					echo"</table>";
		}
	}
	?>
		</center>

		</div>
	</div>
	</center>
	
	<div id="sidebar">
	
		<div id="title2"> Looking For Some Book? </div>
		<div id="rug2">
		<center>
		<form action="search.php" method="GET">
		<table align="center">
			<tr><td>
			<form action="search.php">
			<input id="input" type="text" name="keyword" placeholder="type a book title..."><input id="button" type="submit" value="Search" name="sb">
			</form>
			</td></tr>
			<tr><td>&nbsp;</td></tr>
		</table>
		</form>	
		</center>
		</div>
		
		<div id="title2"> Category </div>
		<div id="rug2" >
		<table >
			<tr><td>&nbsp;&nbsp;&nbsp;</td>
			<tr><td>&nbsp;&nbsp;&nbsp;</td>
				<td><font color="#104a73">
					> <a href="booklist.php?sort=ST">Computer</a><br>
					> <a href="booklist.php?sort=G">General</a><br>
					> <a href="booklist.php?sort=I">Islamic</a><br>
					> <a href="booklist.php?sort=L">Novel</a><br>
				</td></tr>
		</table>
		</div>
		
		<div id="title2"> Book Of The Week </div>
		<div id="rug2" >
<?php
		include"connect.php";
		
		$query="SELECT * FROM books ORDER BY rate DESC";
		$exe=mysql_query($query);
		$no=1;
		while ($row=mysql_fetch_array($exe)){

		$kode=$row['kode'];
		$cover=$row['cover'];
		$judul=$row['judul'];
		$kategori=$row['kategori'];
		$penulis=$row['penulis'];
		$deskripsi=$row['deskripsi'];


		if ($kategori=="General"){
			$dir='pic/books/general';
		}
		else if ($kategori=="Islamic"){
			$dir='pic/books/islamic';
		}
		else if($kategori=="Literature"){
			$dir='pic/books/literature';
		}
		else if ($kategori=="Science and Technology"){
			$dir='pic/books/ST';  
		}

	if ($no>1) {break;}
	else { 
		echo"
			<table id='table'>
				<tr>
					<td><a href='book.php?id=$kode'><img src='$dir/$cover' title='#$no-$judul' alt='$judul' id='img1' style='float: left;'></a></td>
					<td><h3>$judul</h3>
						<font size='3' ><i>$penulis</i></td>
				</tr>
			";
		if(strlen($deskripsi) > 200)
		{
			echo "<tr><td colspan='2' align='justify'> ".substr($deskripsi,0,150)."<a href='book.php?id=$kode'><i><font color='#104a73'> ...more</font></i></a></td></tr></table>";
		}
		else
		{
			echo"<tr><td colspan='2'><p align='justify'>$deskripsi</p></td></tr></table>";
		}
		$no++;
		} 		
	} 
?>
		</div>
		
		<div id="title2">Contact Us</div>
		<div id="rug2">
		<table align="center" cellpadding="5">
		<tr><td><div id="fb"><img src="pic/fb.png" id="logo" title="Online Library">&nbsp;  <a href="https://www.facebook.com/pages/Online-Library/624599667620494">Online Library</a></div></td><tr>
		<tr><td><div id="hp"> <img src="pic/phone.png" id="logo" title="0831-9786-7279"> &nbsp;0831-9786-7279</div></td></tr>
		<tr><td><div id="loc"> <img src="pic/loc.png" id="logo" title="Gedung S1 Ilmu Komputer USU">Gedung S1 Ilmu Komputer USU</div></tr></td>
		</table>
		</div>
		
	</div>
	
</div>

<div id="hf"></div>
<div id="footer">
	<center>
	<br>
	<font face="century gothic" color="#bdcdde">&copy; Ukmi Alkhuwarizmi 2015</font>
	</center>
	<div id="quote">
			<hr>
			<section class="cd-intro">
			<p class="cd-headline clip is-full-width">
				<span class="cd-words-wrapper waiting">
					<b class="is-visible">A book is the only place in which you can examine a fragile thought without breaking it</b>				
					<b>Great books help you understand, and they help you feel understood</b>
					<b>Always read something that will make you look good if you die in the middle of it</b>
					<b>Anyone who says they have only one life to live must not know how to read a book</b>
					<b>If we encounter a man of rare intellect, we should ask him what books he reads</b>
					<b>A book is a dream that you hold in your hand</b>
				</span>
			</p>
			</section> <!-- cd-intro -->
			<script src="js/jquery-2.1.1.js"></script>
			<script src="js/main.js"></script> <!-- Resource jQuery -->

	</div>
	
</div>
			
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquerypp.custom.js"></script>
		<script type="text/javascript" src="js/jquery.elastislide.js"></script>
		<script type="text/javascript">
			
			$( '#carousel' ).elastislide();
			
		</script>
    </body>
</html>
