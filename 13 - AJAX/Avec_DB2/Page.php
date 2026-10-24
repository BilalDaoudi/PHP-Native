<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vol Avion</title>

    <style>
       

        table{
            border-collapse: collapse;
            /* color: aliceblue; */
            font-family: sans-serif;
            
        }
        table,td,th{
            border: 1px solid black;
            text-align: center;
        }
        th{
            height: 30px;
            background-color:brown;
            color: aliceblue;
        }
        td{
            font-weight: 600; 

        }
        th,td{
            padding: 5px;
        }
        tr:nth-child(odd){
            background-color:chocolate;
        }
        tr:nth-child(even){
            background-color:coral;
        }

    </style>



    <script>
        function Recherche() {

            let val = document.getElementById("pilote").value;
            var x = new XMLHttpRequest()
            x.open('GET', 'RecherchePilote.php?info=' + val, true)
            x.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200)
                    // alert("bilal");
                    document.getElementById('test').innerHTML = this.responseText
            }
            x.send();
        }
    </script>


</head>

<body>
    <center>
        <h1>Les Avions</h1>
        <form action="AfficheVolByAvion.php" method="post" id="form">
            <label for="pilote">Recherche :</label> <input type="text" id="pilote" name="pilote" onkeyup="Recherche()">
        </form>
    </center>
    <div id="test"> <?php
                    $cnx = new PDO("mysql:host=localhost;dbname=gestionvols", "root", "12345678");


                    $Pilotes = $cnx->query("select * from Pilote")->fetchAll(PDO::FETCH_NUM);
                    echo "<br><br><table width='100%'>
            <tr>
                <th>Numero</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Date de Naissance</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Nationalité</th>   
                <th>Date de Recrutement</th>            
            </tr>
    ";
                    foreach ($Pilotes as $pil) {
                        echo "<tr>
                    <td>$pil[0]</td>
                    <td>$pil[1]</td>
                    <td>$pil[2]</td>
                    <td>$pil[3]</td>
                    <td>$pil[4]</td>
                    <td>$pil[5]</td>
                    <td>$pil[6]</td> 
                    <td>$pil[7]</td>              
            </tr>";
                    }
                    echo "</table>";


                    ?>
    </div>


</body>

</html>