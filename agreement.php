<!DOCTYPE html>
<html>
<head>
	<title>Agreement</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	  <h5><strong>CONSENT TO PARTICIPATE IN A RESEARCH STUDY</strong></h5>
	  <h5><strong>TITLE OF STUDY: Study of Mining API Tips from stack overflow</strong></h5>
	  <h5><strong>RESEARCH STUDY:</strong></h5>
	  <p>I have been asked to participate in a research study under the direction of Dr. Wang and Yong ZHAO from NJIT</p>
	  <p>Other professional persons who work with them as study staff may assist to act for them.</p>
	  <h5><strong>Purpose:</strong></h5>
	  <p>To gain knowlodge about how API Tips from stack overflow can help developers grasp key aspects (e.g., performance and security tips) of an API method quickly and improve developers' productivity of learning and using APIs.</p>
	  <h5><strong>DURATION:</strong></h5>
	  <p>My participation in this study will last for up to 30 minutes.</p>
	  <h5><strong>PROCEDURES:</strong></h5>
	  <p>I have been told that, during the course of this study, the following will occur : After approving this consent form, I will answer questions on the survey and submit them when I am ready. All answers are anonymous. I may choose to stop participating at any time and either submit what I have completed or not submit any answers at all.</p>
	  <h5><strong>PARTICIPANTS:</strong></h5>
	  <p>I will be one of about 20 participants in this study.</p>
	  <h5><strong>EXCLUSIONS:</strong></h5>
	  <p>I will inform the researcher if any of the following apply to me:</p>
	  <li>If I am under 18 years of age</li>
	  <h5><strong>RISKS/DISCOMFORTS:</strong></h5>
	  <p>I have been told that the study described above may involve the following risks and/or discomforts:</p>
	  <li>No risks have been identified.</li>
	  <br />
	  <p>There also may be risks and discomforts that are not yet known.</p>
	  <br />
	  <p>I fully recognize that there are risks that I may be exposed to by volunteering in this study which are inherent in participating in any study; I understand that I am not covered by NJIT’s insurance policy for any injury or loss I might sustain in the course of participating in the study.</p>
	  <h5><strong>CONFIDENTIALITY:</strong></h5>
	  <p>The answers to this survey are anonymous; there is no way to identify any respondent.</p>
	  <h5><strong>PAYMENT FOR PARTICIPATION:</strong></h5>
	  <p>I have been told that I will receive $0 compensation for my participation in this study.</p>
	  <h5><strong>RIGHT TO REFUSE OR WITHDRAW:</strong></h5>
	  <p>I understand that my participation is voluntary and I may refuse to participate, or may discontinue my participation at any time with no adverse consequence. I also understand that the investigator has the right to withdraw me from the study at any time.</p>
	  <h5><strong>INDIVIDUAL TO CONTACT:</strong></h5>
	  <p>If I have any questions about my treatment or research procedures, I understand that I should contact the principal investigator at :davidsw@njit.edu</p>
	  <br />
	  <p>If I have any addition questions about my rights as a research subject, I may contact:</p>
	  <pre>
  	Farzan Nadim, IRB Chair
	New Jersey Institute of Technology 
	323 Martin Luther King Boulevard 
	Newark, NJ 07102
	(973) 596-5825
	irb@njit.edu/ farzan@njit.edu
	  </pre>
	  <br />
	  <p>I have read this entire form, or it has been read to me, and I understand it completely. All of my questions regarding this form or this study have been answered to my complete satisfaction. I agree to participate in this research study.</p>
	  <br />
	  <p>By choosing "yes" below, I assert that I am at least 18 years old and that I agree to participate in this survey.</p >
      <div class="radio">
        <label><input type="radio" name="agree" value=1 onchange="changeSubmit(true)">Yes</label>
       </div>
       <div class="radio">
        <label><input type="radio" name="agree" value=0 onchange="changeSubmit(false)">No</label>
       </div>
       <button onclick="openNewUrl()" class="btn btn-default" id="submit1" type="submit" disabled = "true">Submit</button>
 	</div>

 <br /><br /><br /><br />
 <br /><br /><br /><br />
 <br /><br /><br /><br />
    <script type="application/x-javascript">
        function changeSubmit(agree) {
            var sub = document.getElementById("submit1");
            if(agree) {
                sub.classList.remove("btn-default");
                sub.classList.add("btn-primary");
                sub.disabled = false;
            } else {
                sub.classList.remove("btn-primary");
                sub.classList.add("btn-default");
                sub.disabled = true;
            }
        }
        function openNewUrl() {
            window.location.href="./tips.php?agree=1";
        }

    </script>

</body>
</html>