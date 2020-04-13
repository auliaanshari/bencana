<?php
require 'connect.php';

$fasilitas_id=$_GET['fasilitas'];
$querysearch ="SELECT distinct fasilitas_shelter.id_fasilitas, fasilitas_shelter.fasilitas, shelter.nama_shelter, ST_X(ST_Centroid(shelter.geom)) AS longitude, ST_Y(ST_CENTROID(shelter.geom)) As latitude
FROM fasilitas_shelter
join detail_fasilitas_shelter on detail_fasilitas_shelter.id_fasilitas=fasilitas_shelter.id_fasilitas
join shelter on shelter.id_shelter=detail_fasilitas_shelter.id_shelter 
WHERE fasilitas_shelter.id_fasilitas='$fasilitas_id'";

$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id_fasilitas=$row['id_fasilitas'];
          $fasilitas=$row['fasilitas'];
          $nama_shelter=$row['nama_shelter'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id_fasilitas'=>$id_fasilitas,'fasilitas'=>$fasilitas,'nama_shelter'=>$nama_shelter, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode($dataarray).'';
?>
