

<!doctype html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Register</title>
    <link rel="shortcut icon" href="favicon.png">
    <script src="jquery.js"></script>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="outerBox">
    <div class="header">
        <div class="container" >
            <form class="col s6" method="POST" action="register.php" enctype="multipart/form-data">
              <div class="row" >
                <div style="margin-left:23%;" class="input-field col s3">
                  <input id="name" type="text" placeholder="  Full Name*" class="validate" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name'];} ?>" required>
                  <!-- <span class="error"><?php echo $nameErr;?></span> -->
                  <!-- <label for="name" >Full Name*</label> -->
                </div>
                <div class="input-field col s3">
                  <input id="user_name" type="text" placeholder="  User Name*" class="validate" name="username" value="<?php if(isset($_POST['username'])) {echo $_POST['username'];} ?>" required>
                  <!-- <label for="user_name" >User Name*</label> -->
                </div>
              </div>
              <div class="row" >
                <div style="margin-left:23%;" class=" col s3">
                      <label  style="color:black;">Gender*</label>
                      <p>
                      <input class="with-gap" name="gender" type="radio" id="male" value="male" checked>
                      <label for="male" style="color:black;">Male</label>
                      
                      <input class="with-gap" name="gender" type="radio" id="female" value="female">
                      <label for="female" style="color:black;">Female</label>
                      </p>
               </div>
                <div class="input-field col s3" >
                  <input id="email" type="email" placeholder="  Email ID*" class="validate" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];} ?>" required>
                  <!-- <span class="error"><?php echo $emailErr;?></span> -->
                  <!-- <label for="email">Email*</label> -->
                </div>
              </div> 
              
              
               
              <div class="row" >
                <div style="margin-left:23%;" class="input-field col s6">
                  <input id="password" style="color:black;font-weight:300;" placeholder="  Password*" type="password" class="validate" name="password" required>
                  <!-- <label for="password">Password*</label> -->
                </div>
              </div>
              <div  class="row" >
                <div style="margin-left:23%;" class="input-field col s6">
                  <input id="cpass1" placeholder="  Re-type Password*" type="password" class="validate" name="cpass" required>
                  <!-- <label for="cpass1">Re-Enter Password*</label> -->
                </div>
              </div>
          
              <!-- <span style="color:red;"><?php echo $error4; ?></span><br> -->
              <input style="background-color:#26A69A;padding:10px;color:white;margin-left:0px;" id="button" type="submit" name="register" value="Register"><br><br>
              <div >Or Go back to <a  onclick="window.location='index.php'">Login</a></div>
            </form>
           </div>
        </div>
    </div>
</body>
</html>