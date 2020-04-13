<?php
require 'connect.php';

$kecamatan_id=$_GET['kecamatan'];
$querysearch ="SELECT distinct kecamatan.id_kecamatan, kecamatan.nama_kecamatan, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
FROM kecamatan WHERE kecamatan.id_kecamatan='$kecamatan_id'";

$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id_kecamatan=$row['id_kecamatan'];
          $nama_kecamatan=$row['nama_kecamatan'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id_kecamatan'=>$id_kecamatan,'nama_kecamatan'=>$nama_kecamatan, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode($dataarray).'';
?>
