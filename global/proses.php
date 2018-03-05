<?php
session_start();
include "../pengaturan.php";

$username=$_POST['username'];
$password=md5($_POST['password']);


function quote_smart($value)
{
   // Stripslashes
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }
   // Quote if not a number or a numeric string
   if (!is_numeric($value)) {
       $value = "'" . mysql_real_escape_string($value) . "'";
   }
   return $value;
}


$login=sprintf("SELECT * FROM login WHERE username='$username' AND password='$password'");


$login2=mysqli_query($connect,$login);


$jumlah=mysqli_num_rows($login2);
$urai=mysqli_fetch_array($login2);



echo $urai['username'];

//exit();



$id=$urai['id'];
$username=$urai['username'];
$password=$urai['password'];

$nama=$urai['nama'];

$tambah=$urai['tambah'];
$edit=$urai['edit'];
$hapus=$urai['hapus'];
$usermanagement=$urai['usermanagement'];



$id_prodi=$urai['id_prodi'];

$id_fakultas=$urai['id_fakultas'];



$_SESSION['id_prodi']=$id_prodi;
$_SESSION['id_fakultas']=$id_fakultas;






$_SESSION['session_idadmin']=$id;
$_SESSION['session_username']=$username;
$_SESSION['session_password']=$password;



$_SESSION['session_nama']=$nama;

$_SESSION['session_tambah']=$tambah;

$_SESSION['session_edit']=$edit;

$_SESSION['session_hapus']=$hapus;

$_SESSION['session_usermanagement']=$usermanagement;





if($jumlah>=1)
{
 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../admin/index.php\">";

}
else
{
?>
<script language="javascript">
alert("Maaf user dan password anda salah klik OK untuk kembali");
history.back();
</script>

<?php
}

?>