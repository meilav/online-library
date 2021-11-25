<?php
include"connect.php";

$id= $_GET['id'];
 
$query="DELETE from admin where username='$id'";
$exe=mysql_query($query);
 
if ($exe)
{
    echo "<script>alert('Admin Berhasil Dihapus')
    location.replace('admin.php')</script>";
}
else
{
    echo "<script>alert('Admin Gagal Dihapus')
    location.replace('admin.php')</script>";
}
?>