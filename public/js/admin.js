console.log("i Am Here !");


$(document).on("click", ".goto", function(){
	var g = $(this).attr("data-goto");
	admin.goto(g);
});

$(document).on("click", ".confirm", function(){
	var g = $(this).attr("data-goto");
	var a = $(this).attr("data-ask");
	admin.com(g, a);
});

var admin = {
	goto: function(g){
		location.href = g;
	},
	com: function(g,a){
		if(confirm(a)){
			location.href = g;
		}
	}
};