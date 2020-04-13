<?php
    include("connect.php");
$bulan1 = $_GET['bulan1'];
$tahun1 = $_GET['tahun1'];
        $querysearch= "SELECT distinct tanggal_penanggulangan, nama_bahaya, nama_kecamatan, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
		from detail_penanggulangan
		left join kecamatan on kecamatan.id_kecamatan=detail_penanggulangan.id_kecamatan
		join jenis_bahaya on jenis_bahaya.id_bahaya= detail_penanggulangan.id_bahaya
		where date_part('month',tanggal_penanggulangan) = '$bulan1' and date_part('year',tanggal_penanggulangan) = '$tahun1'";

        $hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$tanggal_penanggulangan=$row['tanggal_penanggulangan'];
		$nama_bahaya=$row['nama_bahaya'];
		$nama_kecamatan=$row['nama_kecamatan'];
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$dataarray[]=array('tanggal_penanggulangan'=>$tanggal_penanggulangan,'nama_bahaya'=>$nama_bahaya,'nama_kecamatan'=>$nama_kecamatan, 'longitude'=>$longitude,'latitude'=>$latitude);
		 
	}
            echo json_encode ($dataarray);
?>