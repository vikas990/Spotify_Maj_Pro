<?php 
include("includes/includedfile.php");
	?>


<h1 class="pageheadingbig">You Might Also Like!</h1>

<div class="gridviewcontainer">
	<?php
	$albumquery=mysqli_query($con,"SELECT * FROM albums ORDER BY RAND() LIMIT 10");

	while($row = mysqli_fetch_array($albumquery)) {
		


		echo "<div class='gridviewitem'>

					<span   role='link' tabindex='0' onclick='openpage(\"album.php?id=" .$row['id']."\")' >
					<img src='".$row['artworkpath'] ."'>
					<div class='gridviewtitle'>"
					.$row['title'].

					"</div>
					</span>	
					</div>";



	}
?>
</div>



	