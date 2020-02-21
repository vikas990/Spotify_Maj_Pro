$(document).ready(function(){


$("#hideregister").click(function(){
		$("#loginform").show();
		$("#resgistorform").hide();
		
	});

$("#hidelogin").click(function(){
		$("#loginform").hide();
		$("#resgistorform").show();

	});
});