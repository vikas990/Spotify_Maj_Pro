<?php
$songquery=mysqli_query($con, "SELECT id FROM Songs ORDER BY RAND() LIMIT 10");
$resultarray=array();
while($row = mysqli_fetch_array($songquery)){
	array_push($resultarray,$row['id']);

}


$jsonArray=json_encode($resultarray);
?>

<script>
	
$(document).ready(function(){
	currentplaylist=<?php echo $jsonArray; ?>;
	audioelement=new Audio();
	settrack(currentplaylist[0],currentplaylist,false);


$(".playbackbar .progressbar").mousedown(function() {
	mousedown = true;
});

$(".playbackbar .progressbar").mousemove(function(e) {
	if(mousedown == true){
		timefromoffset(e , this);
	}
});

$(".playbackbar .progressbar").mouseup(function(e) {
	timefromoffset(e , this);
});

$(document).mouseup(function(){
	mousedown=false;
});


});

function timefromoffset(mouse, progressbar){
	var percentage = mouse.offset / $(progressbar).width() * 100;
	var seconds = audioelement.audio.duration * (percentage / 100);
	audioelement.settime(seconds);
}


function settrack(trackid,newplaylist,play){
	$.post("includes/handler/ajax/getsongjson.php", {songid:trackid}, function(data) {

		var track = JSON.parse(data);
		$(".trackname span").text(track.title);

		$.post("includes/handler/ajax/getartistjson.php", {artistid:track.artist}, function(data) {

			var artist = JSON.parse(data);
			$(".artistname span").text(artist.name);
		});

		$.post("includes/handler/ajax/getalbumjson.php", {albumid:track.album}, function(data) {

			var album = JSON.parse(data);
			$(".albumlink img").attr("src", album.artworkpath);
		});
		
		audioelement.settrack(track);
		if(play == true){
		playsong();
	}
	
	});

	
}

function playsong(){

	if(audioelement.audio.currentTime == 0){
		$.post("includes/handler/ajax/updateplays.php", {songid:audioelement.currentplaying.id });
	}
	
	$(".controlbutton.play").hide();
	$(".controlbutton.pause").show();

	audioelement.play();
}

function pausesong(){
	$(".controlbutton.play").show();
	$(".controlbutton.pause").hide();
	audioelement.pause();
}


</script>

<div id="nowplayingbarcontainer">

	<div id="nowplayingbar">
		<div id="nowplayingleft">
			<div class="content">
				<span class="albumlink">
					<img src="" class="albumartwork">
				</span>

				<div class="trackinfo">
					<span class="trackname">
						<span></span>
					</span>
					<span class="artistname">
						<span></span>
					</span>

				</div>

			</div>
		</div>
		<div id="nowplayingcenter">
			<div class="content playercontrols">
				<div class="button">
						<button class="controlbutton shuffle" title="Shuffle button">
							<img src="assests/images/icons/shuffle.png" alt="shuffle button">
							
						</button>

						<button class="controlbutton previous" title="previous button">
							<img src="assests/images/icons/previous.png" alt="previous button">
							
						</button>

						<button class="controlbutton play" title="play button" onclick="playsong()">
							<img src="assests/images/icons/play.png" alt="play button">
							
						</button>

						<button class="controlbutton pause" title="pause button" style="display: none;" onclick="pausesong()">
							<img src="assests/images/icons/pause.png" alt="pause button">
							
						</button>

						<button class="controlbutton next" title="next button">
							<img src="assests/images/icons/next.png" alt="next button">
							
						</button>

						<button class="controlbutton repeat" title="repeat button">
							<img src="assests/images/icons/repeat.png" alt="repeat button">
							
						</button>
				</div>

			<div class="playbackbar">
				<span class="progresstime current">0.00</span>

				<div class="progressbar">
					<div class="progressbarbg">
						<div class="progress"></div>
					</div>
				</div>

				<span class="progresstime remaining">0.00</span>

			</div>
			</div>

			
		</div>
		<div id="nowplayingright">
			
			<div class="volumebar">
				<button class="controlbutton volume" title="volume">
					<img src="assests/images/icons/volume.png" alt="volume button">
				</button>

					<div class="progressbar">
					<div class="progressbarbg">
						<div class="progress"></div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	

</div>