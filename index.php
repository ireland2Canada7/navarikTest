<?php 
	session_start(); 
	require 'common.php';			//Common resources required by all pages(ie, translation, bootstrap library,etc)
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/zoo.ico">
	
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-62675827-1', 'auto');
		ga('send', 'pageview');
	</script>
	
	<!-- Add jQuery library -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
	
	<!-- Add interact library, used to move dots on target -->
	<script src="js/interact-1.2.4.min.js"></script>
	
	<!-- Bootstrap CSS v3.0.0 or higher -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	<!-- Bootstrap JS -->
	<script src="js/bootstrap.min.js"></script>

	<!-- Select 2, for snazzy combos -->
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
				
    <title>Navarik Zoo Simulator</title>
  </head>

  <body style="overflow-y:scroll;min-height:100%;height:100%;margin: 0 auto -155px;">
	
    <nav class="navbar navbar-inverse navbar-fixed-top">		<!-- All part of the navbar -->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="?p=home">Navarik Zoo Simulator</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
        		  
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron, used for QA page -->
    <div class="jumbotron">
      <div class="container">
        <h1>Welcome to the Navarik Zoo!</h1>
      </div>
    </div>

    <?php
		switch (isset($_GET['p']) ? $_GET['p'] : 'Error!') {
			case "home":					//Homepage
				include("home.php");
				break;

			case "enterData":				//Enter the wild world of zookeeping
				include("navigation/forms/enterData.php");
				break;
				
			case "enterDataHandler":		//Data handler for the aforementioned wild world of zookeeping
				include("navigation/forms/enterDataHandler.php");
				break;
							
			default:
				echo "<script>window.location = 'index.php?p=home'</script>";
		}
	?>

	<footer style="left:0;bottom:25;width:100%;" class="footer">
		<hr>
		<p style="float:right;margin-right:50;">Navarik Test 2021 - Tim Wallace</p>
	</footer>
    </div>
  </body>
</html>