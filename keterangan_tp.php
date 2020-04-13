<?php
require 'connect.php';

$keterangan_id=$_GET['keterangan'];
$querysearch ="SELECT distinct keterangan.id_keterangan, keterangan.keterangan,jenis_bahaya.nama_bahaya, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
FROM keterangan 
join risiko_bencana on risiko_bencana.id_keterangan=keterangan.id_keterangan
join jenis_bahaya on risiko_bencana.id_bahaya=jenis_bahaya.id_bahaya
join kecamatan on kecamatan.id_kecamatan=risiko_bencana.id_kecamatan 
WHERE keterangan.id_keterangan='$keterangan_id'";

$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id_keterangan=$row['id_keterangan'];
          $keterangan=$row['keterangan'];
          $nama_bahaya=$row['nama_bahaya'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id_keterangan'=>$id_keterangan,'keterangan'=>$keterangan, 'nama_bahaya'=>$nama_bahaya, 'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode($dataarray).'';
?>
