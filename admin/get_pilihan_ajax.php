<?php
//echo $_GET['kode'];

if($_GET['kode']=="nama")
{
?>
Nama <input name="nama" type="text" onkeyup="GETNAMA(this);" />
<?php
}
else
{
	?>
Nim <input name="nim" type="text" />
<?php
}
?>