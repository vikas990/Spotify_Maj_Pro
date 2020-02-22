var currentplaylist= [];
var audioelement;
var mousedown=false;

function formattime(seconds){
	var time=Math.round(seconds);
	var minutes=Math.floor(time / 60);
	var seconds=time - (minutes * 60);

	var extrazero;
	if(seconds < 10){
		extrazero = "0";
	}
	else{
		extrazero ="";
	}

	return minutes + ":" + extrazero + seconds;
}

function updatetimeprogressbar(audio){
	$(".progresstime.current").text(formattime(audio.currentTime));
	$(".progresstime.remaining").text(formattime(audio.duration-audio.currentTime));

	var progress=audio.currentTime/audio.duration*100;
	$(".playbackbar .progress").css("width", progress + "%");

}

function Audio(){
	this.currentplaying;
	this.audio=document.createElement('audio');

	this.audio.addEventListener("canplay", function() {
		var duration=formattime(this.duration);
		$(".progresstime.remaining").text(duration);
	});

	this.audio.addEventListener("timeupdate", function(){
		if(this.duration){
			updatetimeprogressbar(this);
		}
	});

	this.settrack=function(track){
		this.currentplaying = track;
		this.audio.src = track.path;
	}

	this.play=function(){
		this.audio.play();
	}
	this.pause=function(){
		this.audio.pause();
	}

	this.settime=function(seconds){
		
   this.audio.currentTime = seconds;
		
	}
}