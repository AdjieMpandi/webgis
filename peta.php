<!DOCTYPE HTML>
<html>
	<head>
		<title>WebGis by GeoHub</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />

		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC82IDAfivZUbTeNTxg9FtDgQyCAcyglsU"
            type="text/javascript"></script>

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
			<section id="banner2">
				
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