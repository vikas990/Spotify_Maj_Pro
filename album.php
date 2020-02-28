<?php include("includes/includedfile.php"); 

if(isset($_GET['id'])) {
	$albumid = $_GET['id'];
}
else {
	header("Location: index.php");
}

$album = new albumclass($con, $albumid);
$artist = $album->getartist();
$artistid = $artist->getid();
?>

<div class="entityinfo">

	<div class="leftsection">
		<img src="<?php echo $album->getartworkpath(); ?>">
	</div>

	<div class="rightsection">
		<h2><?php echo $album->gettitle(); ?></h2>
		<p role="link" tabindex="0" onclick="openpage('artist.php?id=$artistid')">By <?php echo $artist->getname(); ?></p>
		<p><?php echo $album->getnumberofsongs(); ?> songs</p>

	</div>

</div>


<div class="tracklistcontainer">
	<ul class="tracklist">
		
		<?php
		$songidarray = $album->getsongids();

		$i = 1;
		foreach($songidarray as $songid) {

			$albumsong = new Song($con, $songid);
			$albumartist = $albumsong->getartist();

			echo "<li class='tracklistrow'>
					<div class='trackcount'>
						<img class='play' src='assests/images/icons/play-white.png' onclick='settrack(\"" . $albumsong->getid() . "\", tempplaylist, true)'>
						<span class='tracknumber'>$i</span>
					</div>


					<div class='trackinfo'>
						<span class='trackname'>" . $albumsong->gettitle() . "</span>
						<span class='artistname'>" . $albumartist->getname() . "</span>
					</div>

					<div class='trackoptions'>
						<input type='hidden' class='songid' value='" .$albumsong->getid() ."'>
						<img class='optionbutton' src='assests/images/icons/more.png' onclick='showoptionmenu(this)'>
					</div>

					<div class='trackduration'>
						<span class='duration'>" . $albumsong->getduration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>

		<script>
			var tempsongids = '<?php echo json_encode($songidarray); ?>';
			tempplaylist = JSON.parse(tempsongids);
		</script>

	</ul>
</div>


<nav class="optionmenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userloggedin->getusername()); ?>
	
</nav>







