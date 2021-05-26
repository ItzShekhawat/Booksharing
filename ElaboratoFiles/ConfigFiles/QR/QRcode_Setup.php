<?php

    require "../../Library/phpqrcode/qrlib.php";    

    function QRCode_Generator($idBook, $bookTiltle){

        $tempDir = ("../../QRCODES/");
        $filename = "".$bookTiltle .".png";
        $filesavepath = "".$tempDir.$filename;

        if(!file_exists($filesavepath)){
            QRcode::png($idBook, $filesavepath,1, 200);
            #echo "File generated!";
        }else{
            echo 'File already generated! We can use this cached file to speed up site on common codes!';
        }
    }


?>