<?php

require "../ConfigFiles/Connection/db.php";

// ---------------------------------------------------------------- Getting the Categories in to please ---------------------------
$pdo = connect();
try{
  // Getting the Book Data
  $query = "SELECT * FROM `category` WHERE 1 LIMIT 5";
  $stmt = $pdo->prepare($query);
  $stmt->execute();
}catch(Exception $e){
    
  echo "Failed" . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
      rel="stylesheet"
      id="bootstrap-css"
    />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../Styles/login.css" />
    <title>Bookform</title>
  </head>
  <body>
    <form
      action="../ConfigFiles/BookHandle/bookload.php"
      method="post"
      enctype="multipart/form-data"
    >
      <label>
        <p class="label-txt">ENTER BOOK TITLE</p>
        <input type="text" name="title" class="input" required="required" />
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER WRITER NAME</p>
        <input type="text" name="name" class="input" required="required" />
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER WRITER SURNAME</p>
        <input type="text" name="surname" class="input" required="required" />
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER PRODUCTION HOUSE</p>
        <input type="text" name="PH" class="input" required="required" />
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER PUBLICATION DATE</p>
        <input type="date" name="pdate" class="input" required="required" />
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER CATEGORY</p>
        
        <select type="text" name="cat" class="input" required="required"/>
          <option name="" disabled selected>--Please choose an option--</option>
          <?php
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
              
              ?>
              <option name="<?php echo $row['id_Category']; ?>"> <?php echo $row['type_category'] ; ?> </option>
            
            <?php } ?>

        </select>
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER DESCRIPTION</p>
        <textarea
          name="description"
          type="text"
          class="input"
          required="required"
          style="font-family: sans-serif; font-size: 1em"
        >
        </textarea>
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
        <p class="label-txt">ENTER REGISTRATION CENTRE NAME </p>
        <input type="text" name="centre" class="input" required="required" />
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <label>
      <label>
        <p class="label-txt">ENTER COVER IMG</p>
        <input type="file" name="bookimg" class="input" required="required" />
        <div class="line-box">
          <div class="line"></div>
        </div>
      </label>
      <input type="submit" id="btnSubmit" name="bookform" value="Submit" />
    </form>
  </body>
</html>
