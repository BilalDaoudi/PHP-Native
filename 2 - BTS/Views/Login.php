<html>

<head>
    <title>Login</title>
  

	<link rel="stylesheet" href="../Style/login.css">
</head>


<body>

<div class="login">
    <img src="../Images/logo.jpg" />
    <h1>BTS</h1>
    <form class="login-form" action="" method="post">
      <div class="textbox">
        <input type="text" name='tUsername' required value="<?php echo $username ?>" />
        <label>Matricule</label>
        <!-- <span class="material-symbols-outlined"> </span> -->
      </div>
      <div class="textbox">
        <input type="password" name='tPassword' required />
        <label>Mot de passe</label>
        <!-- <span class="material-symbols-outlined"> </span> -->
      </div>
      <button type="submit" name="btnConnecte">Connecte</button>
        <p style="color:red"><?= $erreur ?> </p>
    </form>
  </div>


</body>

</html>