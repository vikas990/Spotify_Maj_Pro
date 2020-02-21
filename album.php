<?php include("includes/header.php");

if(isset($_GET['id'])){
	$albumid= $_GET['id'];

}
else
{
	header("Location: index.php");
}

$album=new Albumclass($con , $albumid);

$artist=$album->getartist();




?>

<div class="entityinfo">
	<div class="leftsection">
		<img src="<?php echo $album->getartworkpath();?>">
	</div>

	<div class="rightsection">
		<h2><?php echo $album->gettitle();?></h2>
		<p>By <?php echo $artist->getname();?> </p>
		<p><?php echo $album->getnumberofsongs();?> Songs</p>
	</div>

</div>
<div class="tracklistcontainer">
	
		<ul class="tracklist">
			
			<?php

			$songidarray=$album->getsongids();

			$i=1;
			foreach($songidarray as $songid){
				$albumsong=new Song($con , $songid);
				$albumartist=$albumsong->getartist();
				echo "<li class='tracklistrow'>
						<div class='trackcount'>
						<img class='play' src='assests/images/icons/play-white.png'>
						<span class='trackcount'>$i</span>	

						</div>

						<div class='trackinfo'>
						<span class='trackname'>".$albumsong->gettitle()."</span>
						<span class='artistname'>".$albumartist->getname()."</span>
						</div>

						<div class='trackoptions'>
						<img class='optionbutton' src='assests/images/icons/more.png'>
						</div>

						<div>
						<span class='duration'>".$albumsong->getduration()."</span>
						</div>


				</li>";

				$i++;
			}

			?>


		</ul>


	

</div>


<?php include("includes/footer.php");?>		