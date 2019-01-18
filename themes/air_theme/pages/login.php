<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Air Project Login</title>
    <link href="management/themes/management_theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="management/themes/management_theme/vendors/bootstrap/dist/css/font-awesome.min.css" rel="stylesheet">
    <link href="management/themes/management_theme/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="management/themes/management_theme/vendors/animate.css/animate.min.css" rel="stylesheet">
    <link href="management/themes/management_theme/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    
        <div class="login-area" style="width:34rem;height:15rem;background:rgba(198,0,126,.9);border-radius:5px;box-shadow:0 0 5px #000;margin:5% auto;padding:20px 10px;">
          <form action="" method="post">
            <h1 style="color:#fff; font-size:3em;margin:15px auto;text-align:center">User Login</h1>
                <input type="text" name="loginName" style="margin:5px 0px;width:100%;background:#fff" class="form-control" placeholder="Username" required="" />
              <div>
                <input type="password" name='loginPass' style="width:100%;margin:5px 0px;background:#fff"  class="form-control" placeholder="Password" required="" />
              <div>
                <button name='login' class="btn btn-default" style="width:100%;padding:10px;border:none;background:#fff">Log in</button>

                
              <?php  if (isset($_POST['login'])) {
                  $login = $_POST['loginName'];
                  $pass = $_POST['loginPass'];
                  if ($login == "admin" && $pass == "admin") {
                      echo 'Hello Admin';
                      $_SESSION['login'] =  $login;
                      header("Location: index.php");
                  } else {
                       ?> <div><p style="color:#fff">Wrong password or email.</p></div> <?php
                  }
              } ?>

              
              </form>
              </div>
             
      </div>
    </div>
  </body>
</html>
