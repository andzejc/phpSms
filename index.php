<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
<?php
require_once('script.php');
$scriptObj = new Functions();
?>
<div class="jumbotron">
  <h1 class="display-4">Hello, everyone!</h1>
  <p class="lead">This is a simple price counter, enter a price and I will count how many sms are need to send.</p>
  <hr class="my-4">
	<p><?php 
	$scriptObj->findBestPlan();
	?></p>
</div>
</body>
</html>