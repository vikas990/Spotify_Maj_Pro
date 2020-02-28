<?php
include("includes/includedfile.php");

if(isset($_GET['term'])){
	$term=urldecode($_GET['term']);
	
}
else{
	$term="";
}
?>

<div class="searchcontainer">
	
	<h4>Search for an artist,album or song</h4>

	<input type="text" class="searchinput" value="<?php echo $term ?>" placeholder="Start Typing......" onfocus="this.selectionStart = this.selectionEnd = this.value.length;">
</div>

<script>

	$(".searchinput").focus();
	
	$(function() {
		
		$(".searchinput").keyup(function(){
			clearTimeout(timer);


			timer= setTimeout(function(){
				var val= $(".searchinput").val();
				openpage("search.php?term="+val);
			},2000);
		})
		// body...
	})

</script>

<?php if($term == "") exit(); ?>


<div class="tracklistcontainer borderbottom">

	<h2>SONGS</h2>
	
		<ul class="tracklist">
			
			<?php

			$songquery=mysqli_query($con, "SELECT id FROM Songs WHERE title LIKE '$term%' LIMIT 10");

			if(mysqli_num_rows($songquery) == 0){
				echo "<span class='noresults'>No song found matching".$term."</span>";
			}

			$songidarray=array();



			$i=1;
			while($row= mysqli_fetch_array($songquery)){

				if($i > 15){
					break;
				}

				array_push($songidarray, $row['id']);


				$albumsong=new Song($con , $row['id']);
				$albumartist=$albumsong->getartist();
				echo "<li class='tracklistrow'>
						<div class='trackcount'>
						<img class='play' src='assests/images/icons/play-white.png' onclick='settrack(\"".$albumsong->getid()."\",tempplaylist,true)'>
						<span class='trackcount'>$i</span>	

						</div>

						<div class='trackinfo'>
						<span class='trackname'>".$albumsong->gettitle()."</span>
						<span class='artistname'>".$albumartist->getname()."</span>
						</div>

						<div class='trackoptions'>
						<input type='hidden' class='songid' value='" .$albumsong->getid() ."'>
						<img class='optionbutton' src='assests/images/icons/more.png' onclick='showoptionmenu(this)'>
					</div>

						<div>
						<span class='duration'>".$albumsong->getduration()."</span>
						</div>


				</li>";

				$i++;
			}

			?>

			<script>
				var tempsongid='<?php echo json_encode($songidarray); ?>';
				tempplaylist=JSON.parse(tempsongid);

			</script>


		</ul>


	

</div>



<div class="artistcontainer borderbottom">
	

<h2>ARTISTS</h2>

<?php 

$artistquery=mysqli_query($con, "SELECT id FROM artist WHERE name LIKE '$term%'");

if(mysqli_num_rows($artistquery) == 0){
	echo "<span class='noresults'>No song found matching".$term."</span>";
}

while($row = mysqli_fetch_array($artistquery)){
	$artistfound= new Artist($con, $row['id']);


	echo "<div class='searchresultrow'>

				<div class='artistname'>
				<span role='link' tabindex='0' onclick='openpage(\"artist.php?id=". $artistfound->getid() ."\")'>
				"	

					. $artistfound->getname() .

				"


				</span>

				</div>

	</div>";
}
 
?>

</div>


<div class="gridviewcontainer">
	<h2>ALBUMS</h2>

	<?php
	$albumquery=mysqli_query($con,"SELECT * FROM albums WHERE title LIKE '$term%'");

	if(mysqli_num_rows($albumquery) == 0){
				echo "<span class='noresults'>No song found matching".$term."</span>";
			}

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

<nav class="optionmenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userloggedin->getusername()); ?>
	
</nav>
