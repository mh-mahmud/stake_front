<footer class="footer_part">
	<div class="container" style="max-width: 1500px;">
		<div class="row">
			<div class="col-sm-3 col-md-3 col-lg-3">
				<div class="copyright_info">
					<img src="<?php base_url(); ?>assets/img/logo.png" alt="" title="Bet score 24" width='80' class="">
					<p>Copyright © 2017, All rights reserved. </p>
					<p><b>Caution!</b> We are strongly discourage to use this site who are not 18+ and also site administrator is not liable to any kind of issues created by user.</p>
				</div>
			</div>

			<div class="col-sm-6 col-md-6 col-lg-6">
				<div class="row">
					<div class="col-sm-4 col-md-4 col-lg-4">
						<div class="footer_quick_link">
							<h5>Betting</h5>
							<ul>
								<li><a href="">Spotrs</a></li>
								<li><a href="">Multi-Live</a></li>
								<li><a href="">Live</a></li>
								<li><a href="">Live Casino</a></li>
								<li><a href="">Number</a></li>
								<li><a href="">Toto</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-4 col-md-4 col-lg-4">
						<div class="footer_quick_link">
							<h5>Game</h5>
							<ul>
								<li><a href="">Toto</a></li>
								<li><a href="">Slots</a></li>
								<li><a href="">Live TV Game</a></li>
								<li><a href="">Bingo</a></li>
								<li><a href="">Casino</a></li>
								<li><a href="">Bitcoin</a></li>
								<li><a href="">BS24 Game</a></li>
							</ul>
						</div>
					</div>

					<div class="col-sm-4 col-md-4 col-lg-4">
						<div class="footer_quick_link">
							<h5>Information</h5>
							<ul>
								<li><a href="">About Us</a></li>
								<li><a href="">Contact Us</a></li>
								<li><a href="">Privacy Policy</a></li>
								<li><a href="">ONLINE Affiliate Program</a></li>
								<li><a href="">How to place a bet</a></li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<div class="col-sm-3 col-md-3 col-lg-3">
				<div class="footer_quick_link">
					<h5>Service Center</h5>
					<ul>
						<li><a href="">Help Center</a></li>
						<li><a href="">Discussions</a></li>
					</ul>
					<br>
					<h5>Downloads</h5>
					<div class="mobile_app_download_icon" style="text-align:left;">
						<a target="_blank" href="">
							<img width="100" alt="" src="<?php echo base_url(); ?>assets/img/android.png">
						</a>
					</div>
				</div>
			</div>

		</div>

		<div class="payment_icon_block_bottom">
			<div class="col-sm-6 col-md-6 col-lg-12">
				<img src="<?php echo base_url(); ?>assets/img/partner/neteller.png" width="100" height="100">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/visa_mastercard.png" width="100">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/skrill.png" width="90">&nbsp;&nbsp;&nbsp;
			</div>
			<div class="col-sm-6 col-md-6 col-lg-12">

				<img src="<?php echo base_url(); ?>assets/img/partner/brazilSerieA.png" width="40">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/logo-fcb.png" width="40">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/logo-hellraisers.png" width="40">&nbsp;
				<img src="<?php echo base_url(); ?>assets/img/partner/logo-laliga.png" width="40">&nbsp;
			</div>
		</div>

		<div class="disclimar_block">
			<p><?= get_copyright_message(); ?></p>
		</div>
	</div>
</footer>


<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/react_css_js/materialView.js"></script>
<script src="<?php echo base_url(); ?>assets/react_css_js/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/react_css_js/sweetalert-dev.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.validate.js"></script>


</body>
</html>

<script>
	$(document).ready(function () {

		$("#owl-game-sl").owlCarousel({

			items: 3,
			loop: true,
			margin: 5,
			animateOut: 'fadeOut',
			autoplay: true,
			lazyLoad:true,
			merge:true,
			autoplayTimeout: 2000,
			autoplayHoverPause: true,
			responsiveClass:true,
			responsive:{
				0:{
					items:1,
					nav:true
				},
				600:{
					items:2,
					nav:false
				},
				1000:{
					items:3,
					nav:true,
					loop:false
				}
			}

		});

	});

