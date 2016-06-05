$(document).keypress(function(e) {
	if(e.which == 13) {
		alert('You pressed enter!');
	}
});

// $(document).click(function(e) {
	
// });

$(document).ready(function() {
	// alert($("#stats-list .stats-link").length);
	for (var i = 0; i < $("#stats-list .stats-link").length; i++) {
		$(document).on("click", "stats-content" + i, function() {
			alert("click on stats-content" + i);
		});
	}
	// $(document).on("click", "stats-content0", function() {
	// 		alert("click on stats-content");
	// });
})