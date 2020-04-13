<?php
require 'connect.php';

$penanggulangan_id=$_GET['penanggulangan'];
$querysearch ="SELECT distinct penanggulangan.id_penanggulangan, penanggulangan.bentuk_penanggulangan, jenis_bahaya.nama_bahaya, kecamatan.nama_kecamatan, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
FROM penanggulangan
join detail_penanggulangan on detail_penanggulangan.id_penanggulangan=penanggulangan.id_penanggulangan 
join jenis_bahaya on jenis_bahaya.id_bahaya=detail_penanggulangan.id_bahaya
join kecamatan on kecamatan.id_kecamatan=detail_penanggulangan.id_kecamatan 
WHERE penanggulangan.id_penanggulangan='$penanggulangan_id'";

$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id_penanggulangan=$row['id_penanggulangan'];
          $bentuk_penanggulangan=$row['bentuk_penanggulangan'];
          $nama_kecamatan=$row['nama_kecamatan'];
          $nama_bahaya=$row['nama_bahaya'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id_penanggulangan'=>$id_penanggulangan,'bentuk_penanggulangan'=>$bentuk_penanggulangan, 'nama_kecamatan'=>$nama_kecamatan, 'nama_bahaya'=>$nama_bahaya, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode($dataarray).'';
?>
