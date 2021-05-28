<?php
  require "../ConfigFiles/Connection/db.php";


  $pdo = connect();

  try{
    // Getting the Book Data
    $query = "SELECT * FROM `books` WHERE 1 LIMIT 3";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
  }catch(Exception $e){
      
    echo "Failed" . $e->getMessage();
  }


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/indexpage.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark  p-md-3 " style="background-color: rgba(255,255,255,0);"  id="navbar">
        <div class="container"><a class="navbar-brand" href="#">BookSharing</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <div class="nav ml-auto">
                    
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="welcome.php" >
                        <input type="search" id ="search"  name="q" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                    </form>
                    <form  action="../ConfigFiles/Auth/session.php" method="post"> 
                      <button type="submit" onclick="location.href='../ConfigFiles/Auth/session.php'" name= "login" class="btn btn-outline-light me-2">Login</button>
                      <button type="submit"  onclick="location.href='../ConfigFiles/Auth/session.php'" name="register"  class="btn btn-warning">Sign-up</button>
				            </form>
                </div>
            </div>
        </div>
    </nav>
    <header id="landhead"  class="masthead text-center text-white">
        <div class="masthead-content">
            <div class="container">
                <h1 class="masthead-heading mb-0">Free traveling</h1>
                <h2 class="masthead-subheading mb-0">The books that let you explore</h2>
                <a class="btn btn-primary btn-xl rounded-pill mt-5" id = "QRBtn" onclick="window.location.href = '../html/QRCode.html';" role="button" >Scan QRCode</a></div>
        </div>
    </header>
    <div class="card-deck" style ="margin : 20px;">

      <?php 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

        ?>
        <div class="card">
            <img class="card-img-top" src="<?php echo $row['bookCover']; ?>" height = "500px" style="padding: 50px;" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"> <?php echo $row['title']; ?> </h5>
              <p class="card-text"><?php echo $row['description']; ?></p>
            </div>
            <div class="card-footer text-center" type = "button">
              <medium class="text-muted" >Find out mode</medium>
            </div>
        </div>

      <?php } ?>

       
    </div>

    <footer class="py-5 bg-black">
        <div class="container">
            <p class="text-center text-white m-0 small">Copyright&nbsp;© BookSharing 2021</p>
        </div>
    </footer>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Scripts/land.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" ></script>
</body>

</html>