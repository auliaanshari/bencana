<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "@bencana2020";
	$port = "5432";
	$dbname = "bencana";
	$conn = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>
