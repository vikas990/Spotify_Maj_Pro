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
	var newplaylist=<?php echo $jsonArray; ?>;
	audioelement =new Audio();
	settrack(newplaylist[0],newplaylist,false);
	updatetimeprogressbar(audioelement.audio);

	$("#nowplayingbarcontainer").on("mousedown touchstart mousemove touchmove", function(e) {/* this part stop the default behaviour of the browser like highlighting or selecting when the mouse moves of do any of these things "mousedown touchstart mousemove touchmove"*/
			e.preventDefault();
	});


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


$(".volumebar .progressbar").mousedown(function() {
	mousedown = true;
});

$(".volumebar .progressbar").mousemove(function(e) {
	if(mousedown == true){
		var percentage=e.offsetX / $(this).width();

		if(percentage >= 0 && percentage <= 1){
			audioelement.audio.volume = percentage;
		}
	}
});

$(".volumebar .progressbar").mouseup(function(e) {
	var percentage=e.offsetX / $(this).width();

		if(percentage >= 0 && percentage <= 1){
			audioelement.audio.volume = percentage;
		}
});

$(document).mouseup(function(){
	mousedown=false;
});
});
function timefromoffset(mouse, progressbar){                            /* so this function helps to play next song*/
	var percentage=mouse.offsetX / $(progressbar).width() * 100;
	var seconds=audioelement.audio.duration * (percentage / 100);
	audioelement.settime(seconds);
}

function prevsong(){                     //this function is used to go on the previous song but if its more than 3 second it will restart the song
	if(audioelement.audio.currentTime >= 3 || currentindex == 0){
		audioelement.settime(0);
	}
	else{
		currentindex=currentindex - 1;
		settrack(currentplaylist[currentindex], currentplaylist, true);
	}
}

function nextsong(){      // this is used to play next song .
if(repeat == true){//this part used to repeat the song.
	audioelement.settime(0);
	playsong();
	return;
}

	if(currentindex == currentplaylist.length-1){//from here next song functionality is applied.
		currentindex = 0;
	}
	else{
		currentindex++;
	}

	var tracktoplay=shuffle ? shuffleplaylist[currentindex] : currentplaylist[currentindex];
	settrack(tracktoplay, currentplaylist, true);
}

function setrepeat(){   //for repeat function it changes the images.
	repeat = !repeat;//this part swap the things like if repeat=false it will turn in true and vice-versa.
	// var imagename = repeat ? "repeat-active.png" : "repeat.png";
	if(repeat == true){
	$(".controlbutton.repeat img").attr("src", "assests/images/icons/repeat-active.png");
	}
	else{
		$(".controlbutton.repeat img").attr("src", "assests/images/icons/repeat.png");
	}
}                                                       


function setmute(){   //for mute function it changes the images.
	audioelement.audio.muted = !audioelement.audio.muted;//this part swap the things like if mute=false it will turn in true and visa-versa.
	
	if(audioelement.audio.muted == true){
	$(".controlbutton.volume img").attr("src", "assests/images/icons/volume-mute.png");
	}
	else{
		$(".controlbutton.volume img").attr("src", "assests/images/icons/volume.png");
	}
} 


function setshuffle(){   //for shuffle function it changes the images.
	shuffle = !shuffle;//this part swap the things like if shuffle=false it will turn in true and vice-versa.
	
	if(shuffle == true){
	$(".controlbutton.shuffle img").attr("src", "assests/images/icons/shuffle-active.png");
	}
	else{
		$(".controlbutton.shuffle img").attr("src", "assests/images/icons/shuffle.png");
	}

		if(shuffle == true){
			//randomize the playlist.
			shufflearray(shuffleplaylist);//calling of the function
			currentindex=shuffleplaylist.indexOf(audioelement.currentplaying.id);
		}
		else{
			//shuffle has been deactivated.
			//go back to regular playlist.
			currentindex=currentplaylist.indexOf(audioelement.currentplaying.id);

		}

	
}  

function shufflearray(a){// this function will shuffle the playlist. 
	var j, x, i;
	for(i=a.length; i; i--){
		j=Math.floor(Math.random() * i);
		x=a[i-1];
		a[i-1]=a[j];
		a[j]=x;
	}
}

function settrack(trackid,newplaylist,play){

	if(newplaylist != currentplaylist){  //this will create new playlist when we click on the new playlist. 
		currentplaylist=newplaylist;
		shuffleplaylist=currentplaylist.slice();
		shufflearray(shuffleplaylist);
	}

	if(shuffle == true){
		currentindex= shuffleplaylist.indexOf(trackid);
	}
	else{
		currentindex= currentplaylist.indexOf(trackid); //tracking song by using id of the track.
	}

	
	pausesong();


	$.post("includes/handler/ajax/getsongjson.php", {songid:trackid}, function(data) {

		

		var track = JSON.parse(data);
		$(".trackname span").text(track.title);

		$.post("includes/handler/ajax/getartistjson.php", {artistid:track.artist}, function(data) {

			var artist = JSON.parse(data);
			$(".trackinfo .artistname span").text(artist.name);
			$(".trackinfo .artistname span").attr("onclick", "openpage('artist.php?id=" + artist.id+ "')");
		});

		$.post("includes/handler/ajax/getalbumjson.php", {albumid:track.album}, function(data) {

			var album = JSON.parse(data);
			$(".content .albumlink img").attr("src", album.artworkpath);
			$(".content .albumlink img").attr("onclick", "openpage('album.php?id=" + album.id+ "')");
			$(".trackinfo .trackname span").attr("onclick", "openpage('album.php?id=" + album.id+ "')");
		});
		
		audioelement.settrack(track);
		if(play == true){
		playsong();
	}
	
	});

	
}

function playsong(){

	if(audioelement.audio.currenttime == 0){
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
					<img role="link" tabindex="0" src="" class="albumartwork">
				</span>

				<div class="trackinfo">
					<span  class="trackname">
						<span role="link" tabindex="0"></span>
					</span>
					<span class="artistname">
						<span role="link" tabindex="0" ></span>
					</span>

				</div>

			</div>
		</div>
		<div id="nowplayingcenter">
			<div class="content playercontrols">
				<div class="button">
						<button class="controlbutton shuffle" title="Shuffle button" onclick="setshuffle()">
							<img src="assests/images/icons/shuffle.png" alt="shuffle button">
							
						</button>

						<button class="controlbutton previous" title="previous button" onclick="prevsong()">
							<img src="assests/images/icons/previous.png" alt="previous button">
							
						</button>

						<button class="controlbutton play" title="play button" onclick="playsong()">
							<img src="assests/images/icons/play.png" alt="play button">
							
						</button>

						<button class="controlbutton pause" title="pause button" style="display: none;" onclick="pausesong()">
							<img src="assests/images/icons/pause.png" alt="pause button">
							
						</button>

						<button class="controlbutton next" title="next button" onclick="nextsong()">
							<img src="assests/images/icons/next.png" alt="next button">
							
						</button>

						<button class="controlbutton repeat" title="repeat button">
							<img src="assests/images/icons/repeat.png" alt="repeat button" onclick="setrepeat()">
							
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
				<button class="controlbutton volume" title="volume" onclick="setmute()">
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