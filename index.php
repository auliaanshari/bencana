<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>KRB Padang</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1TwYksj1uQg1V_5yPUZqwqYYtUIvidrY"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-house-damage"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIG KRB Padang</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <li class="nav-item active">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOne" id="acc2">
        <i class= "fas fa-search"></i>
        <span>Search by</span><a>
      <div id="collapseOne" class="collapse" data-parent="#acc2">
      <ul class="nav-item"> 
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
              <i class="fas fa-list"></i>
              <span>Bahaya</span>
            </a>
            <div id="collapseTwo" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="bahaya" >
                <?php
                include("connect.php"); 
                $bahaya=pg_query("select * from jenis_bahaya ");
                while($rowbahaya = pg_fetch_assoc($bahaya))
                {
                echo"<option value=".$rowbahaya['id_bahaya'].">".$rowbahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="caritpbahaya"  value="cari" onclick="caritpbahaya()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" >
              <i class="fas fa-list"></i>
              <span>Kecamatan</span>
            </a>
            <div id="collapseThree" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="kecamatan" >
                <?php
                include("connect.php"); 
                $kecamatan=pg_query("select * from kecamatan ");
                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                {
                echo"<option value=".$rowkecamatan['id_kecamatan'].">".$rowkecamatan['nama_kecamatan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="caritpkecamatan"  value="cari" onclick="caritpkecamatan()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse2" >
              <i class="fas fa-sort-alpha-asc"></i>
              <span>Desa</span>
            </a>
            <div id="collapse2" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <input type="text" class="form-control" id="caridesa" name="caridesa" placeholder="Search..." >
              <br>
              <button type="submit" class="btn btn-default" value="caridesa" onclick="carinamadesa()"> <i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>
          
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse1">
              <i class="fas fa-list"></i>
              <span>Kelas</span>
            </a>
            <div id="collapse1" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="kelas" >
                <?php
                include("connect.php"); 
                $kelas=pg_query("select * from kelas ");
                while($rowkelas = pg_fetch_assoc($kelas))
                {
                echo"<option value=".$rowkelas['id_kelas'].">".$rowkelas['nama_kelas']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="caritpkelas"  value="cari" onclick="caritpkelas()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <div class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse3" >
              <i class="fas fa-list"></i>
              <span>Keterangan</span>
            </a>
            <div id="collapse3" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="keterangan" >
                <?php
                include("connect.php"); 
                $keterangan=pg_query("select * from keterangan ");
                while($rowketerangan = pg_fetch_assoc($keterangan))
                {
                echo"<option value=".$rowketerangan['id_keterangan'].">".$rowketerangan['keterangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="caritpketerangan"  value="cari" onclick="caritpketerangan()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse4" >
              <i class="fas fa-sort-alpha-asc"></i>
              <span>Shelter</span>
            </a>
            <div id="collapse4" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <input type="text" class="form-control" id="carishelter" name="carishelter" placeholder="Search..." >
              <br>
              <button type="submit" class="btn btn-default" value="carishelter" onclick="carinamashelter()"> <i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse5">
              <i class="fas fa-list"></i>
              <span>Fasilitas Shelter</span>
            </a>
            <div id="collapse5" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="fasilitas" >
                <?php
                include("connect.php"); 
                $fasilitas=pg_query("select * from fasilitas_shelter ");
                while($rowfasilitas = pg_fetch_assoc($fasilitas))
                {
                echo"<option value=".$rowfasilitas['id_fasilitas'].">".$rowfasilitas['fasilitas']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="caritpfasilitas"  value="cari" onclick="caritpfasilitas()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse11" >
              <i class="fas fa-list"></i>
              <span>Penanggulangan</span>
            </a>
            <div id="collapse11" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="penanggulangan" >
                <?php
                include("connect.php"); 
                $penanggulangan=pg_query("select * from penanggulangan ");
                while($rowpenanggulangan = pg_fetch_assoc($penanggulangan))
                {
                echo"<option value=".$rowpenanggulangan['id_penanggulangan'].">".$rowpenanggulangan['bentuk_penanggulangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="caritppenanggulangan"  value="cari" onclick="caritppenanggulangan()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse7" >
              <i class="fas fa-list"></i>
              <span>Luas Bahaya</span>
            </a>
            <div id="collapse7" class="collapse" data-parent="#collapseOne">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="luas" >
                <option value="0 AND 1000">1000 Hektare</option>
                <option value="1001 AND 5000">1001 s/d 5000 Hektare</option>
                <option value="5001 AND 20000">++5000 Hektare</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="cariluas"  value="cari" onclick="cariluas()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>
      </ul>
      </div> 
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <li class="nav-item active">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseOnee" id="acc2">
        <i class= "fas fa-search"></i>
        <span>Kajian Risiko Bencana</span><a>
      <div id="collapseOnee" class="collapse" data-parent="#acc2">
      <ul class="nav-item"> 

      <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse21">
              <i class="fas fa-list"></i>
              <span>Kelas Bahaya</span>
            </a>
            <div id="collapse21" class="collapse" data-parent="#collapseOnee">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="jenis_bahaya1" >
                <?php
                include("connect.php"); 
                $jenis_bahaya=pg_query("select * from jenis_bahaya ");
                while($rowjenis_bahaya = pg_fetch_assoc($jenis_bahaya))
                {
                echo"<option value=".$rowjenis_bahaya['id_bahaya'].">".$rowjenis_bahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="keterangan1" >
                <?php
                include("connect.php"); 
                $keterangan=pg_query("select * from keterangan ");
                while($rowketerangan = pg_fetch_assoc($keterangan))
                {
                echo"<option value=".$rowketerangan['id_keterangan'].">".$rowketerangan['keterangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkelbahaya"  value="cari" onclick="tampilkelbahaya()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse22">
              <i class="fas fa-list"></i>
              <span>Kelas Penduduk Terpapar</span>
            </a>
            <div id="collapse22" class="collapse" data-parent="#collapseOnee">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="jenis_bahaya2" >
                <?php
                include("connect.php"); 
                $jenis_bahaya=pg_query("select * from jenis_bahaya ");
                while($rowjenis_bahaya = pg_fetch_assoc($jenis_bahaya))
                {
                echo"<option value=".$rowjenis_bahaya['id_bahaya'].">".$rowjenis_bahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="keterangan2" >
                <?php
                include("connect.php"); 
                $keterangan=pg_query("select * from keterangan ");
                while($rowketerangan = pg_fetch_assoc($keterangan))
                {
                echo"<option value=".$rowketerangan['id_keterangan'].">".$rowketerangan['keterangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkelpenduduk"  value="cari" onclick="tampilkelpenduduk()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>
          
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse23">
              <i class="fas fa-list"></i>
              <span>Kelas Kerugian</span>
            </a>
            <div id="collapse23" class="collapse" data-parent="#collapseOnee">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="jenis_bahaya3" >
                <?php
                include("connect.php"); 
                $jenis_bahaya=pg_query("select * from jenis_bahaya ");
                while($rowjenis_bahaya = pg_fetch_assoc($jenis_bahaya))
                {
                echo"<option value=".$rowjenis_bahaya['id_bahaya'].">".$rowjenis_bahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="keterangan3" >
                <?php
                include("connect.php"); 
                $keterangan=pg_query("select * from keterangan ");
                while($rowketerangan = pg_fetch_assoc($keterangan))
                {
                echo"<option value=".$rowketerangan['id_keterangan'].">".$rowketerangan['keterangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkelkerugian"  value="cari" onclick="tampilkelkerugian()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse24">
              <i class="fas fa-list"></i>
              <span>Kelas Kerusakan</span>
            </a>
            <div id="collapse24" class="collapse" data-parent="#collapseOnee">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="jenis_bahaya4" >
                <?php
                include("connect.php"); 
                $jenis_bahaya=pg_query("select * from jenis_bahaya ");
                while($rowjenis_bahaya = pg_fetch_assoc($jenis_bahaya))
                {
                echo"<option value=".$rowjenis_bahaya['id_bahaya'].">".$rowjenis_bahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="keterangan4" >
                <?php
                include("connect.php"); 
                $keterangan=pg_query("select * from keterangan ");
                while($rowketerangan = pg_fetch_assoc($keterangan))
                {
                echo"<option value=".$rowketerangan['id_keterangan'].">".$rowketerangan['keterangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkelkerusakan"  value="cari" onclick="tampilkelkerusakan()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse25">
              <i class="fas fa-list"></i>
              <span>Kelas Kapasitas</span>
            </a>
            <div id="collapse25" class="collapse" data-parent="#collapseOnee">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="jenis_bahaya5" >
                <?php
                include("connect.php"); 
                $jenis_bahaya=pg_query("select * from jenis_bahaya ");
                while($rowjenis_bahaya = pg_fetch_assoc($jenis_bahaya))
                {
                echo"<option value=".$rowjenis_bahaya['id_bahaya'].">".$rowjenis_bahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="keterangan5" >
                <?php
                include("connect.php"); 
                $keterangan=pg_query("select * from keterangan ");
                while($rowketerangan = pg_fetch_assoc($keterangan))
                {
                echo"<option value=".$rowketerangan['id_keterangan'].">".$rowketerangan['keterangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkelkapasitas"  value="cari" onclick="tampilkelkapasitas()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse26">
              <i class="fas fa-list"></i>
              <span>Kelas Risiko</span>
            </a>
            <div id="collapse26" class="collapse" data-parent="#collapseOnee">
              <div class="bg-white py-2 collapse-inner rounded">
              <select class="form-control" id="jenis_bahaya6" >
                <?php
                include("connect.php"); 
                $jenis_bahaya=pg_query("select * from jenis_bahaya ");
                while($rowjenis_bahaya = pg_fetch_assoc($jenis_bahaya))
                {
                echo"<option value=".$rowjenis_bahaya['id_bahaya'].">".$rowjenis_bahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="keterangan6" >
                <?php
                include("connect.php"); 
                $keterangan=pg_query("select * from keterangan ");
                while($rowketerangan = pg_fetch_assoc($keterangan))
                {
                echo"<option value=".$rowketerangan['id_keterangan'].">".$rowketerangan['keterangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkelrisiko"  value="cari" onclick="tampilkelrisiko()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

      </ul>
      </div> 
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <li class="nav-item active">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseThe" id="acc2">
        <i class= "fas fa-search"></i>
        <span>Kejadian Bencana</span><a>
      <div id="collapseThe" class="collapse" data-parent="#acc2">
      <ul class="nav-item"> 
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse31">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Waktu</span>
            </a>
            <div id="collapse31" class="collapse" data-parent="#collapseThe">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="tahun" >
                <?php
                include("connect.php"); 
                $tahun=pg_query("select distinct date_part('year', tanggal_kejadian) as tahun from kejadian_bencana order by tahun asc");
                while($rowtahun = pg_fetch_assoc($tahun))
                {
                echo"<option value=".$rowtahun['tahun'].">".$rowtahun['tahun']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="bulan" >
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilwaktukej"  value="cari" onclick="tampilwaktukej()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse32">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Bahaya</span>
            </a>
            <div id="collapse32" class="collapse" data-parent="#collapseThe">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="bahayaa" >
                <?php
                include("connect.php"); 
                $bahaya=pg_query("select * from jenis_bahaya ");
                while($rowbahaya = pg_fetch_assoc($bahaya))
                {
                echo"<option value=".$rowbahaya['id_bahaya'].">".$rowbahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilbahayakej"  value="cari" onclick="tampilbahayakej()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>
         
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse33">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Kecamatan</span>
            </a>
            <div id="collapse33" class="collapse" data-parent="#collapseThe">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="kec1" >
                <?php
                include("connect.php"); 
                $kecamatan=pg_query("select * from kecamatan ");
                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                {
                echo"<option value=".$rowkecamatan['id_kecamatan'].">".$rowkecamatan['nama_kecamatan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkeckej"  value="cari" onclick="tampilkeckej()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse34">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Perkiraan Kerugian</span>
            </a>
            <div id="collapse34" class="collapse" data-parent="#collapseThe">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="rugi" >
                <option value="1 AND 1000">--1000 Juta Rupiah</option>
                <option value="1001 AND 5000">1001 s/d 5000 Juta Rupiah</option>
                <option value="5001 AND 20000">++5000 Juta Rupiah</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilrugikej"  value="cari" onclick="tampilrugikej()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse35">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Jumlah Korban Jiwa</span>
            </a>
            <div id="collapse35" class="collapse" data-parent="#collapseThe">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="korban" >
                <option value="0 AND 99">--100 Jiwa</option>
                <option value="100 AND 1000">100 s/d 1000 Jiwa</option>
                <option value="1001 AND 2000">++1000 Jiwa</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkorbankej"  value="cari" onclick="tampilkorbankej()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse35">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Perkiraan Kerusakan Lingkungan</span>
            </a>
            <div id="collapse35" class="collapse" data-parent="#collapseThe">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="rusak" >
                <option value="0 AND 1000">--1000 Juta Rupiah</option>
                <option value="1000 AND 5000">1000 s/d 5000 Juta Rupiah</option>
                <option value="5000 AND 15000">++5000 Juta Rupiah</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilrusakkej"  value="cari" onclick="tampilrusakkej()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

      </ul>
      </div> 
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Heading -->
      <li class="nav-item active">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsefoo" id="acc2">
        <i class= "fas fa-search"></i>
        <span>Penanggulangan Bencana</span><a>
      <div id="collapsefoo" class="collapse" data-parent="#acc2">
      <ul class="nav-item"> 
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse41">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Waktu</span>
            </a>
            <div id="collapse41" class="collapse" data-parent="#collapsefoo">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="tahun1">
                <?php
                include("connect.php"); 
                $tahun=pg_query("select distinct date_part('year', tanggal_penanggulangan) as tahun from detail_penanggulangan order by tahun asc");
                while($rowtahun = pg_fetch_assoc($tahun))
                {
                echo"<option value=".$rowtahun['tahun'].">".$rowtahun['tahun']."</option>";
                }
                ?>
                </select>
                <br>
                <select class="form-control" id="bulan1" >
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilwaktupen"  value="cari" onclick="tampilwaktupen()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse42">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Bahaya</span>
            </a>
            <div id="collapse42" class="collapse" data-parent="#collapsefoo">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="bahaya2" >
                <?php
                include("connect.php"); 
                $bahaya=pg_query("select * from jenis_bahaya ");
                while($rowbahaya = pg_fetch_assoc($bahaya))
                {
                echo"<option value=".$rowbahaya['id_bahaya'].">".$rowbahaya['nama_bahaya']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilbahayapen"  value="cari" onclick="tampilbahayapen()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>
         
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse43">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Kecamatan</span>
            </a>
            <div id="collapse43" class="collapse" data-parent="#collapsefoo">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="kece1" >
                <?php
                include("connect.php"); 
                $kecamatan=pg_query("select * from kecamatan ");
                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                {
                echo"<option value=".$rowkecamatan['id_kecamatan'].">".$rowkecamatan['nama_kecamatan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilkecpen"  value="cari" onclick="tampilkecpen()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse44">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Biaya Penanggulangan</span>
            </a>
            <div id="collapse44" class="collapse" data-parent="#collapsefoo">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="biaya" >
                <option value="0 AND 100">--100 Juta Rupiah</option>
                <option value="101 AND 500">101 s/d 500 Juta Rupiah</option>
                <option value="501 AND 1000">++500 Juta Rupiah</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilbiayapen"  value="cari" onclick="tampilbiayapen()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse45">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Lama Penanggulangan</span>
            </a>
            <div id="collapse45" class="collapse" data-parent="#collapsefoo">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="lama" >
                <option value="0 AND 1">--2 Hari</option>
                <option value="2 AND 4">2 s/d 4 hari</option>
                <option value="5 AND 6">++5 Hari</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampillamapen"  value="cari" onclick="tampillamapen()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse46">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Bentuk Penanggulangan</span>
            </a>
            <div id="collapse46" class="collapse" data-parent="#collapsefoo">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="bentuk" >
              <?php
                include("connect.php"); 
                $penanggulangan=pg_query("select * from penanggulangan ");
                while($rowpenanggulangan = pg_fetch_assoc($penanggulangan))
                {
                echo"<option value=".$rowpenanggulangan['id_penanggulangan'].">".$rowpenanggulangan['bentuk_penanggulangan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilbentukpen"  value="cari" onclick="tampilbentukpen()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

      </ul>
      </div> 
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <li class="nav-item active">
      <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsefii" id="acc2">
        <i class= "fas fa-search"></i>
        <span>Shelter</span><a>
      <div id="collapsefii" class="collapse" data-parent="#acc2">
      <ul class="nav-item"> 
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse51">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Kecamatan</span>
            </a>
            <div id="collapse51" class="collapse" data-parent="#collapsefii">
            <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="keca1" >
                <?php
                include("connect.php"); 
                $kecamatan=pg_query("select * from kecamatan ");
                while($rowkecamatan = pg_fetch_assoc($kecamatan))
                {
                echo"<option value=".$rowkecamatan['id_kecamatan'].">".$rowkecamatan['nama_kecamatan']."</option>";
                }
                ?>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilshelkec"  value="cari" onclick="tampilshelkec()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse52">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Kapasitas</span>
            </a>
            <div id="collapse52" class="collapse" data-parent="#collapsefii">
              <div class="bg-white py-2 collapse-inner rounded" >
              <select class="form-control" id="kapasita" >
                <option value="0 AND 3000">--3000 Jiwa</option>
                <option value="3001 AND 4000">3001 s/d 4000 Jiwa</option>
                <option value="4001 AND 6000">++4000 Jiwa</option>
                </select>
                <br>
                <button type="submit" class="btn btn-default" id="tampilshelkap"  value="cari" onclick="tampilshelkap()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>
         
          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse53" onclick="fasilitas()">
              <i class="fas fa-list"></i>
              <span>Berdasarkan Fasilitas</span>
            </a>
            <div id="collapse53" class="collapse" data-parent="#collapsefii">
              <div class="box-body" id="fasilitaslist">
                
                <button type="submit" class="btn btn-default" id="carifasilitas"  value="fas" onclick="carifasilitas()"><i class="fa fa-search"></i></button>
              </div>
            </div>
          </li>

      </ul>
      </div> 
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          
          <div class="topbar-heading" style="color:black; font-weight:bold"> SISTEM INFORMASI GEOGRAFIS KAJIAN RISIKO BENCANA ALAM, KEJADIAN BENCANA DAN PENANGGULANGANNYA</div>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x600">
              </a>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Content Row -->
          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-7 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary" onclick="reset()">Map</h6>
                  <div class="tombol" align-item-left>
                  <button class="btn btn-default" role="button" data-toggle="collapse" onclick="aktifkanGeolocation()" title="Current Position"   ><i class="fa fa-map-marker" style="color:black;"></i></button>
                  <button class="btn btn-default" role="button" data-toggle="collapse" onclick="manualLocation()" title=" Manual Position"><i class="fa fa-location-arrow" style="color:black;"></i></button>
                  <button class="btn btn-default" role="button" data-toggle="collapse" href="#terdekat" title="Nearby" aria-controls="terdekat"><i class="fa fa-road" style="color:black;"></i></button>
                  <button class="btn btn-default" role="button" data-toggle="collapse" onclick="tampilsemua();resultt()" title="All Shelter" aria-controls="terdekat"><i class="fa fa-map-pin" style="color:black;"></i></button>
					        <button class="btn btn-default" role="button" id="showlegenda" data-toggle="collapse" onclick="legenda()" title="Legend"   ><i class="fa fa-eye" style="color:black;"></i></button>         
                  <div class="collapse" id="terdekat">
                    <div class="well">
                    <label><b>Radius&nbsp</b></label><label style="color:black" id="km"><b>0</b></label>&nbsp<label><b>m</b></label><br>
                    <input  type="range" onclick="cek();aktifkanRadius();resultt()" id="inputradiusmes" name="inputradiusmes" data-highlight="true" min="1" max="20" value="1" >
                    </div>
                  </div>
                </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div id="map" style="width: 100%;height: 400px; z-index:60">
                  </div>
                </div>
              </div>
            </div>
      
            <!-- Pie Chart -->
            <div class="col-xl-5 col-lg-5" id="result">
              <div class="card shadow mb-4">
                <!-- Card Header -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Result</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="box-body" style="max-height:400px;overflow:auto;">
                    <div class="form-group" id="hasilcari1" style="display:none;">
                      <table class="table table-bordered" id='hasilcari'>
                      </table>  
                    </div>                   
                  </div>
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery-1.8.3.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
  <script src="assets/js/fancybox/jquery.fancybox.js"></script>    
  <script src="assets/js/jquery.scrollTo.min.js"></script>
  <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="assets/js/jquery.sparkline.js"></script>
  <script src="assets/js/common-scripts.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-slider.js"></script>
  
  <script type="text/javascript" src="assets/js/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="assets/js/gritter-conf.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
	
	<script type="text/javascript" src="assets/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="assets/js/advanced-form-components.js"></script>  
  
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script src="script.js" type="text/javascript"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
