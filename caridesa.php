
<?php
require 'connect.php';

if(isset($_GET["cari_nama"])){
  $cari_nama = $_GET["cari_nama"];
}else{
  $cari_nama = "";
}


$querysearch	=" 	SELECT distinct a.id_desa,a.nama_desa, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
					FROM desa as a join kecamatan on kecamatan.id_kecamatan=a.id_kecamatan where upper(a.nama_desa) like upper('%$cari_nama%')
				";

$hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
    {
          $id_desa=$row['id_desa'];
          $nama_desa=$row['nama_desa'];
          $longitude=$row['longitude'];
          $latitude=$row['latitude'];
          $dataarray[]=array('id_desa'=>$id_desa,'nama_desa'=>$nama_desa,'longitude'=>$longitude,'latitude'=>$latitude);
    }
echo json_encode ($dataarray);
?>
