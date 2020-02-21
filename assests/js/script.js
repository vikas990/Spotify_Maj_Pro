var currentplaylist= [];
var audioelement;


function Audio(){
	this.currentplaying;
	this.audio=document.createElement('audio');
	this.settrack=function(src){
		this.audio.src=src;
	}

	this.play=function(){
		this.audio.play();
	}
	this.pause=function(){
		this.audio.pause();
	}
}