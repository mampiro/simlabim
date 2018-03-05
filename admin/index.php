<?php session_start(); 
if($_SESSION['session_idadmin'])
{
?>
<?php include "header.php"; ?>


<?php include "sidebar.php"; ?>










        
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">DASHBOARD</h1>
                      

                  </div>
                </div>
                <!-- /. ROW  --><!-- /. ROW  --><!-- /. ROW  -->


                <div class="row"></div>
                <!--/.Row--><!--/.Row--><!--/.ROW-->

              Ini adalah halaman Utama SIMKATMAWA
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