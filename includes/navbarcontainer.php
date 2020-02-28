<div id="navbarcontainer">
	<div class="navbar">
		<span   role="link" tabindex="0" onclick="openpage('index.php')" class="logo">
			<img src="assests/images/profile-pic/listen.png">
			
		</span>

		<div class="group">
			
			<div class="navitem">
				
				<span   role="link" tabindex="0" onclick="openpage('search.php')"  class="navitemlink">Search
				<img src="assests/images/icons/search.png" class="icon" alt="search ">
			</span>
			</div>
		</div>

		<div class="group">
			
			<div class="navitem">
				
				<span   role="link" tabindex="0" onclick="openpage('browse.php')" class="navitemlink">Browse</span>
			</div>

			<div class="navitem">
				
				<span   role="link" tabindex="0" onclick="openpage('yourmusic.php')" class="navitemlink">Your Music</span>
			</div>

			<div class="navitem">
				
				<span   role="link" tabindex="0" onclick="openpage('settings.php')" class="navitemlink"> <?php
								echo $userloggedin->getfirstandlastname();
								?>
		
				</span>
			</div>
		</div>
	</div>
	
</div>