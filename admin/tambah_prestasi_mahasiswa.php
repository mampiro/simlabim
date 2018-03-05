<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>


<?php include "header.php"; 


$prodi=mysqli_query($connect, "select * from prodi");



  if($_SESSION['id_prodi'])
  {


$data_prestasi=mysqli_query($connect, "select * from data_prestasi where id_prodi='".$_SESSION['id_prodi']."'");

  }
  else
  {
	  $data_prestasi=mysqli_query($connect, "select * from data_prestasi ");

	 }




$prestasi_mahasiswa=mysqli_query($connect, "select a.*,b.*, c.prodi from prestasi_mahasiswa a

left join student b on a.nim=b.nim
left join prodi c on b.id_prodi=c.id_prodi


 where a.id_prestasi='".$_GET['idprestasi']."'");



// tambah mata kuliah/ mapel

if ($_SESSION['session_tambah']=="ya")
  {



function tambah_mahasiswa_p()
{




if(isset($_POST['tambah_mahasiswa_p']))
{


include "../pengaturan.php";


$jumc=count($_POST['nim']);


//echo $jumc;

//exit();
//for
for($i=0; $i<=($jumc-1); $i++)
{

$nim=$_POST['nim'][$i];
$id_prestasi=$_POST['idprestasi'];

$sql = "INSERT INTO prestasi_mahasiswa (


nim,
id_prestasi


)
VALUES (

'".$nim."',
'".$id_prestasi."' 
 



)";
 
if (mysqli_query($connect, $sql)) {

echo "<meta http-equiv=\"refresh\" content=\"0;URL=tambah_prestasi_mahasiswa2.php?idprestasi=".$_POST['idprestasi']."&proses1=Data Telah Ditambah...\">";



} else {
 echo "Error: Terdapat duplikasi data.. ".$sql.". ".mysqli_error($koneksi);
}


}// akhir for





}



}


}












tambah_mahasiswa_p();


//hapus gakery
if ($_SESSION['session_hapus']=="ya")
  {
if(isset($_GET['action']) and $_GET['action']=="hapusprestasim")
{
//include "../pengaturan.php";



$sql=mysqli_query($connect, "delete from prestasi_mahasiswa where id_prestasi_mahasiswa='".$_GET['idprestasim']."'");



if($sql)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=tambah_prestasi_mahasiswa.php?idprestasi=".$_GET['idprestasi']."\">";

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
                       
                      
<?php

if(isset($_GET['idprestasi']))
{

$detail_prestasi=mysqli_query($connect, "select * from data_prestasi where id_prestasi='".$_GET['idprestasi']."'");
	
		  while($baris1=mysqli_fetch_array($detail_prestasi))
		  {
		 echo "<h1 class='page-head-line'>Nama Mahasiswa >> ". $baris1['nama_event']."</h1>";
		  }

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

             <table width="100%" border="2" cellpadding="5" cellspacing="1">
      <tr>
        <td width="13%">NIM</td>
        <td width="40%">Nama</td>
        <td width="20%">Prodi</td>
        <td width="16%">Angkatan</td>
        <td width="11%">Aksi</td>
      </tr>
 <?php
		
		  while($baris=mysqli_fetch_array($prestasi_mahasiswa))
		  {
		 
		  ?>	     
      
      <tr>
        <td><?=$baris['nim'];?></td>
        <td><?=$baris['full_name'];?></td>
        <td><?=$baris['prodi'];?></td>
        <td><?=$baris['angkatan_id'];?></td>
        <td align="center"><?php if ($_SESSION['session_hapus']=="ya")
  {
?>	
	
	<a href="?action=hapusprestasim&idprestasim=<?php echo $baris['id_prestasi_mahasiswa'];?>&idprestasi=<?=$_GET['idprestasi'];?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Mahasiswa Prestasi ini ?');"><img src="../img/hapus.png" alt="Hapus" width="13" height="13" border="0" /></a>
	
	
	<?php
  }
  ?></td>
      </tr>
      
 <?php
		  }
		  ?>
      
    </table>
             
  
             
   <table width="100%" border="0" cellpadding="5" >
   <tr bgcolor="#006600">
    
    <td align="right">&nbsp;</td>
  </tr>
</table>
          
             
</form>


    <table width="100%" border="0" cellpadding="5" cellspacing="2" >
  <tr>
   
<!--    
    <td width="73%" bgcolor="#E2FB37">Pencarian Berdasar
      <select name="select"  onchange='GETPILIHAN(this);'  >
      <option value="">Pilih ..</option>
      <option value="nim">Nim</option>
      <option value="nama">Nama</option>
    </select></td>
    
-->  
    <td width="27%" bgcolor="#E2FB37" align="center"><div id="pilihan">Cari Nama Mahasiswa <input name="nama" type="text" onkeyup="GETNAMA(this);" />
</div>
    
    </td>
  </tr>
</table>
 
     <form method="post" action="" enctype="multipart/form-data" name="test_form" id="test_form">
     
 <input type="hidden" name="idlogin" value="<?=$_SESSION['session_idadmin'];?>" />    
 
 <input type="hidden" name="idprestasi" value="<?=$_GET['idprestasi'];?>" />
     
  <table width="100%" border="0">
  <tr>
    <td align="right"><input type="submit" name="tambah_mahasiswa_p" id="tambah_mahasiswa_p" value="Tambah" /></td>
  </tr>
</table>
<div id="pilihan1" >   
    <table width="100%" border="1">
      <tr>
        <td width="17%">NIM</td>
        <td width="45%">Nama</td>
        <td width="23%">Prodi</td>
        <td width="15%">Angkatan</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
   

 </div>   
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