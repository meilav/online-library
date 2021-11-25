<?
	session_start();
	if(empty($_SESSION["admin"])){
		header('location:signin.php');
	} else {

include"connect.php";


$pass = "$_POST[pass]";
$uname = "$_POST[uname]";

$query=mysql_query("UPDATE member SET password ='$pass', confirmedby = '$_SESSION[admin]' where username='$uname'");

if($query)
{
	echo "<script>alert('Member $uname Berhasil Dikonfirmasi')
    location.replace('memberreq.php')</script>";
}
else
{
    echo "<script>alert('Data Gagal Di-Update')
    location.replace('memberreq.php')</script>";
}

	}
?>