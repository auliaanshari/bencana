<?php
    include("connect.php");
$id = $_GET["kap"];
        $querysearch= "SELECT distinct a.nama_shelter, a.id_shelter , a.kapasitas_shelter , st_x(st_centroid(a.geom)) as longitude,st_y(st_centroid(a.geom)) as latitude 
		from shelter as a left join detail_shelter as c on a.id_shelter=c.id_shelter 
		join kecamatan on c.id_kecamatan=kecamatan.id_kecamatan 
		where a.kapasitas_shelter BETWEEN $id";

        $hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		  $id_shelter=$row['id_shelter'];
		  $nama_shelter=$row['nama_shelter'];
		  $kapasitas_shelter=$row['kapasitas_shelter'];
		  $longitude=$row['longitude'];
		  $latitude=$row['latitude'];
		  $dataarray[]=array('id_shelter'=>$id_shelter,'nama_shelter'=>$nama_shelter,'kapasitas_shelter'=>$kapasitas_shelter,'longitude'=>$longitude,'latitude'=>$latitude);
	}
            echo json_encode ($dataarray);
?>