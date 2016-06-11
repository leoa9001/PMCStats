/* Stats bar navigation script.
*
*
*
*/



$(".stats-link").click(function(e) {
	//index getting without id
	var index = $("#stats-list li").index($(this).parent());


	// I'm still unsure why this loop is necessary but it appears it is.
	for (var i = 1; i <= $("#stats-list .stats-link").length; i++) {
		if (i != index) {
			var a = $("#stats div:nth-child(" + i + ")");
			a.addClass("hide");
		}
		
	}

	var a = $("#stats div:nth-child(" + (index+1) + ")");
	a.removeClass("hide");
});