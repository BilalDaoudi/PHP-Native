<?php
include 'connecte_a_data.php';
$email='';$code='';
if(isset($_POST['btn'])):
if(!empty($_POST['usename']) && !empty($_POST['code']) ):
    $email=$_POST['usename'];$code=$_POST['code'];
    
$req="select email,mote_pass from clients where email='$email' and mote_pass='$code' ";

$test=$stmt = $pdo->query($req);
$user = $stmt->fetch();

if($user==null)echo "<script>alert('verifier votre email est mote passe')</script>";
else
{
   
  header('Location:Home_page.php');
  exit();

  
}
endif;
endif;



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connecte</title>
    <style>
        /*.connect{
            width: 300px;
            height: 200px;
            border: 1px black solid;
        }*/
        form{
            background-color: gray;
            padding: 30px;
            border: 1px solid black;
            width: 300px;
            height: 250px;
            border-radius: 50px;
            position: relative;
            top: 0px;
        }
        #usename{
            border-radius: 10px;
            width: 250px;
            height: 30px;
        }
        #code{
            border-radius: 10px;
            width: 250px;
            height: 30px;
        }
        label{
            font-size: 20px;
            color: black;
        }
        #btn{
            color:white;
            background-color:black;
            border-radius: 30px;
            width: 150px;
            height: 30px;
        }
        a{
            text-decoration: none;
        }
        
    </style>

</head>
<body>
    <div class="connect">
        <center>
        <form action="Connecte.php" method="post">
            <label for="usename"> <b> Votre Email : </b></label>
            <br>
            <input type="text" name="usename" value="<?=$email?>" id="usename" placeholder="xxxxxxxxxx@dev102.bk">
            <br>
            <br>
            <label for="code"><b> Votre mot de passe : </b></label>
            <br>
            <input type="password" name="code" id="code" value="<?=$code?>" placeholder="Entrez votre mot de passe">
            <br>
            <br>
            <a href="Get_Password.php">Oubliez mot de passe ?</a>
            <br>
            <br>
            <input type="submit" value="Connecte" id="btn" name="btn">
            <br>
            <br>
            
            <a href="Inscription.php">Click Ici Pour Inscription </a>
        </form>
        </center>
    </div>
    
</body>
</html>

