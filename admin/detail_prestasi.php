<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php"; 



$detail_prestasi=mysqli_query($connect, "select a.*,b.prodi, c.tingkat, d.jenis_prestasi from data_prestasi a 

left join prodi b on a.id_prodi=b.id_prodi

left join tingkatan c on a.id_tingkat=c.id_tingkat

left join jenis_prestasi d on a.id_jenis_prestasi=d.id_jenis_prestasi




where a.id_prestasi='".$_GET['idprestasi']."'

");




$prestasi_mahasiswa=mysqli_query($connect, "select a.*, b.*, c.* from prestasi_mahasiswa a

left join student b on a.nim=b.nim

left join prodi c on b.id_prodi=c.id_prodi

where a.id_prestasi='".$_GET['idprestasi']."'


");




$prestasi_dosen=mysqli_query($connect, "select a.*,b.*, c.prodi from prestasi_dosen a

left join dosen b on a.id_dosen=b.id_dosen
left join prodi c on b.id_prodi=c.id_prodi 
where  a.id_prestasi='".$_GET['idprestasi']."'");

?>


<?php include "sidebar.php"; ?>










         <?php
		
		  while($baris=mysqli_fetch_array($detail_prestasi))
		  {
		 
		  ?>	

        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Detail prestasi >> <?=$baris['nama_event'];?> </h1>
                      

                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                <div class="row"></div>
                <!--/.Row--><!--/.Row--><!--/.ROW-->



 




              <table width="100%" border="0" cellpadding="8" cellspacing="1">
  <tr>
    <td width="32%">Prodi / Fakultas</td>
    <td width="68%">
    
    <?php 
	
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
	
	
	?>
    
    
    
    
    </td>
  </tr>
  <tr>
    <td>Nama Event</td>
    <td><?=$baris['nama_event'];?></td>
  </tr>
  <tr>
    <td>Tingkat</td>
    <td><?=$baris['tingkat'];?></td>
  </tr>
  <tr>
    <td>Jenis Prestasi</td>
    <td><?=$baris['jenis_prestasi'];?></td>
  </tr>
  <tr>
    <td>Tanggal Mulai</td>
    <td>
    <?php
	$tgl_mulai = strtotime($baris['tgl_mulai']);
    $tgl_mulai = date('d-m-Y', $tgl_mulai);
	echo $tgl_mulai;
	?>
    
    
    
    
    
    
    
    </td>
  </tr>
  <tr>
    <td> Tanggal Selesai</td>
    <td><?php
	$tgl_selesai = strtotime($baris['tgl_selesai']);
    $tgl_selesai = date('d-m-Y', $tgl_selesai);
	echo $tgl_selesai;
	?></td>
  </tr>
  <tr>
    <td>Photo Kegiatan</td>
    <td>
    
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
    
    </td>
  </tr>
  <tr>
    <td>Photo Sertifikat</td>
    <td>
    
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
    
    
    
    
    </td>
  </tr>
  <tr>
    <td>Dokumen Pendukung</td>
    <td><a href="upload/<?=$baris['dokumen_pendukung'];?>">Download</a></td>
  </tr>
  <tr>
    <td>Url Kegiatan</td>
    <td><a href="<?=$baris['url_kegiatan'];?>" target="_blank"><?=$baris['url_kegiatan'];?></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="<?=$baris['url_penyelenggara'];?>" target="_blank"><?=$baris['url_penyelenggara'];?></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><a href="<?=$baris['url_penyelenggara'];?>" target="_blank">
      <?=$baris['url_lainnya'];?>
    </a></td>
  </tr>
  <tr>
    <td>Jumlah Peserta Event</td>
    <td><?=$baris['jumlah_peserta'];?></td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td><?=$baris['keterangan'];?></td>
  </tr>
 

             </table>
             
     <hr />        
             
             
             
             
      
             
             
 <?php
		  }
		  ?>
             
    <h3>Data Mahasiswa</h3>          
    <table width="100%" border="0" cellpadding="5" cellspacing="2">
      <tr>
        <td bgcolor="#E2FB37">Nim</td>
        <td bgcolor="#E2FB37">Nama</td>
        <td bgcolor="#E2FB37">Prodi</td>
        <td bgcolor="#E2FB37">Angkatan</td>
      </tr>
      
   <?php
		
		  while($baris=mysqli_fetch_array($prestasi_mahasiswa))
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
             
<hr />

<h3>Dosen Pembimbing</h3>
<table width="100%" border="0" cellpadding="5" cellspacing="2">
      <tr>
        <td width="21%" bgcolor="#E2FB37">NIK</td>
        <td width="35%" bgcolor="#E2FB37">Nama</td>
        <td width="14%" bgcolor="#E2FB37">NIDN</td>
        <td width="30%" bgcolor="#E2FB37">Prodi</td>
      
      </tr>
 <?php
		
		  while($baris=mysqli_fetch_array($prestasi_dosen))
		  {
		 
		  ?>	     
      
      <tr>
        <td><?=$baris['nik'];?>
        
        <input type="hidden" name="id_dosen[]" value="<?=$baris['id_dosen'];?>" />
        
        </td>
        <td><?=$baris['nama'];?></td>
        <td><?=$baris['nidn'];?></td>
        <td><?=$baris['prodi'];?></td>
       
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