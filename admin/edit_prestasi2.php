﻿<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php"; 

$nmfakultas=mysqli_query($connect, "select*from fakultas");



if(isset($_GET['idfakultas']))
{
	$nmprodi=mysqli_query($connect, "select*from prodi where id_fakultas='".$_GET['idfakultas']."' ");

}
else
{

$nmprodi=mysqli_query($connect, "select*from prodi ");
}





if($_SESSION['id_prodi'])
{

$prodi=mysqli_query($connect, "select * from prodi where id_prodi='".$_SESSION['id_prodi']."'");
}
else
{
$prodi=mysqli_query($connect, "select * from prodi");

}


$edit_prestasi=mysqli_query($connect, "select * from data_prestasi where id_prestasi='".$_GET['idprestasi']."'");



$edit_prestasi_mahasiswa=mysqli_query($connect, "select a.*,b.*, c.prodi from prestasi_mahasiswa a

left join student b on a.nim=b.nim
left join prodi c on b.id_prodi=c.id_prodi where a.id_prestasi='".$_GET['idprestasi']."'");



$edit_prestasi_dosen=mysqli_query($connect, "select a.*,b.*, c.prodi from prestasi_dosen a

left join dosen b on a.id_dosen=b.id_dosen
left join prodi c on b.id_prodi=c.id_prodi 
where a.id_prestasi='".$_GET['idprestasi']."'");







$tingkat=mysqli_query($connect, "select * from tingkatan");

$jenis_prestasi=mysqli_query($connect, "select * from jenis_prestasi");


// tambah mata kuliah/ mapel

if ($_SESSION['session_tambah']=="ya")
  {
function ubah_prestasi ()
{
if(isset($_POST['ubah_prestasi']))
{



if($_POST['id_jenis_prestasi']=="") 
{
$pres_teks=$_POST['prestasi_teks'];
}
else
{
$pres_teks=$_POST['id_jenis_prestasi'];
}//batas validasi



//echo $pres_teks;

if($pres_teks=="")
{
	echo "<font color=red>Prestasi Tidak Boleh Kosong</font>";
}
else
{





//exit();




include "../pengaturan.php";










$photo1=$_FILES['photo_icon']['name'];

//$photo1='mereka adalah.jpg';
if($photo1)
{

$photo=str_replace(" ","-", $photo1); 

$datetime1=date("dmy-his"); //create date time

$photooptimal=$datetime1."-".$photo;

}

if(($_FILES['photo_icon']['type']=="image/gif")||($_FILES['photo_icon']['type']=="image/jpeg")||($_FILES['photo_icon']['type']=="image/png"))
{
copy ($_FILES['photo_icon']['tmp_name'], "upload/".$photooptimal) or die ("error photo");


@unlink('upload/'.$_POST['photo_icon_hidden']);

}
else
{
	$photooptimal=$_POST['photo_icon_hidden'];
}




$photo2=$_FILES['photo_sertifikat']['name'];

//$photo1='mereka adalah.jpg';
if($photo2)
{

$photoa=str_replace(" ","-", $photo2); 

$datetime1=date("dmy-his"); //create date time

$photooptimala=$datetime1."-".$photoa;

}

if(($_FILES['photo_sertifikat']['type']=="image/gif")||($_FILES['photo_sertifikat']['type']=="image/jpeg")||($_FILES['photo_sertifikat']['type']=="image/png"))
{
copy ($_FILES['photo_sertifikat']['tmp_name'], "upload/".$photooptimala) or die ("error photo");


@unlink('upload/'.$_POST['photo_sertifikat_hidden']);

}
else
{
	$photooptimala=$_POST['photo_sertifikat_hidden'];
}






$photo3=$_FILES['dokumen_pendukung']['name'];

//$photo1='mereka adalah.jpg';
if($photo3)
{

$photob=str_replace(" ","-", $photo3); 

$datetime1=date("dmy-his"); //create date time

$photooptimalb=$datetime1."-".$photob;

}

if(($_FILES['dokumen_pendukung']['type']=="application/vnd.msword")||($_FILES['dokumen_pendukung']['type']=="application/vnd.ms-excel")||($_FILES['dokumen_pendukung']['type']=="application/pdf"))
{
copy ($_FILES['dokumen_pendukung']['tmp_name'], "upload/".$photooptimalb) or die ("error photo");
@unlink('upload/'.$_POST['dokumen_pendukung_hidden']);

}
else
{
	$photooptimalb=$_POST['dokumen_pendukung_hidden'];
}




$tm=explode("-",$_POST['tgl_mulai']);
$tgl_mulai=$tm[2]."-".$tm[1]."-".$tm[0];

$ts=explode("-",$_POST['tgl_selesai']);
$tgl_selesai=$ts[2]."-".$ts[1]."-".$ts[0];





$sql =mysqli_query($connect, "update data_prestasi  set

id_fakultas='".$_POST['id_fakultas']."',

id_prodi='".$_POST['id_prodi']."',
nama_event='".$_POST['nama_event']."',
id_tingkat='".$_POST['id_tingkat']."',
id_jenis_prestasi='".$_POST['id_jenis_prestasi']."',
prestasi_teks='".$_POST['prestasi_teks']."',
tgl_mulai='".$tgl_mulai."',
tgl_selesai='".$tgl_selesai."',
photo_icon='".$photooptimal."',
photo_sertifikat='".$photooptimala."',
dokumen_pendukung='".$photooptimalb."',
url_kegiatan='".$_POST['url_kegiatan']."',
url_penyelenggara='".$_POST['url_penyelenggara']."',
url_lainnya='".$_POST['url_lainnya']."',

jumlah_peserta='".$_POST['jumlah_peserta']."',
keterangan='".$_POST['keterangan']."' 




where id_prestasi='".$_POST['idprestasi']."'


");









$insert_id_prestasi=$_POST['idprestasi'];



/*

$jumdosen=count($_POST['id_dosen']);

//echo $jumc;

//exit();
//for
for($i=0; $i<=($jumdosen-1); $i++)
{
$id_dosen=$_POST['id_dosen'][$i];



$sql2=mysqli_query($connect, "insert into prestasi_dosen (id_prestasi, 	id_dosen) values('$insert_id_prestasi','$id_dosen')");



}// akhir for








$jummahasiswa=count($_POST['nim']);


//echo $jumc;

//exit();
//for
for($ia=0; $ia<=($jummahasiswa-1); $ia++)
{

$nim=$_POST['nim'][$ia];


$sql3=mysqli_query($connect, "insert into prestasi_mahasiswa  (id_prestasi, 	nim) values('$insert_id_prestasi','$nim')");





} */     // akhir for

$id_random=$_SESSION['session_idrandom'];



$sql2=mysqli_query($connect, "insert into prestasi_mahasiswa (id_prestasi, 	nim) select $insert_id_prestasi, nim from calon_prestasi_mahasiswa where id_random='".$id_random."'");



mysqli_query($connect, "delete from calon_prestasi_mahasiswa where id_random='".$_SESSION['session_idrandom']."'");



$sql3=mysqli_query($connect, "insert into prestasi_dosen (id_prestasi, 	id_dosen) select $insert_id_prestasi, id_dosen from calon_prestasi_dosen where id_random='".$id_random."'");


mysqli_query($connect, "delete from calon_prestasi_dosen where  id_random='".$_SESSION['session_idrandom']."'");






 
if ($sql) {





echo "<meta http-equiv=\"refresh\" content=\"0;URL=data_prestasi.php?proses=Data Telah Ditambah...\">";



} else {
 echo "Error: ";
}
}//batas validasi


}
}
}






//hapus gakery
if ($_SESSION['session_hapus']=="ya")
  {
if(isset($_GET['action']) and $_GET['action']=="hapusidprestasimahasiswa")
{
//include "../pengaturan.php";

$sql=mysqli_query($connect, "delete from prestasi_mahasiswa where id_prestasi_mahasiswa='".$_GET['idprestasimahasiswa']."'");


}
}



//hapus gakery
if ($_SESSION['session_hapus']=="ya")
  {
if(isset($_GET['action']) and $_GET['action']=="hapusidprestasidosen")
{
//include "../pengaturan.php";

$sql=mysqli_query($connect, "delete from prestasi_dosen where id_prestasi_dosen='".$_GET['idprestasidosen']."'");


}
}






//hapus gakery
if ($_SESSION['session_hapus']=="ya")
  {
if(isset($_GET['action']) and $_GET['action']=="hapusidcalonprestasimahasiswa")
{
//include "../pengaturan.php";

$sql=mysqli_query($connect, "delete from calon_prestasi_mahasiswa where id_calon_prestasi_mahasiswa='".$_GET['idcalonprestasimahasiswa']."'");


}
}



//hapus gakery
if ($_SESSION['session_hapus']=="ya")
  {
if(isset($_GET['action']) and $_GET['action']=="hapusidcalonprestasidosen")
{
//include "../pengaturan.php";

$sql=mysqli_query($connect, "delete from calon_prestasi_dosen where id_calon_prestasi_dosen='".$_GET['idcalonprestasidosen']."'");


}
}


?>


<?php include "sidebar.php"; ?>










        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Edit Prestasi</h1>
                      
<?php
if(isset($_GET['proses']))
{
	echo"<font color=blue>". $_GET['proses']."</font>";
}

ubah_prestasi();


?>
                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                
                <!--/.Row--><!--/.Row--><!--/.ROW-->

   
             <form action="" method="post" enctype="multipart/form-data" ><!--check all-->




 <?php
		
		  while($baris=mysqli_fetch_array($edit_prestasi))
		  {
		 
		  ?>  
       
       
     <?php
if(isset($_GET['idfakultas']) and $_GET['idfakultas'])
{
?>
<input type="hidden" name="id_fakultas" id="id_fakultas" value="<?=$_GET['idfakultas'];?>" />


<?php
}
else
{
?>


<input type="hidden" name="id_fakultas" id="id_fakultas" value="<?=$baris['id_fakultas'];?>" />

<?php
}
?>      
       
       
       
          
             <table width="100%" border="0" cellpadding="8" cellspacing="1">
             
             
 <?php
  if($_SESSION['id_prodi']==""&&$_SESSION['id_fakultas']=="")
  {
	  ?>




  <tr>
          <td  >Fakultas</td>
          <td >
          
          
          
          
          
       <select name="select" onchange="MM_jumpMenu('parent',this,1)">
    
      
     <option value="<?php echo $_SERVER['PHP_SELF']; ?>">Pilih ..</option>
     
     
	<option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprestasi=<?=$_GET['idprestasi'];?>&idfakultas=121" <?php if(isset($_GET['idfakultas']) and $_GET['idfakultas']=="121") { echo "selected"; }?> >UKM dan Kegiatan Lainnya</option>
      
      
      
      <?php
		
		  while($uraikan=mysqli_fetch_array($nmfakultas))
		  {
			  
	  if($uraikan['id_fakultas']==$baris['id_fakultas']){ $same="selected";} else { $same="";}
			  
			  
		 ?>
      <option value="<?php echo $_SERVER['PHP_SELF']; ?>?idprestasi=<?=$_GET['idprestasi'];?>&idfakultas=<?php echo $uraikan['id_fakultas']; ?>" <?php if(isset($_GET['idfakultas']) and $_GET['idfakultas']==$uraikan['id_fakultas']) { echo "selected"; } ?> <?="$same";?> >
        <?php echo $uraikan['fakultas'] ; ?>
        </option>
      <?php
		  }
		  ?>
    </select>
    

          
          </td>
        </tr>





 <tr>
  

    <td width="26%">Prodi</td>
    <td width="74%">
    
    
    
    <select name="id_prodi" id="id_prodi">
      <option value="">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($nmprodi))
		  {
	  if($uraikan3['id_prodi']==$baris['id_prodi']){ $same="selected";} else { $same="";}
		  
		  echo "<option value=$uraikan3[id_prodi]  ".$same." >$uraikan3[id_prodi] => $uraikan3[prodi]</option>";
		  }
		  ?>
    </select></td>
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

  
  
  <tr>
    <td>Nama Event</td>
    <td><input name="nama_event" type="text" id="nama_event" size="50" value="<?=$baris['nama_event'];?>" />
  
    
    
    </td>
  </tr>
  <tr>
    <td>Tingkat</td>
    <td><select name="id_tingkat" id="id_tingkat">
      <option value="">Pilih ..</option>
      <?php
		
		  while($uraikan3=mysqli_fetch_array($tingkat))
		  {
				   if($uraikan3['id_tingkat']==$baris['id_tingkat']){ $same="selected";} else { $same="";}
		  
		  echo "<option value=$uraikan3[id_tingkat]  ".$same.">$uraikan3[id_tingkat] => $uraikan3[tingkat]</option>";
		  }
		  ?>
    </select></td>
  </tr>
  <tr>
    <td>Jenis Prestasi</td>
    <td>
	
 
	
	<select name="id_jenis_prestasi" id="id_jenis_prestasi">
      <option value="">Pilih ..</option>
	<?php
		
		  while($uraikan4=mysqli_fetch_array($jenis_prestasi))
		  {
 if($uraikan4['id_jenis_prestasi']==$baris['id_jenis_prestasi']){ $same="selected";} else { $same="";}
		  
		 ?>
<option  value="<?=$uraikan4['id_jenis_prestasi'];?>" <?=$same;?> /> <?=$uraikan4['jenis_prestasi'];?></option>
<br />
          <?php
		  }
		  ?>
  </select>  
    
    Lainnya 
    
    
    <input name="prestasi_teks" type="text" id="prestasi_teks" size="30" value="<?=$baris['prestasi_teks'];?>" />
    </td>
  </tr>
  <tr>
    <td>Tanggal Mulai</td>
    <td>
    
    <?php
	$tgl_mulai = strtotime($baris['tgl_mulai']);
    $tgl_mulai = date('d-m-Y', $tgl_mulai);
	//echo $tgl_mulai;
	?>
    
    <input name="tgl_mulai" type="text"  onclick="javascript:NewCssCal('tgl_mulai','ddmmyyyy')" id="tgl_mulai" value="<?=$tgl_mulai;?>" size="10" />
     dd-mm-yyyy</td>
  </tr>
  <tr>
    <td> Tanggal Selesai</td>
    <td>
    
    <?php
	$tgl_selesai = strtotime($baris['tgl_selesai']);
    $tgl_selesai = date('d-m-Y', $tgl_selesai);
	//echo $tgl_selesai;
	?>
    
    
    
    
    <input name="tgl_selesai" type="text"  onclick="javascript:NewCssCal('tgl_selesai','ddmmyyyy')" id="tgl_selesai" value="<?=$tgl_selesai;?>" size="10" />
     dd-mm-yyyy</td>
  </tr>
  <tr>
    <td>Photo Kegiatan (Image)</td>
    <td><input type="file" name="photo_icon" id="photo_icon" /><br />
    
    <?php
	if($baris['photo_icon']=="")
	{
	?>
    <img src="../img/no_images.png" width="193" height="142" />
    <?php
	}
	else
	{
	?>
    <img src="upload/<?=$baris['photo_icon'];?>" width="193" height="142" />
    <?php
	}
	?>
    
    
    
    
    
    
    
     <input type="hidden" name="photo_icon_hidden" value="<?=$baris['photo_icon'];?>" />
    
    
    
    
    
    
    </td>
  </tr>
  <tr>
    <td>Photo Sertifikat (Image)</td>
    <td><input type="file" name="photo_sertifikat" id="photo_sertifikat" /><br />
    
    
    
   <?php
	if($baris['photo_sertifikat']=="")
	{
	?>
    <img src="../img/no_images.png" width="193" height="142" />
    <?php
	}
	else
	{
	?>
    <img src="upload/<?=$baris['photo_sertifikat'];?>" width="193" height="142" />
    <?php
	}
	?>
    
    
     <input type="hidden" name="photo_sertifikat_hidden" value="<?=$baris['photo_sertifikat'];?>" />
    
    </td>
  </tr>
  <tr>
    <td>Dokumen Pendukung (file dokumen)</td>
    <td><input type="file" name="dokumen_pendukung" id="dokumen_pendukung" />
    
    
    <a href="upload/<?=$baris['dokumen_pendukung'];?>"><?=$baris['dokumen_pendukung'];?></a>
    
    <input type="hidden" name="dokumen_pendukung_hidden" value="<?=$baris['dokumen_pendukung'];?>" />
    </td>
  </tr>
  <tr>
    <td>Url Kegiatan</td>
    <td><input name="url_kegiatan" type="text" id="url_kegiatan" size="50" value="<?=$baris['url_kegiatan'];?>" /></td>
  </tr>
  <tr>
    <td>Url Penyelenggara</td>
    <td><input name="url_penyelenggara" type="text" id="url_penyelenggara" size="50" value="<?=$baris['url_kegiatan'];?>" /></td>
  </tr>
  <tr>
    <td>Jumlah Peserta Event</td>
    <td><input name="jumlah_peserta" type="text" id="jumlah_peserta" size="5" value="<?=$baris['jumlah_peserta'];?>"/></td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td><textarea name="keterangan" id="keterangan" cols="45" rows="5"><?=$baris['keterangan'];?></textarea></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td>
    
    
    <input type="hidden" name="idprestasi" value="<?=$baris['id_prestasi'];?>" />
    
    
    
    
    
    
    </td>
  </tr>
             </table> 
<?php
		  }
?>

 
 <table width="100%" border="0">
  <tr>
    <td width="82%"><h3>Data Mahasiswa</h3></td>
    <td width="18%" align="right"><a id="penampakan_tambah_mahasiswa"  href="javascript:toggle_mahasiswa();" rel="nofollow" ><img src='../img/add.png' width='30' height='30' /></a></td>
  </tr>
</table>
 <table width="100%" border="2" cellpadding="5" cellspacing="1">
      <tr>
        <td width="13%">NIM</td>
        <td width="40%">Nama</td>
        <td width="20%">Prodi</td>
        <td width="16%">Angkatan</td>
        <td width="11%" align="center">Aksi</td>
      </tr>
 <?php
		
		  while($baris=mysqli_fetch_array($edit_prestasi_mahasiswa))
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
	<a href="?action=hapusidprestasimahasiswa&idprestasimahasiswa=<?php echo $baris['id_prestasi_mahasiswa'] ?>" class="delete"><img src="../img/hapus.png" alt="Hapus" width="13" height="13" border="0" /></a>
	

	
	<?php
  }
  ?></td>
      </tr>
      
 <?php
		  }
		  ?>
      
    </table>
 	   
   <div class="tampildata"></div>

 <table width="100%" border="0">
  <tr>
    <td width="74%"><h3>Data Dosen Pembimbing</h3></td>
    <td width="26%" align="right"><a id="penampakan_tambah_dosen"  href="javascript:toggle_dosen();" rel="nofollow"><img src='../img/add.png' width='30' height='30' /></a></td>
  </tr>
</table>
 
  <table width="100%" border="2" cellpadding="5" cellspacing="1">
      <tr>
        <td width="20%">NIK</td>
        <td width="33%">Nama</td>
        <td width="13%">NIDN</td>
        <td width="23%">Prodi</td>
        <td width="11%" align="center">Aksi</td>
      </tr>
 <?php
		
		  while($baris=mysqli_fetch_array($edit_prestasi_dosen))
		  {
		 
		  ?>	     
      
      <tr>
        <td><?=$baris['nik'];?></td>
        <td><?=$baris['nama'];?></td>
        <td><?=$baris['nidn'];?></td>
        <td><?=$baris['prodi'];?></td>
        <td align="center"><?php if ($_SESSION['session_hapus']=="ya")
  {
?>	
	
	<a href="?action=hapusidprestasidosen&idprestasidosen=<?php echo $baris['id_prestasi_dosen'] ?>" class="delete1"><img src="../img/hapus.png" alt="Hapus" width="13" height="13" border="0" /></a>
	
	
	<?php
  }
  ?></td>
      </tr>
      
 <?php
		  }
		  ?>
      
    </table>

 <div class="tampildata_dosen">  </div> 
   
   
   
   
   <hr />
  <div style="background-color:#35C221" >
   <table width="100%" >
  <tr >
   
    <td width="77%"  >&nbsp;</td>
    <td width="23%"  align="right"><input type="submit" name="ubah_prestasi" id="ubah_prestasi" value="Ubah" /></td>
  </tr>
        </table>
  </div>           
             
             </form>
             
             
             
  
<div id="sembunyikan_tambah_mahasiswa" style="display: none;" >
    
   
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
             
             
        <?php
 
 function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

//echo generateRandomString();
$_SESSION['session_idrandom']=generateRandomString();



?>

             
<form method="post" class="form-user" name="test_form" id="test_form">		
     
 <input type="hidden" name="idlogin" value="<?=$_SESSION['session_idadmin'];?>" />    

     <input type="hidden" name="id_random" value="<?=$_SESSION['session_idrandom'];?>" />      
 
  <table width="100%" border="0">
  <tr>
    <td align="right"><a class="tombol-simpan" style="background: #232323; padding: 5px 10px; color: #fff;">Tambahkan Mahasiswa</a></td>
  </tr>
</table>
<div id="pilihan1" >  </div>   
    </form>  
 
 
 </div>
 
    
    
    
  <div id="dialog" title="Konfirmasi" style="display:none;">
	<p>Anda yakin ingin menghapus Mahasiswa tersebut?</p>
</div>  
    
 <!-----------------------------------------------------batas ajax mahasiswa-------------------------->
   
   <div id="dialog1" title="Konfirmasi" style="display:none;">
	<p>Anda yakin ingin menghapus Dosen Pembimbing tersebut?</p>
</div> 
    
    
    
    
 

<div id="sembunyikan_tambah_dosen" style="display: none;" >
    
   
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
    <td width="27%" bgcolor="#E2FB37" align="center"><div id="pilihan">Cari Nama Dosen <input name="nama" type="text" onkeyup="GETNAMADOSEN(this);" />
</div>
    
    </td>
  </tr>
</table>         
 
    
 <form method="post" class="form-user-dosen" name="test_form1" id="test_form1">		
<input type="hidden" name="idlogin" value="<?=$_SESSION['session_idadmin'];?>" />    
 <input type="hidden" name="id_random" value="<?=$_SESSION['session_idrandom'];?>" />
     
  <table width="100%" border="0">
  <tr>
<td align="right"><a class="tombol-simpan2" style="background: #232323; padding: 5px 10px; color: #fff;">Tambahkan Pembimbing</a></td>
  </tr>
</table>
<div id="pilihan2" >  </div>   
 </form>
 </div><!--Akhir hidden show-->
 
 
 
 
 
        
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