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
function tambah_usermanagement ()
{
if(isset($_POST['tambah_usermanagement']))
{




include "../pengaturan.php";

$sebagai='admin';


$sql = "insert into login (
username, 
password, 
nama, 
tambah, 
edit, 
hapus, 
usermanagement, 
id_fakultas, 
id_prodi) values (

'".$_POST['username']."',
'".md5($_POST['password'])."', 
'".$_POST['nama']."',
'".$_POST['tambah']."',
'".$_POST['edit']."',
'".$_POST['hapus']."',
'".$_POST['user']."',
'".$_POST['id_fakultas']."',
'".$_POST['id_prodi']."'



)";
 
if (mysqli_query($connect, $sql)) {

echo "<meta http-equiv=\"refresh\" content=\"0;URL=usermanagement.php?proses=Data Telah Ditambah...\">";



} else {
 echo "Error: ".$sql.". ".mysqli_error($koneksi);
}



}
}
}



tambah_usermanagement();






//hapus gakery
if ($_SESSION['session_hapus']=="ya")
  {
if(isset($_GET['action']) and $_GET['action']=="hapususer")
{
//include "../pengaturan.php";



$sql=mysqli_query($connect, "delete from login where id='".$_GET['idlogin']."'");



if($sql)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=usermanagement.php\">";

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
                        <h1 class="page-head-line">User Managemen</h1>
                      

                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                <div class="row"></div>
                <!--/.Row--><!--/.Row--><!--/.ROW-->
                <table width="100%"  border="0" cellpadding="5" cellspacing="0" bgcolor="#E1FFE1">
                  <form method="post" action="">
                  
                  
                  
             <tr>
          <td bgcolor="#FFEED5" >Fakultas</td>
          <td bgcolor="#FFEED5" >
          
          
          
          
          
       <select name="select" onchange="MM_jumpMenu('parent',this,1)">
    
      
     <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
	<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idfakultas=121" <?php if(isset($_GET['idfakultas']) and $_GET['idfakultas']=="121") { echo "selected"; }?> >UKM dan Kegiatan Lainnya</option>
      
      <?php
		
		  while($uraikan=mysqli_fetch_array($nmfakultas))
		  {
		 ?>
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>?idfakultas=<?php echo $uraikan['id_fakultas']; ?>" <?php if(isset($_GET['idfakultas']) and $_GET['idfakultas']==$uraikan['id_fakultas']) { echo "selected"; } ?>>
        <?php echo $uraikan['fakultas'] ; ?>
        </option>
      <?php
		  }
		  ?>
    </select>
    
    <input name="id_fakultas" type="hidden" id="id_fakultas" value="<?=$_GET['idfakultas']; ?>" />   
          
          
          </td>
        </tr>
        <tr>
          <td bgcolor="#FFEED5" >Prodi</td>
          <td bgcolor="#FFEED5" >
          <div id='prodi'>
          
          
          
          <select name="id_prodi" onchange='Dinamisprodi(this);' >
            <option value="">Pilih ..</option>
            <?php
		
		  while($uraikan1=mysqli_fetch_array($nmprodi))
		  {
		  
		  ?>
            <option value="<?=$uraikan1['id_prodi']; ?>">          <?=$uraikan1['prodi']; ?>      </option>
            <?php
		  
		  
		  
		  
		  }
		  ?>
          </select>
          
          
          
          
          
          
          
          
          
          
          </div>
          
          
          
          
          
          
          
          </td>
        </tr>     
        
      
                  
                    <tr>
                      <td width="26%" bgcolor="#FFEED5" >Username</td>
                      <td width="74%" bgcolor="#FFEED5" ><input name="username" type="text" id="username" size="30"></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFEED5" >Password</td>
                      <td bgcolor="#FFEED5" ><input name="password" type="password" id="password" size="30"></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFEED5" >Nama</td>
                      <td bgcolor="#FFEED5" ><input name="nama" type="text" id="nama" size="30" /></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFEED5" >Pengaturan Admin </td>
                      <td bgcolor="#FFEED5" ><table width="230" border="0"  cellpadding="5" cellspacing="1" bgcolor="#D2D2FF">
                        <tr>
                          <td width="108" bgcolor="#F2F2F2">Jenis Akses</td>
                          <td width="33" bgcolor="#FFFFFF"><div align="center">Ya</div></td>
                          <td width="43" bgcolor="#FFFFFF"><div align="center">Tidak</div></td>
                        </tr>
                        <tr>
                          <td bgcolor="#F2F2F2">Tambah</td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="tambah" type="radio" value="ya" />
                          </div></td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="tambah" type="radio" value="tidak" />
                          </div></td>
                        </tr>
                        <tr>
                          <td bgcolor="#F2F2F2">Edit</td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="edit" type="radio" value="ya" />
                          </div></td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="edit" type="radio" value="tidak" />
                          </div></td>
                        </tr>
                        <tr>
                          <td bgcolor="#F2F2F2">Hapus</td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="hapus" type="radio" value="ya" />
                          </div></td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="hapus" type="radio" value="tidak" />
                          </div></td>
                        </tr>
                        <tr>
                          <td bgcolor="#F2F2F2">Usermanagement </td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="user" type="radio" value="ya" />
                          </div></td>
                          <td bgcolor="#FFFFFF"><div align="center">
                            <input name="user" type="radio" value="tidak" />
                          </div></td>
                        </tr>
                       
                      </table></td>
                    </tr>
                    <tr>
                      <td bgcolor="#FFEED5" >&nbsp;</td>
                      <td bgcolor="#FFEED5" ><input name="tambah_usermanagement" type="submit" id="tambah_usermanagement" value="Simpan" /></td>
                    </tr>
                  </form>
                </table>
                
                
                
        <br />
	  <?php
			$login=mysqli_query($connect, "select*from login  order by id desc");
			while($uraikan=mysqli_fetch_array($login))
			{			
			?>
            <table width="100%" border="0" cellspacing="1" cellpadding="3">
            
              <tr>
                <td width="26%">Nama</td>
                <td width="74%"><?php echo $uraikan['nama']; ?></td>
              </tr>
              <tr>
                <td>Pengaturan Admin </td>
                <td><table width="230" border="0"  cellpadding="5" cellspacing="1" bgcolor="#D2D2FF">
                  
                  <tr>
                    <td width="143" bgcolor="#F2F2F2">Tambah</td>
                    <td width="64" bgcolor="#FFFFFF"><?php echo $uraikan['tambah']; ?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#F2F2F2">Edit</td>
                    <td bgcolor="#FFFFFF"><?php echo $uraikan['edit']; ?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#F2F2F2">Hapus</td>
                    <td bgcolor="#FFFFFF"><?php echo $uraikan['hapus']; ?></td>
                  </tr>
                  <tr>
                    <td bgcolor="#F2F2F2">Usermanagement </td>
                    <td bgcolor="#FFFFFF"><?php echo $uraikan['usermanagement']; ?></td>
                  </tr>
                  
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><a href=editusermanagement.php?id=<?php echo $uraikan['id']; ?>>Edit</a> |
                
                
                
                 
                 
                 <a href="?action=hapususer&idlogin=<?php echo $uraikan['id'];?>" onclick="return confirm('Anda Yakin Ingin Menghapus User ini ?');">Hapus</a>
	
                 </td>
              </tr>
            </table>
			<hr>
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