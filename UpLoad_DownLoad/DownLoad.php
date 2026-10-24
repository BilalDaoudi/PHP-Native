<?php 
    if(isset($_GET['path']))
    {
        $path=$_GET['path'];// Chemin du fichier
        //echo $path."<br/>";
        //echo $filename."<br/>";
        
        header("Content-Type: application/octet-stream");  // force DownLoad
        $filename=basename($path);  // Nom de Fichier
        header("Content-Disposition: attachment;filename=$filename") ;                                                 // Name end Extension
        readfile($path);



        /*
        $filename=basename($path);  // Nom du fichier
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachement;filename=$filename");
        readfile($path);
        */

    }

?>

<html>
<head>
<title>Download avec HTML</title>
</head>
<body>
<p><a href="?path=Photos/ph1.jpg">Download ph1.jpg</a></p>
<p><a href="?path=Documents/cours-gratuit-php.pdf">Download cours-gratuit-php.pdf</a></p>
<p><a href="?path=Documents/cours.rar">Download cours.rar</a></p>


</body>
</html>