<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php";



if ($_SESSION['session_edit']=="ya")
  {
function ubah_password ()
{
if(isset($_POST['ubah_password']))
{


if($_POST['password']=="")
{
$pass=$_POST['hidden_password'];
}
else
{
$pass=md5($_POST['password']);
}


include "../pengaturan.php";


$sql="update login set password='".$pass."' where id='".$_POST['id_login']."'";




if (mysqli_query($connect, $sql)) {

echo "<meta http-equiv=\"refresh\" content=\"0;URL=ganti_password.php?proses=Password Telah diubah\">";



} else {
 echo "Error: ".$sql.". ".mysqli_error($koneksi);
}



}
}
}










 ?>


<?php include "sidebar.php"; ?>










        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Ganti Password</h1>
                      
<?php
ubah_password();
if(isset($_GET['proses']))
{
echo "<font color=#0000FF>".$_GET['proses']."</font>";
}
?>
                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                <div class="row"></div>
                <!--/.Row--><!--/.Row--><!--/.ROW-->

            <form action="" method="post">

<table width="100%" border="1">
  <tr>
    <td width="26%">Username</td>
    <td width="74%"><input type="text" name="username" id="username" readonly="readonly" value="<?=$_SESSION['session_username'];?>" /></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><input type="password" name="password" id="password"  />
    
    <input name="hidden_password" type="hidden" id="hidden_password" value="<?=$_SESSION['session_password'];?>" />
    
    
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="ubah_password" id="ubah_password" value="Ubah" />
      <input name="id_login" type="hidden" id="id_login" value="<?=$_SESSION['session_idadmin'];?>" /></td>
  </tr>
</table>
</form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->

  <?php include "footer.php"; ?>
<?php
}
else
{

 echo "<meta http-equiv=\"refresh\" content=\"0;URL=../global/index.php?prs=Silahkan Login Dahulu\">";

}
?>