</script>

<script>
	var canvas = document.getElementById('game');
	var context = canvas.getContext('2d');

	var grid = 16;
	var count = 0;

	var snake = {
		x: 160,
		y: 160,

		// snake velocity. moves one grid length every frame in either the x or y direction
		dx: grid,
		dy: 0,

		// keep track of all grids the snake body occupies
		cells: [],

		// length of the snake. grows when eating an apple
		maxCells: 4
	};
	var apple = {
		x: 320,
		y: 320
	};

	// get random whole numbers in a specific range
	// @see https://stackoverflow.com/a/1527820/2124254
	function getRandomInt(min, max) {
		return Math.floor(Math.random() * (max - min)) + min;
	}

	// game loop
	function loop() {
		requestAnimationFrame(loop);

		// slow game loop to 15 fps instead of 60 (60/15 = 4)
		if (++count < 4) {
			return;
		}

		count = 0;
		context.clearRect(0,0,canvas.width,canvas.height);

		// move snake by it's velocity
		snake.x += snake.dx;
		snake.y += snake.dy;

		// wrap snake position horizontally on edge of screen
		if (snake.x < 0) {
			snake.x = canvas.width - grid;
		}
		else if (snake.x >= canvas.width) {
			snake.x = 0;
		}

		// wrap snake position vertically on edge of screen
		if (snake.y < 0) {
			snake.y = canvas.height - grid;
		}
		else if (snake.y >= canvas.height) {
			snake.y = 0;
		}

		// keep track of where snake has been. front of the array is always the head
		snake.cells.unshift({x: snake.x, y: snake.y});

		// remove cells as we move away from them
		if (snake.cells.length > snake.maxCells) {
			snake.cells.pop();
		}

		// draw apple
		context.fillStyle = 'red';
		context.fillRect(apple.x, apple.y, grid-1, grid-1);

		// draw snake one cell at a time
		context.fillStyle = 'green';
		snake.cells.forEach(function(cell, index) {

			// drawing 1 px smaller than the grid creates a grid effect in the snake body so you can see how long it is
			context.fillRect(cell.x, cell.y, grid-1, grid-1);

			// snake ate apple
			if (cell.x === apple.x && cell.y === apple.y) {
				snake.maxCells++;

				// canvas is 400x400 which is 25x25 grids
				apple.x = getRandomInt(0, 25) * grid;
				apple.y = getRandomInt(0, 25) * grid;
			}

			// check collision with all cells after this one (modified bubble sort)
			for (var i = index + 1; i < snake.cells.length; i++) {

				// snake occupies same space as a body part. reset game
				if (cell.x === snake.cells[i].x && cell.y === snake.cells[i].y) {
					snake.x = 160;
					snake.y = 160;
					snake.cells = [];
					snake.maxCells = 4;
					snake.dx = grid;
					snake.dy = 0;

					apple.x = getRandomInt(0, 25) * grid;
					apple.y = getRandomInt(0, 25) * grid;
				}
			}
		});
	}

	// listen to keyboard events to move the snake
	document.addEventListener('keydown', function(e) {
		// prevent snake from backtracking on itself by checking that it's
		// not already moving on the same axis (pressing left while moving
		// left won't do anything, and pressing right while moving left
		// shouldn't let you collide with your own body)

		// left arrow key
		if (e.which === 37 && snake.dx === 0) {
			snake.dx = -grid;
			snake.dy = 0;
		}
		// up arrow key
		else if (e.which === 38 && snake.dy === 0) {
			snake.dy = -grid;
			snake.dx = 0;
		}
		// right arrow key
		else if (e.which === 39 && snake.dx === 0) {
			snake.dx = grid;
			snake.dy = 0;
		}
		// down arrow key
		else if (e.which === 40 && snake.dy === 0) {
			snake.dy = grid;
			snake.dx = 0;
		}
	});

	// start the game
	requestAnimationFrame(loop);
</script>
