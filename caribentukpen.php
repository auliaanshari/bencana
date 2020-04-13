<?php
    include("connect.php");
$bentuk = $_GET['bentuk'];
        $querysearch= "SELECT distinct tanggal_penanggulangan, bentuk_penanggulangan, nama_bahaya, nama_kecamatan, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
		from detail_penanggulangan
		left join kecamatan on kecamatan.id_kecamatan=detail_penanggulangan.id_kecamatan
		join jenis_bahaya on jenis_bahaya.id_bahaya= detail_penanggulangan.id_bahaya
		join penanggulangan on penanggulangan.id_penanggulangan= detail_penanggulangan.id_penanggulangan
		WHERE penanggulangan.id_penanggulangan='$bentuk'";

        $hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$tanggal_penanggulangan=$row['tanggal_penanggulangan'];
		$nama_bahaya=$row['nama_bahaya'];
		$bentuk_penanggulangan=$row['bentuk_penanggulangan'];
		$nama_kecamatan=$row['nama_kecamatan'];
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$dataarray[]=array('tanggal_penanggulangan'=>$tanggal_penanggulangan,'bentuk_penanggulangan'=>$bentuk_penanggulangan,'nama_bahaya'=>$nama_bahaya,'nama_kecamatan'=>$nama_kecamatan, 'longitude'=>$longitude,'latitude'=>$latitude);
		 
	}
            echo json_encode ($dataarray);
?>