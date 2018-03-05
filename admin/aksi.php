<?php 
include "../pengaturan.php";

$jumc=count($_POST['nim']);


//echo $jumc;

//exit();
//for
for($i=0; $i<=($jumc-1); $i++)
{

$nim=$_POST['nim'][$i];
$id_login=$_POST['idlogin'];
$id_random=$_POST['id_random'];


mysqli_query($connect, "insert into calon_prestasi_mahasiswa values('','$nim','$id_login', '$id_random')");


}// akhir for

?>