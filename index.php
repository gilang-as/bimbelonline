<?php
error_reporting(0);
?>
<html>
	<head>
	<title>Pencarian Bimbel Online</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	</head>
<body>
<?php
	if(@$_GET['lat'] == ""){
		
	} else {
		echo "<form method='POST'>";
	}

?>
<?php include "koneksi.php";?>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyDQMx8UbAoT0mkNdBYBOjt2gY0nR6RzUAU&libraries=places"></script>
 	<?php 
	
	@$nama_bimbel = $_POST['nama_bimbel'];
	@$jarak = $_POST['jarak'];
			
			$query =mysqli_query($koneksi,"CALL tampilmapel");
			$result = mysqli_num_rows($query);

			$no = 1;
			for ($i=0; $i <= $result - 1; $i++) { 
				@$mapel[$i] = @$_POST['mapel'.$no];
				$no++;
			}



    	mysqli_next_result($koneksi);

	 if (@$_POST['submit'] == "CARI NAMA"){
		$query = mysqli_query($koneksi, "CALL tampilbimbelByLikeNama('%".$_POST['nama_bimbel']."%')") or die(mysqli_error($koneksi));
		foreach ($query as $row){
		$a1[] = $row['nama_bimbel'];
		$b1[] = $row['latitude'];
		$c1[] = $row['longitude'];
		}

		 mysqli_next_result($koneksi);

		$query = mysqli_query($koneksi, "CALL hitungtampilbimbel('%$nama_bimbel%')");
		foreach ($query as $row){
		$d = $row['d'];
		
		}

		mysqli_next_result($koneksi);

		$_POST['jarak'] = "";
		foreach ($mapel as $i => $value) {
    		unset($mapel[$i]);
		}
	} else if (@$_POST['submit'] == "CEK RADIUS"){
		$d = 0;
		$query = mysqli_query($koneksi, "CALL tampilbimbel");
		foreach ($query as $row){
								
		$longitude1 = $_GET['lng'];
		$longitude2 = $row['longitude'];
								
		$latitude1 = $_GET['lat'];
		$latitude2 = $row['latitude'];
								
		$theta = $longitude1 - $longitude2; 
		$distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2)))  + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
		$distance = acos($distance); 
		$distance = rad2deg($distance); 
		$distance = $distance * 60 * 1.1515; 
		$distance = $distance * 1.609344; 
							
					  
		if($distance <= $jarak){
		$a1[] = $row['nama_bimbel'];
		$b1[] = $row['latitude'];
		$c1[] = $row['longitude'];
		$d++;
		}
		}
		mysqli_next_result($koneksi);

		$_POST['nama_bimbel'] = "";
		foreach ($mapel as $i => $value) {
    		unset($mapel[$i]);
		}
	}else {
		$d = 0;

		for ($i=0; $i <= $result - 1; $i++) {
		mysqli_next_result($koneksi);
		$mapelb = $mapel[$i];
		$query = mysqli_query($koneksi, "CALL tampilmapelByMapel('$mapelb')");
		foreach ($query as $row){
			$a1[] = $row['nama_bimbel'];
			$b1[] = $row['latitude'];
			$c1[] = $row['longitude'];
		$d++;
		}
		//mysqli_free_result($koneksi);

		}
		
		$_POST['nama_bimbel'] = "";
		$_POST['jarak'] = "";

		
	}	
		for($i = 0 ; $i <= $d - 1 ; $i++){
		 $a = array_unique($a1);
		 $b = array_unique($b1);
		 $c = array_unique($c1);
		}
		 $a = array_values($a);
		 $b = array_values($b);
		 $c = array_values($c);

		 $hitung = count($a);
		
		for($i = 0 ; $i <= $hitung - 1 ; $i++){
		$datageolocation[]= "['$a[$i]', $b[$i], $c[$i]],";
		}
		//$datageolocation="['Jogja', -7.688920, 110.348755]";
	?> 
 
 <script>			 
		var markers = [<?php for($i = 0 ; $i <= $d - 1 ; $i++){ echo $datageolocation[$i];}?>['Lokasi Anda', <?php echo @$_GET['lat'];?>, <?php echo @$_GET['lng'];?>]];

		var directionsDisplay;
 		var directionsService = new google.maps.DirectionsService();
		
			  function initialize() {
				   directionsDisplay = new google.maps.DirectionsRenderer();
				var mapCanvas = document.getElementById('map-canvas');
				var mapOptions = {
					zoom: 10,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}     
				var map = new google.maps.Map(mapCanvas, mapOptions);
				 directionsDisplay.setMap(map);
		 
			var infowindow = new google.maps.InfoWindow(), marker, i;
			var bounds = new google.maps.LatLngBounds(); // diluar looping
			for (i = 0; i < markers.length; i++) {  
			pos = new google.maps.LatLng(markers[i][1], markers[i][2]);
			bounds.extend(pos); // di dalam looping
			marker = new google.maps.Marker({
				position: pos,
				map: map
			});
			google.maps.event.addListener(marker, 'click', (function(marker, i) {
				return function() {
					infowindow.setContent(markers[i][0]);
					infowindow.open(map, marker);
				}
			})(marker, i));
			map.fitBounds(bounds); // setelah looping
			}
			calcRoute();

		 
			  }
            google.maps.event.addDomListener(window, 'load', initialize);

