<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vol Avion</title>

    <script>
        function CreateTable() {

            let val = document.getElementById("avion").value;
            var x = new XMLHttpRequest()
            x.open('GET','AfficheVolByAvion.php?numvol='+val,true)
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200)
                    // alert("bilal");
                    document.getElementById('test').innerHTML = this.responseText
            }

            x.send();
            // let form = document.getElementById("avion").value;
            // alert(form);
            // let form = document.getElementById("form")
            // let formData = new FormData(form)

            // x.send(form)
        }
    </script>


</head>

<body>
    <form action="AfficheVolByAvion.php" method="post" id="form">
        <label for="avion">Avion :</label>
        <select name="avion" id="avion" onchange="CreateTable()">
            <option value="choisir">Choisir</option>
            <?php 
                $cnx = new PDO("mysql:host=localhost;dbname=gestionvols","root","12345678");


                $NumAvions = $cnx->query("select distinct v.NumAvion,a.TypeAvion from Vol v inner join Avion a on a.NumeroAvion = v.NumAvion")->fetchAll(PDO::FETCH_NUM);
                
                $opts = "";
                foreach($NumAvions as $num){
                    $opts .= "<option value='$num[0]'>$num[1]</option>";
                }
                echo $opts; 
            ?>
        </select>
    </form>

    <div id="test">

    </div>
</body>

</html>