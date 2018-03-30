<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login Page</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

  </head>

  <body>
    
    <div class="container">
      <form class="form-signin" method="POST" action="index.php">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" id="inputUsername" class="form-control" placeholder="Enter Username" name="reg_uname" required />
        <input type="Password" id="inputPassword" class="form-control" placeholder="Enter Password" name="reg_password" required />
        <input type="hidden" class="form-control" name="action" value="test_user_valid">
        <br />
        <button class="btn btn-lg btn-primary btn-block" type="submit" id="submitButton">Sign in</button>
      </form>
    </div> <!-- /container -->

  </body>
</html>





