  <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
       <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    

      
  	<script type="text/JavaScript">
var xmlhttp = createRequestObject();
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}







// bisa diakses dimanapun
function GETPILIHAN(combobox)
{
    var kode = combobox.value;
    if (!kode) return;
    xmlhttp.open('get', 'get_pilihan_ajax.php?kode='+kode, true);// ambil controler dahulu
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("pilihan").innerHTML = xmlhttp.responseText;
        }
		
		

    }
    xmlhttp.send(null);
	
}



//mengakses nama mahasiswa
function GETNAMA(combobox)
{
    var kode = combobox.value;
    if (!kode) return;
    xmlhttp.open('get', 'get_carifile_ajax.php?kode='+kode, true);// ambil controler dahulu
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("pilihan1").innerHTML = xmlhttp.responseText;
        }
		
		

    }
    xmlhttp.send(null);
	
}








//mengakses nama mahasiswa
function GETNAMADOSEN(combobox)
{
    var kode = combobox.value;
    if (!kode) return;
    xmlhttp.open('get', 'get_carifile_dosen_ajax.php?kode='+kode, true);// ambil controler dahulu
    xmlhttp.onreadystatechange = function() {
        if ((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
        {
             document.getElementById("pilihan2").innerHTML = xmlhttp.responseText;
        }
		
		

    }
    xmlhttp.send(null);
	
}




</script>








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




<!--input mahasiswa-->
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tombol-simpan").click(function(){
			var data = $('.form-user').serialize();
			$.ajax({
				type: 'POST',
				url: "aksi.php",
				data: data,
				success: function() {
					$('.tampildata').load("tampil.php");
				}
			});
		});
	});
	</script>




<!--input dosen-->
	<script type="text/javascript">
	$(document).ready(function(){
		$(".tombol-simpan2").click(function(){
			var data = $('.form-user-dosen').serialize();
			$.ajax({
				type: 'POST',
				url: "aksi_dosen.php",
				data: data,
				success: function() {
					$('.tampildata_dosen').load("tampil_dosen.php");
				}
			});
		});
	});
	</script>




<!---Hapus Ajax Dosen dan mahasiswa-->
<link rel="stylesheet" type="text/css" href="jscss/css/smoothness/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="jscss/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="jscss/js/jquery-ui-1.8.1.custom.min.js"></script>
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


<script type="text/javascript">
$(function() {
   $(".delete1").click(function(){
	  var request = $(this).attr("href");
      var record = $(this).parents("tr");
      
      $("#dialog1").dialog({
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
						$("#dialog1").dialog("close");
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







<!--- Show Hidden Mahasiswa dan Dosen-->
<script language="javascript">
function toggle_mahasiswa() {

var ele = document.getElementById("sembunyikan_tambah_mahasiswa");

var text = document.getElementById("penampakan_tambah_mahasiswa");

if(ele.style.display == "block") {

ele.style.display = "none";
text.innerHTML = "<img src='../img/add.png' width='30' height='30' />";

}
else {
ele.style.display = "block";
text.innerHTML = "<img src='../img/min.png' width='30' height='30' />";
}
} 
</script>

<script language="javascript">
function toggle_dosen() {

var ele = document.getElementById("sembunyikan_tambah_dosen");

var text = document.getElementById("penampakan_tambah_dosen");

if(ele.style.display == "block") {

ele.style.display = "none";
text.innerHTML = "<img src='../img/add.png' width='30' height='30' />";

}
else {
ele.style.display = "block";
text.innerHTML = "<img src='../img/min.png' width='30' height='30' />";
}
} 
</script>
</body>
</html>
