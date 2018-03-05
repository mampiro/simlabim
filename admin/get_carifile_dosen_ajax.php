<?php session_start();
include "../pengaturan.php";



$nama= $_GET['kode'];




 if($_SESSION['id_fakultas']=="121")
{
$dosen=mysqli_query($connect, "select a.*, b.* from dosen a


left join prodi b on a.id_prodi=b.id_prodi

where a.nama like '%$nama%'


");

}



else if($_SESSION['id_fakultas']==""&&$_SESSION['id_prodi']=="")
  {
$dosen=mysqli_query($connect, "select a.*, b.* from dosen a
left join prodi b on a.id_prodi=b.id_prodi

where a.nama like '%$nama%' 
");

  } 
 else if($_SESSION['id_prodi']=="")
  {
$dosen=mysqli_query($connect, "select a.*, b.*,c.* from dosen a


left join prodi b on a.id_prodi=b.id_prodi

left join fakultas c on b.id_fakultas=c.id_fakultas


where a.nama like '%$nama%' and c.id_fakultas='".$_SESSION['id_fakultas']."'


");  } 
  else
  {
$dosen=mysqli_query($connect, "select a.*, b.* from dosen a


left join prodi b on a.id_prodi=b.id_prodi

where a.nama like '%$nama%' and a.id_prodi='".$_SESSION['id_prodi']."'


");
	  
	  
  }









?>




<script type="text/javascript">
<!--
function checkAll(frm, checkedOn) {

	// have we been passed an ID
	if (typeof frm == "string") {
		frm = document.getElementById(frm);
	}
	
	// Get all of the inputs that are in this form
	var inputs = frm.getElementsByTagName("input");

	// for each input in the form, check if it is a checkbox
	for (var i = 0; i < inputs.length; i++) {
		if (inputs[i].type == "checkbox") {
			inputs[i].checked = checkedOn;
		}
	}
}
// -->
</script>



<table width="97%"  border="0" cellpadding="5" cellspacing="1">
  <tr>
    <td width="3%" bgcolor="#E2FB37"><input name="all" id="all" onclick="checkAll('test_form1', this.checked);" type="checkbox"></td>
      <td width="20%" bgcolor="#E2FB37">Nik</td>

  
    <td width="37%" bgcolor="#E2FB37">Nama</td>
    
    <td width="14%" bgcolor="#E2FB37">NIDN</td>
    <td width="26%" bgcolor="#E2FB37">Prodi</td>
   
 

 
	
	
  </tr>
  
   <?php
		
		  while($baris=mysqli_fetch_array($dosen))
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
?>      <td><input type="checkbox" name ="id_dosen[]" id="hapus" value="<?php echo $baris['id_dosen'];?>"></td>

      <td><?php echo $baris['nik'];?></td>

    <td><?php echo $baris['nama'];?></td>
        <td><?php echo $baris['nidn'];?></td>

    <td><?php echo $baris['prodi'];?></td>
       

  </tr>
  
  
  <?php
 
  }
 
  ?>
</table>