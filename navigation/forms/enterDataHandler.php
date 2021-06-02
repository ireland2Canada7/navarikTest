<div class="container">
	<?php

		$animalsArray = array(
			'monkey1',
			'monkey2',
			'monkey3',
			'monkey4',
			'monkey5',
			'giraffe1',
			'giraffe2',
			'giraffe3',
			'giraffe4',
			'giraffe5',
			'elephant1',
			'elephant2',
			'elephant3',
			'elephant4',
			'elephant5'
		);

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    if (isset($_POST['advanceTimeBtn'])) {
				$advanceTime = $_POST['advanceTimeBtn'];
				advanceTime($animalsArray);
		    } else {
				$feedAnimals = $_POST['feedAnimalsBtn'];
				feedAnimals($animalsArray);
		    }
		}

		function advanceTime($animalsArray) {
			echo "AdvanceTime";
			// Increase time by 1 hour
			$timestamp = strtotime($_SESSION['zooTime']) + 60*60;
			$_SESSION['zooTime'] = date('Y-m-d H:i:s', $timestamp);

			foreach ($animalsArray as &$animal) {
				$_SESSION[$animal.'percent'] = $_SESSION[$animal.'percent'] - rand(0,20);
				$_SESSION[$animal.'status'] = 'Healthy';
			}

		}

		function feedAnimals($animalsArray) {
			echo "FeedAnimals";
			
		}
	
		include("navigation/forms/enterData.php");
	?>