</script>
<script>
var view = document.getElementById("tampilkan");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
    }
}
 function showPosition(position) {
	var lat =  position.coords.latitude;
	var lng = position.coords.longitude; 
	
	window.location.href = 'http://localhost/bimbelonline/'+'?lat='+lat+'&lng='+lng;
 }

</script>
 	<?php
		if (!isset($_GET['lat'])) {
			echo "<script> getLocation() </script>";
		}
	?>
      <div class="row">
      <div class="col-md-8">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:90%;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> Pencarian </strong></h4>
            </div>
            <div class="panel-body">	
				<div class="panel-group" id="accordion">
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
						Berdasarkan Nama</a>
					  </h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse <?php if(@$_POST[nama_bimbel]){echo "in";}?>">
					  <div class="panel-body">
					  <div class="form-inline"><input style="margin-right: 10px;" class="form-control" name="nama_bimbel" type="text" value="<?php echo @$_POST[nama_bimbel];?>" /><input type="submit" name="submit" value="CARI NAMA" class="btn btn-primary"/>
					  </div>
					  					  <br>
					  </div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
						Berdasarkan Mata Pelajaran </a>
					  </h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse 
					<?php 
					
					for ($i=0; $i <= $result - 1; $i++) { 
						if(@$mapel[$i] and $in == ""){$in = "in"; echo $in;} }
						?>">
					  <div class="panel-body">
					  <?php
					  mysqli_next_result($koneksi);
					  $no = 1;
					  $i = 0;
					  	$query = mysqli_query($koneksi,"CALL tampilmapel()");
					  	foreach ($query as $row) {
					  ?>
						<div class="checkbox">
						  <label><input type="checkbox" <?php if(@$mapel[$i] == $row['nama_pelajaran']){echo "checked";} ?> value="<?= $row['nama_pelajaran']?>"  name="mapel<?= $no?>"><?= $row['nama_pelajaran']?></label>
						</div>
						<?php
							$i++; 
							$no++; }
						?>
						<input type="submit" name="submit" value="CARI" class="btn btn-primary"/>
					</div>
					</div>
				  </div>
				  <div class="panel panel-default">
					<div class="panel-heading">
					  <h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
						Berdasarkan Radius</a>
					  </h4>
					</div>
					<div id="collapse3" class="panel-collapse collapse <?php if(@$_POST[jarak]){echo "in";}?>">
					  <div class="panel-body">
						<div class="slidecontainer">
						  <input type="range" min="1" max="100" value="<?php echo @$_POST['jarak'];?>" name="jarak" class="slider" id="myRange">
						  <p>Jarak : <span id="demo"></span> KM</p>
						</div>

						<script>
							var slider = document.getElementById("myRange");
							var output = document.getElementById("demo");
							output.innerHTML = slider.value;

							slider.oninput = function() {
							  output.innerHTML = this.value;
							}
						</script>
					  
					  <input type="submit" name="submit" value="CEK RADIUS" class="btn btn-primary"/>
					  </div>
					</div>
				  </div>
				</div>
				<a href="http://localhost/bimbelonline/" class="btn btn-warning" style="margin-bottom: 20px;">RESET</a>
					<div style="overflow-y: auto; width: 100%; height: 200px;">
				 	<?php 
				 	mysqli_next_result($koneksi);
				 	if(!isset($_GET['longitude'])){
						for($i = 0 ; $i <= $hitung - 1 ; $i++){
							$nama =  $a[$i];						
							$query = mysqli_query($koneksi, "CALL tampilbimbelByNamaBiasa('$nama')");
							foreach ($query as $row){
							echo "<table class='table'>";
							echo "<tr>";
								echo "<td rowspan='4'>";
								echo "<img src='http://localhost/bimbelonline/tambah/foto/$row[id_bimbel].jpg' style='width:100px;height:100px' alt='umk' class='img-circle'>";
								echo "</td>";
								echo "<td>";
								echo "<b>".$row['nama_bimbel']."</b>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
								echo "<font size='2px'>".$row['alamat']."</font>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
								echo "<a href='http://localhost/bimbelonline/?lat=";
								echo $_GET['lat'];
								echo "&lng=";
								echo $_GET['lng'];
								echo "&latitude=";
								echo $row['latitude'];
								echo "&longitude=";
								echo $row['longitude'];
								echo "' class='btn btn-primary'>Get Direction</a>";
								echo "<a href='http://localhost/bimbelonline/detailbimbel.php?id=$row[id_bimbel]' class='btn btn-info' target='_blank' style='margin-left:10px'>Detail</a>";
								echo "</td>";
							echo "</tr>";
							echo "</table>";

							mysqli_next_result($koneksi);
							
						  }
						}
					}
						if($_GET['longitude']){
							$query = mysqli_query($koneksi, "CALL 	tampilbimbelByLng('$_GET[longitude]')");
							foreach ($query as $row){
							echo "<table class='table'>";
							echo "<tr>";
								echo "<td rowspan='4'>";
								echo "<img src='http://localhost/bimbelonline/tambah/foto/$row[id_bimbel].jpg' style='width:100px;height:100px' alt='img' class='img-circle'>";
								echo "</td>";
								echo "<td>";
								echo "<b>".$row['nama_bimbel']."</b>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
								echo "<font size='2px'>".$row['alamat']."</font>";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
								echo "<a href='http://localhost/bimbelonline/?lat=";
								echo $_GET['lat'];
								echo "&lng=";
								echo $_GET['lng'];
								echo "&latitude=";
								echo $row['latitude'];
								echo "&longitude=";
								echo $row['longitude'];
								echo "' class='btn btn-primary'>Get Direction</a>";
								echo "<a href='http://localhost/bimbelonline/detailbimbel.php?id=$row[id_bimbel]' class='btn btn-info' target='_blank' style='margin-left:10px'>Detail</a>";
								echo "</td>";
							echo "</tr>";
							echo "</table>";
							
							}
						}
							
						
					  ?>
					 </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	<?php
	if(@$_GET['lat'] == ""){
		
	} else {
		echo "</form>";
	}

?>
<script type="text/javascript">
	function calcRoute() {
    var start = '<?php echo @$_GET['lat'];?>, <?php echo @$_GET['lng'];?>';
    var end = '<?php echo @$_GET['latitude'];?>, <?php echo @$_GET['longitude'];?>';
    var request = {
      origin:start,
      destination:end,
      travelMode: google.maps.TravelMode.DRIVING
    };
    directionsService.route(request, function(result, status) {
      if (status == google.maps.DirectionsStatus.OK) {
        directionsDisplay.setDirections(result);
      }
    });
  }

</script>
	</body>
 </html>