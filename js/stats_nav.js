// $(document).keypress(function(e) {
// 	if(e.which == 13) {
// 		alert('You pressed enter!');
// 	}
// });

$(".stats-link").click(function(e) {
	// alert(e.target.id);

	// alert($("#stats-list .stats-link").length);
	for (var i = 0; i < $("#stats-list .stats-link").length; i++) {
		if (i == parseInt(e.target.id)) {
			// alert("something");
			// alert($("#stats:nth-child(1)").id);
			// alert($("#stats :nth-child(" + e.target.id + ")").id);
			// $("#stats:nth-child(e.target.id)").removeClass("hide");
			$("#stats #" + i).removeClass("hide");
		} else {
			// alert("something else");
			// alert($("#stats:nth-child(1)").id);
			// alert($("#stats :nth-child(" + e.target.id + ")").id);
			// $("#stats:nth-child(e.target.id)").addClass("hide");
			$("#stats #" + i).addClass("hide");
		}
	}
});