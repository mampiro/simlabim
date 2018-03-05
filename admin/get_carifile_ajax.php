<?php session_start();
include "../pengaturan.php";



$nama= $_GET['kode'];




 


 if($_SESSION['id_fakultas']=="121")
{
$mahasiswa=mysqli_query($connect, "select a.*, b.* from student a


left join prodi b on a.id_prodi=b.id_prodi

where a.full_name like '%$nama%'


");

}



else if($_SESSION['id_fakultas']==""&&$_SESSION['id_prodi']=="")
  {
$mahasiswa=mysqli_query($connect, "select a.*, b.* from student a
left join prodi b on a.id_prodi=b.id_prodi

where a.full_name like '%$nama%' 
");

  } 
 else if($_SESSION['id_prodi']=="")
  {
$mahasiswa=mysqli_query($connect, "select a.*, b.*,c.* from student a


left join prodi b on a.id_prodi=b.id_prodi

left join fakultas c on b.id_fakultas=c.id_fakultas


where a.full_name like '%$nama%' and c.id_fakultas='".$_SESSION['id_fakultas']."'


");  } 
  else
  {
$mahasiswa=mysqli_query($connect, "select a.*, b.* from student a


left join prodi b on a.id_prodi=b.id_prodi

where a.full_name like '%$nama%' and a.id_prodi='".$_SESSION['id_prodi']."'


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
    <td width="4%" bgcolor="#E2FB37"><input name="all" id="all" onclick="checkAll('test_form', this.checked);" type="checkbox"></td>
      <td width="14%" bgcolor="#E2FB37">Nim</td>

  
    <td width="39%" bgcolor="#E2FB37">Mahasiswa</td>
    <td width="29%" bgcolor="#E2FB37">Prodi</td>
   
     <td width="14%" bgcolor="#E2FB37">Angkatan</td>


 
	
	
  </tr>
  
   <?php
		
		  while($baris=mysqli_fetch_array($mahasiswa))
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
?>      <td><input type="checkbox" name ="nim[]" id="hapus" value="<?php echo $baris['nim'];?>"></td>

      <td><?php echo $baris['nim'];?></td>

    <td><?php echo $baris['full_name'];?></td>
    <td><?php echo $baris['prodi'];?></td>
       <td><?php echo $baris['angkatan_id'];?></td>

  </tr>
  
  
  <?php
 
  }
 
  ?>
</table>