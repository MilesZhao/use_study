<?php
    require 'db.php';
    $labeluser = $_COOKIE['userownid'];

    if(isset($_GET['agree'])){
        $sql = "SELECT * FROM `user_study_participant_info` where `userid`=$labeluser";
        $result = runQuery($sql);
        $val = $_GET['agree'];
        if ($val==0){
            header("Location: disagreeinfo.php");
            exit();
        }
        if(count($result)>0){
            $sql = "UPDATE `user_study_participant_info` set `above18`=:col1 where `userid` =:col6";
            $statement = $conn->prepare($sql); 
            $statement->bindParam(':col1', $val);
            $statement->bindParam(':col6', $labeluser);
            $statement->execute();
        }else{
            $sql = "INSERT into `user_study_participant_info` (`above18`,`userid`) values (:col1,:col6)";
            $statement = $conn->prepare($sql); 
            $statement->bindParam(':col1', $val);
            $statement->bindParam(':col6', $labeluser);
            $statement->execute();
        }
        
    }
    include 'header.php';

    $sql = "SELECT distinct `tipid` FROM `user_study_stat` where `ispara` = 1 and `userid`=$labeluser";
    $result = runQuery($sql);
    $num = count($result);
    $onehot_ids = array();
    for($i=0;$i<$num;$i++){
        $onehot_ids[] = $result[$i]['tipid'];
    }
    $num_rows = count($onehot_ids);
    $sample_ids = $onehot_ids; 
    $prev=$num_rows-1;
    $next=1;
    $current=0;
    $record = $current;
    $isuseful = -1;
    

    if(isset($_GET['isuseful'])){
        $isuseful = $_GET['isuseful'];
        $isbaseline = $_GET['isbaseline'];
        $current = $_GET['record'];
        $next = $current+1;
        $prev = $current-1;
        $record = $current;
    }

    if(isset($_GET['prev']) && $_GET['prev']){
        $current = $_GET['prev'];
        $prev = $current-1;
        $next = $current+1;
        $record = $current;
    }

    if(isset($_GET['next']) && $_GET['next']){
        $current = $_GET['next'];
        $next = $current+1;
        $prev = $current-1;
        $record = $current;
    }
    $id = $sample_ids[$current];

    $sql = "SELECT * from paragraphs where ID='$id' ";
    $row = runQuery($sql);

    if(count($row)>0){
        $answer_id = $row[0]['answer_id'];
        $parent_id = $row[0]['parent_id'];

        $sql = "SELECT Body,Title from threads where id = '$parent_id' ";
        $row = runQuery($sql)[0];
        $title = $row['Title'];
        $body = $row['Body'];

        $sql = "SELECT * from answer_body where ID = '$answer_id' ";
        $row = runQuery($sql)[0];
        $answer_body = ($row['body']);
    }

    if ($isuseful != -1) {
        #main database
        $sql = "UPDATE user_study_stat set `isuseful`='$isuseful' where `ispara` = 1 and `userid` = '$labeluser' AND `tipid`='$id' and `isbaseline`='$isbaseline'";
        $row = runQuery($sql);
    }

    if($prev<0){
        $prev=$num_rows-1;
        $current = $prev;
    }
    if($next>($num_rows-1)){
        $next=0;
        $current = $next;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Samples Page</title>
</head>
<body>
    <div>
        <div class="text-center">        
            <h2>Welcome to our research page! You have <?php echo $num_rows;?> pages need to be verified!</h2>
            <h3>You are in page <?php echo $record+1;?> currently!</h3>       
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <h4 style="background-color:Green;">Question:</h4>
                <h4 ><?php echo ($title)?> </h4>
                <div class="well" style="height: 400px; overflow-y: scroll;overflow-x: scroll;margin:0 auto;">
                    <?php echo ($body)?>
                </div>
            </div>
            <div class="col-sm-6">
                <h4 style="background-color:Green;">Answer</h4>
                <h4><br></h4>
                <div class="well" style="height: 400px; overflow-y: scroll;overflow-x: scroll;margin:0 auto;">
                    <?php echo ($answer_body)?>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" >
        <div class="row panel panel-default">
            <div class="col-lg-6">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <tr>
                            <th>Our Model</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>
                        <tr>
                            <?php 
                                $sql = "SELECT * from user_study_stat where `ispara` = 1 and `userid` = '$labeluser' AND `tipid` = '$id' and `isbaseline`=0 ";
                                $result = runQuery($sql);
                            ?>
                            <td>
                                <?php 
                                    if (count($result) > 0){
                                        echo $result[0]['txt'];                                  
                                    }else{
                                        echo '<strong>Our model did not fine tips, leave this alone</strong>';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if (count($result) > 0){
                                        $status = $result[0]['isuseful'];
                                        if ($status == 1) {
                                            echo "<strong style=\"color: red;\">Useful</strong>";
                                        }elseif ($status==0) {
                                            echo "<strong style=\"color: red;\">Useless</strong>";
                                        }else{
                                            echo "<strong>Unlabeled</strong>";
                                        }
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if (count($result) > 0){
                                ?>
                                <form action="./tips.php" method="get">
                                    <input type="hidden" name="isuseful" value="<?php echo 1?>">
                                    <input type="hidden" name="isbaseline" value="<?php echo 0?>">
                                    <input type="hidden" name="record" value=<?php echo $record?> >
                                    <button type="submit">Useful</button>
                                </form>
                                <form action="./tips.php" method="get">
                                    <input type="hidden" name="isuseful" value="<?php echo 0?>">
                                    <input type="hidden" name="isbaseline" value="<?php echo 0?>">
                                    <input type="hidden" name="record" value=<?php echo $record?> >
                                    <button type="submit">Useless</button>
                                </form>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>    
            </div>
            <div class="col-lg-6">
                <div class="table-responsive-sm">
                    <table class="table table-bordered">
                        <tr>
                            <th>Baseline</th>
                            <th>Status</th>
                            <th>&nbsp;</th>
                        </tr>
                        <tr>
                            <?php 
                                $sql = "SELECT * from user_study_stat where `ispara` = 1 and `userid` = '$labeluser' AND `tipid` = '$id' and `isbaseline`=1 ";
                                $result = runQuery($sql);
                            ?>
                            <td>
                                <?php 
                                    if (count($result) > 0){
                                        echo $result[0]['txt'];                                  
                                    }else{
                                        echo '<strong>Baseline did not fine tips, leave this alone</strong>';
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if (count($result) > 0){
                                        $status = $result[0]['isuseful'];
                                        if ($status == 1) {
                                            echo "<strong style=\"color: red;\">Useful</strong>";
                                        }elseif ($status==0) {
                                            echo "<strong style=\"color: red;\">Useless</strong>";
                                        }else{
                                            echo "<strong>Unlabeled</strong>";
                                        }
                                    }
                                ?>
                            </td>
                            <td>
                                <?php 
                                    if (count($result) > 0){
                                ?>
                                <form action="./tips.php" method="get">
                                    <input type="hidden" name="isuseful" value="<?php echo 1?>">
                                    <input type="hidden" name="isbaseline" value="<?php echo 1?>">
                                    <input type="hidden" name="record" value=<?php echo $record?> >
                                    <button type="submit">Useful</button>
                                </form>
                                <form action="./tips.php" method="get">
                                    <input type="hidden" name="isuseful" value="<?php echo 0?>">
                                    <input type="hidden" name="isbaseline" value="<?php echo 1?>">
                                    <input type="hidden" name="record" value=<?php echo $record?> >
                                    <button type="submit">Useless</button>
                                </form>
                                <?php
                                    }
                                ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>  
    </div>
    <br>
    <div class="text-center">
        <div class="btn-group btn-group-lg">

            <?php if(!($record == 0) ){ ?>
                <a href='tips.php?prev=<?php echo $prev?>' class="btn btn-success" role="button">PREV</a>
            <?php }?>

            <?php if(!($record == $num_rows - 1) ){ ?>
                <a href='tips.php?next=<?php echo $next?>' class="btn btn-warning" role="button">NEXT</a>
            <?php }?>

            <?php if ($record == $num_rows - 1){?>
                <a class="btn btn-default" role="button" onclick="finishAnswer(-1)" >Finish</a>
            <?php }?>

        </div>  
    </div>
    <br>
    <script type="application/x-javascript">
        function finishAnswer(ans) {
            if(ans === -1) {
                //ok 
                window.location.href="./questions.php";
            } else {
                alert("please check unfinished items!");
            }
        }

    </script>
</body>
</html>
