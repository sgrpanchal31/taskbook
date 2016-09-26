<?php
 
require 'connect.php';
 
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    
    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
    
    //Now, we need to check if the supplied username already exists.
    
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $passwordHash);
 
    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo 'Thank you for registering with our website.';
    }
    
}
 
?>

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
              <div >Or Go back to <a  onclick="window.location='index.html'">Login</a></div>
            </form>
           </div>
        </div>
    </div>
</body>
</html>