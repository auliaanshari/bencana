<?php
    include("connect.php");
$id = $_GET["luas"];
        $querysearch= "SELECT distinct a.id_bahaya,a.nama_bahaya, luas_bahaya, kecamatan.nama_kecamatan, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
		FROM jenis_bahaya as a join kajian_bencana on kajian_bencana.id_bahaya=a.id_bahaya
		join desa on kajian_bencana.id_desa=desa.id_desa
		join kecamatan on kecamatan.id_kecamatan=desa.id_kecamatan
		where luas_bahaya BETWEEN $id order by luas_bahaya desc";

        $hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$id_bahaya=$row['id_bahaya'];
		$luas_bahaya=$row['luas_bahaya'];
		$nama_bahaya=$row['nama_bahaya'];
		$nama_kecamatan=$row['nama_kecamatan'];
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$dataarray[]=array('id_bahaya'=>$id_bahaya, 'luas_bahaya'=>$luas_bahaya,'nama_bahaya'=>$nama_bahaya,'nama_kecamatan'=>$nama_kecamatan, 'longitude'=>$longitude,'latitude'=>$latitude);
	}
            echo json_encode ($dataarray);
?>