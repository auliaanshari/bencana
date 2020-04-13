<?php
    include("connect.php");
$kece1_id = $_GET['kec'];
        $querysearch= "SELECT distinct tanggal_kejadian, nama_bahaya, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
		from kejadian_bencana
		left join kecamatan on kecamatan.id_kecamatan=kejadian_bencana.id_kecamatan
		join jenis_bahaya on jenis_bahaya.id_bahaya= kejadian_bencana.id_bahaya
		WHERE kecamatan.id_kecamatan='$kece1_id'";

        $hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$tanggal_kejadian=$row['tanggal_kejadian'];
		$nama_bahaya=$row['nama_bahaya'];
		$nama_kecamatan=$row['nama_kecamatan'];
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$dataarray[]=array('tanggal_kejadian'=>$tanggal_kejadian,'nama_bahaya'=>$nama_bahaya,'nama_kecamatan'=>$nama_kecamatan, 'longitude'=>$longitude,'latitude'=>$latitude);
		 
	}
            echo json_encode ($dataarray);
?>