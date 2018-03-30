<?php
    require 'db.php';
    include 'header.php';
    $labeluser = $_COOKIE['userownid'];
	$sql = "SELECT * FROM `user_study_participant_info` where `userid`=$labeluser";
	$result = runQuery($sql);
	if(isset($_GET['issubmit'])){
		$q1 = $_GET['q1'];
		$q2 = $_GET['q2'];
		$q3 = $_GET['q3'];
		$q4 = $_GET['q4'];
		$q5 = $_GET['q5'];
		$q6 = $_GET['q6'];
		if(count($result)>0){
			$sql = "UPDATE `user_study_participant_info` set `q1`=:col1,`q2`=:col2,`q3`=:col3,`q4`=:col4,`q5`=:col5 ,`q6`=:col6 where `userid` =:col7";
			$statement = $conn->prepare($sql); 
	        $statement->bindParam(':col1', $q1);
	        $statement->bindParam(':col2', $q2);
	        $statement->bindParam(':col3', $q3);
	        $statement->bindParam(':col4', $q4);
	        $statement->bindParam(':col5', $q5);
	        $statement->bindParam(':col6', $q6);
	        $statement->bindParam(':col7', $labeluser);
	        $statement->execute();
		}else{
			$sql = "INSERT into `user_study_participant_info` (`q1`,`q2`,`q3`,`q4`,`q5`,`q6`,`userid`) values (:col1,:col2,:col3,:col4,:col5,:col6,:col7)";
			$statement = $conn->prepare($sql); 
	        $statement->bindParam(':col1', $q1);
	        $statement->bindParam(':col2', $q2);
	        $statement->bindParam(':col3', $q3);
	        $statement->bindParam(':col4', $q4);
	        $statement->bindParam(':col5', $q5);
	        $statement->bindParam(':col6', $q6);
	        $statement->bindParam(':col7', $labeluser);
	        $statement->execute();
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
</head>
<body>
	<div class="container">
	  <h2>It is done. Thanks for your help!</h2>
	  <a href="index.php">Logout</a>
	</div>
</body>
</html>