<?php
include "../pengaturan.php";

$idcalonprestasimahasiswa = $_REQUEST['idcalonprestasimahasiswa'];
mysqli_query ($connect,"DELETE FROM calon_prestasi_mahasiswa WHERE id_calon_prestasi_mahasiswa ='$idcalonprestasimahasiswa'");
?>