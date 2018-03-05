<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php";


$nmfakultas=mysqli_query($connect, "select*from fakultas");

if(isset($_GET['idfakultas']))
{
$nmprodi=mysqli_query($connect, "select*from prodi where id_fakultas='".$_GET['idfakultas']."'");
}




if ($_SESSION['session_tambah']=="ya")
  {
function ubah_usermanagement ()
{
if(isset($_POST['ubah_usermanagement']))
{




include "../pengaturan.php";

$sebagai='admin';


if($_POST['password']=="")
{
$pass=$_POST['password_hidden'];	
}
else
{
$pass=md5($_POST['password']);	

}


$sql = "update login set username='".$_POST['username']."', password='".$pass."', nama='".$_POST['nama']."', tambah='".$_POST['tambah']."', edit='".$_POST['edit']."', hapus='".$_POST['hapus']."', usermanagement='".$_POST['user']."'



 where id='".$_POST['id']."'";
 
if (mysqli_query($connect, $sql)) {

echo "<meta http-equiv=\"refresh\" content=\"0;URL=usermanagement.php?proses=Data Telah Diubah...\">";



} else {
 echo "Error: ".$sql.". ".mysqli_error($koneksi);
}



}
}
}



ubah_usermanagement();













 ?>


<?php include "sidebar.php"; ?>










        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit User</h1>
                      

                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                <div class="row"></div>
                <!--/.Row--><!--/.Row--><!--/.ROW-->
                <?php
			$login=mysqli_query($connect,"select*from login where id='".$_GET['id']."'");
			while($uraikan=mysqli_fetch_array($login))
			{			
			?>
	  </table>
		<table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#F3F3F3">
		<form method="post" action="">
        <tr>
          <td width="26%" >Username</td>
          <td width="74%" ><input name="username" type="text" id="username" value="<?php echo $uraikan['username']; ?>"></td>
        </tr>
        <tr>
          <td >Password</td>
          <td ><input name="password" type="password" id="password" >
          <input name="password_hidden" type="hidden" id="password_hidden" value="<?php echo $uraikan['password']; ?>" /></td>
        </tr>
        <tr>
          <td >Nama</td>
          <td ><input name="nama" type="text" id="nama" size="30" value="<?php echo $uraikan['nama']; ?>" /></td>
        </tr>
        <tr>
          <td >Pengaturan Admin </td>
          <td ><table width="230" border="0"  cellpadding="5" cellspacing="1" bgcolor="#D2D2FF">
            <tr>
              <td width="108" bgcolor="#F2F2F2">Jenis Akses</td>
              <td width="33" bgcolor="#FFFFFF"><div align="center">Ya</div></td>
              <td width="43" bgcolor="#FFFFFF"><div align="center">Tidak</div></td>
            </tr>
            <tr>
              <td bgcolor="#F2F2F2">Tambah</td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="tambah" type="radio" value="ya" <?php if($uraikan['tambah']=="ya") { echo "checked"; } ?> />
              </div></td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="tambah" type="radio" value="tidak" <?php if($uraikan['tambah']=="tidak") { echo "checked"; } ?>/>
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#F2F2F2">Edit</td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="edit" type="radio" value="ya" <?php if($uraikan['edit']=="ya") { echo "checked"; } ?>/>
              </div></td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="edit" type="radio" value="tidak" <?php if($uraikan['edit']=="tidak") { echo "checked"; } ?>/>
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#F2F2F2">Hapus</td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="hapus" type="radio" value="ya" <?php if($uraikan['hapus']=="ya") { echo "checked"; } ?>/>
              </div></td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="hapus" type="radio" value="tidak" <?php if($uraikan['hapus']=="tidak") { echo "checked"; } ?>/>
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#F2F2F2">Usermanagement </td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="user" type="radio" value="ya" <?php if($uraikan['usermanagement']=="ya") { echo "checked"; } ?>/>
              </div></td>
              <td bgcolor="#FFFFFF"><div align="center">
                  <input name="user" type="radio" value="tidak" <?php if($uraikan['usermanagement']=="tidak") { echo "checked"; } ?>/>
              </div></td>
            </tr>
          </table></td>
        </tr>
        
        <tr>
          <td ><input name="id" type="hidden" id="id" value="<?php echo $uraikan['id']; ?>" /></td>
          <td ><input name="ubah_usermanagement" type="submit" id="ubah_usermanagement" value="Ubah" /></td>
        </tr>
		</form>
      </table>
	  
	  <?php
			}
			?>

                
                
      
                
                
                
                
                
                
                
                
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