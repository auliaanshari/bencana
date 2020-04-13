<?php
    include("connect.php");
$ket = $_GET['ket'];
$bay = $_GET['bay'];
        $querysearch= "SELECT distinct  kecamatan.nama_kecamatan, a.nama_bahaya, d.keterangan, c.nama_kelas, ST_X(ST_Centroid(kecamatan.geom)) AS longitude, ST_Y(ST_CENTROID(kecamatan.geom)) As latitude
		FROM risiko_bencana join kelas as c on risiko_bencana.id_kelas=c.id_kelas
		join jenis_bahaya as a on risiko_bencana.id_bahaya=a.id_bahaya
		join kecamatan on kecamatan.id_kecamatan=risiko_bencana.id_kecamatan
		join keterangan as d on d.id_keterangan=risiko_bencana.id_keterangan
		WHERE c.id_kelas='C05' and d.id_keterangan='$ket' and a.id_bahaya='$bay'";

        $hasil=pg_query($querysearch);
while($row = pg_fetch_array($hasil))
	{
		$id_bahaya=$row['id_bahaya'];
		$nama_bahaya=$row['nama_bahaya'];
		$nama_kelas=$row['nama_kelas'];
		$keterangan=$row['keterangan'];
		$nama_kecamatan=$row['nama_kecamatan'];
		$longitude=$row['longitude'];
		$latitude=$row['latitude'];
		$dataarray[]=array('id_bahaya'=>$id_bahaya,'nama_bahaya'=>$nama_bahaya,'keterangan'=>$keterangan,'nama_kelas'=>$nama_kelas, 'nama_kecamatan'=>$nama_kecamatan, 'longitude'=>$longitude,'latitude'=>$latitude);
		 
	}
            echo json_encode ($dataarray);
?>