<script language="javascript">
 //** Form Inventaris
 
 
  var xmlhttp = false;

try {
xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
} catch (e) {
try {
xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
} catch (E) {
xmlhttp = false;
}
}

if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
xmlhttp = new XMLHttpRequest();
}
 
 
 
 
function DataInventaris(kdstat) {
var obj=document.getElementById("inventaris");
var url='status.php?kdstat='+kdstat;



xmlhttp.open("GET", url);

xmlhttp.onreadystatechange = function() {
if ( xmlhttp.readyState == 4 && xmlhttp.status == 200 ) {
obj.innerHTML = xmlhttp.responseText;
} else {
obj.innerHTML = "<div align ='center'><img src='../image/loading.gif' height='30' width='30'></div>";
}
}
xmlhttp.send(null);
}



















</script>


