<?php
session_start();

include ("includes/header.php");

?>
<div class="row">
		<?php 

		$cid = $_GET['cid'];

		$result = mysqli_query($con, "SELECT * FROM campgrounds WHERE cid = '$cid'") or die(mysqli_error($con));

		while($row = mysqli_fetch_array($result)){
			$cid = $row['cid'];
			$image_title = $row['image_title'];
			$image_file = $row['image_file'];
			$name = $row['name'];
			$phone = $row['phone'];
			$address = $row['address'];
			$location = $row['location'];
			$gps_lat = $row['gps_lat'];
			$gps_long = $row['gps_long'];
			$totalsites = $row['totalsites'];
			$power = $row['power'] ? 'Yes' : 'No';
			$fishing = $row['fishing'] ? 'Yes' : 'No';			
			$siterate = $row['siterate'];		
			$description = $row['description'];
			$rating = $row['rating'];
		?>
			<div class="well col-md-12">
				<h2><?php echo "$name"; ?></h2><br>
				<div class="col-md-5">
					<p><span>Phone:</span>&nbsp; <?php echo "$phone"; ?></p><br>
					<p><span>Address:</span>&nbsp; <?php echo "$address"; ?></p><br>
					<p><span>Location:</span>&nbsp; <?php echo "$location"; ?></p><br>
					<p><span>GPS Lat/Long:</span>&nbsp; <?php echo "$gps_lat, $gps_long"; ?></p><br>
					<p><span>Total Campsites:</span>&nbsp; <?php echo "$totalsites"; ?></p><br>
					<p><span>Power Available:</span>&nbsp; <?php echo "$power"; ?></p><br>
					<p><span>Fishing Allowed:</span>&nbsp; <?php echo "$fishing"; ?></p><br>
					<p><span>Site Rates (not including GST):</span>&nbsp; <?php echo "$$siterate"; ?></p><br>	
					<p><span>Campground Description:</span>&nbsp; <?php echo "$description"; ?></p><br>	
 					<p><span>Google Review:</span>&nbsp; <?php echo "$rating"; ?>&nbsp;/5</p><br>    
					<div id="content">
						<div id="templ" style="overflow:hidden;width:260px">
					        <img src='http://images.cjed.com/five_stars.png' style="width:260px;height:49px;"/>
					        <script>   $(function(){
							   var ratings=[<?php echo "$rating"; ?>];
							   
							    $.each(ratings,function(){
							        $("#templ")
							            .clone()
							            .removeAttr("id")
							            .width(260*(this/5))
							            .appendTo("#content")
							    });
							}); </script>
						</div>
					</div>		
				</div>
				<div class="col-md-7">
					<div class="displayimage"><img src="display/<?php echo "$image_file"; ?>" alt="<?php echo "$image_title"; ?>"></div>
					<div class="links">
					<?php
						$previousresult = mysqli_query($con, "SELECT * FROM campgrounds WHERE cid < '$cid' ORDER BY cid DESC LIMIT 1") or die(mysqli_error($con));
						
						while($row = mysqli_fetch_array($previousresult)){
							$previous_cid = $row['cid'];

							echo "<a href=\"display.php?cid=$previous_cid\" class=\"btn btn-primary\">&lsaquo;&nbsp;Previous</a>&nbsp;&nbsp;";
						}

						$nextresult = mysqli_query($con, "SELECT * FROM campgrounds WHERE cid > '$cid' ORDER BY cid ASC LIMIT 1") or die(mysqli_error($con));

						while($row = mysqli_fetch_array($nextresult)){
							$next_cid = $row['cid'];

							echo "<a href=\"display.php?cid=$next_cid\" class=\"btn btn-primary\">Next&nbsp;&rsaquo;</a>";
						} ?>
					</div>
				</div>
				<div class="col-md-12">
					<h3 class="locationtitle">Campground Location:</h3>
				    <div id="map"></div>
				    <script>
				      function initMap() {
				        var uluru = {lat: <?php echo "$gps_lat"; ?>, lng: <?php echo "$gps_long"; ?>};
				        var map = new google.maps.Map(document.getElementById('map'), {
				          zoom: 9,
				          center: uluru
				        });
				        var marker = new google.maps.Marker({
				          position: uluru,
				          map: map
				        });
				      }
				    </script>
 				    <script async defer
				    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1c256mQhCB_IsZaDYkHj8GgP0p3zTbA&callback=initMap">
				    </script>
			    </div>
			</div>		
		<?php } ?>
</div>

<?php
include ("includes/footer.php");
?>
