/* Stats bar navigation script.
*
*
*
*/

$(".stats-link").click(function(e) {

	var index = $("#stats-list li").index($(this).parent());

	for (var i = 0; i < $("#stats-list .stats-link").length; i++) {
		if (i == index) {

			var a = $("#stats div:nth-child(" + i + ")");
			a.removeClass("hide");

		} else {
			var a = $("#stats div:nth-child(" + i + ")");
			a.addClass("hide");

			// $("#stats #" + i).addClass("hide");
		}
		
	}

	alert("click");
});