<?php session_start();  
include "../pengaturan.php";


$calon_prestasi_mahasiswa=mysqli_query($connect, "select a.*,b.*, c.prodi from calon_prestasi_mahasiswa a

left join student b on a.nim=b.nim
left join prodi c on b.id_prodi=c.id_prodi 
where a.id_random='".$_SESSION['session_idrandom']."'");



?>



<script type="text/javascript">
$(function() {
   $(".delete").click(function(){
	  var request = $(this).attr("href");
      var record = $(this).parents("tr");
      
      $("#dialog").dialog({
         resizable: false,
         modal: true,
         draggable: false,
         width: 500,
         height: 210,
         buttons: {
            "Ya, Hapus": function(){                
                $.ajax({
					url: request,
					success: function(){
						$(record).remove();
						$("#dialog").dialog("close");
					}
                });
            },
            "Tidak, Batalkan": function(){
               $(this).dialog("close");
            }
         }
      });
      return false;
   });
});
</script>

<table width="100%" border="2" cellpadding="5" cellspacing="1">
      <tr>
        <td width="13%">NIM</td>
        <td width="40%">Nama</td>
        <td width="20%">Prodi</td>
        <td width="16%">Angkatan</td>
        <td width="11%" align="center">Aksi</td>
      </tr>
 <?php
		
		  while($baris=mysqli_fetch_array($calon_prestasi_mahasiswa))
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
	
	<a href="?action=hapusidcalonprestasimahasiswa&idcalonprestasimahasiswa=<?php echo $baris['id_calon_prestasi_mahasiswa'] ?>" class="delete"><img src="../img/hapus.png" alt="Hapus" width="13" height="13" border="0" /></a>
	
	
	<?php
  }
  ?></td>
      </tr>
      
 <?php
		  }
		  ?>
      
    </table>