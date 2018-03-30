<?php
	session_start();
    if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 3600)) {
        // request 30 minates ago
        session_destroy();
        session_unset();
        header('Location: index.php');
        exit();
    }else{
        $_SESSION['LAST_ACTIVITY'] = time();    
    }
    if(!isset($_SESSION['protected'])){
        session_destroy();
        session_unset();
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>