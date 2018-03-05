
<?php 
date_default_timezone_set('Asia/Jakarta');

include "../pengaturan.php";
include "javascript.php";
//include "query.php";

 ?>
 


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIMKATMAWA</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    	
        
        
        
  
        
        
        <script src="date/datetimepicker_css.js"></script>
        

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SIMKATMAWA UMY</a>
            </div>

            <div class="header-right"><img src="../images/Umy-logo.gif" width="62" height="63"></div>
        </nav>
        
        <div id="topless">
        <table width="100%" border="0" cellpadding="5" cellspacing="2">
  <tr>
    <td width="62%">Nama Login Anda : <?=$_SESSION['session_nama'];?> =>
    
  
  
  <?php
  
  if($_SESSION['id_fakultas']==""&&$_SESSION['id_prodi']=="")
  {
	  echo "Admin Utama";
  } 
 else if($_SESSION['id_prodi']=="")
  {
	  echo "Admin Fakultas";
  } 
  else
  {
 ?>

    Prodi / UKM =>
    
    <?php
    
	//echo $_SESSION['id_prodi'];
	
	
	
	
	$q=mysqli_query($connect,"select*from prodi where id_prodi='".$_SESSION['id_prodi']."'");
	$objek=mysqli_fetch_object($q);
	echo $objek->prodi;
	
	}
	
	?>
    
    

    
    
    </td>
    <td width="38%" align="right"><a href="index.php">Dashboard</a> 
    
   <?php
   if($_SESSION['session_usermanagement']=="ya")
   {
	   ?>
    
    
    | <a href="usermanagement.php">Usermanagement</a> 
    
    <?php
   }
	   ?>
    
    | <a href="ganti_password.php">Ubah Password</a></td>
  </tr>
</table>

        
        
        
        
</div>
        <!-- /. NAV TOP  -->