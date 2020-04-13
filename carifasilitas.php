<?php
require 'connect.php';


$lay=$_GET['lay'];
$lay = explode(",", $lay);
$c = "";
for($i=0;$i<count($lay);$i++){
	if($i == count($lay)-1){
		$c .= "'".$lay[$i]."'";
	}else{
		$c .= "'".$lay[$i]."',";
	}
}
$querysearch="select shelter.id_shelter,shelter.nama_shelter, kapasitas_shelter, ST_X(ST_Centroid(geom)) AS lng, ST_Y(ST_CENTROID(geom)) As lat 
			from shelter join detail_fasilitas_shelter on shelter.id_shelter=detail_fasilitas_shelter.id_shelter 
			where detail_fasilitas_shelter.id_fasilitas in ($c) 
			group by shelter.id_shelter,shelter.nama_shelter,shelter.kapasitas_shelter";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$id_shelter=$row['id_shelter'];
		$nama_shelter=$row['nama_shelter'];
		$kapasitas=$row['kapasitas_shelter'];
		$longitude=$row['lng'];
		$latitude=$row['lat'];

		$dataarray[]=array('id_shelter'=>$id_shelter,'nama_shelter'=>$nama_shelter,'kapasitas_shelter'=>$kapasitas,'longitude'=>$longitude,'latitude'=>$latitude);
	}
echo json_encode ($dataarray);
?>