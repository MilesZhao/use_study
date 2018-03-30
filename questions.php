<?php
include 'header.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	  <h2>General Questions</h2>
	  <form action="./end.php" method="get">
	  	<p>Do you think it is useful to extract tips for APIs?</p>
	    <div class="radio">
	      <label><input type="radio" name="q1" value=1>Agree</label>
	    </div>
	    <div class="radio">
	      <label><input type="radio" name="q1" value=0>Disagree</label>
	    </div>

	    <p>Do you think the extracted tips from our approach are useful to you?</p>
	    <div class="radio">
	      <label><input type="radio" name="q2" value=1>Agree</label>
	    </div>
	    <div class="radio">
	      <label><input type="radio" name="q2" value=0>Disagree</label>
	    </div>

	    <!-- <p>If no to 2, do you think they are useful to novice developers?</p>
	    <div class="radio">
	      <label><input type="radio" name="q3" value=1>Agree</label>
	    </div>
	    <div class="radio">
	      <label><input type="radio" name="q3" value=0>Disagree</label>
	    </div> -->

		<div id="three" hidden="true">
     		<p>3. If no to 2, do you think they are useful to novice developers?</p >
            <div class="radio">
              <label><input type="radio" name="q3" value=1>Agree</label>
            </div>
            <div class="radio">
              <label><input type="radio" name="q3" value=0>Disagree</label>
            </div>
        </div>

	    <p>Do you think our approach can outperform the baseline?</p>
	    <div class="radio">
	      <label><input type="radio" name="q4" value=1>Agree</label>
	    </div>
	    <div class="radio">
	      <label><input type="radio" name="q4" value=0>Disagree</label>
	    </div>

	    <p>Do you have any recommendation/comments/thoughts?</p>
	    <div class="form-group">
            <textarea class="form-control" rows="5" name="q5"><?php echo ($comments)?></textarea>
        </div>
        <input type="hidden" name="issubmit" value="<?php echo 1?>">
	    <button type="submit">Submit</button>
	  </form>
	</div>
	<script type="application/x-javascript">
        function showThree(show) {
            var three = document.getElementById("three");
            three.hidden = !show;
        }
    </script>
</body>
</html>