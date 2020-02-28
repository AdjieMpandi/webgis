<!DOCTYPE HTML>
<!--
	Spatial by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>WebGis by GeoHub</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC82IDAfivZUbTeNTxg9FtDgQyCAcyglsU"
            type="text/javascript"></script>
  		<script type="text/javascript" src="chartjs/Chart.js"></script>

  		<script>
		      var map;
		      	function initMap() {
		        map = new google.maps.Map(document.getElementById('map')
		        );
				
				marker = new google.maps.Marker({
		                position: {lat: -6.917464, lng: 107.619123},
		                map: map
		            });

				var KMLbandung = new google.maps.KmlLayer({
				    url: 'https://webgis20.000webhostapp.com/Webgis.kmz',
				    map: map
				  });
				}
					  google.maps.event.addDomListener(window, 'load', initMap);
    	</script>

    	<style type="text/css">
	      table.dataTable thead .sorting:after,
	      table.dataTable thead .sorting:before,
	      table.dataTable thead .sorting_asc:after,
	      table.dataTable thead .sorting_asc:before,
	      table.dataTable thead .sorting_asc_disabled:after,
	      table.dataTable thead .sorting_asc_disabled:before,
	      table.dataTable thead .sorting_desc:after,
	      table.dataTable thead .sorting_desc:before,
	      table.dataTable thead .sorting_desc_disabled:after,
	      table.dataTable thead .sorting_desc_disabled:before {
	      bottom: .5em;
	      }

	      .my-custom-scrollbar {
	      position: relative;
	      height: 200px;
	      overflow: auto;
	      }
	      .table-wrapper-scroll-y {
	      display: block;
	      }
	      table{
	        margin: 0px auto;
	      }
	      #map {
	        height: 50%;
	      }
	    </style>

	</head>
	<body class="landing">

		<!-- Header -->
			<header id="header" class="alt">
				<h1><strong><a href="index.php">WebGis</a></strong> by GeoHub</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Beranda</a></li>
						<li><a href="peta.php">Peta Jalan</a></li>
						<li><a href="data.php">Data PCI</a></li>
					</ul>
				</nav>
			</header>

			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>

		<!-- Banner -->
			<section id="banner">
				<h2>Data Teknis Jalan Petapahan</h2>
			</section>

			<!-- Three -->
				<section id="three" class="wrapper style1">
					<div class="container">
						<header class="major special">
							<h2>Data Jalan Petapahan</h2>
						</header>
						<div class="feature-grid">
							<div class="feature">
								<div class="image rounded"><img src="images/road.png" alt="" /></div>
								<div class="content">
									<header>
										<h3>153.412 KM</h3>
									</header>
									<p>Jumlah panjang jalan Petapahan.</p>
								</div>
							</div>
							<div class="feature">
								<div class="image rounded"><img src="images/ruas.png" alt="" /></div>
								<div class="content">
									<header>
										<h3>212 Ruas Jalan</h3>
									</header>
									<p>Jumlah ruas jalan Petapahan.</p>
								</div>
							</div>
						</div>
					</div>
				</section>

				<!-- Two -->
				<section id="two" class="wrapper style2 special">
					<div class="container">
						<header class="major">
							<h2>Peta Jalan</h2>

							<iframe src="https://www.google.com/maps/d/u/0/embed?mid=14bbsCBz7fwUn-juAL8mK8S9tjiMMElbQ" width="1200" height="480"></iframe>

						</header>
					</div>
				</section>

			<!-- One -->
			<?php 
				include 'koneksi.php';
			?>
				<section id="one" class="wrapper style1">
					<div class="container 100%">
						<div class="row 200%">
							<div class="6u 12u$(medium)">
								<header class="major">
									<h2>Bahan PCI</h2>

									<div class="table-wrapper-scroll-y my-custom-scrollbar">
									  <table border="1" id="dtVerticalScrollExample" class="table table-striped table-bordered table-sm" cellspacing="0"  width="100%">
									    <thead>
									      <tr>
									        <th>No</th>
									        <th>NO PROV</th>
									        <th>NO RUAS</th>
									        <th>NAMA RUAS</th>
									        <th>NO SEG</th>
									        <th>LEBAR</th>
									        <th>PCI</th>
									        <th>KONDISI PCI</th>
									      </tr>
									    </thead>
									    <tbody>
									      <?php 
									      $no = 1;
									      $data = mysqli_query($koneksi,"select * from bahan_pci");
									      while($d=mysqli_fetch_array($data)){
									        ?>
									        <tr>
									          <td><?php echo $no++; ?></td>
									          <td><?php echo $d['no_prov']; ?></td>
									          <td><?php echo $d['no_ruas']; ?></td>
									          <td><?php echo $d['nama_ruas']; ?></td>
									          <td><?php echo $d['no_seg']; ?></td>
									          <td><?php echo $d['lebar']; ?></td>
									          <td><?php echo $d['pci']; ?></td>
									          <td><?php echo $d['kondisi_pci']; ?></td>
									        </tr>
									        <?php 
									      }
									      ?>
									    </tbody>
									  </table>
									  </div>

								</header>
							</div>
							<div class="6u$ 12u$(medium)">

								<div style="width: 600px;margin: 0px auto;">
									<canvas id="myChart"></canvas>
								</div>

								<script>
								    var ctx = document.getElementById("myChart").getContext('2d');
								    var myChart = new Chart(ctx, {
								      type: 'pie',
								      data: {
								        labels: ["Hancur", "Sangat Parah", "Parah", "Jelek", "Sedang", "Baik", "Sangat Baik"],
								        datasets: [{
								          label: '',
								          data: [
								          <?php 
								          $jumlah_hancur = mysqli_query($koneksi,"select * from bahan_pci where kondisi_pci='HANCUR'");
								          echo mysqli_num_rows($jumlah_hancur);
								          ?>, 
								          <?php 
								          $jumlah_sangat_parah = mysqli_query($koneksi,"select * from bahan_pci where kondisi_pci='SANGAT PARAH'");
								          echo mysqli_num_rows($jumlah_sangat_parah);
								          ?>, 
								          <?php 
								          $jumlah_parah = mysqli_query($koneksi,"select * from bahan_pci where kondisi_pci='PARAH'");
								          echo mysqli_num_rows($jumlah_parah);
								          ?>, 
								          <?php 
								          $jumlah_jelek = mysqli_query($koneksi,"select * from bahan_pci where kondisi_pci='JELEK'");
								          echo mysqli_num_rows($jumlah_jelek);
								          ?>, 
								          <?php 
								          $jumlah_sedang = mysqli_query($koneksi,"select * from bahan_pci where kondisi_pci='SEDANG'");
								          echo mysqli_num_rows($jumlah_sedang);
								          ?>,  
								          <?php 
								          $jumlah_baik = mysqli_query($koneksi,"select * from bahan_pci where kondisi_pci='BAIK'");
								          echo mysqli_num_rows($jumlah_baik);
								          ?>, 
								          <?php 
								          $jumlah_sangat_baik = mysqli_query($koneksi,"select * from bahan_pci where kondisi_pci='SANGAT BAIK'");
								          echo mysqli_num_rows($jumlah_sangat_baik);
								          ?>
								          ],
								          backgroundColor: [
								          'rgb(240, 54, 15)',
								          'rgb(234, 91, 61)',
								          'rgb(240, 127, 88)',
								          'rgb(240, 143, 88)',
								          'rgb(240, 171, 88)',
								          'rgb(175, 228, 53)',
								          'rgb(45, 225, 30)'
								          ],
								          borderColor: [
								          'rgba(255,99,132,1)',
								          'rgba(255, 206, 86, 1)',
								          'rgba(54, 162, 235, 1)',
								          'rgba(255, 206, 86, 1)',
								          'rgba(54, 162, 235, 1)',
								          'rgba(255, 206, 86, 1)',
								          'rgba(75, 192, 192, 1)'
								          ],
								          borderWidth: 1
								        }]
								      },
								      options: {
								        scales: {
								          yAxes: [{
								            ticks: {
								              beginAtZero:true
								            }
								          }]
								        }
								      }
								    });
								</script>

							</div>
						</div>
					</div>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style3 special">
					<div class="container">
						<header class="major">
							<h2>GEOHUB</h2>
							<p>Jl. Elang Jawa No.30, Karangsari, Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah Istimewa Yogyakarta <br>55584</p>
						</header>
					</div>
				</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<ul class="icons">
						<li><a href="#" class="icon fa-facebook"></a></li>
						<li><a href="#" class="icon fa-twitter"></a></li>
						<li><a href="#" class="icon fa-instagram"></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; GeoHub 2020</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>