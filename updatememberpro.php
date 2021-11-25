<?
include"connect.php";
$fullname = "$_POST[fullname]";
$username = "$_POST[name]";
$pass = "$_POST[pass]";
$pertanyaan = "$_POST[pertanyaan]";
$jawaban = "$_POST[jawaban]";

$query=mysql_query("UPDATE member SET fullname ='$fullname', password='$pass', pertanyaan='$pertanyaan', jawaban='$jawaban' where username='$username'");

if($query)
{
	echo "<script>alert('Data Berhasil Di-Update')
    location.replace('member.php')</script>";
}
else
{
    echo "<script>alert('Data Gagal Di-Update')
    location.replace('member.php')</script>";
}


?>