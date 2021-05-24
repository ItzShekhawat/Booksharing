<?php
session_start();
if(!empty($_SESSION["user_email"])) {
    header('Location: welcome.php');
} else {
    header('Location: SignIN.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleFiles/login_style.css">
    <title>SignIN Page</title>
</head>
<body>
<form action="SignIN.php" method="post" >
  <label>
    <p class="label-txt">ENTER YOUR EMAIL</p>
    <input type="text"  name ="email" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <label>
    <p class="label-txt">ENTER YOUR PASSWORD</p>
    <input type="password" name="password" class="input">
    <div class="line-box">
      <div class="line"></div>
    </div>
  </label>
  <button type="submit" name="submit_SignIN">SignIN</button>
</form>
</body>
</html>

