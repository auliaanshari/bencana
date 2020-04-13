<?php
require 'connect.php';
$dataarray=[];
if(isset($_GET['tgl']))
{
$tgl = $_GET['tgl']; 

$tgl = DateTime::createFromFormat('m-d-Y', $tgl)->format('Y-m-d');
$querysearch = "SELECT a.id_kecamatan, d.kejadian_ke, d.tanggal_kejadian, b.nama_bahaya , a.nama_kecamatan, 
                ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude  
                from kejadian_bencana as d 
                left join kecamatan as a ON a.id_kecamatan=d.id_kecamatan
                join jenis_bahaya as b ON b.id_bahaya=d.id_bahaya 
                where d.tanggal_kejadian='$tgl' and a.id_kecamatan=d.id_kecamatan 
                group by d.tanggal_kejadian, kejadian_ke, a.nama_kecamatan, b.nama_bahaya,  geom";

			   
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $bahaya=$row['nama_bahaya'];
		  $kecamatan=$row['nama_kecamatan'];
          $tanggal=$row['tanggal_kejadian'];
          $kejadian=$row['kejadian_ke'];
          $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
          $dataarray[]=array('nama_bahaya'=>$bahaya,'nama_kecamatan'=>$kecamatan,'tanggal_kejadian'=>$tanggal, 'kejadian_ke'=>$kejadian,'longitude'=>$longitude, 'latitude'=>$latitude, 'id_kecamatan'=>$row['id_kecamatan']);
    }
echo json_encode ($dataarray);
}
else
{
	$querysearch = "SELECT a.id_kecamatan, d.kejadian_ke, d.tanggal_kejadian, b.nama_bahaya , a.nama_kecamatan, ST_X(ST_Centroid(a.geom)) AS longitude, ST_Y(ST_CENTROID(a.geom)) As latitude 
                    from kejadian_bencana as d 
                    left join kecamatan as a ON a.id_kecamatan=d.id_kecamatan
                    join jenis_bahaya as b ON a.id_bahaya=d.id_bahaya  
                    where a.id_kecamatan not in ($_GET[id_kecamatan])";
$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
      $namabay=$row['nama_bahaya'];
      $namakec=$row['nama_kecamatan'];
          $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
          $dataarray[]=array('longitude'=>$longitude, 'latitude'=>$latitude, 'id_kecamatan'=>$row['id_kecamatan']);
    }
echo json_encode ($dataarray);	
}
?>