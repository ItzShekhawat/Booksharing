<?php

    require "../../Library/phpqrcode/qrlib.php";   


    function QRCode_Generator($idBook, $bookTiltle){

        $bookTiltle = str_replace(' ', '', $bookTiltle);

        $tempDir = ("../../QRCODES/");
        $filename = "".$bookTiltle .".png";
        $filesavepath = "".$tempDir.$filename;
        $book_link = "http://localhost/ElaboratoFiles/ConfigFiles/BookHandle/bookdynamic.php/?id=".$idBook;

        
        if(!file_exists($filesavepath)){
            QRcode::png($book_link, $filesavepath,1, 200);
            #echo "File generated!";
        }else{
            echo 'File already generated! We can use this cached file to speed up site on common codes!';
        }

        $qrcodeInfo = [$filesavepath, $book_link, $idBook];
        return $qrcodeInfo;

    }


?>