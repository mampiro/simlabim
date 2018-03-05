<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php"; 




$detail_prestasi_mahasiswa=mysqli_query($connect, "select a.*, b.*, c.* from prestasi_mahasiswa a

left join student b on a.nim=b.nim

left join prodi c on b.id_prodi=c.id_prodi

where a.id_prestasi='".$_GET['idprestasi']."'


");





if($_SESSION['id_prodi'])
{

$prodi=mysqli_query($connect, "select * from prodi where id_prodi='".$_SESSION['id_prodi']."'");
}
else
{
$prodi=mysqli_query($connect, "select * from prodi");

}


if($_SESSION['id_prodi'])
{
if(isset($_GET['angkatanid']))
{

$student=mysqli_query($connect, "select * from student where angkatan_id='".$_GET['angkatanid']."' and id_prodi='".$_SESSION['id_prodi']."' ");

}
}
else
{
if(isset($_GET['angkatanid']))
{

$student=mysqli_query($connect, "select * from student where angkatan_id='".$_GET['angkatanid']."' and id_prodi='".$_GET['idprodi']."' ");

}
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

'".$_POST['idprestasi']."',
'".$_POST['nim']."' 
 



)";
 
if (mysqli_query($connect, $sql)) {

echo "<meta http-equiv=\"refresh\" content=\"0;URL=tambah_prestasi_mahasiswa.php?idprestasi=".$_POST['idprestasi']."&idprodi=".$_POST['idprodi']."&angkatanid=".$_POST['angkatanid']."&proses=Data Telah Ditambah...\">";



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
                    
                    
                    
                    
                        
                      
<?php



$detail_prestasi=mysqli_query($connect, "select * from data_prestasi where id_prestasi='".$_GET['idprestasi']."'");
	
		  while($baris1=mysqli_fetch_array($detail_prestasi))
		  {
		 echo "<h1 class='page-head-line'>Nama Mahasiswa >> ". $baris1['nama_event']."</h1>";
		  }


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
 
 <?php
  if($_SESSION['id_prodi']=="")
  {
	  ?>
  
  <tr>
    <td>Prodi      </td>
    <td >
    
    
    
    
    
    <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($prodi))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprestasi=<?=$_GET['idprestasi'];?>&idprodi=<?=$uraikan3['id_prodi']; ?>" <?php if(isset($_GET['idprodi']) and $_GET['idprodi']==$uraikan3['id_prodi']) { echo "selected"; } ?>>
    <?=$uraikan3['prodi'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select>
    
    
    <input type="hidden" name="idprodi" value="<?=$_GET['idprodi'];?>" /></td>
  </tr>
 
 
<?php
  } 
  else
  {
	  ?>
      <input type="hidden" name="id_prodi" value="<?=$_SESSION['id_prodi'];?>" />
  <?php
	
}      
   ?>        
 
 
 
 
 <?php
  if($_SESSION['id_prodi']=="")
  {
	  ?>
      
      
   <tr>
    <td  width="32%">Angkatan</td>
    <td width="68%">
    
    
    
    
     <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($angkatan))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprestasi=<?=$_GET['idprestasi'];?>&idprodi=<?=$_GET['idprodi'];?>&angkatanid=<?=$uraikan3['angkatan_id']; ?>" <?php if(isset($_GET['angkatanid']) and $_GET['angkatanid']==$uraikan3['angkatan_id']) { echo "selected"; } ?>>
    <?=$uraikan3['angkatan_id'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select> 
     
      
      
      
      
      
      
 <?php
  }
  else
  {
?>
 
 
  <tr>
    <td  width="32%">Angkatan</td>
    <td width="68%">
    
    
    
    
     <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($angkatan))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprestasi=<?=$_GET['idprestasi'];?>&angkatanid=<?=$uraikan3['angkatan_id']; ?>" <?php if(isset($_GET['angkatanid']) and $_GET['angkatanid']==$uraikan3['angkatan_id']) { echo "selected"; } ?>>
    <?=$uraikan3['angkatan_id'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select> 
    
<?php
  }
  ?>

    
    
  <input type="hidden" name="angkatanid" value="<?=$_GET['angkatanid'];?>" />  
    
    
    
    
  <input type="hidden" name="idprestasi" value="<?=$_GET['idprestasi'];?>" />
  
  
  <?php
  if($_SESSION['id_prodi']=="")
  {
	  ?>
      
  <select name="select" onchange="MM_jumpMenu('parent',this,1)">
    <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
    <?php
		
		  while($uraikan3=mysqli_fetch_array($student))
		  {
		  
		?>
    <option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprestasi=<?=$_GET['idprestasi'];?>&idprodi=<?=$_GET['idprodi'];?>&angkatanid=<?=$_GET['angkatanid'];?>&nim=<?=$uraikan3['nim']; ?>" <?php if(isset($_GET['nim']) and $_GET['nim']==$uraikan3['nim']) { echo "selected"; } ?>>
      <?=$uraikan3['nim'] ; ?>
      =>
  <?=$uraikan3['full_name'] ; ?>
      </option>
    <?php		  
		  }
		  ?>
  </select>     
    <?php
  }
  else
  {
?>   
  
  <select name="select" onchange="MM_jumpMenu('parent',this,1)">
    <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
    <?php
		
		  while($uraikan3=mysqli_fetch_array($student))
		  {
		  
		?>
    <option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprestasi=<?=$_GET['idprestasi'];?>&angkatanid=<?=$_GET['angkatanid'];?>&nim=<?=$uraikan3['nim']; ?>" <?php if(isset($_GET['nim']) and $_GET['nim']==$uraikan3['nim']) { echo "selected"; } ?>>
      <?=$uraikan3['nim'] ; ?>
      =>
  <?=$uraikan3['full_name'] ; ?>
      </option>
    <?php		  
		  }
		  ?>
  </select>
  
  
 <?php		  
		  }
		  ?> 
  
  <input type="hidden" name="nim" value="<?=$_GET['nim'];?>" />
  <input type="submit" name="tambah_prestasi_mahasiswa" id="tambah_prestasi_mahasiswa" value="Tambah" /></td>
  </tr>
 

 
             </table>
             </form>










   Jumlah Peserta :           
   <table width="100%" border="0" cellpadding="5" cellspacing="2">
      <tr>
        <td bgcolor="#E2FB37">Nim</td>
        <td bgcolor="#E2FB37">Nama</td>
        <td bgcolor="#E2FB37">Prodi</td>
        <td bgcolor="#E2FB37">Angkatan</td>
      </tr>
      
   <?php
		
		  while($baris=mysqli_fetch_array($detail_prestasi_mahasiswa))
		  {
		 
		  ?>	
     
      
      <tr>
       <td><?php echo $baris['nim'];?></td>

    <td>
	<?php echo $baris['full_name'];?></td>
    <td><?php echo $baris['prodi'];?></td>
       <td><?php echo $baris['angkatan_id'];?></td>
      </tr>
      
              
 <?php
		  }
		  ?>     
      
    </table>               
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