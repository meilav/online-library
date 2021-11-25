<?php
include"connect.php";

$id= $_GET['id'];
 
$query="DELETE from member where username='$id'";
$exe=mysql_query($query);
 
if ($exe)
{
    echo "<script>alert('Member Berhasil Dihapus')
    location.replace('memberreq.php')</script>";
}
else
{
    echo "<script>alert('Member Gagal Dihapus')
    location.replace('memberreq.php')</script>";
}
?>