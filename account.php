<?php
session_start();
	if((empty($_SESSION["member"]))&&(empty($_SESSION["admin"]))){
		header('location:signin.php');
	} else {
		include"connect.php";
	
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
		
		<link rel="shortcut icon" href="../favicon.ico"> 
		<link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/elastislide.css" />
		<link rel="stylesheet" type="text/css" href="css/custom.css" />
		<script src="js/modernizr.custom.17475.js"></script>
    </head>
    <body>
<img src="pic/e.jpg" width="100%" height="250">
<img src="pic/logo.gif" id="lo">
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
         <li><a href='upload-ebook.php'><span>Upload E-Book</span></a></li>
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
?>

</ul>
</div>
<div id="content">

	<center>
	<div id="section">
		<div id="rug5">
		<div id="label"> My Account </div>
	<center>
<?php
	if((empty($_SESSION["member"]))&&(empty($_SESSION["admin"]))){
		header('location:signin.php');
	} else {


include "connect.php";

	echo"<table cellpadding=10 cellspacing=5 align='center'><tr>";

if (isset($_SESSION['admin'])){
	$query = mysql_query("SELECT * FROM admin WHERE username='$_SESSION[admin]'");
	while($row=mysql_fetch_array($query)){
		
		$uname=$row['username'];
		$name=$row['name'];
		$foto=$row['foto'];
		}
	echo"
		<td><img src=pic/$foto id='pp'></td>
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
		<td><img src=pic/$foto id='pp'></td>
		<td>
			<table cellpadding='10' cellspacing='10' id='table'>
				<tr><td>Nama</td><td>: <b>$name</b></td></tr>
				<tr><td>Username</td><td>: <b>$uname</b></td></tr>
				<tr><td>NIM/KOM</td><td>: <b>$nim/$kom</b></td></tr>
				<tr><td>Jurusan</td><td>: <B>$jur</b></td></tr>
				<tr><td>No. HP</td><td>: <B>$hp</b></td></tr>
				<tr><td>Alamat</td><td>: <B>$ala</b></td></tr>
			</table>
		</td>
	";	


	echo"</tr></table>";

echo"
	<div id='rug5'>
	<table cellpadding='10' cellspacing='10' id='table'>
		<tr><th colspan='3'><h3>Buku Yang Pernah Dipinjam</h3><br><hr></th></tr>
	";
	$quero=(mysql_query("SELECT * FROM borrowed WHERE name='$name'"));
	$data=mysql_num_rows($quero);

	if($data==0){
		echo"<tr><td colspan='3'><br><br>Belum ada buku yang pernah dipinjam.</td></tr>";
	}
	else{
	echo"
		<tr><th>Judul Buku</th><th>Tanggal Pinjam</th><th>Tanggal Kembali</th></tr>
		<tr><td colspan='3'><hr></td></tr>
		";
		while($row=mysql_fetch_array($quero)){
			$judul=$row['judul'];
			$tp=$row['tanggal_pinjam'];
			$tk=$row['tanggal_kembali'];

		
		echo"
			<td>$judul</td><td align='center'>$tp</td><td align='center'>$tk</td></tr>
			";
		}
	}
	echo"</table>";
}	
	echo"</div>";

	}
?>
		</center>
		</div>

		<div id="rug5">
		<div id="label"> My Account </div>
		<div id="table">
			<form action="proses-upload-foto.php" enctype="multipart/form-data" method="POST">  
			Browse Foto : <input name="userfile" type="file">  
			<br><br>
			<button type="submit" id="button1">Upload Foto</button>
			</form> 
		</div>
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
	<font face="bookman old style" color="#bdcdde" size="4">&copy; UKMI Al-Khuwarizmi 2015</font>
	<br><br>
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

	<?php } ?>