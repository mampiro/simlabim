<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php"; 


$tingkat=mysqli_query($connect, "select * from tingkatan");



 if($_SESSION['id_fakultas']==""&&$_SESSION['id_prodi']=="")
  {
$prodi=mysqli_query($connect, "select * from prodi");
  } 
 else if($_SESSION['id_prodi']=="")
  {
$prodi=mysqli_query($connect, "select * from prodi where id_fakultas='".$_SESSION['id_fakultas']."'");
  } 
  else
  {
 $prodi=mysqli_query($connect, "select * from prodi where id_prodi='".$_SESSION['id_prodi']."'");

  }











  if($_SESSION['id_fakultas']==""&&$_SESSION['id_prodi']=="")
{
	





if(isset($_GET['tahun'])&& isset($_GET['idprodi'])&& isset($_GET['idtingkat']))
{

$data_prestasi=mysqli_query($connect, "select a.*,b.prodi, c.tingkat, d.jenis_prestasi from data_prestasi a 

left join prodi b on a.id_prodi=b.id_prodi

left join tingkatan c on a.id_tingkat=c.id_tingkat

left join jenis_prestasi d on a.id_jenis_prestasi=d.id_jenis_prestasi

where   year(a.tgl_mulai)='".$_GET['tahun']."' and a.id_prodi='".$_GET['idprodi']."' and a.id_tingkat='".$_GET['idtingkat']."'order by a.id_prestasi desc


");
}
else
{

$data_prestasi=mysqli_query($connect, "select a.*,b.prodi, c.tingkat, d.jenis_prestasi from data_prestasi a 

left join prodi b on a.id_prodi=b.id_prodi

left join tingkatan c on a.id_tingkat=c.id_tingkat

left join jenis_prestasi d on a.id_jenis_prestasi=d.id_jenis_prestasi


order by a.id_prestasi desc
");

}


	
}



else if($_SESSION['id_prodi']=="")
{
	





if(isset($_GET['tahun'])&& isset($_GET['idprodi'])&& isset($_GET['idtingkat']))
{

$data_prestasi=mysqli_query($connect, "select a.*,b.prodi, c.tingkat, d.jenis_prestasi from data_prestasi a 

left join prodi b on a.id_prodi=b.id_prodi

left join tingkatan c on a.id_tingkat=c.id_tingkat

left join jenis_prestasi d on a.id_jenis_prestasi=d.id_jenis_prestasi

where   year(a.tgl_mulai)='".$_GET['tahun']."' and a.id_prodi='".$_GET['idprodi']."' and a.id_fakultas='".$_SESSION['id_fakultas']."' and a.id_tingkat='".$_GET['idtingkat']."'order by a.id_prestasi desc


");
}
else
{

$data_prestasi=mysqli_query($connect, "select a.*,b.prodi, c.tingkat, d.jenis_prestasi from data_prestasi a 

left join prodi b on a.id_prodi=b.id_prodi

left join tingkatan c on a.id_tingkat=c.id_tingkat

left join jenis_prestasi d on a.id_jenis_prestasi=d.id_jenis_prestasi

where a.id_fakultas='".$_SESSION['id_fakultas']."'


order by a.id_prestasi desc
");

}


	
}




else // session id_prodi
{

	
	
if(isset($_GET['tahun'])&& isset($_GET['idprodi'])&& isset($_GET['idtingkat']))
{

$data_prestasi=mysqli_query($connect, "select a.*,b.prodi, c.tingkat, d.jenis_prestasi from data_prestasi a 

left join prodi b on a.id_prodi=b.id_prodi

left join tingkatan c on a.id_tingkat=c.id_tingkat

left join jenis_prestasi d on a.id_jenis_prestasi=d.id_jenis_prestasi

where   year(a.tgl_mulai)='".$_GET['tahun']."' and a.id_prodi='".$_GET['idprodi']."' and a.id_tingkat='".$_GET['idtingkat']."' and a.id_prodi='".$_SESSION['id_prodi']."'

order by a.id_prestasi desc
");

}
else
{

$data_prestasi=mysqli_query($connect, "select a.*,b.prodi, c.tingkat, d.jenis_prestasi from data_prestasi a 

left join prodi b on a.id_prodi=b.id_prodi

left join tingkatan c on a.id_tingkat=c.id_tingkat

left join jenis_prestasi d on a.id_jenis_prestasi=d.id_jenis_prestasi


where a.id_prodi='".$_SESSION['id_prodi']."'


order by a.id_prestasi desc
");

}	



}//akhir session prodi




//hapus gakery
if ($_SESSION['session_hapus']=="ya")
  {
if(isset($_GET['action']) and $_GET['action']=="hapusprestasi")
{
//include "../pengaturan.php";


$barang=mysqli_fetch_array(mysqli_query($connect,"select * from data_prestasi where id_prestasi='".$_GET['idprestasi']."'"));


@unlink('upload/'.$barang['photo_icon']);
@unlink('upload/'.$barang['photo_sertifikat']);

@unlink('upload/'.$barang['dokumen_pendukung']);

//echo $barang['dokumen_pendukung'];

//exit();
$sql=mysqli_query($connect, "delete from data_prestasi where id_prestasi='".$_GET['idprestasi']."'");


$sql2=mysqli_query($connect, "delete from prestasi_mahasiswa where id_prestasi='".$_GET['idprestasi']."'");


$sql3=mysqli_query($connect, "delete from prestasi_dosen where id_prestasi='".$_GET['idprestasi']."'");



if($sql)
{
echo "<meta http-equiv=\"refresh\" content=\"0;URL=data_prestasi.php\">";

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
                        <h1 class="page-head-line">Data Prestasi</h1>
                      

                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                <div  style="text-align:right; margin-right:10px; margin-bottom:10px;">
                
      <table width="100%" border="0" cellpadding="5" cellspacing="3">
  <tr>
    <td width="74%">
    
    
    Tahun
     <select name="select" onchange="MM_jumpMenu('parent',this,1)">
        <option value="<?=$_SERVER['PHP_SELF']; ?>">Tahun..</option>
        <?php
	$sekarang= (integer) date ("Y");
	
	for($i=$sekarang ; $i>2000;  $i--)
	{
	?>
	
	
	
	
	  <option value="<?=$_SERVER['PHP_SELF']; ?>?tahun=<?=$i;?>" <?php if(isset($_GET['tahun']) and $_GET['tahun']==$i){ echo "selected"; } ?>>
        <?=$i; ?>
        </option>
	
	
	
	<?php
	}  
	?>
      </select>
    
    
    
    
    Prodi
    
  <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>?tahun=<?=$_GET['tahun'];?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($prodi))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?tahun=<?php echo $_GET['tahun'];?>&idprodi=<?=$uraikan3['id_prodi']; ?>" <?php if(isset($_GET['idprodi']) and $_GET['idprodi']==$uraikan3['id_prodi']) { echo "selected"; } ?>>
   <?=$uraikan3['prodi'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select>  
    
    
    
    
    
    
    
    
    
    
    
    Tingkat
    
  <select onchange="MM_jumpMenu('parent',this,1)">
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>?tahun=<?=$_GET['tahun'];?>&idprodi=<?=$_GET['idprodi'];?>">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($tingkat))
		  {
		  
		?>  
		  
		  
		<option value="<?php echo $_SERVER['PHP_SELF']; ?>?tahun=<?php echo $_GET['tahun'];?>&idprodi=<?=$_GET['idprodi'];?>&idtingkat=<?=$uraikan3['id_tingkat']; ?>" <?php if(isset($_GET['idtingkat']) and $_GET['idtingkat']==$uraikan3['id_tingkat']) { echo "selected"; } ?>>
   <?=$uraikan3['id_tingkat'] ; ?>   =>  <?=$uraikan3['tingkat'] ; ?>
        </option>  
		  
		  
		  
<?php		  
		  }
		  ?>
    </select>  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </td>
    
  </tr>
</table>
          
  <p align="right">  <a href="tambah_prestasi2.php">+ Tambah Prestasi</a></p>              
                
                
              </div>
                <!--/.Row--><!--/.Row--><!--/.ROW-->

             <table width="97%"  border="0" cellpadding="5" cellspacing="1">
  <tr>
        <td width="3%" bgcolor="#E2FB37">No</td>

      <td width="7%" bgcolor="#E2FB37">Tingkat Kegiatan</td>

  
    <td width="20%" bgcolor="#E2FB37">Nama Event</td>
     <td width="8%" bgcolor="#E2FB37">Peringkat</td>
       <td width="8%" bgcolor="#E2FB37">Dokumen Pendukung</td>
         <td width="7%" bgcolor="#E2FB37">Url Kegiatan</td>
          <td width="8%" bgcolor="#E2FB37">Photo Kegiatan</td>
    <td width="20%" bgcolor="#E2FB37">Prodi/ Fakultas</td>
   
        <td width="7%" bgcolor="#E2FB37">Jumlah Peserta</td>



    <td width="12%"  align="center" bgcolor="#E2FB37">Aksi</td>
	
	
  </tr>
  
   <?php
		$no=1;
		  while($baris=mysqli_fetch_array($data_prestasi))
		  {
		 
		  ?>	
  
  <tr>
  
   <tr>
  
    <?php
if(isset($var) and $var==1)
{?>
<tr  bgcolor="#FFFFFF"> 
<?php
$var=2;
}
else
{?>
<tr bgcolor="#FFFFCC">
<?php
$var=1;
}
?>

      <td><?=$no;?></td>


      <td><?php echo $baris['tingkat'];?></td>

    <td>
	<?php echo $baris['nama_event'];?></td> 
    <td><?php 
	
	if($baris['jenis_prestasi']=="")
	{
		echo $baris['prestasi_teks'];
	}
	else
	{
	echo $baris['jenis_prestasi'];
	}
	?></td>
     <td>
   
   <?php
   if($baris['dokumen_pendukung']=="")
   {
   }
   else
   {
   ?>
     
     <a href="upload/<?=$baris['dokumen_pendukung'];?>">Download</a>
     
  <?php
   }
   ?>
     
     
     </td>
     
       <td>
       <?php
	   if($baris['url_kegiatan']=="")
	   {
	   }
	   else
	   {
	   ?>
       <a href="<?=$baris['url_kegiatan'];?>" target="_blank">Link 1</a>
       <br />
       <?php
	   }
	   ?>
       <?php
	   if($baris['url_penyelenggara']=="")
	   {
	   }
	   else
	   {
	   ?>
       <a href="<?=$baris['url_penyelenggara'];?>" target="_blank">Link 1</a>
       <br />
       <?php
	   }
	   ?>
        <?php
	   if($baris['url_lainnya']=="")
	   {
	   }
	   else
	   {
	   ?>
       <a href="<?=$baris['url_lainnya'];?>" target="_blank">Link 1</a>
       <br />
       <?php
	   }
	   ?>
       
       </td>
       
       <td>
       
    <?php
   if($baris['photo_icon']=="")
   {
   }
   else
   {
   ?>   
       <a href="upload/<?=$baris['photo_icon'];?>">Download</a>
   <?php
   }
   ?>
       
       </td>
       
    <td><?php 
	
	if($baris['prodi']=="")
	{
	$f=mysqli_query($connect,"select*from fakultas where id_fakultas='".$baris['id_fakultas']."'");
	$objekf=mysqli_fetch_object($f);
	echo "Fakultas :". $objekf->fakultas;
	}
	else
	{
		echo $baris['prodi'];
	}
	
	
	?></td>
      
<td><?php echo $baris['jumlah_peserta'];?></td>
     <?php if ($_SESSION['session_hapus']=="ya")
  {
?>
   
   
    <td align="right">
    
<a href="detail_prestasi.php?idprestasi=<?php echo $baris['id_prestasi'];?>"><img src="../img/find.png" alt="Hapus" width="13" height="13" border="0" /></a>    
    
	
	<?php if ($_SESSION['session_edit']=="ya")
  {
?>	
	
|	<a href="edit_prestasi2.php?idprestasi=<?php echo $baris['id_prestasi'];?>"><img src="../img/pencil.png" alt="Hapus" width="13" height="13" border="0" /></a> 
	
	<?php
  }
  ?>
  
	|
	
 <?php if ($_SESSION['session_hapus']=="ya")
  {
?>	
	
	<a href="?action=hapusprestasi&idprestasi=<?php echo $baris['id_prestasi'];?>" onclick="return confirm('Anda Yakin Ingin Menghapus Data Prestasi ini ?');"><img src="../img/hapus.png" alt="Hapus" width="13" height="13" border="0" /></a>
	
	
	<?php
  }
  ?>
	
	
	
	</td>
	
<?php
 
  }
 
  ?>	
	
	
  </tr>
  
  
  <?php
  $no++;
 
  }
 
  ?>
</table>



<hr />
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