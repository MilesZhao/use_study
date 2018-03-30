<?php
    session_start();
    require 'db.php';
    $action = $_POST['action'];
    if ($action == NULL){
        $action = 'login_page';
    }

    if ($action == 'login_page') {
        header('Location: login.php');
    }else if ($action == 'test_user_valid') {
        $email = htmlspecialchars($_POST['reg_uname']);
        $pass =  htmlspecialchars($_POST['reg_password']);
        $sql = "select * from accounts where userid='$email' ";
        $results = runQuery($sql);
        if(count($results)>0){
            if($results[0]['password'] == $pass){
                $userownid = $results[0]['ID'];
                $_SESSION['LAST_ACTIVITY'] = time();
                $_SESSION['protected'] = '00';
                setcookie('userownid',$userownid);
                $url = "Location: agreement.php";
                header($url);
            }else{
                header('Location: badinfo.html');
            }
        }else{
            header('Location: badinfo.html');
        }
    }

?>