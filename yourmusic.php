<?php
include("includes/includedfile.php");
?>


<div class="playlistcontainer">
	
	<div class="gridviewcontainer">
		<h2>PLAYLISTS</h2>

		<div class="buttonitems">
			<button class="button green" onclick="createplaylist()">NEW PLAYLIST</button>

		</div>


		<?php

		$username=$userloggedin->getusername();

	$playlistsquery=mysqli_query($con,"SELECT * FROM playlists WHERE owner='$username' ");

	if(mysqli_num_rows($playlistsquery) == 0){
				echo "<span class='noresults'>You dont have any play list yet.</span>";
			}

	while($row = mysqli_fetch_array($playlistsquery)) {
		
				$playlist=new Playlist($con,$row);

		echo "<div class='gridviewitem' role='link' tabindex='0' onclick='openpage(\"playlist.php?id=".$playlist->getid()."\")'>
					<div class='playlistimage'>
					<img src='assests/images/icons/playlist.png'>

					</div>

					<div class='gridviewtitle'>"
					.$playlist->getname().

					"</div>
					</div>";



	}
?>




	</div>

</div>