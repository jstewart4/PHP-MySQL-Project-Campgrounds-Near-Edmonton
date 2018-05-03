<?php
session_start();
// to reverse the login of any statement, we can use the ! char
if (!isset($_SESSION['jaergijnaeir444'])) {
	//echo "NOT logged in";
	header("Location:login.php?return=insert");
}
	include("../includes/header.php");

	include ("../includes/_functions.php"); // here we have functions resizeImage, resizeImagePNG, createSquareImageCopy, createSquareImageCopyPNG

if(isset($_POST['submit'])){
	$name = strip_tags(trim($_POST['name']));
	$phone = strip_tags(trim($_POST['phone']));
	$address = strip_tags(trim($_POST['address']));
	$location = strip_tags(trim($_POST['location']));
	$gps_lat = strip_tags(trim($_POST['gps_lat']));
	$gps_long = strip_tags(trim($_POST['gps_long']));
	$totalsites = strip_tags(trim($_POST['totalsites']));
	$power = strip_tags(trim($_POST['power']));
	$fishing = strip_tags(trim($_POST['fishing']));
	$rating = strip_tags(trim($_POST['rating']));
	$siterate = strip_tags(trim($_POST['siterate']));
	$image_title = strip_tags(trim($_POST['image_title']));
	$image_file = $_FILES['myfile']['name'];
	$description = strip_tags(trim($_POST['description']));
	// ***VALIDATION:***

	$boolValidateOK = 1;
	$strValidationMessage = "";
	$successValidationMessage = "";

	// Name	

	if (strlen($name) < 2) {
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper campground name of at least 2 characters.<br>";
		} else if (strlen($name) > 100){
				$boolValidateOK = 0;
				$strValidationMessage .= "Please keep your campground name to a maximum of 100 characters.<br>";
		}

	// Phone

	$phone = str_replace(".", "", $phone);
	if(!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $phone)) {
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper North American phone number.<br>";
		} 

	// Address

	if (strlen($address) > 100){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please keep your address to a maximum of 100 characters.<br>";
		}

	// Location

	if (strlen($location) < 2) {
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper location of at least 2 characters.<br>";
		} else if (strlen($location) > 100){
				$boolValidateOK = 0;
				$strValidationMessage .= "Please keep your location to a maximum of 100 characters.<br>";
		}

	// GPS Latitude
	if (!preg_match('/^[0-9]+(\.[0-9]{1,6})?$/', $gps_lat)){
		$boolValidateOK = 0;
		$strValidationMessage .= "Please keep the GPS Latitude to a maximum of 6 decimal places.<br>";
	}

	// GPS Longitude
	if (!preg_match('/^-?[0-9]+(\.[0-9]{1,6})?$/', $gps_long)){
		$boolValidateOK = 0;
		$strValidationMessage .= "Please keep the GPS Longitude to a maximum of 6 decimal places.<br>";
	}

	// Total Campsites
	$totalsites = preg_replace('/[^\d ]/i', '', $totalsites);
	if (!is_numeric($totalsites)){
		$boolValidateOK = 0;
		$strValidationMessage .= "Please only enter numbers for the total campsites.<br>";	
	}
	// Campsite rate
	$siterate = preg_replace('/[^\d ]/i', '', $siterate);
	if (!is_numeric($siterate)){
		$boolValidateOK = 0;
		$strValidationMessage .= "Please only enter numbers for the campsite rate.<br>";	
	}
	// Google Rating
	if (!preg_match('/^[0-9]+(\.[0-9]{1,1})?$/', $rating)){
		$boolValidateOK = 0;
		$strValidationMessage .= "Please keep the Google Rating to a maximum of 1 decimal place and only enter numbers.<br>";
	}		

	// Image Title
	if (strlen($image_title) > 255){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please keep your image title to a maximum of 255 characters.<br>";
		}

	// Description

	if (strlen($description) > 2000) {
				$boolValidateOK = 0;
				$strValidationMessage .= "Please keep your description to a maximum of 2000 characters.<br>";
		}

	// Required Fields

	if ($name == "" || $phone == "" || $location == "" || $siterate == "") {
		$boolValidateOK = 0;
		$strValidationMessage .= "Name, phone, location, and campsite rate fields are required.<br>";
	}

	// Image Type

	if (($_FILES['myfile']['type'] != "image/jpeg") && ($_FILES['myfile']['type'] != "image/png")) {
		$boolValidateOK = 0;
		$strValidationMessage .= "Please upload only jpeg and png images. An image is required.<br>";
	}


	//Size

	if ($_FILES['myfile']['size'] > 32000000) {
		$boolValidateOK = 0;
		$strValidationMessage .= "ERROR - Maximum file size is 32 MB for uploading images.<br>";
	}


	if ($boolValidateOK == 1) {
		if ($_FILES['myfile']['type'] == "image/jpeg") {
			// To actually grab the file from the /tmp/ dir, we need to use move_upload_file() to move this file to a dir we can access.
			if (move_uploaded_file($_FILES['myfile']['tmp_name'], "../originals/" . $image_file)) {
				$thisFile = "../originals/" . $image_file;
				createSquareImageCopy($thisFile, "../thumbs/", 150); // path/image_file, output folder, new width
				resizeImage($thisFile, "../display/", 600); // path/image_file, output folder, new width
				$thisNewFile = "../display/" . $image_file;


				mysqli_query($con, "INSERT INTO campgrounds (name, phone, address, location, gps_lat, gps_long, totalsites, power, fishing, description, siterate, rating, image_title, image_file) 
					VALUES ('$name','$phone','$address','$location','$gps_lat','$gps_long','$totalsites','$power','$fishing','$description','$siterate','$rating','$image_title','$image_file')") or die(mysqli_error($con));
				$successValidationMessage .= "<h3>Successfully inserted the campground.</h3>";

				$name = "";
				$phone = "";
				$address = "";
				$location = "";
				$gps_lat = "";
				$gps_long = "";
				$totalsites = "";
				$power = "";
				$fishing = "";
				$description = "";
				$rating = "";
				$siterate = "";
				$image_title = "";
				$image_file = "";
			}else{
				$strValidationMessage .= "<h3>Failed to insert the campground.</h3>";
			}
		} else {
			// To actually grab the file from the /tmp/ dir, we need to use move_upload_file() to move this file to a dir we can access.
			if (move_uploaded_file($_FILES['myfile']['tmp_name'], "../originals/" . $image_file)) {
				$thisFile = "../originals/" . $image_file;
				createSquareImageCopyPNG($thisFile, "../thumbs/", 150); // path/image_file, output folder, new width
				resizeImagePNG($thisFile, "../display/", 600); // path/image_file, output folder, new width
				$thisNewFile = "../display/" . $image_file;


				mysqli_query($con, "INSERT INTO campgrounds (name, phone, address, location, gps_lat, gps_long, totalsites, power, fishing, description, siterate, rating, image_title, image_file) 
					VALUES ('$name','$phone','$address','$location','$gps_lat','$gps_long','$totalsites','$power','$fishing','$description','$siterate','$rating','$image_title','$image_file')") or die(mysqli_error($con));
				$successValidationMessage .= "<h3>Successfully inserted the campground.</h3>";

				$name = "";
				$phone = "";
				$address = "";
				$location = "";
				$gps_lat = "";
				$gps_long = "";
				$totalsites = "";
				$power = "";
				$fishing = "";
				$description = "";
				$rating = "";
				$siterate = "";
				$image_title = "";
				$image_file = "";
			}else{
				$strValidationMessage .= "<h3>Failed to insert the campground.</h3>";
			}			
		}
	}
} ?>
<!-- This is to show the filename being uploaded beside the "Browse..." button in the insert and edit pages -->
<script>
  $(function() {

  // We can attach the `fileselect` event to all file inputs on the page
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
  });

  // We can watch for our custom `fileselect` event like this
  $(document).ready( function() {
      $(':file').on('fileselect', function(event, numFiles, label) {

          var input = $(this).parents('.input-group').find(':text'),
              log = numFiles > 1 ? numFiles + ' files selected' : label;

          if( input.length ) {
              input.val(log);
          } else {
              if( log ) alert(log);
          }

      });
  });
  
});
</script>
<div class="well col-md-12">
	<h2>Insert Campground</h2>
		<?php 
	if ($strValidationMessage) {
		echo "<br><br>";
		echo "<div class=\"alert alert-warning\">";
		echo $strValidationMessage;
		echo "</div>";
	}
	if ($successValidationMessage) {
		echo "<br><br>";
		echo "<div class=\"alert alert-success\">";
		echo $successValidationMessage;
		echo "</div>";
	}
	?>
	<div class="required"><span>&nbsp;&nbsp;&nbsp;* denotes a required field</span></div>
	<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
		<div class="col-md-6">
			<div class="form-group">
				<label for="name">Campground Name:<span>&nbsp; *</span></label>
				<input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
			</div>	
			<div class="form-group">
				<label for="phone">Phone Number:<span>&nbsp; *</span></label>
				<input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>">
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<input type="text" name="address" class="form-control" value="<?php echo $address; ?>">
			</div>	
			<div class="form-group">
				<label for="location">Location:<span>&nbsp; *</span></label>
				<input type="text" name="location" class="form-control" value="<?php echo $location; ?>">
			</div>
			<div class="form-group">
				<label for="gps_lat">GPS Latitude:</label>
				<input type="text" name="gps_lat" class="form-control" value="<?php echo $gps_lat; ?>">
			</div>
			<div class="form-group">
				<label for="gps_long">GPS Longitude:</label>
				<input type="text" name="gps_long" class="form-control" value="<?php echo $gps_long; ?>">
			</div>
			<div class="form-group">
				<label for="totalsites">Total Campsites:</label>
				<input type="text" name="totalsites" class="form-control" value="<?php echo $totalsites; ?>">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="siterate">Campsite rate ($):<span>&nbsp; *</span></label>
				<input type="text" name="siterate" class="form-control" value="<?php echo $siterate; ?>">
			</div>
			<div class="form-group">
				<label for="rating">Current Google Rating:</label>
				<input type="text" name="rating" class="form-control" value="<?php echo $rating; ?>">
			</div>
			<div class="form-group">
			<label for="power">Power Available?</label>
			<input type="checkbox" name="power" value="1" />
			</div>
			<div class="form-group">
			<label for="fishing">Fishing Allowed?</label>
			<input type="checkbox" name="fishing" value="1"/>
			</div>
			<label for="input-group">Upload Image:<span>&nbsp; *</span></label>
			<div class="input-group">
	            <label class="input-group-btn">
	                <span class="btn btn-primary">
	                    Browse...&hellip; <input type="file" name="myfile" style="display: none;" multiple>
	                </span>
	            </label>
	            <input type="text" class="form-control" readonly><!--Displays a file browser/upload button in browser-->
	        </div>
			<div class="form-group">
				<label for="image_title">Image Title:</label>
				<input type="text" name="image_title" class="form-control" value="<?php echo $image_title; ?>">
			</div>
			<div class="form-group">
				<label for="description">Campground Description:</label>
				<textarea name="description" class="form-control"><?php echo $description; ?></textarea>
			</div>

			<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
			</div>
		</div>
	</form>
</div>
<?php
	include("../includes/footer.php");
?>