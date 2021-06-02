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
				$old_percent = $_SESSION[$animal.'percent'];
				if ($_SESSION[$animal.'percent'] !== 0) {
					$_SESSION[$animal.'percent'] = $_SESSION[$animal.'percent'] - rand(0,20);
					
					if (preg_replace('/[0-9]+/', '', $animal) === 'elephant') {
						if($_SESSION[$animal.'percent'] >= 70) {
							$_SESSION[$animal.'status'] = 'Healthy';
						} else if ($old_percent < 70 && $_SESSION[$animal.'percent'] < 70) {
							$_SESSION[$animal.'status'] = 'Deceased';
							$_SESSION[$animal.'percent'] = 0;
						} else {
							$_SESSION[$animal.'status'] = 'Immobile';
						}
					}

					if (preg_replace('/[0-9]+/', '', $animal) === 'monkey') {
						if($_SESSION[$animal.'percent'] >= 30) {
							$_SESSION[$animal.'status'] = 'Healthy';
						} else {
							$_SESSION[$animal.'status'] = 'Deceased';
							$_SESSION[$animal.'percent'] = 0;
						}
					}

					if (preg_replace('/[0-9]+/', '', $animal) === 'giraffe') {
						if($_SESSION[$animal.'percent'] >= 50) {
							$_SESSION[$animal.'status'] = 'Healthy';
						} else {
							$_SESSION[$animal.'status'] = 'Deceased';
							$_SESSION[$animal.'percent'] = 0;
						}
					}
				}
			}

		}

		function feedAnimals($animalsArray) {
			echo "FeedAnimals";

			foreach ($animalsArray as &$animal) {
				$monkeyFeedPercent = rand(10,25);
				$giraffeFeedPercent = rand(10,25);
				$elephantFeedPercent = rand(10,25);

				if ($_SESSION[$animal.'percent'] !== 0) {
					if (preg_replace('/[0-9]+/', '', $animal) === 'elephant') {
						$_SESSION[$animal.'percent'] = min($_SESSION[$animal.'percent'] + $elephantFeedPercent, 100);
						if($_SESSION[$animal.'percent'] >= 70 && $_SESSION[$animal.'status'] === 'Immobile') {
							$_SESSION[$animal.'status'] = 'Healthy';
						}
					}

					if (preg_replace('/[0-9]+/', '', $animal) === 'monkey') {
						$_SESSION[$animal.'percent'] = min($_SESSION[$animal.'percent'] + $monkeyFeedPercent, 100);
					}

					if (preg_replace('/[0-9]+/', '', $animal) === 'giraffe') {
						$_SESSION[$animal.'percent'] = min($_SESSION[$animal.'percent'] + $giraffeFeedPercent, 100);
					}
				}
			}
			
		}
	
		include("navigation/forms/enterData.php");
	?>