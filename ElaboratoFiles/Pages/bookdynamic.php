<?php

    require "../ConfigFiles/Connection/db.php";

if(isset($_GET['id'])){
    $bookID = $_GET['id'];

    $pdo = connect();

    try {
        $query = "SELECT * FROM books WHERE bookID = $bookID";
        $stmt_book = $pdo->prepare($query);
        $stmt_book->execute();
    }catch(Exception $e){
        echo 'Error' . $e->getMessage();
    }

    try {
        $query = "SELECT type_category FROM category WHERE id_Category = '$'";
        $stmt_cat = $pdo->prepare($query);
        $stmt_cat->execute();
    }catch(Exception $e){
        echo 'Error' . $e->getMessage();
    }
}else{
    echo 'Error, No id';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php 
        while ($row = $stmt_book->fetch(PDO::FETCH_ASSOC)){ ?>

        <div class="card md-4">
            <div class="row g-1">
                <div class="col-md-4">
                    <img class="card-img-top" src="<?php echo "../".$row['bookCover']; ?>" height = "600px" style="padding: 20px;" alt="Card image cap">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    <h3 class="card-title"><?php echo $row['title']; ?></h3>
                    <p class="card-text"><?php echo $row['writer']; ?></p>
                    <p class="card-text"><?php echo $row['borrow']; ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $row['description']; ?></small></p>
                </div>
            </div>
        </div>

        
        <?php  } ?>

    <?php 
        
    ?>
        <div class="card">
            <div class="card-header">
                Quote
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>A well-known quote, contained in a blockquote element.</p>
                <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                </blockquote>
            </div>
        </div>
    </body>
    </html>








