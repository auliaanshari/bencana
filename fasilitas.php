<?php
include ('connect.php');
$id=$_GET["id"];
$dataarray=array();
 
$sql=pg_query("select distinct fasilitas_shelter.id_fasilitas, fasilitas_shelter.fasilitas 
			from shelter, detail_fasilitas_shelter , fasilitas_shelter 
			where detail_fasilitas_shelter.id_fasilitas=fasilitas_shelter.id_fasilitas and 
			shelter.id_shelter=detail_fasilitas_shelter.id_shelter
			order by fasilitas_shelter.id_fasilitas");
			
while($row = pg_fetch_array($sql)){
	$id=$row['id_fasilitas'];
	$nama=$row['fasilitas'];
	$dataarray[]=array('id_fasilitas'=>$id,'fasilitas'=>$nama);
}
echo json_encode ($dataarray);
   			  
?>