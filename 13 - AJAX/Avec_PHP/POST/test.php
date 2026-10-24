<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        function fullname()
        {
            var x=new XMLHttpRequest()
            
            // false : ne termine pas le programme si ne reception pas les donner 
            // true : contraire de false 
            x.open('POST','test1.php',true)
            x.onreadystatechange=function()
            {// 
                if(this.readyState==4 && this.status==200)// 200 connecter avec succès / 404 ne trouve pas / 508 ne peut pas connecter le server
                {// 0 ne commece pas // 1 connecter au serveur /2 reception les donner // 3 traitement des donnes //4 fin reponse est terminer
                    document.getElementById('test').innerHTML=this.responseText
                }
            }
            let form = document.getElementById("form")
            let formData=new FormData(form)

            x.send(formData)
            }
       
    </script> 


    <form method="POST" id="form">
       Nom : <input type="text" name="nom">
        <br><br>
       Prénom : <input type="text" name="prenom">
        </br>
      <button type="button"  onclick="fullname()" >AJAX</button>
    </form>
    <div id="test"></div>
</body>
</html>