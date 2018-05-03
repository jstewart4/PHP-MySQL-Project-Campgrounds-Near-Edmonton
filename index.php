<?php
session_start();

include ("includes/header.php");

?>
<div class="row">
	<div class="well col-md-12">
		<?php 

		//////////// pagination
		$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM campgrounds");
		$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
		$limit = 10;
		if($postnum > $limit){
		$tagend = round($postnum % $limit,0);
		$splits = round(($postnum - $tagend)/$limit,0);

		if($tagend == 0){
		$num_pages = $splits;
		}else{
		$num_pages = $splits + 1;
		}

		if(isset($_GET['pg'])){
		$pg = $_GET['pg'];
		}else{
		$pg = 1;
		}
		$startpos = ($pg*$limit)-$limit;
		$limstring = "LIMIT $startpos,$limit";
		}else{
		$limstring = "LIMIT 0,$limit";
		}

		// MySQLi upgrade: we need this for mysql_result() equivalent
		function mysqli_result($res, $row, $field=0) { 
		    $res->data_seek($row); 
		    $datarow = $res->fetch_array(); 
		    return $datarow[$field]; 
		}
		//////////////

		$result = mysqli_query($con, "SELECT * FROM campgrounds ORDER BY cid DESC $limstring") or die(mysqli_error($con));

		while($row = mysqli_fetch_array($result)){ 
			$cid = $row['cid'];
			$name = $row['name'];
			$image_file = $row['image_file']; ?>

		<div class="thumb">
			<div class="name"><?php echo "$name"; ?></div>
			<div class="image">
			<a href="display.php?cid=<?php echo "$cid"; ?>"><img src="thumbs/<?php echo "$image_file"; ?>" /></a>
			</div>
		</div>

		<?php }// \ loop ?>
	</div>
</div>
<nav>
  <ul class="pagination">
	<?php
	///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
	if($postnum > $limit){
	$n = $pg + 1;
	$p = $pg - 1;
	$thisroot = $_SERVER['PHP_SELF'];
	if($pg > 1){
	echo "<li><a href=\"$thisroot?pg=$p\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a></li>";
	}
	for($i=1; $i<=$num_pages; $i++){
	if($i!= $pg){
	echo "<li><a href=\"$thisroot?pg=$i\">$i</a></li>";
	}else{
	echo "<li><a href=\"#\">$i</a></li>";
	}
	}
	if($pg < $num_pages){
	echo "<li><a href=\"$thisroot?pg=$n\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a></li>";
	}
	}

	echo "</ul></nav>";
	////////////// end pagination
	include ("includes/footer.php");
	?>
