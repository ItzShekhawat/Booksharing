<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>

    
    <link rel="stylesheet" href="../Styles/index.css">
    <title>Index</title>
</head>
<body>

    <!-- Navigation Bar -->
    <header class="p-3 bg-dark text-white">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					<li><a href="index.php" class="nav-link px-2 text-secondary">Home</a></li>
					<li><a href="#" class="nav-link px-2 text-white">Features</a></li>
					<li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
					<li><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
					<li><a href="#" class="nav-link px-2 text-white">About</a></li>
                </ul>

                <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" action="welcome.php" >
					<input type="search" id ="search"  name="q" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
                </form>

                <form  action="../ConfigFiles/Auth/session.php" method="post"> 
					<button type="submit" onclick="location.href='../ConfigFiles/Auth/session.php'" name= "login" class="btn btn-outline-light me-2">Login</button>
					<button type="submit"  onclick="location.href='../ConfigFiles/Auth/session.php'" name="register"  class="btn btn-warning">Sign-up</button>
				</form>
            </div>
        </div>
    </header>
	<!--- QR Code Section -->
    <div class="container ">
        <video id="preview" autoplay="autoplay"  class="active" style="transform: scaleX(-1);"></video>

        <script type="text/javascript">
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        scanner.addListener('scan', function (content) {
            console.log(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
            scanner.start(cameras[0]);
            } else {
            console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
        </script>
    </div>

    


    <!-- QR Code Scanner -->

    <!-- Some Book Suggestions -->

    <!--Info about the Collation Points -->


    <script type="text/javascript" href="../Script/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" ></script>
    
</body>
</html>