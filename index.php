<?php include("includes/header.php");?>


<h1 class="pageheadingbig">You Might Also Like!</h1>

<div class="gridviewcontainer">
	<?php
	$albumquery=mysqli_query($con,"SELECT * FROM albums ORDER BY RAND() LIMIT 10");

	while($row = mysqli_fetch_array($albumquery)) {
		


		echo "<div class='gridviewitem'>

					<a href='album.php?id=" .$row['id']."'>
					<img src='".$row['artworkpath'] ."'>
					<div class='gridviewtitle'>"
					.$row['title'].

					"</div>
					</a>	
					</div>";



	}
?>
</div>



<?php include("includes/footer.php");?>			