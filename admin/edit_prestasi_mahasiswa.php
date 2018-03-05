<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php"; 


$prodi=mysqli_query($connect, "select * from prodi");


if(isset($_GET['angkatanid']))
{

$student=mysqli_query($connect, "select * from student where angkatan_id='".$_GET['angkatanid']."' and id_prodi='".$_GET['idprodi']."' ");

}


$angkatan=mysqli_query($connect, "select angkatan_id from student group by angkatan_id asc");


if(isset($_GET['idprodi']))
{

$data_prestasi=mysqli_query($connect, "select * from data_prestasi where id_prodi='".$_GET['idprodi']."'");
}


// tambah mata kuliah/ mapel

if ($_SESSION['session_tambah']=="ya")
  {
function tambah_prestasi_mahasiswa ()
{
if(isset($_POST['tambah_prestasi_mahasiswa']))
{




include "../pengaturan.php";



$sql = "INSERT INTO prestasi_mahasiswa (


id_prestasi,
nim 









)
VALUES (

'".$_POST['id_prestasi']."',
'".$_POST['nim']."' 
 



)";
 
if (mysqli_query($connect, $sql)) {

echo "<meta http-equiv=\"refresh\" content=\"0;URL=tambah_prestasi_mahasiswa.php?idprodi=".$_POST['idprodi']."&angkatanid=".$_POST['angkatanid']."&proses=Data Telah Ditambah...\">";



} else {
 echo "Error: ".$sql.". ".mysqli_error($koneksi);
}



}
}
}



tambah_prestasi_mahasiswa();





?>


<?php include "sidebar.php"; ?>










        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Prestasi Mahasiswa</h1>
                      
<?php
if(isset($_GET['proses']))
{
	echo"<font color=blue>". $_GET['proses']."</font>";
}

?>
                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                
                <!--/.Row--><!--/.Row--><!--/.ROW-->

             <form action="" method="post" enctype="multipart/form-data">
             <table width="100%" border="0" cellpadding="8" cellspacing="1">
 
 
  <tr>
    <td width="32%">Prodi</td>
    <td width="68%">
    
    
    
    
    
    <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($prodi))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprodi=<?=$uraikan3['id_prodi']; ?>" <?php if(isset($_GET['idprodi']) and $_GET['idprodi']==$uraikan3['id_prodi']) { echo "selected"; } ?>>
    <?=$uraikan3['prodi'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select>
    
    
    <input type="hidden" name="idprodi" value="<?=$_GET['idprodi'];?>" /></td>
  </tr>
 
  <tr>
    <td>Angkatan</td>
    <td>
    
    
    
    
     <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($angkatan))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprodi=<?=$_GET['idprodi'];?>&angkatanid=<?=$uraikan3['angkatan_id']; ?>" <?php if(isset($_GET['angkatanid']) and $_GET['angkatanid']==$uraikan3['angkatan_id']) { echo "selected"; } ?>>
    <?=$uraikan3['angkatan_id'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select> 
    
    
    
  <input type="hidden" name="angkatanid" value="<?=$_GET['angkatanid'];?>" />  
    
    
    
    
  </td>
  </tr>
  <tr>
    <td>Nama Mahasiswa</td>
    <td>
    
    
    <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($student))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprodi=<?=$_GET['idprodi'];?>&angkatanid=<?=$_GET['angkatanid'];?>&nim=<?=$uraikan3['nim']; ?>" <?php if(isset($_GET['nim']) and $_GET['nim']==$uraikan3['nim']) { echo "selected"; } ?>>
 <?=$uraikan3['nim'] ; ?> =>  <?=$uraikan3['full_name'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select>
    <input type="hidden" name="nim" value="<?=$_GET['nim'];?>" />
    
    
    
    
    
    
    
    
    
    </td>
  </tr>
  <tr>
    <td>Kegiatan Event Prestasi </td>
    <td><select name="id_prestasi" id="id_prestasi">
      <option value="">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($data_prestasi))
		  {
		  echo "<option value=$uraikan3[id_prestasi] > $uraikan3[nama_event]</option>";
		  }
		  ?>
    </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="tambah_prestasi_mahasiswa" id="tambah_prestasi_mahasiswa" value="Simpan" /></td>
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