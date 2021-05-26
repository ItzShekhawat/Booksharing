<?php
    require "../ConfigFiles/Connection/db.php";

    
    function showBook(){
        $pdo = connect();

        try{
            // Getting the Book Data
            $query = "SELECT * FROM `books` WHERE 1";
            $stmt = $pdo->prepare($query);
            $stmt->execute();
        }catch(Exception $e){
            
            echo "Failed" . $e->getMessage();
        }
        
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $dinamicCode = '
            <table border = "1px">
            <td>'.$row['title'].'</td>
            </table>    
            ';
            
            echo $dinamicCode;
            
        }
    }

    showBook();

    /*
    for ($i = 1; $i <= $totale; $i++) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $message = ' 
        <form action = Mettilike.php method="post">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 margin">
                    <div class="news-box"style="  width: 320px;
                    padding: 10px;
                    border: 3px solid black;
                    margin: 0;
                    border-radius:10px;
                    background-color:#ffc285">
                    <h3>'.$row['NomeArte'].'</h3>
                    <span>' .$row['Genere'].'</span><br>
                    <p style="word-wrap:break-word; word-break:break-all;" href="' .$row['Messaggio'].'" target="_blank">' .$row['Messaggio'].'</p>
                    <br><input type="submit" name="select" value="'.$row['LikeR'].'" /> 
                    <input type="hidden" name="action" value="'.$row['Id_Tweet'].'"> 
                    <input type="hidden" name="Pagina" value="BachecaRi.php">       
                    </div>
                    </div>
                    </form>
                    ';

        echo $message;
    }
    */
?>