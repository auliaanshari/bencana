<?php
require 'connect.php';

$kelas_id=$_GET['kelas'];
$querysearch ="SELECT distinct kelas.id_kelas, kelas.nama_kelas, kecamatan.nama_kecamatan, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
FROM kelas 
join risiko_bencana on risiko_bencana.id_kelas=kelas.id_kelas
join kecamatan on kecamatan.id_kecamatan=risiko_bencana.id_kecamatan 
WHERE kelas.id_kelas='$kelas_id'";

$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id_kelas=$row['id_kelas'];
          $nama_kelas=$row['nama_kelas'];
          $nama_kecamatan=$row['nama_kecamatan'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id_kelas'=>$id_kelas,'nama_kelas'=>$nama_kelas, 'nama_kecamatan'=>$nama_kecamatan, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode($dataarray).'';
?>
