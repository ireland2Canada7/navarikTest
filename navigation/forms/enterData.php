<div class="container">	
	<form method="POST" action="?p=enterDataHandler" id="dataForm">
<?php

// session_start();
// echo $_SESSION['test'];
// echo var_dump(is_float($_SESSION['elephant5percent']));
// echo date('H', strtotime($_SESSION['zooTime']));
// echo date('i', strtotime($_SESSION['zooTime']));
// echo date('s', strtotime($_SESSION['zooTime']));
?>
		<div class="row">
		<?php echo $_SESSION['zooTime']; ?>
			<canvas id="canvas" width="200" height="200" style="background-color:#333;margin-left: 32%;"></canvas>
		</div>

		<div class="row">
			<div class="col-md-4" id="monkeyDiv">
				<h2>Monkeys</h2>
				<img src="assets/monkey.png" alt="monkey.png" width="128" height="128"><br><br>
				<label for="monkey1">Monkey 1 - <?php echo $_SESSION['monkey1percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['monkey1status']; ?></label><br>
				<progress id="monkey1" value="<?php echo $_SESSION['monkey1percent']; ?>" max="100"></progress><br><br>
				<label for="monkey2">Monkey 2 - <?php echo $_SESSION['monkey2percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['monkey2status']; ?></label><br>
				<progress id="monkey2" value="<?php echo $_SESSION['monkey2percent']; ?>" max="100"></progress><br><br>
				<label for="monkey3">Monkey 3 - <?php echo $_SESSION['monkey3percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['monkey3status']; ?></label><br>
				<progress id="monkey3" value="<?php echo $_SESSION['monkey3percent']; ?>" max="100"></progress><br><br>
				<label for="monkey4">Monkey 4 - <?php echo $_SESSION['monkey4percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['monkey4status']; ?></label><br>
				<progress id="monkey4" value="<?php echo $_SESSION['monkey4percent']; ?>" max="100"></progress><br><br>
				<label for="monkey5">Monkey 5 - <?php echo $_SESSION['monkey5percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['monkey5status']; ?></label><br>
				<progress id="monkey5" value="<?php echo $_SESSION['monkey5percent']; ?>" max="100"></progress><br><br>
			</div>
			<div class="col-md-4" id="giraffeDiv">
				<h2>Giraffes</h2>
				<img src="assets/giraffe.png" alt="giraffe.png" width="128" height="128"><br><br>
				<label for="giraffe1">Giraffe 1 - <?php echo $_SESSION['giraffe1percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['giraffe1status']; ?></label><br>
				<progress id="giraffe1" value="<?php echo $_SESSION['giraffe1percent']; ?>" max="100"></progress><br><br>
				<label for="giraffe2">Giraffe 2 - <?php echo $_SESSION['giraffe2percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['giraffe2status']; ?></label><br>
				<progress id="giraffe2" value="<?php echo $_SESSION['giraffe2percent']; ?>" max="100"></progress><br><br>
				<label for="giraffe3">Giraffe 3 - <?php echo $_SESSION['giraffe3percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['giraffe3status']; ?></label><br>
				<progress id="giraffe3" value="<?php echo $_SESSION['giraffe3percent']; ?>" max="100"></progress><br><br>
				<label for="giraffe4">Giraffe 4 - <?php echo $_SESSION['giraffe4percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['giraffe4status']; ?></label><br>
				<progress id="giraffe4" value="<?php echo $_SESSION['giraffe4percent']; ?>" max="100"></progress><br><br>
				<label for="giraffe5">Giraffe 5 - <?php echo $_SESSION['giraffe5percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['giraffe5status']; ?></label><br>
				<progress id="giraffe5" value="<?php echo $_SESSION['giraffe5percent']; ?>" max="100"></progress><br><br>
			</div>
			<div class="col-md-4" id="elephantDiv">
				<h2>Elephants</h2>
				<img src="assets/elephant.png" alt="elephant.png" width="128" height="128"><br><br>
				<label for="elephant1">Elephant 1 - <?php echo $_SESSION['elephant1percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['elephant1status']; ?></label><br>
				<progress id="elephant1" value="<?php echo $_SESSION['elephant1percent']; ?>" max="100"></progress><br><br>
				<label for="elephant2">Elephant 2 - <?php echo $_SESSION['elephant2percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['elephant2status']; ?></label><br>
				<progress id="elephant2" value="<?php echo $_SESSION['elephant2percent']; ?>" max="100"></progress><br><br>
				<label for="elephant3">Elephant 3 - <?php echo $_SESSION['elephant3percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['elephant3status']; ?></label><br>
				<progress id="elephant3" value="<?php echo $_SESSION['elephant3percent']; ?>" max="100"></progress><br><br>
				<label for="elephant4">Elephant 4 - <?php echo $_SESSION['elephant4percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['elephant4status']; ?></label><br>
				<progress id="elephant4" value="<?php echo $_SESSION['elephant4percent']; ?>" max="100"></progress><br><br>
				<label for="elephant5">Elephant 5 - <?php echo $_SESSION['elephant5percent']; ?>%</label><br>
				<label>Status - <?php echo $_SESSION['elephant5status']; ?></label><br>
				<progress id="elephant5" value="<?php echo $_SESSION['elephant5percent']; ?>" max="100"></progress><br><br>
		   </div>
		</div>


		
			
		<div id="btnDiv" style="margin-left: 30%;margin-top: 2%;">
			<button type="submit" style="margin: 0 5% 0 auto; display: inline;" class="btn btn-primary" name="advanceTimeBtn">Advance time 1 hour</button>
			<button type="submit" style="margin: 0 auto 0 5%; display: inline;" class="btn btn-success" name="feedAnimalsBtn">Feed the animals</button>
		</div>
	</form>

	<script>
		var canvas = document.getElementById("canvas");
		var ctx = canvas.getContext("2d");
		var radius = canvas.height / 2;
		ctx.translate(radius, radius);
		radius = radius * 0.90
		setInterval(drawClock, 1000);

		function drawClock() {
			drawFace(ctx, radius);
			drawNumbers(ctx, radius);
			drawTime(ctx, radius);
		}

		function drawFace(ctx, radius) {
			var grad;
			ctx.beginPath();
			ctx.arc(0, 0, radius, 0, 2*Math.PI);
			ctx.fillStyle = 'white';
			ctx.fill();
			grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
			grad.addColorStop(0, '#333');
			grad.addColorStop(0.5, 'white');
			grad.addColorStop(1, '#333');
			ctx.strokeStyle = grad;
			ctx.lineWidth = radius*0.1;
			ctx.stroke();
			ctx.beginPath();
			ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
			ctx.fillStyle = '#333';
			ctx.fill();
		}

		function drawNumbers(ctx, radius) {
			var ang;
			var num;
			ctx.font = radius*0.15 + "px arial";
			ctx.textBaseline="middle";
			ctx.textAlign="center";
			for(num = 1; num < 13; num++){
				ang = num * Math.PI / 6;
				ctx.rotate(ang);
				ctx.translate(0, -radius*0.85);
				ctx.rotate(-ang);
				ctx.fillText(num.toString(), 0, 0);
				ctx.rotate(ang);
				ctx.translate(0, radius*0.85);
				ctx.rotate(-ang);
			}
		}

		function drawTime(ctx, radius){
		    var hour = "<?php echo date('H', strtotime($_SESSION['zooTime'])); ?>";
		    var minute = "<?php echo date('i', strtotime($_SESSION['zooTime'])); ?>";
		    var second = "<?php echo date('s', strtotime($_SESSION['zooTime'])); ?>";

		    //hour
		    hour=hour%12;
		    hour=(hour*Math.PI/6)+
		    (minute*Math.PI/(6*60))+
		    (second*Math.PI/(360*60));
		    drawHand(ctx, hour, radius*0.5, radius*0.07);
		    //minute
		    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
		    drawHand(ctx, minute, radius*0.8, radius*0.07);
		    // second
		    second=(second*Math.PI/30);
		    drawHand(ctx, second, radius*0.9, radius*0.02);
		}

		function drawHand(ctx, pos, length, width) {
		    ctx.beginPath();
		    ctx.lineWidth = width;
		    ctx.lineCap = "round";
		    ctx.moveTo(0,0);
		    ctx.rotate(pos);
		    ctx.lineTo(0, -length);
		    ctx.stroke();
		    ctx.rotate(-pos);
		}
	</script>