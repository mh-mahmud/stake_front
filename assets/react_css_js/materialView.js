// mobile menu show hide
$(document).ready(function () {
	$(".sign-in-off-canvas-area-close").click(function () {
		$(".sign-in-off-canvas-area").removeClass("active");
	});
	$(".icon-user-menu").click(function () {
		$(".sign-in-off-canvas-area").addClass("active");
	}).on('click', '.sign-in-off-canvas-area-overlay', function (e) {
		$(".sign-in-off-canvas-area").removeClass("active");
	});

	$(".ic-cl").click(function () {
		$(".left-sidebar").hasClass("collaps-active") ? $(".left-sidebar").removeClass("collaps-active") : $(".left-sidebar").addClass("collaps-active");
		$(".admin-profile-sidebar-menu-list").hasClass("collapse show") ? $(".admin-profile-sidebar-menu-list").removeClass("collapse show") : $(".admin-profile-sidebar-menu-list").addClass("collapse show");
		$(".admin-content").hasClass("collaps-active") ? $(".admin-content").removeClass("collaps-active") : $(".admin-content").addClass("collaps-active");
	});

	$(".ic_font").click(function () {
		if ($(".icoc").hasClass("fa-arrow-left")) {
			$(".icoc").removeClass("fa-arrow-left");
			$(".icoc").addClass("fa-arrow-right");
		} else {
			$(".icoc").addClass("fa-arrow-left");
			$(".icoc").removeClass("fa-arrow-right");
		}
		$(".left-sidebar").hasClass("collaps-active") ? $(".left-sidebar").removeClass("collaps-active") : $(".left-sidebar").addClass("collaps-active");
		$(".game-area").hasClass("collaps-active") ? $(".game-area").removeClass("collaps-active") : $(".game-area").addClass("collaps-active");
	});
});


$(document).ready(function () {
	// timer
	$(document).ready(function () {
		function myTimer() {
			var d = new Date();
			document.getElementById("time").innerHTML = d.toLocaleTimeString();
		}
		setInterval(myTimer, 1000);
	});

});
