<?php 
include "../pengaturan.php";

$jumc=count($_POST['id_dosen']);


//echo $jumc;

//exit();
//for
for($i=0; $i<=($jumc-1); $i++)
{

$id_dosen=$_POST['id_dosen'][$i];
$id_login=$_POST['idlogin'];

$id_random=$_POST['id_random'];


mysqli_query($connect, "insert into calon_prestasi_dosen values('','$id_dosen','$id_login', '$id_random')");


}// akhir for

?>