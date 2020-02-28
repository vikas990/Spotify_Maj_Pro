<?php include("includes/includedfile.php");

if(isset($_GET['id'])){
	$playlistid= $_GET['id'];

}
else
{
	header("Location: index.php");
}

$playlist=new Playlist($con, $playlistid);
$owner= new User($con, $playlist->getowner());




?>

<div class="entityinfo">
	<div class="leftsection">
		<div class="playlistimage">
			<img src="assests/images/icons/playlist.png">
		</div>
	</div>

	<div class="rightsection">
		<h2><?php echo $playlist->getname();?></h2>
		<p>By <?php echo $playlist->getowner();?> </p>
		<p><?php echo $playlist->getnumberofsongs();?> Songs</p>
		<button class="button" onclick="deleteplaylist('<?php echo $playlistid;?>')">DELETE PLAYLIST</button>
	</div>

</div>
<div class="tracklistcontainer">
	
		<ul class="tracklist">
			
			<?php

			$songidarray=$playlist->getsongids();



			$i=1;
			foreach($songidarray as $songid){
				$playlistsong=new Song($con , $songid);
				$songartist=$playlistsong->getartist();
				echo "<li class='tracklistrow'>
						<div class='trackcount'>
						<img class='play' src='assests/images/icons/play-white.png' onclick='settrack(\"".$playlistsong->getid()."\",tempplaylist,true)'>
						<span class='trackcount'>$i</span>	

						</div>

						<div class='trackinfo'>
						<span class='trackname'>".$playlistsong->gettitle()."</span>
						<span class='artistname'>".$songartist->getname()."</span>
						</div>

						<div class='trackoptions'>
						<input type='hidden' class='songid' value='" .$playlistsong->getid() ."'>
						<img class='optionbutton' src='assests/images/icons/more.png' onclick='showoptionmenu(this)'>
					</div>

						<div>
						<span class='duration'>".$playlistsong->getduration()."</span>
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

		

			<nav class="optionmenu">
				<input type="hidden" class="songid">
				<?php echo Playlist::getPlaylistsDropdown($con, $userloggedin->getusername()); ?>
				
				<div class="item" onclick="removefromplaylist(this, '<?php echo $playlistid; ?>')">Remove from playlist</div>
			</nav>









