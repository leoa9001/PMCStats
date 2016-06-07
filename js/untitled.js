//keep track of last index to unload
var currentStatBarIndex = 0;

$(".stats-link").click(function(e) {
	//Find index of thing to show
	var index = $("#stats-list li").index($(this).parent());



	var aOld = $("#stats div:nth-child(" + currentStatBarIndex + ")");
	aOld.addClass("hide");
	
	var aNew = $("#stats div:nth-child(" + index + ")");
	aNew.removeClass("hide");
	
	alert("CLICK! "+index+ " "+currentStatBarIndex);
	currentStatBarIndex = index;

});